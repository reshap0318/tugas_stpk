<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';

  if($kode != 'stpk2019'){
    header('location:/tugas/view/tugas/stpk');
  }

?>
<?php startblock('title') ?> Tugas 1 <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas</a>
<li class="breadcrumb-item"><a href="/tugas/view/tugas/stpk">STPK</a>
<li class="breadcrumb-item"><a href="#!">1</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas 1
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
          <th class="text-center"></th>
          <th class="text-center">1</th>
          <th class="text-center">1/2</th>
          <th class="text-center">1/3</th>
          <th class="text-center">1/4</th>
          <th class="text-center">1/5</th>
        </tr>
        <tr>
          <th class="text-center">1</th>
          <td class="text-center">1</td>
          <td class="text-center">1/2</td>
          <td class="text-center">1/3</td>
          <td class="text-center">1/4</td>
          <td class="text-center">1/5</td>
        </tr>
        <tr>
          <th class="text-center">2</th>
          <td class="text-center">2</td>
          <td class="text-center">1</td>
          <td class="text-center">2/3</td>
          <td class="text-center">2/4</td>
          <td class="text-center">2/5</td>
        </tr>
        <tr>
          <th class="text-center">3</th>
          <td class="text-center">3</td>
          <td class="text-center">3/2</td>
          <td class="text-center">1</td>
          <td class="text-center">3/4</td>
          <td class="text-center">3/5</td>
        </tr>
        <tr>
          <th class="text-center">4</th>
          <td class="text-center">4</td>
          <td class="text-center">4/2</td>
          <td class="text-center">4/3</td>
          <td class="text-center">1</td>
          <td class="text-center">4/5</td>
        </tr>
        <tr>
          <th class="text-center">5</th>
          <td class="text-center">5</td>
          <td class="text-center">5/2</td>
          <td class="text-center">5/3</td>
          <td class="text-center">5/4</td>
          <td class="text-center">1</td>
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
    <form class="col-md-12" action="/tugas/view/tugas/stpk/1/index.php" method="get">
      <div class="row">
        <div class="form-group row col-sm-5 text-right">
          <label class="col-sm-4 col-form-label">X</label>
          <div class="col-sm-8">
              <input type="number" class="form-control" value="" name="x" placeholder="Ex : 1" min="1">
          </div>
        </div>
        <div class="form-group row col-sm-5 text-right">
          <label class="col-sm-4 col-form-label">Y</label>
          <div class="col-sm-8">
              <input type="number" class="form-control" value="" name="y" placeholder="Ex : 1" min="1">
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
      <form class="" action="/tugas/view/tugas/stpk/1/index.php" method="get">
          <?php
            if($x>0 && $y>0){
              for ($i=1; $i < $y+1; $i++) {
                echo 'Baris '. $i .' Mulai<br><br><div class="row">';
                for ($j=1; $j < $x+1 ; $j++) {
                  if($j==1){
                    echo '<div class="form-group row col-sm-3 text-right">
                      <label class="col-sm-4 col-form-label">'.$i.'.'.$j.'</label>
                      <div class="col-sm-8">
                          <input type="number" class="form-control" value="" name="z['.$i.']['.$j.']" placeholder="Ex : 1" min="1" required>
                      </div>
                    </div>';
                  }else{
                    echo '<div class="form-group row col-sm-3 text-right">
                      <label class="col-sm-4 col-form-label">'.$i.'.'.$j.'</label>
                      <div class="col-sm-8">
                          <input type="number" class="form-control" value="" name="z['.$i.']['.$j.']" placeholder="Ex : 1" min="1">
                      </div>
                    </div>';
                  }
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
            <?php if($s==1){ ?>
                <td class="text-center"><?php
                if($z[$i+1][1] != null){
                  echo (float)$z[$s][1]/$z[$p][1];
                }else{
                  // echo '['.$s.'.'.$p.']<br>';
                  echo (float)$z[$s][1]/$z[$p][1];
                } ?></td>
            <?php }else{ ?>
                <td class="text-center"><?php
                if($z[$i+1][1] != null){
                  echo (float)$z[$s][1]/$z[$p][1];
                }else{
                  // echo '['.$s.'.'.$p.']<br>';
                  echo (float)$z[$s][1]/$z[$p][1];
                } ?></td>
            <?php } ?>
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
