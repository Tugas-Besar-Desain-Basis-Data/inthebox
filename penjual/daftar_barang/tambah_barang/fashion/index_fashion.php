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
	$motif = $_POST['motif'];
	//c
	$warna = $_POST['warna'];
	//b
	$ukuran = $_POST['ukuran'];
	
	

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

		<div class="wrapper" style="background-image: url('assets/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/registration-form-1.jpg" alt="">
				</div>
				<form action="tambah_fashion.php" method="POST" enctype="multipart/form-data">
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
						<input type="hidden" name="motif" value="<?php echo $motif?>" class="form-control">
						<input type="hidden" name="ukuran" value="<?php echo $ukuran?>" class="form-control">
						<input type="hidden" name="warna"  value="<?php echo $warna?>" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<select name="jenis" id="" class="form-control" required="required">
							<option value="" disabled selected>Kategori</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="kids">Kids</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
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