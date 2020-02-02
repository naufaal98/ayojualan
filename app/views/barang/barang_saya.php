<main>
	<div class="container">
		<?php Flasher::flash(); ?>
		<h3 class="main-title">Barang Saya </h2>
		<? if (count($data['all_barang']) < 1) : ?>
			<p> Belum ada barang yang anda jual </p>
		<? else: ?>
			<div class="row">
				<? foreach($data['all_barang'] as $barang) : ?>
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
									<a href="<?= BASE_URL . '/barang/detail/' . $barang['id'] ?>" class="btn btn-sm mt-2 mr-1 btn-outline-secondary">View</a>
									<a href="<?= BASE_URL . '/barang/edit/' . $barang['id'] ?>" class="btn btn-sm mt-2 btn-outline-secondary">Edit</a>
									<? if ($barang['status'] !== 'Terjual') : ?>
										<a href="<?= BASE_URL . '/barang/updatestatus/' . $barang['id'] ?>" class="btn btn-sm btn-primary btn-block active mt-2" role="button">Ubah Status Barang Menjadi Terjual</a>
									<? else : ?>
										<a href="<?= BASE_URL . '/barang/updatestatus/' . $barang['id'] ?>" class="btn btn-sm btn-secondary btn-block active mt-2" role="button">Ubah Status Barang Menjadi Belum Terjual</a>
									<? endif; ?>
								</div>
							</div>
						</a>
					</div>
				<? endforeach ?>
			</div>
		<? endif; ?>
	</div><!-- ./container -->
</main>