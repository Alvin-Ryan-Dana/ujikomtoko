<?php $koneksi= new mysqli("localhost","root","","toko");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>