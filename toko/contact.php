<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toko-Alvin - Kontak Kami</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<?php include 'menu.php'; ?>

<!-- Konten -->
<section class="konten">
    <div class="container">
        <h1 class="text-center">Kontak Kami</h1>
        <div class="row">
            <div class="col-md-6">
                <h4>Informasi Kontak</h4>
                <p>
                    <strong>Alamat:</strong> Jl. Gotham City No. 123, Kota Belobog, Provinsi Rindu<br>
                    <strong>Telepon:</strong> +62 999 9999 9999<br>
                    <strong>Email:</strong> email@tokoalvin.com
                </p>
                <h4>Jam Operasional</h4>
                <p>
                    Senin - Jumat: 09.00 - 17.00 WIB<br>
                    Sabtu: 09.00 - 15.00 WIB<br>
                    Minggu: Tutup
                </p>
            </div>
            <div class="col-md-6">
                <h4>Formulir Kontak</h4>
                <form action="kirim_pesan.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
