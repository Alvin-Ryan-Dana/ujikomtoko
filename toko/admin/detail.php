<h2>Detail Pembelian</h2>
    <?php 
        $ambil = $koneksi->query("SELECT * FROM hist 
        JOIN customer ON hist.id_customer = customer.id_customer
        JOIN harga_ongkir ON hist.id_ongkir = harga_ongkir.id_ongkir 
        WHERE hist.id_hist = '$_GET[id]'");
        $detail = $ambil->fetch_assoc();
    ?>

    <strong><?php echo $detail['nama_c']; ?></strong> <br>
    <p>
        <?php echo $detail['telepon_c']; ?> <br>
        <?php echo $detail['email_c']; ?> 
    </p>

    <p>
        Tanggal: <?php echo $detail['tanggal']; ?> <br>
        Total: Rp. <?php echo number_format($detail['total']); ?> <br>
        Kota: <?php echo $detail['kota']; ?> <br>
        Tarif: Rp. <?php echo number_format($detail['tarif']); ?> <br>
        Alamat Pengiriman: <?php echo $detail['alamat_kirim']; ?> <br>
        Metode Pembayaran: <?php echo $detail['metode_pembayaran']; ?>
    </p>

<table class="table table-bordered">
    <thead> 
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $nomor = 1;
        $ambil = $koneksi->query("SELECT * FROM hist_produk
        JOIN produk ON hist_produk.id_produk = produk.id_produk 
        WHERE hist_produk.id_hist = '$_GET[id]'"); 
        while ($pecah = $ambil->fetch_assoc()) { 
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_p']; ?></td>
            <td><?php echo $pecah['harga_p']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td><?php echo $pecah['harga'] * $pecah['jumlah']; ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
