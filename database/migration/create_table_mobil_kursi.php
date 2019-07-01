<?php

  class create_table_mobil_kursi
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
          echo "<br>Gagal Membuat Table Kursi Mobil<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Kursi Mobil";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`mobil_kursi`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Kursi Mobil<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Kursi Mobil<br>";
          }
      }

  }


?>
