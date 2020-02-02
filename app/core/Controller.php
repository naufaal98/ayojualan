<?php

class Controller
{
	public function view($view,$data=[])
	{
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		if (isset($_SESSION['user_id'])) {
			$data['user_session'] = $this->model('UserModel')->getDetailUser($_SESSION['user_id']);
		}
		require_once '../app/views/' . $view.'.php';
	}

	public function model($model)
	{
		require_once '../app/models/'. $model.'.php';
		return new $model;
	}
}