<?php
    $koneksi->query("DELETE FROM customer WHERE id_customer='$_GET[id]'");
    echo "<script>alert('Berhasil menghapus data');</script>";
    echo "<script>location='index.php?halaman=pelanggan';</script>";
