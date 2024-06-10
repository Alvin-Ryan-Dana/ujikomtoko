<?php
include 'koneksi.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Simpan data ke database
    $koneksi->query("INSERT INTO pesan_contact (nama, email, subjek, pesan) VALUES ('$name', '$email', '$subject', '$message')");

    echo "<script>alert('Pesan berhasil dikirim');</script>";
    echo "<script>location = 'contact.php';</script>";
}
?>
