<?php
session_start();
include 'koneksi.php'; 

if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location = 'login.php';</script>"; 
}

if (empty($_SESSION['keranjang'])){
    echo "<script>alert('Keranjang anda kosong');</script>";
	echo "<script>location = 'produk.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="kontent">
    <div class="container">
        <h2>Keranjang Belanja</h2>

            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $nomor=1; 
                        $totalbelanja = 0;
                        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): 
                    
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga_p'] * $jumlah;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_p']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga_p']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                    </tr>
                    <?php 
                        $nomor++; 
                        $totalbelanja+=$subharga;
                        endforeach 
                    ?>
                </tbody>
                <tfoot>
					<tr>
						<th colspan="4">Total belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
            </table>

        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_c'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_c'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir" required>
                        <option value="">Pilih Ongkos Kirim</option>
                        <?php 
                            $ambil = $koneksi->query("SELECT * FROM harga_ongkir");
                            while($perongkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $perongkir["id_ongkir"] ?>">
                            <?php echo $perongkir['kota'] ?><p> - Rp.</p><?php echo number_format($perongkir['tarif']) ?>
                        </option>

                        <?php 
                            } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" id="alamat_pengiriman" required placeholder="Masukan alamat lengkap (termasuk kode pos)"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_customer"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("SELECT * FROM harga_ongkir WHERE id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['kota'];
            $tarif = $arrayongkir['tarif'];

            $total_pembelian = $totalbelanja + $tarif;

            // Menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO hist 
                (id_customer,id_ongkir,tanggal, kota, tarif, total, alamat_kirim) 
                VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian', '$nama_kota', '$tarif', '$total_pembelian','$alamat_pengiriman')");

            // Mendapatkan id_pembelian barusan
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_p'];
                $harga = $perproduk['harga_p'];
                $subharga = $perproduk['harga_p']*$jumlah;

                // insert ke tabel pembelian_produk
                $koneksi->query("INSERT INTO hist_produk (id_hist,id_produk,nama,jumlah, subharga, harga)
                    VALUES ('$id_pembelian_barusan','$id_produk','$nama', '$jumlah', $subharga, '$harga') ");

            }

            // Kosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            // Tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
            echo "<script>alert('pembelian sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
        }
        ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
