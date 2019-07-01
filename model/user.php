<?php

  class user{

    private $koneksi;

    function __construct($conn){
      $this->koneksi = $conn;
  	}

    function data($username=''){

      $sql = "select * from users";
      if($username!=''){
        $sql = "select * from users where username = '$username'";
      }

      $data = mysqli_query($this->koneksi,$sql);

      return $data;
    }

    function store($username = null, $password = null, $nama = null, $hak_akses = null, $pesan = true){
        $password = md5($password);
        $sql = "insert into users(username, password, nama, hak_akses) values ('$username', '$password', '$nama', $hak_akses)";

        if($pesan){
          if(!mysqli_query($this->koneksi,$sql)){
            array_push($_SESSION['pesan'],['eror','Gagal Menambahkan User']);
            array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
          }else{
            array_push($_SESSION['pesan'],['berhasil','Berhasil Menambahkan User']);
          }
          header("location:/tb_pbd_sp/view/management/user");
        }else{
          if(mysqli_query($this->koneksi,$sql)){
            echo "<br>Berhasil Menambahkan Data User ".$nama;
          }else{
            echo "Gagal Menambahkan User";
          }
        }
    }

    function update($last_username,$username, $password = null, $nama = null, $hak_akses = null){

        $data = mysqli_fetch_assoc($this->data($last_username));

        $sql = "update users SET username='$username' ";

        if($nama != null){
            $sql .= ",nama='$nama' ";
        }

        if($password != null){
          $password = md5($password);
          $sql .= ",password='$password' ";
        }

        if($hak_akses != null){
          $sql .= ",hak_akses=$hak_akses ";
        }

        $username = $data['username'];
        $sql .= " WHERE username = '$last_username'";
        if($username==''){
          array_push($_SESSION['pesan'],['eror','Data User Tidak Ditemukan']);
        }
        if(!mysqli_query($this->koneksi,$sql)){
          array_push($_SESSION['pesan'],['eror','Gagal Merubah User']);
          array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
        }else{
          array_push($_SESSION['pesan'],['berhasil','Berhasil Merubah User']);
        }
        header("location:/tb_pbd_sp/view/management/user");
    }

    function delete($username = '')
    {
        $data = mysqli_fetch_assoc($this->data($username));
        if($data != null){
            $sql = "delete FROM `users` WHERE username = '$username'";
            if(!mysqli_query($this->koneksi,$sql)){
              array_push($_SESSION['pesan'],['eror','Gagal Menghapus User']);
              array_push($_SESSION['pesan'],['eror',mysqli_error($this->koneksi)]);
            }else{
              array_push($_SESSION['pesan'],['berhasil','Berhasil Menghapus User']);
            }
        }else{
            array_push($_SESSION['pesan'],['eror','username tidak ditemukan']);
        }
        header("location:/tb_pbd_sp/view/management/user");
    }

    function empty()
    {
      $sql = "TRUNCATE `users`";
      if(mysqli_query($this->koneksi,$sql)){
        echo "berhasil Membersihkan data<br>";
      }else{
        echo "Gagal Membersihkan data<br>".mysqli_error($this->koneksi)."<br>";
      }
    }
  }

?>
