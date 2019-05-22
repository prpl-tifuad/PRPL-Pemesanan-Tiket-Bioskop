<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NOTLIKETHIS THEATER</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/form.css"> 
	
	<?php 
		session_start();
		require 'connect.php';

		$result= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(*) FROM theater");
		$data = mysqli_fetch_array($result);
		$no_theater = $data['COUNT(*)'] + 1;
		$no_theater;
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
				<div class="title">PANEL PENAMBAHAN TEATER </div>
				<form class="form" method="POST" action="tambah_theater_connect.php">
					<div class="form-row">
						<label>
							<span>No Theater</span>
							<input type="text" name="no_theater" value="<?php echo $no_theater ?>" readonly style="background: rgba(0,0,0,0.2);">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Nama Theater</span>
							<input type="text" name="nama_theater">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Jumlah Kapasitas Theater</span>
							<select name="kapasitas">
								<option disabled selected>Pilih Kapasitas</option>
								<option value="40">40</option>
								<option value="50">50</option>
								<option value="60">60</option>
							</select>
						</label>
					</div>
					<div class="form-row">
						<button class="btn-simpan">Konfirmasi</button>
						
					</div>
				</form>
				<div class="modal" id="open-modal">
	                	<div class="modal-dialog">
		                    	<div class="modal-header">
		                   		 	<span><a href="#" class="close" aria-hidden="true">&times;</a></span> 
		                        <h2>STATUS PENAMBAHAN</h2>
		                        	
		                    	</div>
			                    <div class="modal-body">
			                    	<?php 
			                    	if(isset($errMsg)){
			                    		$errMsg = $_SESSION['errMsg'];
			                    	}
			                    		if($_SESSION['status']==1){
			                    			$no_theater = $no_theater-1;
			                        		echo "<center><h3>Theater $no_theater Telah Berhasil Ditambahkan</h3></center>";
			                   			}else{
			                   				echo "<center><h3>Theater $no_theater Gagal Ditambahkan<br></h3></center>
			                   				Alasan : $errMsg";
			                    	}?>
			                    </div>
			                    <div class="modal-footer">
								<div class="form-row-simpan">
				    				<center><a href="#" class="btn-close">OK</a></center>
				    			</div>
		                    </div>
	                	</div>
	                </div>
			</div>
		</div>
	</div>
</body>
</html>