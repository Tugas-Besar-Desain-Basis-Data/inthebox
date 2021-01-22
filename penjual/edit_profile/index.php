<?php
//Pesan Notifikasi

	require_once("../../koneksi.php");

	if(!isset($_SESSION['status'])){
		echo"
		<script>
        alert('Login Terlebih Dahulu Untuk Edit Profile Mu');
        document.location.href='../../login/';
        </script>
        ";
	}

	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<script>alert('username sudah ada yang menggunakan')</script>";
		}
	}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Edit Profile In The Box</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<style>

.delivery-label {
    display: block;
    padding-left: 30px;
    position: relative;
}

.delivery-label:before {
    position: absolute;
    width: 15px;
    height: 15px;
    content: '';
    border: 1px solid black;
    left: 0;
}

.delivery-option:checked + .delivery-label:before {
    content: 'x';
    line-height: 15px;
    text-align: center;
}

.delivery-option {
    position: absolute;
    margin-left: -1000px;
}

</style>
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="assets/edit.css">
</head>

<body>

	<div class="wrapper" style="background-image: url('assets/img/bg-registration-form-1.png');">
		<div class="inner">
			<div class="image-holder">
				<img src="assets/img/registration-form-1.png" alt="">
				<i class="zmdi zmdi-arrow-right"><a href="../../index.php"><button>Kembali</button></a></i>
			</div>

			<?php

			$usernamesesi = $_SESSION['username'];
			//echo $usernamesesi;
			$data = mysqli_query($koneksi, "select * from user where username = '$usernamesesi'");


			while ($d = mysqli_fetch_array($data)) {

			?>
				<form method="POST" action="update_user.php">
					<h3>EDIT YOUR PROFILE</h3>
					Nama Lengkap
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>" class="form-control">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>" class="form-control">
					</div>
					<div class="form-wrapper">Apakah Anda Ingin Mengganti Username ?
						<br></br>
						<input type="radio" name="jawab[]"  value="ya"  id="standard" class="delivery-option"/><label for="standard" class="delivery-label"> Ya</label>
						<span style="display:inline-block; width: 62px;"></span>
						<input type="radio" name="jawab[]" value="tidak"  id="today" class="delivery-option"/><label for="today" class="delivery-label"> Tidak </label>
						<br></br>
					</div>
					<div class="form-wrapper">Username
						<input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">Email
						<input type="text" name="email" value="<?php echo $d['email']; ?>" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">Password
						<input type="password" name="password" value="<?php echo $d['password']; ?>" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">Address
						<input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">Telephone
						<input type="text" name="hp" value="<?php echo $d['telephone']; ?>" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-group">
						<input type="hidden" name="level" value="<?php echo $d['level']; ?>" class="form-control">
					</div>
					<button>Update
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			<?php
			}
			?>

		</div>
	</div>
</body>

</html>