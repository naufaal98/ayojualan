<?php

class Barang extends Controller
{
	public function index()
	{
		header('Location:'.BASE_URL.'/');
  }
  
  public function jual()
  {
    if (!isset($_SESSION['user_id'])) {
      Flasher::setFlash('Silahkan login untuk menjual barang', 'danger');
      header('Location:'.BASE_URL.'/user/login');
    }
    $this->view('templates/start');
    $this->view('barang/jual_barang');
    $this->view('templates/end');
  }

  public function postBarang()
  {
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
      header('Location:'.BASE_URL.'/user/login');
    }

    // Ambil URL untuk di slice
    $root = dirname(__FILE__);
    $root = str_replace('\\', '/', $root);
    $root = explode("/", $root, -2);
    $target_dir = implode("/", $root) . "/public/img/";
    $target_file = $target_dir . basename($_FILES["img_barang"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $new_img_name = $this->generateRandomString(15) . '.' . $imageFileType;
    
    // Cek apakah gambarnya asli
    $check = getimagesize($_FILES["img_barang"]["tmp_name"]);
    if($check == false) {
      Flasher::setFlash('File yang anda gunakan bukan gambar', 'danger');
      header('Location:'.BASE_URL.'/barang/jual');
      exit();
    }

    // Cek ukuran file
    if ($_FILES["img_barang"]["size"] > 500000) {
      Flasher::setFlash('Ukuran gambar terlalu besar, gunakan gambar dibawah 5Mb', 'danger');
      header('Location:'.BASE_URL.'/barang/jual');
      exit();
    }

    // Cek format file
    if(
      $imageFileType != "jpg" && 
      $imageFileType != "png" && 
      $imageFileType != "jpeg" && 
      $imageFileType != "gif" ) 
    {
      Flasher::setFlash('Format gambar yang diperbolehkan hanya jpg/jpeg, png, dan gif', 'danger');
      header('Location:'.BASE_URL.'/barang/jual');
      exit();
    }

    if (!move_uploaded_file($_FILES["img_barang"]["tmp_name"], $target_dir . $new_img_name)) {
        Flasher::setFlash('Sorry, there was an error uploading your file.', 'danger');
        exit();
    }

    // Store data
    if($this->model('BarangModel')->addBarang($_POST, $new_img_name, $user_id)>0) {
      header('Location:'.BASE_URL.'/');
      exit;
    } else {
      Flasher::setFlash('Gagal mengupload barang', 'danger');
      header('Location:'.BASE_URL.'/barang/jual');
      exit;
    }
  }

  public function generateRandomString($length = 10) 
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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

  public function detail ($id_barang)
  {
    $data['barang'] = $this->model('BarangModel')->getDetailBarang($id_barang);
    $data['user'] = $this->model('UserModel')->getDetailUser($data['barang']['id_user']);
    // print_r($data);
    // exit();
    $this->view('templates/start');
    $this->view('barang/detail_barang', $data);
    $this->view('templates/end');
  }

  public function edit ($id_barang)
  {
    if (!isset($_SESSION['user_id'])) {
      header('Location:'.BASE_URL.'/user/login');
    }
    $data['barang'] = $this->model('BarangModel')->getDetailBarang($id_barang);
    $this->view('templates/start');
    $this->view('barang/edit_barang', $data);
    $this->view('templates/end');
  }

  public function updateBarang ()
  {
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
      header('Location:'.BASE_URL.'/user/login');
    }

    // Cek apakah ada gambar baru yang di upload
    if (!$_FILES["img_barang"]["error"] == 4) {
      // Ambil URL untuk di slice
      $root = dirname(__FILE__);
      $root = str_replace('\\', '/', $root);
      $root = explode("/", $root, -2);
      $target_dir = implode("/", $root) . "/public/img/";
      $target_file = $target_dir . basename($_FILES["img_barang"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $new_img_name = $this->generateRandomString(15) . '.' . $imageFileType;
      
      // Cek apakah gambarnya asli
      $check = getimagesize($_FILES["img_barang"]["tmp_name"]);
      if($check == false) {
        Flasher::setFlash('File yang anda gunakan bukan gambar', 'danger');
        header('Location:'.BASE_URL.'/barang/jual');
        exit();
      }

      // Cek ukuran file
      if ($_FILES["img_barang"]["size"] > 500000) {
        Flasher::setFlash('Ukuran gambar terlalu besar, gunakan gambar dibawah 5Mb', 'danger');
        header('Location:'.BASE_URL.'/barang/jual');
        exit();
      }

      // Cek format file
      if(
        $imageFileType != "jpg" && 
        $imageFileType != "png" && 
        $imageFileType != "jpeg" && 
        $imageFileType != "gif" ) 
      {
        Flasher::setFlash('Format gambar yang diperbolehkan hanya jpg/jpeg, png, dan gif', 'danger');
        header('Location:'.BASE_URL.'/barang/jual');
        exit();
      }

      if (!move_uploaded_file($_FILES["img_barang"]["tmp_name"], $target_dir . $new_img_name)) {
          Flasher::setFlash('Sorry, there was an error uploading your file.', 'danger');
          exit();
      }
    }

    $updateData = isset($new_img_name) ? 
      $this->model('BarangModel')->updateBarang($_POST, $user_id, $new_img_name)
      :
      $this->model('BarangModel')->updateBarang($_POST, $user_id);

    // Update data
    if($updateData>0) {
      Flasher::setFlash('Berhasil mengupdate barang', 'success');
      header('Location:'.BASE_URL.'/barang/barangsaya/' . $user_id);
      exit;
    } else {
      Flasher::setFlash('Gagal mengupdate barang', 'danger');
      header('Location:'.BASE_URL.'/barang/jual');
      exit;
    }
  }

  public function updateStatus ($id_barang)
  {
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
      header('Location:'.BASE_URL.'/user/login');
    }

    $data['barang'] = $this->model('BarangModel')->getDetailBarang($id_barang);

    // Cek apakah id_user yang mengupdate data sama dengan id_user di barang
    if ($user_id !== $data['barang']['id_user']) {
      header('Location:'.BASE_URL);
      exit();
    };

    // Cek status saat ini
    $status = $data['barang']['status'] === "Terjual" ? 1 : 2;

    if($this->model('BarangModel')->updateStatus($id_barang, $status) > 0) {
      Flasher::setFlash('Berhasil mengubah status barang', 'success');
      header('Location:'.BASE_URL.'/barang/barangsaya/' . $user_id);
      exit;
    }
  }

  public function kategori ($id_kategori)
  {
    $data['kategori_detail'] = $this->model('KategoriModel')->getDetailKategori($id_kategori);
    $data['barang'] = $this->model('BarangModel')->filterBarangByKategori($id_kategori);
    $this->view('templates/start');
    $this->view('barang/filter_barang', $data);
    $this->view('templates/end');
  }

  public function cari ()
  {
    $keyword = $_POST['keyword'];
    $data['keyword'] = $keyword;
    $data['barang'] = $this->model('BarangModel')->cariBarang($keyword);
    $this->view('templates/start');
    $this->view('barang/cari_barang', $data);
    $this->view('templates/end');
  }
}