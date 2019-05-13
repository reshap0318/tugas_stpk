<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';

  if($kode != 'stpk2019'){
    header('location:/tugas/view/tugas/stpk');
  }

?>
<?php startblock('title') ?> Tugas 2 <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas</a>
<li class="breadcrumb-item"><a href="/tugas/view/tugas/stpk">STPK</a>
<li class="breadcrumb-item"><a href="#!">2</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas 2
<?php endblock() ?>

<?php startblock('content') ?>
<div class="card">
  <div class="card-header">
    <div class="text-center">
        Menampilkan Matriks dalam HTML
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <div class="text-center">
        Contoh Manual
    </div>
  </div>
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="tableuser" class="table table-striped table-bordered nowrap" style="width:100%">
        <tr>
          <th class="text-center" rowspan="2" style="background-color:green;color:white">Alternatif</th>
          <th class="text-center" colspan="5" style="background-color:green;color:white">Kriteria</th>
        </tr>
        <tr>
          <th class="text-center">C1</th>
          <th class="text-center">C2</th>
          <th class="text-center">C3</th>
          <th class="text-center">C4</th>
          <th class="text-center">C5</th>
        </tr>
        <tr>
          <th class="text-center">A1</th>
          <td class="text-center">150</td>
          <td class="text-center">15</td>
          <td class="text-center">2</td>
          <td class="text-center">2</td>
          <td class="text-center">3</td>
        </tr>
        <tr>
          <th class="text-center">A2</th>
          <td class="text-center">500</td>
          <td class="text-center">200</td>
          <td class="text-center">2</td>
          <td class="text-center">3</td>
          <td class="text-center">2</td>
        </tr>
        <tr>
          <th class="text-center">A3</th>
          <td class="text-center">200</td>
          <td class="text-center">10</td>
          <td class="text-center">3</td>
          <td class="text-center">1</td>
          <td class="text-center">3</td>
        </tr>
        <tr>
          <th class="text-center">A4</th>
          <td class="text-center">350</td>
          <td class="text-center">100</td>
          <td class="text-center">3</td>
          <td class="text-center">1</td>
          <td class="text-center">2</td>
        </tr>
      </table>
      <br>
    </div>
  </div>
</div>


<div class="card">
  <div class="card-header">
    <div class="text-center">
        Contoh Non Manual
    </div>
  </div>
  <div class="card-block">
    <form class="col-md-12" action="/tugas/view/tugas/stpk/2/index.php" method="get">
      <div class="row">
        <div class="form-group row col-sm-5 text-right">
          <label class="col-sm-4 col-form-label">X</label>
          <div class="col-sm-8">
              <input type="number" class="form-control" value="" name="x" placeholder="Ex : 2" min="1">
          </div>
        </div>
        <div class="form-group row col-sm-5 text-right">
          <label class="col-sm-4 col-form-label">Y</label>
          <div class="col-sm-8">
              <input type="number" class="form-control" value="" name="y" placeholder="Ex : 2" min="1">
          </div>
        </div>
        <div class="form-group row col-sm-12 text-center">
          <button type="submit" class="btn btn-success col-sm-12">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
  $x = 0;
  $y = 0;
  if(isset($_GET['x'])){
    $x = $_GET['x'];
  }
  if(isset($_GET['y'])){
    $y = $_GET['y'];
  }

  if($x>0 && $y>0){
?>

<div class="card">
  <div class="card-header">
    <div class="text-center">
        Contoh Non Manual (Hasil)
    </div>
  </div>
  <div class="card-block">
    <div class="col-md-12 text-center">
      <form class="" action="/tugas/view/tugas/stpk/2/index.php" method="get">
          <?php
            if($x>0 && $y>0){
              for ($i=1; $i < $y+1; $i++) {
                echo 'Baris '. $i .' Mulai<br><br><div class="row">';
                for ($j=1; $j < $x+1 ; $j++) {
                  echo '<div class="form-group row col-sm-3 text-right">
                    <label class="col-sm-4 col-form-label">'.$i.'.'.$j.'</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" value="" name="z['.$i.']['.$j.']" placeholder="Ex : 2" min="1" required>
                    </div>
                  </div>';
                }
                echo '</div>';
              }
            }
          ?>
        <div class="row">
          <div class="form-group row col-sm-12 text-center">
            <button type="submit" class="btn btn-success col-sm-12">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php } ?>

<?php
  if(isset($_GET['z'])){
    $z = $_GET['z'];
?>
<div class="card">
  <div class="card-header">
    <div class="text-center">
      Contoh Non Manual (Hasil-Hasil)
    </div>
  </div>
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="tableuser" class="table table-striped table-bordered nowrap" style="width:100%">
        <?php
          for ($i=0; $i < count($z); $i++) {
            echo "<tr>";
            for ($j=0; $j < count($z[$i+1]) ; $j++) {
              $s = $i+1;
              $p = $j+1;
        ?>
              <td class="text-center"><?php
                echo $z[$s][$p];
              ?></td>
        <?php
            }
            echo "</tr>";
          }
        ?>
      </table>
      <br>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <div class="text-center">
      Contoh Non Manual count.. (Hasil-Hasil)
    </div>
  </div>
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="tableuser" class="table table-striped table-bordered nowrap" style="width:100%">
        <?php
          for ($i=0; $i < count($z); $i++) {
            echo "<tr>";
            for ($j=0; $j < count($z[$i+1]) ; $j++) {
              $s = $i+1;
              $p = $j+1;
        ?>
              <td class="text-center"><?php
                echo $z[$s][$p];
              ?></td>
        <?php
            }
            echo "</tr>";
          }
        ?>
      </table>
      <br>
    </div>
  </div>
</div>
<?php } ?>
<?php endblock() ?>
