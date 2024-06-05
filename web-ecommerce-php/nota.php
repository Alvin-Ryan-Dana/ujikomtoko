<?php
session_start();
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota pembelian</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="kontent">
    <div class="container">

<h2>Detail Pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM hist JOIN customer ON hist.id_customer=customer.id_customer WHERE hist.id_hist='$_GET[id]'");
$detail = $ambil->fetch_assoc();
 ?>

<strong><?php echo $detail['nama_c']; ?></strong> <br>
    <p>
        <?php echo $detail['telepon_c']; ?> <br>
        <?php echo $detail ['email_c']; ?> 
    </p>

    <p>
        Tanggal: <?php echo $detail['tanggal']; ?> <br>
        Total: Rp. <?php echo number_format($detail['total']); ?> 
    </p>

    <table class="table table-bordered">
        <thead> 
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $nomor=1; 
                
                $ambil=$koneksi->query("SELECT * FROM hist_produk JOIN produk ON hist_produk.id_produk=produk.id_produk WHERE hist_produk.id_hist='$_GET[id]'");
                while($pecah=$ambil->fetch_assoc()){ 
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_p']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga_p']); ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
            </tr>
            <?php 
                $nomor++;
                } 
            ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-info">
                <p>
                    Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total']); ?> ke <br>
                    <strong>BANK BNI 11111111 AN. ALVIN RYAN DANA</strong>
                </p>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
