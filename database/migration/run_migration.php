<?php

  include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_sp/controller/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_sp/database/migration/create_table_user.php';

  $user = new create_table_user($conn);
  // $user->create();
?>
