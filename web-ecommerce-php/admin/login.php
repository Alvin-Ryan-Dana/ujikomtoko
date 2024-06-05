<?php
    session_start();
    //Skrip Koneksi
    include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passion.cloth</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>TOKO-ALVIN: Login</h2>
                        <p>(Silahkan Login)</p>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="user" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="pass" required>
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <a href="#" class="float-end">Forget password?</a>
                            </div> -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST['login'])) {
                                $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password ='$_POST[pass]'");
                                $yangcocok = $ambil->num_rows;
                                if ($yangcocok == 1) {
                                    $_SESSION['admin'] = $ambil->fetch_assoc();
                                    echo "<div class='alert alert-success mt-3'>Login Sukses</div>";
                                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                } else {
                                    echo "<div class='alert alert-danger mt-3'>Login Gagal</div>";
                                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                }
                            }
                        ?>
                        <hr>
                        <!-- <p class="text-center">Not registered? <a href="registration.php">Click here</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
