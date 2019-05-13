<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';

  if($kode != 'gv2019'){
    header('location:/tugas/view/tb/gv');
  }

?>
<?php startblock('title') ?> Tugas Besar 2 Grafik Visualisasi <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas Besar</a>
<li class="breadcrumb-item"><a href="/tugas/view/tugas/stpk">Grafik Visualisasi</a>
<li class="breadcrumb-item"><a href="#!">2</a>
<?php endblock() ?>

<?php startblock('css') ?>
<style>

  body {
  font: 10px sans-serif;
  }

  .bar {
    fill: steelblue;
  }

  .bar:hover {
    fill: brown;
  }

  .title {
    font: bold 14px "Helvetica Neue", Helvetica, Arial, sans-serif;
  }

  .axis {
    font: 10px sans-serif;
  }

  .axis path,
  .axis line {
    fill: none;
    stroke: #000;
    shape-rendering: crispEdges;
  }

  .x.axis path {
    display: none;
  }

  .d3-tip {
    line-height: 1;
    font-weight: bold;
    padding: 12px;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    border-radius: 2px;
  }

  /* Creates a small triangle extender for the tooltip */
  .d3-tip:after {
    box-sizing: border-box;
    display: inline;
    font-size: 10px;
    width: 100%;
    line-height: 1;
    color: rgba(0, 0, 0, 0.8);
    content: "\25BC";
    position: absolute;
    text-align: center;
  }

  /* Style northward tooltips differently */
  .d3-tip.n:after {
    margin: -1px 0 0 0;
    top: 100%;
    left: 0;
  }
</style>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas Besar 2 Grafik Visualisasi
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

  $sql = "select count(transaksi.id) as total, sum(transaksi.total) as jumlah from transaksi";
  $sql2 = 'select count("user".id) total_user from "user"';
  // echo $sql;
  $result = pg_query($sql);
  $result2 = pg_query($sql2);

  $datas = [];
  while ($data = pg_fetch_assoc($result)) {
      $datas[]=['total'=>$data['total'],'jumlah'=>$data['jumlah']];
  }
?>

<div class="row">
  <!-- task, page, download counter  start -->
  <div class="col-xl-4 col-md-6">
      <div class="card">
          <div class="card-block">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h4 class="text-c-green f-w-600"><?php if(count($datas)>0){echo number_format( $datas[0]['total'],0,",",".");}else{echo "0";} ?></h4>
                      <h6 class="text-muted m-b-0">Total Penjualan</h6>
                  </div>
                  <div class="col-4 text-right">
                      <i class="feather icon-file-text f-28"></i>
                  </div>
              </div>
          </div>
          <div class="card-footer bg-c-green">
              <div class="row align-items-center">
                  <div class="col-9">
                      <p class="text-white m-b-0">#</p>
                  </div>
                  <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-4 col-md-6">
      <div class="card">
          <div class="card-block">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h4 class="text-c-pink f-w-600">Rp. <?php if(count($datas)>0){echo number_format( $datas[0]['jumlah'],0,",",".");}else{echo "0";} ?>,00</h4>
                      <h6 class="text-muted m-b-0">Total Keuangan Penjualan</h6>
                  </div>
                  <div class="col-4 text-right">
                      <i class="feather icon-calendar f-28"></i>
                  </div>
              </div>
          </div>
          <div class="card-footer bg-c-pink">
              <div class="row align-items-center">
                  <div class="col-9">
                      <p class="text-white m-b-0">#</p>
                  </div>
                  <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-4 col-md-6">
      <div class="card">
          <div class="card-block">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h4 class="text-c-blue f-w-600"><?php echo pg_fetch_assoc($result2)['total_user']; ?></h4>
                      <h6 class="text-muted m-b-0">Total User</h6>
                  </div>
                  <div class="col-4 text-right">
                      <i class="feather icon-user f-28"></i>
                  </div>
              </div>
          </div>
          <div class="card-footer bg-c-blue">
              <div class="row align-items-center">
                  <div class="col-9">
                      <p class="text-white m-b-0">#</p>
                  </div>
                  <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- task, page, download counter  end -->
  <div class="col-xl-12 col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="col-sm-12 col-xl-4 m-b-30">
            <div id="reportrange" class="f-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <span></span> <b class="caret"></b>
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

<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
<script>

  var margin = {top: 80, right: 180, bottom: 80, left: 180},
      width = 960 - margin.left - margin.right,
      height = 500 - margin.top - margin.bottom;

  var x = d3.scale.ordinal()
      .rangeRoundBands([0, width], .1, .3);

  var y = d3.scale.linear()
      .range([height, 0]);

  var xAxis = d3.svg.axis()
      .scale(x)
      .orient("bottom");

  var yAxis = d3.svg.axis()
      .scale(y)
      .orient("left")
      .ticks(8, "");

  var tip = d3.tip()
    .attr('class', 'd3-tip')
    .offset([-10, 0])
    .html(function(d) {
      return "<strong>Total:</strong> <span style='color:red'>" + d.value + "</span>";
  })

  var svg = d3.select("#body").append("svg")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.top + margin.bottom)
    .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.json("/tugas/view/tb/gv/koneksi.php?aksi=2", function(error, data) {

    // d3.csv("/tugas/view/tb/gv/koneksi.php?aksi=2", function(error, data) {
      x.domain(data.map(function(d) { return d.label; }));
      y.domain([0, d3.max(data, function(d) { return d.value; })]);

      console.log(data);

    svg.call(tip);
    svg.append("text")
        .attr("class", "title")
        .attr("x", x(data[0].label))
        .attr("y", -26)
        .text("User yang Melakukan Transaksi Terbanyak");

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
      .selectAll(".tick text")
        .call(wrap, x.rangeBand());

    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    svg.selectAll(".bar")
        .data(data)
      .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function(d) { return x(d.label); })
        .attr("width", x.rangeBand())
        .attr("y", function(d) { return y(d.value); })
        .attr("height", function(d) { return height - y(d.value); });
  });

  function wrap(text, width) {
    text.each(function() {
      var text = d3.select(this),
          words = text.text().split(/\s+/).reverse(),
          word,
          line = [],
          lineNumber = 0,
          lineHeight = 1.1, // ems
          y = text.attr("y"),
          dy = parseFloat(text.attr("dy")),
          tspan = text.text(null).append("tspan").attr("x", 0).attr("y", y).attr("dy", dy + "em");
      while (word = words.pop()) {
        line.push(word);
        tspan.text(line.join(" "));
        if (tspan.node().getComputedTextLength() > width) {
          line.pop();
          tspan.text(line.join(" "));
          line = [word];
          tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
        }
      }
    });
  }

  function type(d) {
    d.value = +d.value;
    return d;
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
