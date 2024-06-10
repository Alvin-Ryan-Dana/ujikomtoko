<?php 
session_start();
//koneksi ke database
include 'koneksi.php'; 

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko-Alvin</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <div id="wrapper">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    Toko-Alvin
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger text-white" href="index.php?halaman=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Sidebar -->
        <div class="d-flex">
            <nav class="navbar bg-dark sidebar flex-column">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-column mt-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=produk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=pembelian">Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=pelanggan">Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?halaman=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Main Content -->
            <div id="page-wrapper" class="p-4">
                <div id="page-inner" class="mt-5 pt-4">
                    <?php 
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman'] == "produk") {
                            include 'produk.php';
                        } elseif ($_GET['halaman'] == "pembelian") {
                            include 'pembelian.php';
                        } elseif ($_GET['halaman'] == "pelanggan") {
                            include 'pelanggan.php';
                        } elseif ($_GET['halaman'] == "Logout") {
                            include 'Logout.php';
                        } elseif ($_GET['halaman'] == "detail") {
                            include 'detail.php';
                        } elseif ($_GET['halaman'] == "tambahproduk") {
                            include 'tambahproduk.php';
                        } elseif ($_GET['halaman'] == "hapusproduk") {
                            include 'hapusproduk.php';
                        } elseif ($_GET['halaman'] == "ubahproduk") {
                            include 'ubahproduk.php';
                        } elseif ($_GET['halaman'] == "logout") {
                            include 'logout.php';
                        } elseif ($_GET['halaman'] == "hapuspelanggan") {
                            include 'hapuspelanggan.php';
                        }
                    } else {
                        include 'home.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
