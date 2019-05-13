<?php
include $_SERVER['DOCUMENT_ROOT'].'/tugas/blank.php';

  if($kode != 'gv2019'){
    header('location:/tugas/view/tb/gv');
  }
?>
<?php startblock('title') ?> Tugas Besar 4 Grafik Visualisasi <?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="#!">Tugas Besar</a>
<li class="breadcrumb-item"><a href="/tugas/view/tugas/stpk">Grafik Visualisasi</a>
<li class="breadcrumb-item"><a href="#!">4</a>
<?php endblock() ?>

<?php startblock('css') ?>
<style>
  .area {
  fill: steelblue;
  clip-path: url(#clip);
  }

  .zoom {
  cursor: move;
  fill: none;
  pointer-events: all;
  }
</style>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Tugas Besar 4 Grafik Visualisasi
<?php endblock() ?>

<?php startblock('content') ?>
<?php

  $host = "localhost";
  $user = "postgres";
  $pass = "root";
  $port = "5432";
  $dbname = "bi_gv_database";

  $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");

  $sql = "select count(transaksi.id) as total, sum(transaksi.total) as jumlah from transaksi";
  $sql2 = 'select count(kategori.id) total_kategori from kategori';
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
                      <h4 class="text-c-blue f-w-600"><?php echo pg_fetch_assoc($result2)['total_kategori']; ?></h4>
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
          <svg width="960" height="500"></svg>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endblock() ?>

<?php startblock('js') ?>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script>
      var svg = d3.select("svg"),
          margin = {top: 20, right: 20, bottom: 110, left: 40},
          margin2 = {top: 430, right: 20, bottom: 30, left: 40},
          width = +svg.attr("width") - margin.left - margin.right,
          height = +svg.attr("height") - margin.top - margin.bottom,
          height2 = +svg.attr("height") - margin2.top - margin2.bottom;

      var parseDate = d3.timeParse("%Y-%m-$d");

      var x = d3.scaleTime().range([0, width]),
          x2 = d3.scaleTime().range([0, width]),
          y = d3.scaleLinear().range([height, 0]),
          y2 = d3.scaleLinear().range([height2, 0]);

      var xAxis = d3.axisBottom(x),
          xAxis2 = d3.axisBottom(x2),
          yAxis = d3.axisLeft(y);

      var brush = d3.brushX()
          .extent([[0, 0], [width, height2]])
          .on("brush end", brushed);

      var zoom = d3.zoom()
          .scaleExtent([1, Infinity])
          .translateExtent([[0, 0], [width, height]])
          .extent([[0, 0], [width, height]])
          .on("zoom", zoomed);

      var area = d3.area()
          .curve(d3.curveMonotoneX)
          .x(function(d) { return x(d.date); })
          .y0(height)
          .y1(function(d) { return y(d.price); });

      var area2 = d3.area()
          .curve(d3.curveMonotoneX)
          .x(function(d) { return x2(d.date); })
          .y0(height2)
          .y1(function(d) { return y2(d.price); });

      svg.append("defs").append("clipPath")
          .attr("id", "clip")
        .append("rect")
          .attr("width", width)
          .attr("height", height);

      var focus = svg.append("g")
          .attr("class", "focus")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      var context = svg.append("g")
          .attr("class", "context")
          .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");

      d3.json("/tugas/view/tb/gv/koneksi.php?aksi=4", function(error, data) {
        if (error) throw error;

        for (var i = 0; i < data.length; i++) {
          data[i].date = new Date(data[i].date);
          // date[i].price = parseInt(data[i].price);
        }

        x.domain(d3.extent(data, function(d) { return d.date; }));
        y.domain([0, d3.max(data, function(d) { return d.price; })]);
        x2.domain(x.domain());
        y2.domain(y.domain());

        focus.append("path")
            .datum(data)
            .attr("class", "area")
            .attr("d", area);

        focus.append("g")
            .attr("class", "axis axis--x")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        focus.append("g")
            .attr("class", "axis axis--y")
            .call(yAxis);

        context.append("path")
            .datum(data)
            .attr("class", "area")
            .attr("d", area2);

        context.append("g")
            .attr("class", "axis axis--x")
            .attr("transform", "translate(0," + height2 + ")")
            .call(xAxis2);

        context.append("g")
            .attr("class", "brush")
            .call(brush)
            .call(brush.move, x.range());

        svg.append("rect")
            .attr("class", "zoom")
            .attr("width", width)
            .attr("height", height)
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
            .call(zoom);
      });

      function brushed() {
        if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
        var s = d3.event.selection || x2.range();
        x.domain(s.map(x2.invert, x2));
        focus.select(".area").attr("d", area);
        focus.select(".axis--x").call(xAxis);
        svg.select(".zoom").call(zoom.transform, d3.zoomIdentity
            .scale(width / (s[1] - s[0]))
            .translate(-s[0], 0));
      }

      function zoomed() {
        if (d3.event.sourceEvent && d3.event.sourceEvent.type === "brush") return; // ignore zoom-by-brush
        var t = d3.event.transform;
        x.domain(t.rescaleX(x2).domain());
        focus.select(".area").attr("d", area);
        focus.select(".axis--x").call(xAxis);
        context.select(".brush").call(brush.move, x.range().map(t.invertX, t));
      }

      function type(d) {
        d.date = parseDate(d.date);
        d.price = +d.price;
        return d;
      }

  </script>
<?php endblock() ?>
