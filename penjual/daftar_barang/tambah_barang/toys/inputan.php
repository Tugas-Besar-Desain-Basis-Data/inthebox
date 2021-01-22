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

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Input Data Barang</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
	</head>

	<body>

		<div class="wrapper" style="background-image: url('assets/images/bagcround.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/toys.png" alt="">
				</div>
				<form action="index_toys.php" method="POST">
					<h3>Input Banyak Variasi Yang Diinginkan</h3>
                    <br></br>
                    <br></br>
					<div class="form-wrapper">
						<select name="rasa" id="pilih" class="form-control" required="required">
							<option value="" disabled selected>Jumlah Warna Yang Ingin Diinput</option>
							<option value="satu">1</option>
							<option value="dua">2</option>
							<option value="tiga">3</option>
							<option value="empat">4</option>
							<option value="lima">5</option>
							<option value="enam">6</option>
                            <option value="tujuh">7</option>
							<option value="delapan">8</option>
							<option value="sembilan">9</option>
							<option value="sepuluh">10</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
                    <br></br>
                    <br></br>
					<div class="form-wrapper">
						<select name="jenis" id="pilih" class="form-control" required="required">
							<option value="" disabled selected>Jumlah Tipe / Motif Yang Ingin Diinput</option>
                            <option value="satu">1</option>
							<option value="dua">2</option>
							<option value="tiga">3</option>
							<option value="empat">4</option>
							<option value="lima">5</option>
							<option value="enam">6</option>
                            <option value="tujuh">7</option>
							<option value="delapan">8</option>
							<option value="sembilan">9</option>
							<option value="sepuluh">10</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
                    <br></br>
                    <br></br>
					<button>Selanjutnya
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body>

</html>