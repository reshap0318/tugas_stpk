<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "root";
	$port = "5432";
	$dbname = "bi_gv_database";

	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");

  if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if($aksi == '1'){
			$datas = [];
			$color = ["#ff8c00", "#7d8be3","#6b486b", "#a05d56", "#d0743c","#98abc5", "#8a89a6", "#7b6888", "#7426c5", "#0266c4"];
			$no = 0;
			$sql = 'select a.kota as nama_daerah, count(transaksi.*) total from "user" a join transaksi on a.id = transaksi.user_id join layanan on transaksi.layanan_id = layanan.id where a.kota is not null';
			if(isset($_GET['mulai']) && isset($_GET['akhir'])){
				$mulai = $_GET['mulai'];
				$akhir = $_GET['akhir'];
				$sql .= " and cast(tanggal as date) between '$mulai' and '$akhir'";
			}
			if(isset($_GET['layanan'])){
				$layanan = $_GET['layanan'];
				if($layanan!=''){
					$sql .= " and transaksi.layanan_id = $layanan";
				}
			}
			if(isset($_GET['kategori'])){
				$kategori = $_GET['kategori'];
				if($kategori!=''){
					$sql .= " and layanan.kategori_id = $kategori";
				}
			}
			$sql .= " group by a.kota order by total desc limit 10";
			// die($sql);
			$result = pg_query($sql);
			while ($data = pg_fetch_assoc($result)) {
					$datas[]=['label'=>$data['nama_daerah'],'value'=>$data['total'],'color'=>$color[$no++]];
			}
			echo json_encode($datas);
		}
		elseif($aksi=='2'){
			$datas = [];
			$color = ["#ff8c00", "#7d8be3","#6b486b", "#a05d56", "#d0743c","#98abc5", "#8a89a6", "#7b6888", "#7426c5", "#0266c4"];
			$no = 0;
			$sql = 'select "user".nama, sum(transaksi.total) as total from "user" join transaksi on "user".id = transaksi.user_id group by "user".nama order by total desc';
			$result = pg_query($sql);
			while ($data = pg_fetch_assoc($result)) {
					$datas[]=['label'=>$data['nama'],'value'=>$data['total'],'color'=>$color[$no++]];
			}
			echo json_encode($datas);
		}
		elseif($aksi=='3'){
			$datas = [];
			$sql = "select kategori.nama, count(transaksi.id) total, sum(transaksi.total) jumlah, CONCAT('Ini Merupakan Kategori ',kategori.nama,' Dimana Kategori Ini Memiliki Total Penjualan Sebanyak ',count(transaksi.id),' kali, dan nilai keuangan yang di dapatkannya adalah ', sum(transaksi.total)) desk from kategori left join layanan on kategori.id = layanan.kategori_id left join transaksi on layanan.id = transaksi.layanan_id group by kategori.nama order by total desc";
			$result = pg_query($sql);
			while ($data = pg_fetch_assoc($result)) {
					$datas[]=['cat'=>$data['nama'],'name'=>$data['nama'],'value'=>(int)$data['total'],'icon'=>'img/lea-logo.png', 'desc' => $data['desk']];
			}
			echo json_encode($datas);
		}
		elseif($aksi=='4'){
			$datas = [];
			$color = ["#ff8c00", "#7d8be3","#6b486b", "#a05d56", "#d0743c","#98abc5", "#8a89a6", "#7b6888", "#7426c5", "#0266c4"];
			$no = 0;
			$sql = 'select CAST(tanggal AS DATE) as tgl, count(transaksi.id) total, sum(transaksi.total) jumlah from transaksi group by tgl order by tgl asc';
			$result = pg_query($sql);
			while ($data = pg_fetch_assoc($result)) {
					$datas[]=['date'=>$data['tgl'],'price'=>(int)$data['total']];
			}
			echo json_encode($datas);
		}
		elseif($aksi=='5'){
			$datas = [];
			$sql = "select layanan.nama, kategori.nama as kategori, count(transaksi.id) total, sum(transaksi.total) jumlah, CONCAT('Ini Merupakan layanan ',layanan.nama,' dengan kategori ',kategori.nama,' Dimana Layanan Ini Memiliki Total Penjualan Sebanyak ',count(transaksi.id),' kali, dan nilai keuangan yang di dapatkannya adalah Rp.', sum(transaksi.total)) desk from layanan left join kategori on layanan.kategori_id = kategori.id left join transaksi on layanan.id = transaksi.layanan_id group by kategori.nama, layanan.nama order by total desc";
			$result = pg_query($sql);
			while ($data = pg_fetch_assoc($result)) {
					$datas[]=['cat'=>$data['kategori'],'name'=>$data['nama'],'value'=>(int)$data['total'],'icon'=>'img/lea-logo.png', 'desc' => $data['desk']];
			}
			echo json_encode($datas);
		}
	}
?>
