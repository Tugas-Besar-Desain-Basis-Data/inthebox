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
    include '../../../koneksi.php';



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

		<div class="wrapper" style="background-image: url('assets/images/bagcround.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/images/toys.png" alt="">
				</div>
				<form action="update_stationary.php" method="POST" enctype="multipart/form-data">
                    <h3>Edit Data Barang</h3>
                    <?php
                        $id = $_GET['id'];

                            $data = mysqli_query($koneksi, "select * from barang_dagang where id_barang='$id'");


                            while ($d = mysqli_fetch_array($data)) {

                    ?>

					<div class="form-wrapper">Nama Barang
                        <input type="text" name="nama" required="required" value="<?php echo $d['nama_barang'] ?>" class="form-control">
                        <input type="hidden" name="id_barang" required="required" value="<?php echo $d['id_barang'] ?>" class="form-control">
						<i class="zmdi zmdi-account"></i>
                    </div>
                    <br></br>
                    <div class="form-wrapper">Harga Barang
                        <input type="number" name="harga" required="required" value="<?php echo $d['harga'] ?>" class="form-control">
						<i class="zmdi zmdi-account"></i>
                    </div>
                    <br></br>
					<div class="form-wrapper">
						<i class="zmdi zmdi-account"></i>Detail Barang
						<textarea type="text" name="content" rows="5" cols="45" required="required" placeholder="<?php echo $d['detail_barang'] ?>"></textarea>
                    </div>
                    <br></br>
					<div class="form-wrapper">
                        <select name="jenis" id="" class="form-control" required="required">
							<option value="" disabled selected>Kategori</option>
							<option value="buku">Buku</option>
							<option value="alat tulis">Alat Tulis</option>
							<option value="lainnya">Lainnya</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <br></br>
                    <?php
                        }
                    ?>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

	</body>

</html>