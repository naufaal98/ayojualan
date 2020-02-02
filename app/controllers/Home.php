<?php

class Home extends Controller
{
	public function index()
	{
		$data['all_barang'] = $this->model('BarangModel')->getAllBarang();
		$this->view('templates/start');
		$this->view('home/index',$data);
		$this->view('templates/end');
	}
}