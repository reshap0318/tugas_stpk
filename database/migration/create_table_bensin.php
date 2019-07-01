<?php

  class create_table_bensin
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
          echo "<br>Gagal Membuat Table Bensin<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Bensin";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`bensin`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Bensin<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Bensin<br>";
          }
      }

  }


?>
