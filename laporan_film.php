<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NOTLIKETHIS THEATER</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/form.css"> 

	<?php 
		require 'connect.php';
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
				<div class="title">LAPORAN FILM</div>
				<table class="table-laporan" align="center">
					<thead>
						<tr>
							<th>Kode Film</th>
							<th>Nama Film</th>
							<th>Awal Penayangan</th>
							<th>Akhir Penayangan</th>
							<th>Total Penonton</th>
							<th>Total Penjualan(Rp)</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$tanggal =date("Y-m-d");
						$no=0;
						$i=1;
						$j=1;

						$result= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT film.kode_film,film.nama_film,count(transaksi.id_transaksi)AS penonton,COALESCE((SELECT sum(transaksi.harga) FROM transaksi where transaksi.nama_film=film.nama_film), 0)AS penjualan,film.awal_tayang,film.akhir_tayang FROM film LEFT JOIN transaksi ON transaksi.nama_film=film.nama_film AND transaksi.waktu_transaksi BETWEEN awal_tayang AND akhir_tayang  GROUP BY film.kode_film");
						while ($data = mysqli_fetch_array($result)){
							$no++;
							?>
							<tr>
								<td><?php echo $data['kode_film']; ?></td>
								<td><?php echo $data['nama_film']; ?></td>
								<td><?php echo $data['awal_tayang']; ?></td>
								<td><?php echo $data['akhir_tayang']; ?></td>
								<td><?php echo $data['penonton']; ?></td>
								<td><?php echo $data['penjualan']; ?></td>
							<?php
						}
						?>
							</tr><
					</tbody>
				</table>
					<br>
		    		<center>
		    			<div class="title">STATISTIK PENJUALAN PER FILM</div>
		    			<div id="chart-theater"></div>
		    		</center>
				<table>
					<tr>
						<td>
						<div>
						<?php include 'chart_film/chart_film.php ' ?> </div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>