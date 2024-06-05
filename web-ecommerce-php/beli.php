<?php
session_start();
// mendapatkan id_produk dari url 
$id_produk = $_GET['id'];
$jumlah = $_GET['jumlah'];

// Jika sudah ada produk itu di keranjang, maka produk itu jumlahnya di tambah jumlah yang dipilih
if (isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk] += $jumlah;
}
// Selain itu (belum ada di keranjang) maka produk itu di anggap dibeli sebanyak jumlah yang dipilih
else
{
    $_SESSION['keranjang'][$id_produk] = $jumlah;
}

// larikan ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>
