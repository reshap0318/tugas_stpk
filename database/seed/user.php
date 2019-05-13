<?php

  class userSeeder
  {

    private $user = [
      ['1611522012','1611522012','Reinaldo Shandev Pratama',1],
      ['1611521006','1611522012','Annisa Aulia Khaira',1]
    ];

    function __construct()
    {
        include $_SERVER['DOCUMENT_ROOT'].'/tugas/controller/koneksi.php';
        include $_SERVER['DOCUMENT_ROOT'].'/tugas/model/user.php';
        $user = new user($conn);

        $user->empty();

        foreach ($this->user as $data) {
          $user->store($data[0],$data[1],$data[2],$data[3],false);
        }
    }

  }

?>
