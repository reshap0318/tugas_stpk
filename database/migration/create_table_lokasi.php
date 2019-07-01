<?php

  class create_table_lokasi
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
          echo "<br>Gagal Membuat Table Lokasi<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Lokasi";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`lokasi`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Lokasi<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Lokasi<br>";
          }
      }

  }


?>
