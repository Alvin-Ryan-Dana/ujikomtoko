<?php 
    include 'koneksi.php';  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- mt untuk spacing -->
                <div class="card mt-5">
                    <!-- notepad -->
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal">
                            <div>
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div>
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div>
                                <label for="telepon" class="form-label">Telp/Hp</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="daftar">Daftar</button>
                        </form>

                        <?php
                        if (isset($_POST["daftar"])) {
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];
                            
                            // notepad
                            $ambil = $koneksi->query("SELECT * FROM customer WHERE email_c='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok == 1) {
                                echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
                                echo "<script>location = 'daftar.php';</script>";
                            } else {
                                $koneksi->query("INSERT INTO customer (email_c, password_c, nama_c, telepon_c, alamat_c) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");
                                echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
                                echo "<script>location = 'login.php';</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
