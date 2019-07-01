<?php

  class create_table_kendaraan
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
          echo "<br>Gagal Membuat Table Kendaraan<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Kendaraan";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`kendaraan`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Kendaraan<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Kendaraan<br>";
          }
      }

  }


?>
