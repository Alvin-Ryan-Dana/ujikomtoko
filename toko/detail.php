<?php

session_start();
include 'koneksi.php'; 

$id_produk = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
// fetch assoc ambil semua kolom tabelnya
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- bootstrap image -->
                <img src="foto_produk/<?php echo $detail["foto_p"]; ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_p"]; ?></h2>
                <h4>Rp. <?php echo number_format($detail["harga_p"]); ?></h4>
                <p><?php echo $detail["deskripsi"]; ?></p>
                <p>Berat : <?Php echo $detail["berat_p"]; ?> Gr</p>

                <form action ="beli.php" method="get" class="mt-5">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id_produk;?>">
                        <label for="jumlah">Jumlah:</label>
                        <div class="input-group mb-3">
                            <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" value="1">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="beli">Masukkan ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
