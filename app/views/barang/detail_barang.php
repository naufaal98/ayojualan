<main>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card my-4">
          <div class="card-body">
            <h3 class="mb-2"><?= $data['barang']['nama_barang']?></h3>
            <p class="text-muted"> Dipasang pada <?= date_format(date_create($data['barang']['created_at']), 'd F Y') ?></p>
            <hr>
            <img class="img-fluid rounded" src="<?= BASE_URL . '/img/' . $data['barang']['img_barang'] ?>">
            <hr>
            <p><?= $data['barang']['deskripsi_barang'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card my-4">
          <div class="card-body">
            <h3>Rp. <?= number_format($data['barang']['harga_barang'],0,',','.') ?></h3>
          </div>
        </div>
        <div class="card my-4">
          <h6 class="card-header">Deskripsi Penjual</h6>
          <div class="card-body">
            <h5><?= $data['user']['nama_lengkap'] ?></h5>
            <p class="text-muted">No HP/WA : <br> <?= $data['user']['no_hp'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>