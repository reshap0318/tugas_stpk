<?php

  class create_table_jenis_kendaraan
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
          echo "<br>Gagal Membuat Table Jenis Kendaraan<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Jenis Kendaraan";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`jenis_kendaraan`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Jenis Kendaraan<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Jenis Kendaraan<br>";
          }
      }

  }


?>
