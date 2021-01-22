<?php

include "../koneksi.php";

// menangkap data yang dikirim dari form

$username = $_POST['username'];
$password = $_POST['password'];

// mengaktifkan session php


// menyeleksi data admin dengan username dan password yang sesuai


if((ctype_alpha($username))&&($username!=NULL)&&($password!=NULL)){

	$data = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");


	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
	
		$data = mysqli_fetch_assoc($data);
		//$fetch = mysqli_fetch_assoc($data);
		// cek jika user login sebagai admin
		if (($data['username'] == "admin")&&($data['password']=="admin123") &&($data['level']=="admin") ) {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";
			$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/");
		} 
		else{
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";
			$_SESSION['level'] = $data['level'];
			header("location:../index.php");
		}
	}
	else{
		//mengalihkan ke halaman login kembali
		header("location:.?pesan=gagal");
	}

}
else{
	header("location:.?pesan=gagal2");
}
?>

