<?php
  include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_sp_sp/controller/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_sp_sp/model/user.php';
  $user = new user($conn);

  if($_SESSION['status'] == 1){
    if($_SESSION['hak_akses'] == 3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/tb_pbd_sp/view/");
    }
  }else{
    array_push($_SESSION['pesan'],['eror','Anda Belum Login, Silakan Login Terlebih Dahulu']);
    header("location:/tb_pbd_sp/view/auth/login.php");
  }

  $aksi = null;
  $link = '/tb_pbd_sp/view/management/user';

  //validasi dan inisiasi
  if(isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];
  }

  if($aksi=='create'){
    $user->store($_POST['username'],$_POST['password'],$_POST['nama'],$_POST['hak_akses']);
  }

  elseif($aksi=='update'){
    $user->update($_POST['last_username'],$_POST['username'],$_POST['password'],$_POST['nama'],$_POST['hak_akses']);
  }

  elseif($aksi=='delete'){
    $user->delete($_POST['username']);
  }
?>
