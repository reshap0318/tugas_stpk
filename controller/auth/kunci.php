<?php

    session_start();
    $kode = $_SESSION['kode'];
    $akun = "";
    if(isset($_POST['kode'])){
      $kode = $_POST['kode'];
    }

    if(isset($_POST['akun'])){
      $_SESSION['akun'] = $_POST['akun'];
      $akun = $_POST['akun'];
    }

    if($kode=='stpk2019' && $akun=='stpk'){
      $_SESSION['kode'] = $_POST['kode'];
      header('location:/tugas/view/tugas/stpk');
    }elseif($kode=='gv2019' && $akun=='gv'){
      $_SESSION['kode'] = $_POST['kode'];
      header('location:/tugas/view/tb/gv');
    }else{
      array_push($_SESSION['pesan'],['eror','Kode yang Anda Masukan Salah']);
      header('location:/tugas/view/');
    }

?>
