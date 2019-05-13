<?php

  include $_SERVER['DOCUMENT_ROOT'].'/tugas/controller/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/tugas/database/migration/create_table_user.php';

  $user = new create_table_user($conn);
  // $user->create();
?>
