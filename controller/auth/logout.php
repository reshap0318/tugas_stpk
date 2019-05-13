<?php
  session_start();
  session_destroy();
  header('location:/tugas/view/auth/login.php');
?>
