<?php

  class create_table_lokasi_mobil
  {

      private $koneksi;

      function __construct($conn){
        $this->koneksi = $conn;
        $this->drop();
        $this->create();
      }

      function create()
      {
        $sql = "";
        if(!mysqli_query($this->koneksi,$sql)){
          echo "<br>Gagal Membuat Table Lokasi Mobil<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Lokasi Mobil";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`lokasi_mobil`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Lokasi Mobil<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Lokasi Mobil<br>";
          }
      }

  }


?>
