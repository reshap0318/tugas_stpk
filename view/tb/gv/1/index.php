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

<?php startblock('css') ?>
<style>

  #body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    width: 960px;
    height: 500px;
    position: relative;
  }

  svg {
  	width: 100%;
  	height: 100%;
  }

  path.slice{
  	stroke-width:2px;
  }

  polyline{
  	opacity: .3;
  	stroke: black;
  	stroke-width: 2px;
  	fill: none;
  }

</style>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas Besar 1 Grafik Visualisasi
<?php endblock() ?>

<?php startblock('content') ?>
<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
<?php

  $host = "localhost";
  $user = "postgres";
  $pass = "root";
  $port = "5432";
  $dbname = "bi_gv_database";

  $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");

  $sql = 'select a.kota as nama_daerah, count(transaksi.*) as total from "user" a join transaksi on a.id = transaksi.user_id group by a.kota limit 3';

  $result = pg_query($sql);

  $datas = [];

  while ($data = pg_fetch_assoc($result)) {
      $datas[]=['label'=>$data['nama_daerah'],'value'=>$data['total']];
  }
?>

<div class="row">
  <!-- task, page, download counter  start -->
  <div class="col-xl-4 col-md-6">
      <div class="card bg-c-yellow update-card">
          <div class="card-block">
              <div class="row align-items-end">
                  <div class="col-8">
                      <h4 class="text-white" id="a1"><?php if(count($datas)>0){echo $datas[0]['value'];}else{echo "0";} ?></h4>
                      <h6 class="text-white m-b-0" id="t1"><?php if(count($datas)>0){echo $datas[0]['label'];}else{echo "Data Not Found";} ?></h6>
                  </div>
                  <div class="col-4 text-right">
                      <canvas id="update-chart-1" height="50"></canvas>
                  </div>
              </div>
          </div>
          <div class="card-footer">
              <p class="text-white m-b-0"></i>#</p>
          </div>
      </div>
  </div>
  <div class="col-xl-4 col-md-6">
      <div class="card bg-c-green update-card">
          <div class="card-block">
              <div class="row align-items-end">
                  <div class="col-8">
                    <h4 class="text-white" id="a2"><?php if(count($datas)>1){echo $datas[1]['value'];}else{echo "0";} ?></h4>
                    <h6 class="text-white m-b-0" id="t2"><?php if(count($datas)>1){echo $datas[1]['label'];}else{echo "Data Not Found";} ?></h6>
                  </div>
                  <div class="col-4 text-right">
                      <canvas id="update-chart-2" height="50"></canvas>
                  </div>
              </div>
          </div>
          <div class="card-footer">
              <p class="text-white m-b-0"></i>#</p>
          </div>
      </div>
  </div>
  <div class="col-xl-4 col-md-6">
      <div class="card bg-c-pink update-card">
          <div class="card-block">
              <div class="row align-items-end">
                  <div class="col-8">
                    <h4 class="text-white" id="a3"><?php if(count($datas)>2){echo $datas[2]['value'];}else{echo "0";} ?></h4>
                    <h6 class="text-white m-b-0" id="t3"><?php if(count($datas)>2){echo $datas[2]['label'];}else{echo "Data Not Found";} ?></h6>
                  </div>
                  <div class="col-4 text-right">
                      <canvas id="update-chart-3" height="50"></canvas>
                  </div>
              </div>
          </div>
          <div class="card-footer">
              <p class="text-white m-b-0"></i>#</p>
          </div>
      </div>
  </div>
  <!-- task, page, download counter  end -->
  <div class="col-xl-12 col-md-12">
    <div class="card">
      <div class="card-block">
        <div class="row">
          <div class="col-sm-6 col-xl-4 m-b-30">
              <div id="reportrange" class="f-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                  <span></span> <b class="caret"></b>
              </div>
          </div>
          <div class="col-sm-6 col-xl-4 m-b-30">
            <select class="form-control" name="kategori" id="kategori" onchange="getdata()">
                <option value="">-- Kategori --</option>
                <?php

                  $sql = 'select * from kategori';

                  $result = pg_query($sql);

                  while ($data = pg_fetch_assoc($result)) {
                      echo '<option value="'.$data['id'].'">'.$data['nama'].'</option>';
                  }

                ?>
            </select>
          </div>
          <div class="col-sm-6 col-xl-4 m-b-30">
            <select class="form-control" name="layanan" id="layanan" onchange="getdata()">
                <option value="">-- layanan --</option>
                <?php

                  $sql = 'select * from layanan';

                  $result = pg_query($sql);

                  while ($data = pg_fetch_assoc($result)) {
                      echo '<option value="'.$data['id'].'">'.$data['nama'].'</option>';
                  }

                ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-12 col-md-12">
    <div class="card">
      <div class="card-block" align="center">
        <div id="body">
        </div>
      </div>
    </div>
  </div>

</div>
<?php endblock() ?>

<?php startblock('js') ?>
<script type="text/javascript">
var waktu,start,end;
$(function() {

    start = moment(0);
    end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        waktu = '&mulai='+start.format('YYYY-MM-DD')+'&akhir='+end.format('YYYY-MM-DD');
        console.log("/tugas/view/tb/gv/koneksi.php?aksi=1"+waktu);
        filter();
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'All': [0, moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'This Year': [moment().startOf('year'), moment().endOf('year')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
<script type="text/javascript">

  var svg = d3.select("#body")
    .append("svg")
    .append("g")

  svg.append("g")
    .attr("class", "slices");
  svg.append("g")
    .attr("class", "labels");
  svg.append("g")
    .attr("class", "lines");

  var width = 960,
      height = 450,
    radius = Math.min(width, height) / 2;

  var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) {
      return d.value;
    });

  var arc = d3.svg.arc()
    .outerRadius(radius * 0.8)
    .innerRadius(radius * 0.4);

  var outerArc = d3.svg.arc()
    .innerRadius(radius * 0.9)
    .outerRadius(radius * 0.9);

  svg.attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

  var key = function(d){ return d.data.label; };

  function filter() {
    console.log("/tugas/view/tb/gv/koneksi.php?aksi=1"+waktu);
    $.ajax({url: "/tugas/view/tb/gv/koneksi.php?aksi=1"+waktu, dataType: 'json',success: function(result){
      for (var i = 0; i < result.length; i++) {
        label.push(result[i].label);
        value.push(result[i].value);
        colors.push(result[i].color);
      }
      if(result.length>0){
        document.getElementById("a1").innerHTML = result[0].value;
        document.getElementById("t1").innerHTML = result[0].label;
      }else{
        document.getElementById("a1").innerHTML = '0';
        document.getElementById("t1").innerHTML = 'Data Not Found';
      }

      if(result.length>1){
        document.getElementById("a2").innerHTML = result[1].value;
        document.getElementById("t2").innerHTML = result[1].label;
      }else{
        document.getElementById("a2").innerHTML = '0';
        document.getElementById("t2").innerHTML = 'Data Not Found';
      }

      if(result.length>2){
        document.getElementById("a3").innerHTML = result[2].value;
        document.getElementById("t3").innerHTML = result[2].label;
      }else{
        document.getElementById("a3").innerHTML = '0';
        document.getElementById("t3").innerHTML = 'Data Not Found';
      }

      color = d3.scale.ordinal()
        .domain(label)
        .range(colors);

      function randomData(){
        return result.map(function(d){
          return {label:d.label, value:d.value};});
      }

      change(randomData());

    }});
  }

  var color = d3.scale.ordinal()
    .domain(["Lorem ipsum", "dolor sit", "amet", "consectetur", "adipisicing", "elit", "sed", "do", "eiusmod", "tempor", "incididunt"])
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

  var label = [],value=[],colors=[];
  $.ajax({url: "/tugas/view/tb/gv/koneksi.php?aksi=1", dataType: 'json',success: function(result){
    for (var i = 0; i < result.length; i++) {
      label.push(result[i].label);
      value.push(result[i].value);
      colors.push(result[i].color);
    }

    color = d3.scale.ordinal()
      .domain(label)
      .range(colors);

    function randomData(){
      return result.map(function(d){
        return {label:d.label, value:d.value};});
    }

    change(randomData());

  }});

  d3.select(".randomize")
    .on("click", function(){
      change(randomData());
    });

  function change(data) {

    /* ------- PIE SLICES -------*/
    var slice = svg.select(".slices").selectAll("path.slice")
      .data(pie(data), key);


    slice.enter()
      .insert("path")
      .style("fill", function(d) { return color(d.data.label); })
      .attr("class", "slice");

    slice
      .transition().duration(1000)
      .attrTween("d", function(d) {
        this._current = this._current || d;
        var interpolate = d3.interpolate(this._current, d);
        this._current = interpolate(0);
        return function(t) {
          return arc(interpolate(t));
        };
      })

    slice.exit()
      .remove();

    /* ------- TEXT LABELS -------*/

    var text = svg.select(".labels").selectAll("text")
      .data(pie(data), key);

    text.enter()
      .append("text")
      .attr("dy", ".35em")
      .text(function(d) {
        return d.data.label;
      });

    function midAngle(d){
      return d.startAngle + (d.endAngle - d.startAngle)/2;
    }

    text.transition().duration(1000)
      .attrTween("transform", function(d) {
        this._current = this._current || d;
        var interpolate = d3.interpolate(this._current, d);
        this._current = interpolate(0);
        return function(t) {
          var d2 = interpolate(t);
          var pos = outerArc.centroid(d2);
          pos[0] = radius * (midAngle(d2) < Math.PI ? 1 : -1);
          return "translate("+ pos +")";
        };
      })
      .styleTween("text-anchor", function(d){
        this._current = this._current || d;
        var interpolate = d3.interpolate(this._current, d);
        this._current = interpolate(0);
        return function(t) {
          var d2 = interpolate(t);
          return midAngle(d2) < Math.PI ? "start":"end";
        };
      });

    text.exit()
      .remove();

    /* ------- SLICE TO TEXT POLYLINES -------*/

    var polyline = svg.select(".lines").selectAll("polyline")
      .data(pie(data), key);

    polyline.enter()
      .append("polyline");

    polyline.transition().duration(1000)
      .attrTween("points", function(d){
        this._current = this._current || d;
        var interpolate = d3.interpolate(this._current, d);
        this._current = interpolate(0);
        return function(t) {
          var d2 = interpolate(t);
          var pos = outerArc.centroid(d2);
          pos[0] = radius * 0.95 * (midAngle(d2) < Math.PI ? 1 : -1);
          return [arc.centroid(d2), outerArc.centroid(d2), pos];
        };
      });

    polyline.exit()
      .remove();
  };
</script>

<script type="text/javascript">
  function getdata() {
    var ka = document.getElementById("kategori").value;
    var la = document.getElementById("layanan").value;
    waktu = '&mulai='+start.format('YYYY-MM-DD')+'&akhir='+end.format('YYYY-MM-DD')+'&kategori='+ka+'&layanan='+la;

    filter();
  }
</script>
<?php endblock() ?>

<?php startblock('lib-script') ?>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="/tugas/editor/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="/tugas/editor/bower_components/modernizr/js/modernizr.js"></script>
  <!-- Chart js -->
  <script type="text/javascript" src="/tugas/editor/bower_components/chart.js/js/Chart.js"></script>

  <!-- amchart js -->
  <script src="/tugas/editor/assets/pages/widget/amchart/amcharts.js"></script>
  <script src="/tugas/editor/assets/pages/widget/amchart/serial.js"></script>
  <script src="/tugas/editor/assets/pages/widget/amchart/light.js"></script>
<?php endblock() ?>
