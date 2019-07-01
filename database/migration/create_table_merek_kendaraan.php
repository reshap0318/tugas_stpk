<?php

  class create_table_merek_kendaraan
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
          echo "<br>Gagal Membuat Table Merek Kendaraan<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Merek Kendaraan";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`merek_kendaraan`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Merek Kendaraan<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Merek Kendaraan<br>";
          }
      }

  }


?>
