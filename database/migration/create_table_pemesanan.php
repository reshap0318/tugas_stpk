<?php

  class create_table_pemesanan
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
          echo "<br>Gagal Membuat Table Pemesanan<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Pemesanan";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`pemesanan`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Pemesanan<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Pemesanan<br>";
          }
      }

  }


?>
