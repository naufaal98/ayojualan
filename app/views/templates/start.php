<!DOCTYPE html>
<html>
<head>
	<title>AyoJualan</title>
	<link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
	<style>
		.form {
			width: 100%;
			max-width: 530px;
			padding: 15px;
			margin: auto;
		}
		.form .checkbox {
			font-weight: 400;
		}
		.form .form-control {
			position: relative;
			box-sizing: border-box;
			height: auto;
			padding: 10px;
			font-size: 16px;
		}
		.form .form-control:focus {
			z-index: 2;
		}
		.form input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
		.card-barang a {
			color: inherit;
		}
		.card-barang a:hover {
			text-decoration: none;
		}
		.main-title {
			margin-bottom: 30px;
		}
		main > .container,
		main > .form {
			margin-top: 30px;
		}
		.container {
			width: auto;
			padding: 0 15px;
		}
	</style>
</head>
<body>
	<header class="blog-header py-3 bg-light">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-2 pt-1">
					<a class="navbar-brand" href="<?= BASE_URL ?>">AyoJualan</a>
				</div>
				<div class="col-md-5 text-center">
					<form class="form-inline mt-5 mt-md-0" method="POST" action="<?=BASE_URL?>/barang/cari">
						<input type="text" name="keyword" placeholder="Temukan barang ..." class="form-control mr-sm-2">
						<button class="btn btn-outline-success my-2 mt-2 my-sm-0" type="submit">Cari Barang</button>
					</form>
				</div>
				<div class="col-md-5 d-flex justify-content-end align-items-left">
					<a class="btn btn-primary mr-2" href="<?= BASE_URL ?>/barang/jual">Jual Barang</a>
					<?php if(!isset($data['user'])) : ?>
						<a class="btn btn-outline-primary mr-2" href="<?= BASE_URL ?>/user/login">Log in</a>
					<?php else : ?>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $data['user']['username'] ?>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="<?= BASE_URL ?>/user/edit/<?= $data['user']['id'] ?>">Edit Profile</a>
								<a class="dropdown-item" href="<?= BASE_URL ?>/barang/barangsaya/<?= $data['user']['id'] ?>">Barang Saya</a>
								<a class="dropdown-item" href="<?= BASE_URL ?>/user/logout">Log out</a>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</header>

	<div class="bg-dark shadow-sm d-flex align-items-center justify-content-center">
			<nav class="nav nav-underline">
				<a class="nav-link text-white-50"><span>Kategori:</span></a>
				<?php foreach ($data['kategori'] as $kategori) : ?>
					<a class="nav-link text-light" href="<?= BASE_URL.'/barang/kategori/'.$kategori['id'] ?>"><?= $kategori['nama_kategori'] ?></a>
				<?php endforeach; ?>
			</nav>
	</div>