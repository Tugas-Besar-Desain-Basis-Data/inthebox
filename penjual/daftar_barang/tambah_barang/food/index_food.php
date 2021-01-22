<?php
//Pesan Notifikasi
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
		echo "<script>alert('Masih ada data yang kosong atau jenis/unit yang anda masukkan tidak sesuai')</script>";
    }
    if ($_GET['pesan'] == "gagal2") {
		echo "<script>alert('Salah Memasukkan Jenis')</script>";
    }
}
	//a
	$jenis = $_POST['jenis'];
	//c
	$rasa = $_POST['rasa'];
	
	

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>In The Box</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
	</head>

	<body>

		<div class="wrapper" style="background-image: url('assets/images/food.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/food.png" alt="">
				</div>
				<form action="tambah_food.php" method="POST" enctype="multipart/form-data">
					<h3>Tambah Data Barang</h3>
					<div class="form-wrapper">
						<input type="text" name="nama" required="required" placeholder="Nama Barang" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<i class="zmdi zmdi-account"></i>
						<textarea name="content" rows="5" cols="45" required="required" placeholder="Detail Barang"></textarea>
					</div>
					<div class="form-wrapper">
						<input type="number" name="harga" required="required" placeholder="Harga Barang" class="form-control">
						<input type="hidden" name="jenis" value="<?php echo $jenis?>" class="form-control">
						<input type="hidden" name="rasa" value="<?php echo $rasa?>" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<select name="kategori" id="" class="form-control" required="required">
							<option value="" disabled selected>Kategori</option>
							<option value="impor">Impor</option>
							<option value="expor">Expore</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">  
						<input type="text" name="variasi3" placeholder="Berat" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					
					<?php

					include 'proses_inputan.php';
					?>
					<br></br>
					
					<div class="form-wrapper">
						<i class="zmdi zmdi-account"></i>
						<input type="file" id="dokumen" name="photo" required="required" placeholder="Photo Barang" class="form-control">
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body>

</html>