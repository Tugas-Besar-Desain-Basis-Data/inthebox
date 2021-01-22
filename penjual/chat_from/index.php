<?php

    require_once("../../koneksi.php");

    if(!isset($_SESSION['status'])){
        echo "
        <script>
        alert('Login Terlebih Dahulu Untuk Membuat Forum Baru');
        document.location.href='../../../login/';
        </script>
        ";
    }
    else{
        $user = $_SESSION['username'];
    }
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<script>alert('Gagal Membuat Forum Baru $koneksi->error')</script>";
        }
        else if ($_GET['pesan'] == "sukses") {
            echo "<script>alert('Berhasil Membuat Forum Baru')</script>";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>In The Box</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/editor.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"> </head>

<body>
     <!-- ==========header mega navbar=======-->
     <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="../../index.php"><img src="assets/image/logoo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="#">Question From User</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category Item <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../../all_user/detail_product/fashion.php">Fashion</a></li>
                                <li><a href="../../all_user/detail_product/food.php">Food</a></li>
                                <li><a href="../../all_user/detail_product/toys.php">Toys</a></li>
                                <li><a href="../../all_user/detail_product/stationary.php">Stationary</a></li>
                                <li><a href="../../all_user/detail_product/electronic.php">Electronic</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../edit_profile/">Edit Profile </a></li>
                                <li><a href="../edit_toko/">Edit Toko</a></li>
                                <li><a href="../pesanan">Pesanan Masuk </a></li>
                                <li><a href="#">Chat From User</a></li>
                                <li><a href="../../logout.php" >Logout </a></li>
                                <li><a href="../daftar_barang/">Daftar Barang</a></li>
                                <li><a href="../../all_user/forum/index.php">Forum</a></li>
                                <li><a href="../../logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>

    <!--======= welcome section on top background=====-->
    <section class="welcome-part-one">
        <div class="container">
            <div class="welcome-demop102 text-center">
                <h2>Question From User Website E-Commerce In The Box</h2>
                <p>Help User With Answer They Question</p>
                <div class="button0239-item">
                    <?php
                        if((isset($_SESSION['status']))){
                    ?>
                        <button type="button" class="aboutus022" align="center">Welcome Back <?php echo $user ?></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ======breadcrumb ======-->
    <section class="header-descriptin329">
        <div class="container">
            <h3>Question From User</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="../../">Home</a></li>
                <li class="active">Question From User</li>
            </ol>
        </div>
    </section>
    <?php

    $query = mysqli_query($koneksi, "SELECT * FROM barang_dagang where username='$user'");

        $i = 0;

        while(($get_info = mysqli_fetch_array($query))){

            $id_barang_seller = $get_info['id_barang'];

            $querys = mysqli_query($koneksi, "SELECT * FROM pertanyaan where barang_id='$id_barang_seller'");


                    while(($get_data = mysqli_fetch_array($querys))){

                        $id_get = $get_data['id_ask'];
                        //$user_get = $get_data['username'];

                        //$querys_content = mysqli_query($koneksi, "SELECT * FROM pertanyaan ORDER BY waktu asc where barang_id='$id_get'");

                        //$list = mysqli_fetch_assoc($querys_content);

                        $queryss = mysqli_query($koneksi, "SELECT * FROM barang_dagang where id_barang='$id_barang_seller'");

                        while($get_detail = mysqli_fetch_array($queryss)){

                            $i++;

    ?>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <!--    body content-->
                <div class="col-md-9">
                    <div class="about-user2039">
                        <div class="user-title3930">
                            <h3>Question From User <?php echo $get_data['username'] ?></h3>
                            <hr>
                        </div>
                        <div class="user-image293"> <img src="assets/image/images.png" alt="Image"> </div>
                        <div class="user-list10039">
                            <div class="ul-list-user-left29">
                                <ul>
                                    <li><i class="fa fa-plus" aria-hidden="true"></i> <strong>Nama Barang : </strong><?php echo $get_detail['nama_barang'] ?></li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Nama Toko : </strong><?php echo $get_detail['nama_toko'] ?></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i> <strong>Nama User : </strong><?php echo $get_detail['username'] ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-description303">
                            <p></p>
                            <a href="list.php?id=<?php echo $id_get ?>">Jawab <?php echo $get_data['username'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
                    }}}
                    $a = 0;
                    if($a==$i){
                        ?>
                            <section class="main-content920">
        <div class="container">
            <div class="row">
                <!--    body content-->
                <div class="col-md-9">
                    <div class="about-user2039">
                        <div class="user-title3930">
                            <h3>Belum Ada Pertanyaan Dari User</h3>
                            <hr>
                        </div>
                        <div class="user-image293"> <img src="assets/image/images.png" alt="Image"> </div>
                        <div class="user-list10039">
                            <div class="ul-list-user-left29">
                            </div>
                        </div>
                        <div class="user-description303">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                        <?php
                            }
                        ?>



  <!--    footer -->
<div class="footer-search">
     <div class="container">
	<div class="row">
           <!--    footer -->

    <section class="footer-part">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
    <section class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/editor.js"></script>

</body>

</html>