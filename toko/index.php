<?php
session_start();
// Koneksi ke database
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>toko-alvin</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'menu.php'; ?>

    <!-- Big Banner -->
    <div class="container-fluid bg-dark text-white py-5 text-center">
        <h1>Toko-<span class='text-danger'>Alvin</span></h1>
        <p class="lead">Selamat datang di toko ku. Silahkan pilih barang yang kamu suka</p>
        <div class="btn-group">
            <a href="login.php" class="btn btn-primary btn-login">Sign in</a>
            <a href="daftar.php" class="btn btn-secondary btn-login">Sign up</a>
        </div>
    </div>
    <!-- End Big Banner -->

    <!-- Features -->
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="Image/donation%20(1).jpg" class="card-img-top" alt="Daftar">
                    <div class="card-body">
                        <h5 class="card-title">Daftar</h5>
                        <p class="card-text">Daftar kan dirimu ke website</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Image/clothes-donation.jpg" class="card-img-top" alt="Cari">
                    <div class="card-body">
                        <h5 class="card-title">Cari</h5>
                        <p class="card-text">Cari barang yang ingin kamu beli</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Image/donation(2).png" class="card-img-top" alt="Transaksi">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi</h5>
                        <p class="card-text">transfer atau ditempat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
