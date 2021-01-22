<?php
//Pesan Notifikasi

include '../../koneksi.php';

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
		echo "<script>alert('Masih ada data yang kosong')</script>";
    }
    else if ($_GET['pesan'] == "gagal2") {
		echo "<script>alert('Nama Toko Sudah Ada Yang Menggunakan')</script>";
    }
    else if ($_GET['pesan'] == "daftarsukses") {
        echo "<script>alert('Silahkan Lengkapi Data Khusus Untuk Penjual')</script>";
    }
    else if ($_GET['pesan'] == "gagal3") {
		echo "<script>alert('Gagal Save Data')</script>";
    }
    
}

    $get_uname = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form Penjual In The Box</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Lengkapi Data Toko Mu</h2>
                        <form method="POST" class="register-form" id="register-form" action="cek_register.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="hidden" name="username" value="<?php echo"$get_uname"?>"/>
                                <input type="text" name="nama" id="name" placeholder="Nama Toko"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="alamat" id="name" placeholder="Alamat Toko"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="hp" id="name" placeholder="No Handphone Toko"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="syarat" value="ya" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                <input type="reset" name="reset" id="signup" class="form-submit" value="Reset"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>