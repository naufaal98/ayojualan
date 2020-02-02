<main>
  <form class="form" method="post" action="<?=BASE_URL;?>/barang/postBarang" enctype="multipart/form-data">
    <?php Flasher::flash(); ?>
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-center font-weight-normal"> Jual Barang</h1>
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama barang" required>
    </div>
    <div class="form-group">
      <label for="deskripsi_barang">Deskripsi Barang</label>
      <textarea name="deskripsi_barang" class="form-control" id="deskripsi_barang" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="img_barang">Foto/Gambar Barang</label>
      <input class="form-control" type="file" name="img_barang" id="img_barang">
    </div>
    <div class="form-group">
      <label for="harga_barang">Harga</label>
      <input type="text" name="harga_barang" class="form-control" id="harga_barang" placeholder="Harga barang" required>
    </div>
    <div class="form-group">
      <label for="kategori">Kategori</label>
      <select class="form-control" name="id_kategori" id="kategori">
        <? foreach($data['kategori'] as $kategori): ?>
          <option value="<? echo $kategori['id'] ?>">
            <? echo $kategori['nama_kategori'] ?>
          </option>
        <? endforeach; ?>
      </select>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Jual Barang</button>
  </form>
</main>
