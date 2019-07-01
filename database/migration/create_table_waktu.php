<?php

  class create_table_waktu
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
          echo "<br>Gagal Membuat Table Waktu<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Waktu";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`waktu`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Waktu<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Waktu<br>";
          }
      }

  }


?>
