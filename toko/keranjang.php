<?php
session_start();

include 'koneksi.php'; 

// jika tidak ada sesi di keranjang maka akan dialihkan ke produk
if(empty($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong, Silahkan belanja');</script>";
	echo "<script>location = 'produk.php';</script>"; 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

	<?php include 'menu.php'; ?>
	
	<section class="kontent">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<!-- looping untuk isi tabel -->
					<?php 
					$nomor=1; 
					// setiap produk id berjumlah dengan jumlah yang ditetapkan
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):

					// Perkalian untuk barang yang masuk ke keranjang
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah ["harga_p"]*$jumlah;
					?>
							
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["nama_p"]; ?></td>
						<td><?php echo number_format($pecah["harga_p"]);?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>

					</tr>

					<?php 
					$nomor++; 
					endforeach 
					?>
				</tbody>
			</table>

			<a href="produk.php" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>	
		</div> 
		 
	</section>
<!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

