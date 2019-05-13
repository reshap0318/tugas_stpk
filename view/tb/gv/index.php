<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';
$akun = 'gv';
?>
<?php startblock('title') ?> Grafik Visualisasi <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas Besar</a>
<li class="breadcrumb-item"><a href="#!">Grafik Visualisasi</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas Besar Grafik Visualisasi
<?php endblock() ?>

<?php startblock('content') ?>
  <?php

    if($kode != 'gv2019'){
      include $_SERVER['DOCUMENT_ROOT'].'/tugas/view/auth/kunci.php';
    }else{
      include $_SERVER['DOCUMENT_ROOT'].'/tugas/view/tb/gv/table.php';
    }

  ?>
<?php endblock() ?>
