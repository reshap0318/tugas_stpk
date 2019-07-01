<?php

  class create_table_user
  {

      private $koneksi;

      function __construct($conn){
        $this->koneksi = $conn;
        $this->drop();
        $this->create();
      }

      function create()
      {
        $sql = "CREATE TABLE `users` (`username` varchar(10) NOT NULL PRIMARY KEY,`nama` varchar(25) NOT NULL,`password` varchar(191) NOT NULL,`hak_akses` int(2) NOT NULL);";
        if(!mysqli_query($this->koneksi,$sql)){
          echo "<br>Gagal Membuat Table User<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table User";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`users`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table User<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table User<br>";
          }
      }

  }


?>
