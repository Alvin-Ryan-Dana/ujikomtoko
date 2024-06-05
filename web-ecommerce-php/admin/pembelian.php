<h2>Data pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Aksi</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
			$nomor=1;
			$ambil=$koneksi->query("SELECT * FROM hist JOIN customer ON hist.id_customer=customer.id_customer");
			while ($pecah = $ambil->fetch_assoc()){ 
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_c']; ?></td>
			<td><?php echo $pecah['tanggal']; ?></td>
			<td><?php echo $pecah['total']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_hist']; ?>" class="btn btn-info">Detail</a>
				
			</td>
		</tr>
		<?php 
			$nomor++;
			} 
		?>
	</tbody>
</table>