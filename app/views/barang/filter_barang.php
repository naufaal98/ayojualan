<main>
	<div class="container">
		<h3 class="main-title">Barang Di Dalam Kategori <?= $data['kategori_detail']['nama_kategori'] ?> </h3>
		<? if (count($data['barang']) < 1) : ?>
			<p> Belum ada barang yang di jual di kategori ini </p>
		<? else: ?>
			<div class="row">
				<? foreach($data['barang'] as $barang) : ?>
					<div class="col-md-3 card-barang">
						<a href="<?= BASE_URL . '/barang/detail/' . $barang['id'] ?>">
							<div class="card mb-4 shadow-sm">
								<img class="img-fluid" src="<?= BASE_URL . '/img/'. $barang['img_barang'] ?>">
								<div class="card-header">
									<?= $barang['nama_barang'] ?>
									<br>
									<span class="text-muted">Rp. <?= number_format($barang['harga_barang'],0,',','.') ?></span>
								</div>
								<div class="card-body">
									<p class="card-text"><?= $barang['deskripsi_barang'] ?></p>
								</div>
							</div>
						</a>
					</div>
				<? endforeach ?>
			</div>
		<? endif; ?>
	</div><!-- ./container -->
</main>