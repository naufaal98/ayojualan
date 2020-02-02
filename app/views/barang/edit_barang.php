<main>
  <form class="form" method="post" action="<?=BASE_URL?>/barang/updateBarang" enctype="multipart/form-data">
    <?php Flasher::flash(); ?>
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-center font-weight-normal"> Edit Barang</h1>
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" value="<?= $data['barang']['nama_barang'] ?>" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama barang" required>
    </div>
    <div class="form-group">
      <label for="deskripsi_barang">Deskripsi Barang</label>
      <textarea name="deskripsi_barang" class="form-control" id="deskripsi_barang" rows="3"><?= $data['barang']['nama_barang'] ?></textarea>
    </div>
    <div class="form-group">
      <label for="img_barang">Foto/Gambar Barang</label>
      <input class="form-control" type="file" name="img_barang" id="img_barang">
      <a href="<?= BASE_URL . '/img/' . $data['barang']['img_barang'] ?>" target="_blank">
        <?= $data['barang']['img_barang'] ?>
      </a>
    </div>
    <div class="form-group">
      <label for="harga_barang">Harga</label>
      <input type="text" value="<?= $data['barang']['harga_barang'] ?>" name="harga_barang" class="form-control" id="harga_barang" placeholder="Harga barang" required>
    </div>
    <div class="form-group">
      <label for="kategori">Kategori</label>
      <select class="form-control" name="id_kategori" id="kategori">
        <? foreach($data['kategori'] as $kategori): ?>
          <option value="<? echo $kategori['id'] ?>" <?= $kategori['id'] === $data['barang']['id_kategori'] ? "selected" : "" ?>>
            <? echo $kategori['nama_kategori'] ?>
          </option>
        <? endforeach; ?>
      </select>
    </div>
    <input type="hidden" name="id_barang" value="<?= $data['barang']['id'] ?>">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Update Barang</button>
  </form>
</main>
