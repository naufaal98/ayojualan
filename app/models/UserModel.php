<?php

class UserModel {
	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkUsername ($username)
	{
		$query = "SELECT * FROM $this->table WHERE username=:username";
		$this->db->query($query);
		$this->db->bind('username', $username);
		$this->db->execute();
		if($this->db->resultSet()) return true;
	}

	public function checkEmail ($email)
	{
		$query = "SELECT * FROM $this->table WHERE email=:email";
		$this->db->query($query);
		$this->db->bind('email', $email);
		$this->db->execute();
		if($this->db->resultSet()) return true;
	}

	public function checkLogin ($username, $password)
	{
		$query = "SELECT * FROM $this->table WHERE username=:username && password=:password";
		$this->db->query($query);
		$this->db->bind('username', $username);
		$this->db->bind('password', md5($password));
		$this->db->execute();
		if($this->db->resultSet()) return $this->db->single();
	}

	public function addUser($data) 
	{
		$query = "INSERT INTO $this->table 
			VALUES(
				NULL, 
				:username, 
				:password,
				:nama_lengkap, 
				:email,
				:no_hp
		)";

		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', md5($data['password']));
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function getDetailUser($id_user)
	{
		$query = "SELECT * FROM $this->table WHERE id=:id_user";
		$this->db->query($query);
		$this->db->bind('id_user', $id_user);
		return $this->db->single();
	}

	public function updateUser($data) 
	{
		if ($data['password'] === NULL) {
			$query = "UPDATE $this->table SET 
				username=:username,
				nama_lengkap=:nama_lengkap,
				email=:email,
				no_hp=:no_hp
				WHERE id=:user_id
			";
			$this->db->query($query);
		} else {
			$query = "UPDATE $this->table SET 
				username=:username,
				nama_lengkap=:nama_lengkap,
				password=:password,
				email=:email,
				no_hp=:no_hp
				WHERE id=:user_id
			";
			$this->db->query($query);
			$this->db->bind('password', md5($data['password']));
		}

		$this->db->bind('username', $data['username']);
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->bind('user_id', $data['user_id']);
		$this->db->execute();
		return $this->db->rowCount();
	}
}
