<?php

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "logout") {
            echo "<script>alert('Logout Berhasil, Anda telah keluar')</script>";
        }
        else if ($_GET['pesan'] == "gagal4") {
            echo "<script>alert('Login Sebagai User Untuk Menambah Wish List / Chart')</script>";
        }
    }
    

    if(isset($_SESSION['status'])){
        $level = $_SESSION['level'];
    }
    else{
        $level = "null";
    }
    require_once('koneksi.php');
    
    $comment="";
    $chart="";
    $status="";

    date_default_timezone_set("Asia/Jakarta");
        
    $today = date("Y-m-d");

    $jam = date("H:i");

    if ($jam > '05:30' && $jam <= '11:00') {
        $salam = 'MORNING';
    } 
    elseif ($jam >= '11:01' && $jam <= '15:00') {
        $salam = 'AFTERNOON';
    } 
    elseif ($jam <= '18:00') {
        $salam = 'EVENING';
    } 
    else {
        $salam = 'NIGHT';
    }

        if(isset($_SESSION['status'])){

            $user = $_SESSION['username'];
            $level = $_SESSION['level'];

            $sub ="WELCOME BACK $user TO IN THE BOX E-COMMERCE WEBSITE";

        }
        else{

            $sub ="WELCOME BACK TO IN THE BOX E-COMMERCE WEBSITE";

            
        }

    


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>In The Box</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/main/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/main/css/style.css" type="text/css">

    <style>p.indent{ padding-left: 1.8em }</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div><br></br>
                        <a href="index.php"><img src="assets/main/img/logo_web.png" alt=""></a>
                    </div>
                </div>
                <div class="ht-left">
                    <div><br></br>
                        <P align="center" style="font-size: 20px; font-weight:bold font-color:white">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $sub ?></p>
                        <br></br>
                        <P align="center" style="font-size: 20px; font-weight:bold font-color:white">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo"GOOD $salam"?>. HAVE A NICE DAY AND ENJOY</p>
                        <br></br>
                    </div>
                </div>
                <div class="ht-right">
                    <div>
                        <table><br></br>
                            <tr><td style="text-align: center;"><canvas id="canvas_tt5fe4219aee322" width="110" height="110"></canvas></td></tr>
                            <tr><td style="text-align: center; font-weight: bold"><a href="//24timezones.com/Jakarta/time" style="text-decoration: none" class="clock24" id="tz24-1608786330-c1108-eyJzaXplIjoiMTI1IiwiYmdjb2xvciI6IjAwMDAwMCIsImxhbmciOiJlbiIsInR5cGUiOiJhIiwiY2FudmFzX2lkIjoiY2FudmFzX3R0NWZlNDIxOWFlZTMyMiJ9" title="what time Jakarta" target="_blank" rel="nofollow">Time in Jakarta</a></td></tr>
                        </table>
                        <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <div class="input-group">
                            <button type="button"><i class="ti-search"></i>&emsp;What Do You Need ? We Have All In Here !&emsp;&emsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="user/wish_list/">
                                    <i class="icon_heart_alt"></i>
                                    <?php
                                        if (isset($_SESSION['status'])) {

                                            $wish_cek = mysqli_query($koneksi,"select * from wish_list where username='$user'");
                                            $number_wish = 0;
                                            while($chart = mysqli_fetch_array($wish_cek)){
                                                $number_wish++;
                                            }
                                    ?>
                                        <span><?php echo $number_wish ?></span>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <span>0</span>
                                    <?php
                                        }
                                    ?>

                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="user/chart/">
                                    <i class="icon_bag_alt"></i>
                                    <?php
                                        if ((isset($_SESSION['status']) && ($_SESSION['level']=="user"))) {

                                            $chart_cek = mysqli_query($koneksi,"select * from chart where username='$user'");
                                            $number_chart = 0;
                                            while($chart = mysqli_fetch_array($chart_cek)){
                                                $number_chart++;
                                            }
                                    ?>
                                        <span><?php echo $number_chart ?></span>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <span>0</span>
                                    <?php
                                        }
                                    ?>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            <?php
                                                if (isset($_SESSION['status'])) {

                                                    $chart_cek = mysqli_query($koneksi,"select * from chart where username='$user'");
                                                    $total_chart = 0;
                                                    while($chart = mysqli_fetch_array($chart_cek)){
                                                        $number_chart++;
                                                        $id_chart_detail = $chart['id_detail'];
                                                        $id_chart_barang = $chart['id_barang'];

                                                        $cek_chart_detail = mysqli_query($koneksi,"select * from detail_barang where id='$id_chart_detail'");

                                                        while ($row_detail_chart = mysqli_fetch_assoc($cek_chart_detail)){

                                                            $cek_chart_barang = mysqli_query($koneksi,"select * from barang_dagang where id_barang='$id_chart_barang'");

                                                            while($row_data_barang = mysqli_fetch_assoc($cek_chart_barang) ){

                                                                $total_chart = $total_chart + ($row_data_barang['harga']*$chart['jumlah']);
                                                ?>
                                                <tr>
                                                    <td class="si-pic"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row_data_barang['photo']).'" class="product-big-img">';?></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p><?php echo "Rp ". number_format($row_data_barang['harga'], 0, ".", "."). ""; echo" x "; echo $chart['jumlah'] ?></p>
                                                            <h6><?php echo $row_data_barang['nama_barang'] ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            <?php
                                                }}}}
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <?php
                                        if (isset($_SESSION['status'])){
                                        ?>
                                        <h5><?php echo "Rp ". number_format($total_chart, 0, ".", "."). ""?></h5>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <h5>Rp. 0</h5>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="select-button">
                                        <a href="user/chart/" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="user/checkout/" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <?php
                                if (isset($_SESSION['status'])){
                                ?>
                                    <li class="cart-price"><?php echo "Rp ". number_format($total_chart, 0, ".", "."). ""?></li>
                                <?php
                                }
                                else{
                                ?>
                                    <li class="cart-price">Rp. 0</li>
                                <?php
                                }
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Category</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="stationary.php">Stationary</a></li>
                            <li><a href="all_user/detail_product/food.php">Food</a></li>
                            <li><a href="all_user/detail_product/fashion.php">Fashion</a></li>
                            <li><a href="all_user/detail_product/electronic.php">Electronic</a></li>
                            <li><a href="all_user/detail_product/toys.php">Toys</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="all_user/detail_product/fashion.php">Fashion</a>
                            <ul class="dropdown">
                                <li><a href="all_user/detail_product/fashion.php">Man's</a></li>
                                <li><a href="all_user/detail_product/fashion.php">Woman's</a></li>
                                <li><a href="all_user/detail_product/fashion.php">Kid's</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="all_user/detail_product/food.php">Food</a>
                            <ul class="dropdown">
                                <li><a href="all_user/detail_product/food.php">Impor</a></li>
                                <li><a href="all_user/detail_product/food.php">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="all_user/detail_product/electronic.php">Electronic</a>
                            <ul class="dropdown">
                                <li><a href="all_user/detail_product/electronic.php">Handphone</a></li>
                                <li><a href="all_user/detail_product/electronic.php">Laptop</a></li>
                                <li><a href="all_user/detail_product/electronic.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="all_user/detail_product/stationary.php">Stationary</a>
                            <ul class="dropdown">
                                <li><a href="all_user/detail_product/stationary.php">Alat Tulis</a></li>
                                <li><a href="all_user/detail_product/stationary.php">Buku</a></li>
                                <li><a href="all_user/detail_product/stationary.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="all_user/detail_product/toys.php">Toys</a>
                            <ul class="dropdown">
                                <li><a href="all_user/detail_product/toys.php">Impor</a></li>
                                <li><a href="all_user/detail_product/toys.php">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <?php
                            if($level == "penjual"){                        
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="penjual/edit_profile/">Edit Profile</a></li>
                                    <li><a href="penjual/edit_toko/">Edit Toko</a></li>
                                    <li><a href="penjual/pesanan/">List Pesanan Masuk</a></li>
                                    <li><a href="penjual/daftar_barang/">Daftar Barang</a></li>
                                    <li><a href="all_user/forum/">Forum</a></li>
                                    <li><a href="penjual/chat_from/">Chat From Customer</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        elseif($level == "user"){
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="user/edit_profile/">Edit Profile</a></li>
                                    <li><a href="user/chart/">Shopping Cart</a></li>
                                    <li><a href="user/checkout/">Checkout</a></li>
                                    <li><a href="user/checkout/detail.php">Processing</a></li>
                                    <li><a href="all_user/forum/">Forum</a></li>
                                    <li><a href="user/chat_seller/">Chat With Seller</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        else{
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="register/">Register</a></li>
                                    <li><a href="login/">Login</a></li>
                                    <li><a href="all_user/forum/">Forum</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="assets/main/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Fashion</span>
                            <h1>Trendy</h1>
                            <p>A Style For Every Story. So Come On Buy A New Clothes, Bags, etc To Upgrade Your Looks</p>
                            <a href="all_user/detail_product/fashion.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>New <span>Upate</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/main/img/electrue.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Electronic</span>
                            <h1 style="color:white">Get The Best Perfomance</h1>
                            <p style="color:white">Update Your Handphone, Laptop, etc To Get A Best Experience In Your Activity. Go Buy A New One</p>
                            <a href="all_user/detail_product/electronic.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Original <span>Produt</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/main/img/alattulis.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Stationary</span>
                            <h1>Best Quality</h1>
                            <p>Go Buy Some Stationary, Books, etc To Make Your Work Better</p>
                            <a href="all_user/detail_product/stationary.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Best  <span>Quality</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/main/img/bagcround.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Toys</span>
                            <h1 style="color:white">Fun</h1>
                            <p style="color:white">Go Buy Some Toys In Our Website. Get The Best Quality and Original In Here</p>
                            <a href="all_user/detail_product/toys.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>New <span>Upate</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/main/img/food.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Food</span>
                            <h1 style="color:white">Best Choice</h1>
                            <p style="color:white">Go Buy Some Food In Our Website. Get The Best Quality and Original In Here</p>
                            <a href="all_user/detail_product/food.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Best <span>Choice</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="assets/main/img/bg-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>TK</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="assets/main/img/bg-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>42</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="assets/main/img/bg-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>05</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
    

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="assets/main/img/rtx.png">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>Nvidia RTX 3090 24 GB
                    <p>Tingkatkan Performa gaming mu dengan Nvidia RTX 3090 24GB<br /> Be the next Pro Player! </p>
                    <div class="product-price">
                            <s>Rp 40.0000.000</s> Rp 20.250.000
                        <span>/ Asus Nvidia RTX 3090 24GB</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>5</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Fashion</li>
                            <li>Food</li>
                            <li>Electronic</li>
                            <li>Stationary</li>
                            <li>Toys</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php

                        $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE kategori='fashion'");
                        while ($d = mysqli_fetch_array($data) ) {

                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">';?>
                                <div class="icon">
                                    <i class="icon_heart_alt"><a href="user/wish_list/proses.php?id=<?php echo $d['id_barang'] ?>"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $d['jenis']; ?></div>
                                <a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">
                                    <h5><?php echo $d['nama_barang']; ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo "Rp ". number_format($d['harga'], 0, ".", "."). "" ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/main/img/products/man-large.jpg">
                        <h2>Fashion</h2>
                        <a href="all_user/detail_product/fashion.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li>Fashion</li>
                            <li class="active">Food</li>
                            <li>Electronic</li>
                            <li>Stationary</li>
                            <li>Toys</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php

                        $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE kategori='food'");
                        while ($d = mysqli_fetch_array($data) ) {

                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">';?>
                                <div class="icon">
                                    <i class="icon_heart_alt"><a href="user/wish_list/proses.php?id=<?php echo $d['id_barang'] ?>"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $d['jenis']; ?></div>
                                <a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">
                                    <h5><?php echo $d['nama_barang']; ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo "Rp ". number_format($d['harga'], 0, ".", "."). "" ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/main/img/products/food.png">
                        <h2>Food</h2>
                        <a href="all_user/detail_product/food.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li>Fashion</li>
                            <li>Food</li>
                            <li class="active">Electronic</li>
                            <li>Stationary</li>
                            <li>Toys</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php

                        $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE kategori='electronic'");
                        while ($d = mysqli_fetch_array($data) ) {

                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">';?>
                                <div class="icon">
                                    <i class="icon_heart_alt"><a href="user/wish_list/proses.php?id=<?php echo $d['id_barang'] ?>"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $d['jenis']; ?></div>
                                <a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">
                                    <h5><?php echo $d['nama_barang']; ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo "Rp ". number_format($d['harga'], 0, ".", "."). "" ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/main/img/products/elektronik.png">
                        <h2>Electronic</h2>
                        <a href="all_user/detail_product/electronic.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li>Fashion</li>
                            <li>Food</li>
                            <li>Electronic</li>
                            <li class="active">Stationary</li>
                            <li>Toys</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php

                        $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE kategori='stationary'");
                        while ($d = mysqli_fetch_array($data) ) {

                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">';?>
                                <div class="icon">
                                    <i class="icon_heart_alt"><a href="user/wish_list/proses.php?id=<?php echo $d['id_barang'] ?>"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $d['jenis']; ?></div>
                                <a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">
                                    <h5><?php echo $d['nama_barang']; ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo "Rp ". number_format($d['harga'], 0, ".", "."). "" ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/main/img/products/alattulis.png">
                        <h2>Stationary</h2>
                        <a href="all_user/detail_product/stationary.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li>Fashion</li>
                            <li>Food</li>
                            <li>Electronic</li>
                            <li>Stationary</li>
                            <li class="active">Toys</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php

                        $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE kategori='toys'");
                        while ($d = mysqli_fetch_array($data) ) {

                    ?>
                        <div class="product-item">
                            <div class="pi-pic">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">';?>
                                <div class="icon">
                                    <i class="icon_heart_alt"><a href="user/wish_list/proses.php?id=<?php echo $d['id_barang'] ?>"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $d['jenis']; ?></div>
                                <a href="all_user/detail_product/index.php?id=<?php echo $d['id_barang'] ?>">
                                    <h5><?php echo $d['nama_barang']; ?></h5>
                                </a>
                                <div class="product-price">
                                    <?php echo "Rp ". number_format($d['harga'], 0, ".", "."). "" ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/main/img/products/toys.png">
                        <h2>Toys</h2>
                        <a href="all_user/detail_product/toys.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/main/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over Rp 0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/main/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/main/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                    <a href="index.php"><img src="assets/main/img/logonobackwhite.png" alt="" style="center"></a>
                        <img src="assets/main/img/logo-carousel/logo_kelas.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/main/img/logo-carousel/people_1.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">Damas Adiyato</p>
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">--1103184117</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/main/img/logo-carousel/people_2.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">Denda Rania R.K</p>
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">--1103184072--</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/main/img/logo-carousel/people_2.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">Dian Rezky W</p>
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">--1103184022--</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/main/img/logo-carousel/people_1.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">M. Naufal Nabil A</p>
                        <p align="center" style="font-size: 25px; font-weight:bold; color:white">--1103184062--</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">

Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by In The Box

                        </div>
                        <div class="payment-pic">
                            <img src="assets/main/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/main/js/jquery-3.3.1.min.js"></script>
    <script src="assets/main/js/bootstrap.min.js"></script>
    <script src="assets/main/js/jquery-ui.min.js"></script>
    <script src="assets/main/js/jquery.countdown.min.js"></script>
    <script src="assets/main/js/jquery.nice-select.min.js"></script>
    <script src="assets/main/js/jquery.zoom.min.js"></script>
    <script src="assets/main/js/jquery.dd.min.js"></script>
    <script src="assets/main/js/jquery.slicknav.js"></script>
    <script src="assets/main/js/owl.carousel.min.js"></script>
    <script src="assets/main/js/main.js"></script>
</body>

</html>