<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';
$akun = 'stpk';
?>
<?php startblock('title') ?> STPK <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas</a>
<li class="breadcrumb-item"><a href="#!">STPK</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas STPK
<?php endblock() ?>

<?php startblock('content') ?>
  <?php

    if($kode != 'stpk2019'){
      include $_SERVER['DOCUMENT_ROOT'].'/tugas/view/auth/kunci.php';
    }else{
      include $_SERVER['DOCUMENT_ROOT'].'/tugas/view/tugas/stpk/table.php';
    }

  ?>
<?php endblock() ?>
