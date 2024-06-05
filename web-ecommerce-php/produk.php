<?php
session_start();
// Koneksi ke database
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List-Barang</title>
    <!-- Tambahkan Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tautkan CSS kustom -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<?php include 'menu.php'; ?>

<!-- Konten -->
<section class="konten">
    <div class="container">
        <h1>Daftar Produk</h1>
        <div class="row">

            <?php 
            $ambil = $koneksi->query("SELECT * FROM produk"); 
            while($perproduk = $ambil->fetch_assoc()){ 
            ?>

            <div class="col-md-3">
                <div class="card">
                  <!-- card bootsrap https://getbootstrap.com/docs/5.0/components/card/ -->
                    <img src="foto_produk/<?php echo $perproduk['foto_p'];?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $perproduk['nama_p'];?></h5>
                        <p class="card-text">Rp. <?php echo number_format($perproduk['harga_p']);?></p>
                        <button class="btn btn-primary" onclick="showModal(<?php echo $perproduk['id_produk'];?>)">Beli</button>
                        <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-secondary">Detail</a>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>

<!-- Modal -->
<!-- bootsrap modal https://getbootstrap.com/docs/5.0/components/modal/ -->
<div class="modal fade" id="beliModal" tabindex="-1" aria-labelledby="beliModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="beliModalLabel">Konfirmasi Pembelian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="beli.php" method="get">
        <div class="modal-body">
          <input type="hidden" name="id" id="modal-id-produk">
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="modal-jumlah" name="jumlah" min="1" value="1" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Beli</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tambahkan Bootstrap 5 JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
function showModal(id) {
    document.getElementById('modal-id-produk').value = id;
    var myModal = new bootstrap.Modal(document.getElementById('beliModal'), {
        keyboard: false
    });
    myModal.show();
}
</script>
</body>
</html>
