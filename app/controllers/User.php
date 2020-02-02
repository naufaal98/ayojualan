<?php

class User extends Controller
{
	public function index()
	{
		header('Location:'.BASE_URL.'/');
  }

  public function login()
  {
    if (!$this->checkSessionLogin()) {
      $this->view('templates/start');
      $this->view('user/login');
      $this->view('templates/end');
    } else {
      header('Location:'.BASE_URL.'/');
    }
  }

  public function postLogin()
  {
    $checkLogin = $this->model('UserModel')->checkLogin($_POST['username'], $_POST['password']);
    if (!$checkLogin) {
      Flasher::setFlash("Username atau password salah", 'danger');
      header('Location:'.BASE_URL.'/user/login');
      exit();
    } else {
      $_SESSION['user_id'] = $checkLogin['id'];
      header('Location:'.BASE_URL.'/');
    }
  }

  public function signup()
  {
    $this->view('templates/start');
    $this->view('user/signup');
    $this->view('templates/end');
  }

  public function postSignup()
  {
    // Cek apakah username sudah digunakan
    if($this->model('UserModel')->checkUsername($_POST['username'])) {
      Flasher::setFlash("Username <strong>".$_POST['username']."</strong> sudah digunakan", 'danger');
      header('Location:'.BASE_URL.'/user/signup');
      exit();
    }

    // Cek apakah email sudah digunakan
    if ($this->model('UserModel')->checkEmail($_POST['email'])) {
      Flasher::setFlash("Email <strong>".$_POST['email']."</strong> sudah digunakan", 'danger');
      header('Location:'.BASE_URL.'/user/signup');
      exit();
    }

    // Store data
    if($this->model('UserModel')->addUser($_POST)>0) {
      header('Location:'.BASE_URL.'/');
      exit;
    } else {
      Flasher::setFlash('Gagal melakukan sign up', 'danger');
      header('Location:'.BASE_URL.'/user/signup');
      exit;
    }
  }

  public function edit ($id_user) 
  {
    $data['user'] = $this->model('UserModel')->getDetailUser($id_user);
    $this->view('templates/start');
    $this->view('user/edit_user', $data);
    $this->view('templates/end');
  }

  public function postUpdate() 
  {
    $user_id = $_POST['user_id'];
    $session_user_id = $_SESSION['user_id'];
    if (!isset($session_user_id) || $session_user_id !== $user_id) {
      header('Location:'.BASE_URL.'/user/login');
    }

    if ($this->model('UserModel')->updateUser($_POST) > 0) {
      Flasher::setFlash('Berhasil mengupdate profile', 'success');
      header('Location:'.BASE_URL.'/user/edit/'.$user_id);
    } else {
      Flasher::setFlash('Gagal mengupdate profile', 'danger');
      header('Location:'.BASE_URL.'/user/edit/'.$user_id);
    }
  }

  public function checkSessionLogin () 
  {
    return isset($_SESSION['user_id']);
  }

  public function logout () {
    session_destroy();
    header('Location:'.BASE_URL.'/');
  }
}