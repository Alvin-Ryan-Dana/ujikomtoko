<h2>Data pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama</th>
			<th>email</th>
			<th>telepon</th>
			<th>Aksi</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
			$nomor=1;
			$ambil=$koneksi->query("SELECT * FROM customer");
			while ($pecah = $ambil->fetch_assoc()){ 
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_c']; ?></td>
			<td><?php echo $pecah['email_c']; ?></td>
			<td><?php echo $pecah['telepon_c']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_customer']; ?>" class="btn btn-danger">hapus </a>
				
			</td>
		</tr>
		<?php 
			$nomor++;
			} 
		?>
	</tbody>
</table>