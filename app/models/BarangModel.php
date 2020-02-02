<?php

class BarangModel {
	private $table = 'barang';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
  }

  public function getAllBarang()
  {
    $this->db->query("SELECT * FROM $this->table WHERE status='Belum Terjual' ORDER BY created_at DESC");
    return $this->db->resultSet();
  }

  public function getAllBarangSaya($id_user)
	{
    $this->db->query("SELECT * FROM $this->table where id_user=:id_user ORDER BY created_at DESC");
    $this->db->bind('id_user', $id_user);
    return $this->db->resultSet();
  }

  public function getDetailBarang($id_barang)
  {
    $this->db->query("SELECT * FROM $this->table where id=:id_barang");
    $this->db->bind('id_barang', $id_barang);
    return $this->db->single();
  }

  public function barangSaya ($user_id)
  {
    $session_user_id = $_SESSION['user_id'];
    if (!isset($session_user_id) || $session_user_id !== $user_id) {
      header('Location:'.BASE_URL.'/user/login');
    }

    $data['all_barang'] = $this->model('BarangModel')->getALlBarangSaya($user_id);

    $this->view('templates/start');
    $this->view('barang/barang_saya', $data);
    $this->view('templates/end');
  }

  public function addBarang($data, $img_name, $user_id)
	{
		$query = "INSERT INTO $this->table 
			VALUES(
				NULL,
        :created_at,
				:nama_barang, 
				:deskripsi_barang,
				:img_barang, 
				:harga_barang,
				:status,
        :id_kategori,
        :id_user
		)";

		$this->db->query($query);
		$this->db->bind('created_at', date("Y-m-d H:i:s"));
		$this->db->bind('nama_barang', $data['nama_barang']);
		$this->db->bind('deskripsi_barang', $data['deskripsi_barang']);
		$this->db->bind('img_barang', $img_name);
		$this->db->bind('harga_barang', $data['harga_barang']);
		$this->db->bind('status', 1);
		$this->db->bind('id_kategori', $data['id_kategori']);
		$this->db->bind('id_user', $user_id);
		$this->db->execute();
		return $this->db->rowCount();
  }

  public function updateBarang($data, $user_id, $img_name = NULL)
	{
    if ($img_name === NULL) {
      $query = "UPDATE $this->table SET 
        nama_barang=:nama_barang,
        deskripsi_barang=:deskripsi_barang,
        harga_barang=:harga_barang,
        id_kategori=:id_kategori
        WHERE id=:id_barang
      ";
      $this->db->query($query);
    } else {
      $query = "UPDATE $this->table SET 
        nama_barang=:nama_barang,
        deskripsi_barang=:deskripsi_barang,
        harga_barang=:harga_barang,
        img_barang=:img_barang,
        id_kategori=:id_kategori
        WHERE id=:id_barang
      ";
      $this->db->query($query);
      $this->db->bind('img_barang', $img_name);
    }

		$this->db->bind('nama_barang', $data['nama_barang']);
		$this->db->bind('deskripsi_barang', $data['deskripsi_barang']);
		$this->db->bind('harga_barang', $data['harga_barang']);
    $this->db->bind('id_kategori', $data['id_kategori']);
    $this->db->bind('id_barang', $data['id_barang']);
		$this->db->execute();
		return $this->db->rowCount();
  }

  public function updateStatus($id_barang, $status)
  {
    $query = "UPDATE $this->table SET status=:status WHERE id=:id_barang";
    $this->db->query($query);
    $this->db->bind('status', $status);
    $this->db->bind('id_barang', $id_barang);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function filterBarangByKategori($id_kategori)
  {
    $this->db->query("SELECT * 
      FROM $this->table 
      WHERE
      status='Belum Terjual' AND id_kategori=:id_kategori
      ORDER BY created_at DESC"
    );
    $this->db->bind('id_kategori', $id_kategori);
    return $this->db->resultSet();
  }

  public function cariBarang($keyword)
  {
    $this->db->query("SELECT *
      FROM $this->table
      WHERE
      nama_barang LIKE '%$keyword%'
      ORDER BY created_at DESC"
    );
    return $this->db->resultSet();
  }

}