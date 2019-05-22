<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NOTLIKETHIS THEATER</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<likn rel="stylesheet" type="text/css" href="css/form.css">
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="js/fusioncharts.js"></script>
	<script type="text/javascript" src="js/fusioncharts.charts.js"></script>
	<script type="text/javascript" src="js/themes/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript" src="js/chart-transaksi.js"></script>
	<?php
		require 'connect.php';
		date_default_timezone_set('Asia/Jakarta');
		$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) FROM film");
		$count = mysqli_fetch_array($result);
		for ($i=1;$i <=$count['COUNT(*)'] ; $i++){
			$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM film WHERE kode_film =$i");
			while ($data= mysqli_fetch_array($query)){
				$nama_film[$i] = $data['nama_film'];
			}
		}
	?>	
</head>
<body>
	<div class="header">
		<div class="title-header">
		NOTLIKETHIS
		<br>THEATER
		</div>
	</div>
	<div class="row">		
			<div class="col-12">
		    	<div class="white-box">
		    		<div class="title">
		    		LAPORAN TRANSAKSI <?php echo date('d')." ".date('m')." ".date('Y');?>
		    		</div>
		    		<table class="table-laporan" align="center">
		    			<thead>
		    				<tr>
		    					<th>No</th>
		    					<th>Nama Film</th>
		    					<th>No Kursi</th>
		    					<th>Jam Tayang</th>
		    					<th>Ruang Theater</th>
		    					<th>Harga</th>
		    					<th>Waktu Transaksi</th>
		    				</tr>
		    			</thead>
				    	<tbody>
				    		<?php
		                    $tgl_input = date("Y-m-d");
		                    $no = 0;
		                    $total = 0;
		                    $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT `nama_film`, `no_kursi`, `jam_mulai`, `no_theater`, `harga` ,`waktu_transaksi` 
		                    	FROM transaksi WHERE DATE(`waktu_transaksi`) LIKE '%$tgl_input%'");
		                    while ($data = mysqli_fetch_array($result)) {
		                        $no++;
		                        $total = $total + $data['harga'];
			                	?>
			                <tr>
			                    <td><?php echo $no;?></td>
			                    <td><?php echo $data['nama_film'];?></td>
			                    <td><?php echo $data['no_kursi'];?></td>
			                    <td><?php echo $data['jam_mulai'];?></td>
			                    <td><?php echo $data['no_theater'];?></td>
			                    <td><?php
			                            $harga = $data['harga'];
			                            $angka_format = number_format($harga,2,",",".");
			                            echo "Rp $angka_format";
			                    ?></td>
			                    <td><?php echo $data['waktu_transaksi'];?></td>
			                </tr>
			                <?php }
			                    $angka_format1 = number_format($total,2,",",".");
			                ?>
		                	<tr>
			                    <td colspan="5" class="total">TOTAL</td>
			                    <td colspan="2" class="total"><?php echo "Rp $angka_format1";?></td>
			                </tr>
		    			</tbody>
		    		</table>
		    		<center>
		    			<div class="title">STATISTIK PENJUALAN TIKET BIOSKOP</div>
		    			<div id="chart-transaksi"></div>
		    		</center>
		    	</div>
		    </div>
	</div>	    
</body>
</html>