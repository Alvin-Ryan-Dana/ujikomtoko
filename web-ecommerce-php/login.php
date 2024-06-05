<?php
    session_start();
    include 'koneksi.php';  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Pelanggan</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Login Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $ambil = $koneksi->query("SELECT * FROM customer WHERE email_c='$email' AND password_c='$password'");

        $akunyangcocok = $ambil->num_rows;

        if ($akunyangcocok == 1) {
            $akun = $ambil->fetch_assoc();
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert(' Anda sukses login');</script>";
            echo "<script>location = 'index.php';</script>";
        } else {
            echo "<script>alert('Anda gagal login, Periksa akun Anda');</script>";
            echo "<script>location = 'login.php';</script>";
        }
    }
    ?>

    <!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
