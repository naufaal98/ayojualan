<?php

class KategoriModel {
	private $table = 'kategori';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
  }

  public function getAllKategori()
  {
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->resultSet();
  }

  public function getDetailKategori($id_kategori)
	{
		$this->db->query("SELECT * FROM $this->table where id=:id_kategori");
    $this->db->bind('id_kategori', $id_kategori);
    return $this->db->single();
	}

}