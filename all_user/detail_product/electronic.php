<?php

    require_once("../../koneksi.php");

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "suskses") {
            echo "<script>alert('Berhasil Menambah Barang Ke Chart Anda')</script>";
        }
        if ($_GET['pesan'] == "suskses2") {
            echo "<script>alert('Berhasil Mengupdate Barang Ke Chart Anda')</script>";
        }
        else if ($_GET['pesan'] == "gagal1") {
            echo "<script>alert('Login Terlebih Dahulu Untuk Menambah Barang Ke Chart Anda')</script>";
        }
        else if ($_GET['pesan'] == "gagal4") {
            echo "<script>alert('Login Sebagai User Untuk Menambah Wish List')</script>";
        }
        else if ($_GET['pesan'] == "gagal2") {
            echo "<script>alert('Gagal Menambah Barang Ke Chart Anda')</script>";
        }
        else if ($_GET['pesan'] == "gagal3") {
            echo "<script>alert('Gagal Menambah Barang Ke Chart Anda!')</script>";
        }

    }


    if(isset($_SESSION['status'])){
        $level = $_SESSION['level'];
    }
    else{
        $level = "null";
    }



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
    <link rel="stylesheet" href="../../assets/main/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/main/css/style.css" type="text/css">



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
                        <a href="../../index.php"><img src="../../assets/main/img/logo_web.png" alt=""></a>
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
                                <a href="../../user/wish_list/">
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
                                <a href="../../user/chart/">
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
                                        <a href="../../user/chart/" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="../../user/checkout/" class="primary-btn checkout-btn">CHECK OUT</a>
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
                            <li><a href="food.php">Food</a></li>
                            <li><a href="fashion.php">Fashion</a></li>
                            <li><a href="electronic.php">Electronic</a></li>
                            <li><a href="toys.php">Toys</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="fashion.php">Fashion</a>
                            <ul class="dropdown">
                                <li><a href="fashion.php">Man's</a></li>
                                <li><a href="fashion.php">Woman's</a></li>
                                <li><a href="fashion.php">Kid's</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="food.php">Food</a>
                            <ul class="dropdown">
                                <li><a href="food.php">Impor</a></li>
                                <li><a href="food.php">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="electronic.php">Electronic</a>
                            <ul class="dropdown">
                                <li><a href="electronic.php">Handphone</a></li>
                                <li><a href="electronic.php">Laptop</a></li>
                                <li><a href="electronic.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="stationary.php">Stationary</a>
                            <ul class="dropdown">
                                <li><a href="stationary.php">Alat Tulis</a></li>
                                <li><a href="stationary.php">Buku</a></li>
                                <li><a href="stationary.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="toys.php">Toys</a>
                            <ul class="dropdown">
                                <li><a href="toys.php">Impor</a></li>
                                <li><a href="toys.php">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <?php
                            if($level == "penjual"){
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="../../penjual/edit_profile/">Edit Profile</a></li>
                                    <li><a href="../../penjual/edit_toko/">Edit Toko</a></li>
                                    <li><a href="../../penjual/pesanan/">List Pesanan Masuk</a></li>
                                    <li><a href="../../penjual/daftar_barang/">Daftar Barang</a></li>
                                    <li><a href="../../all_user/forum/">Forum</a></li>
                                    <li><a href="../../penjual/chat_from/">Chat From Customer</a></li>
                                    <li><a href="../../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        elseif($level == "user"){
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="../../user/edit_profile/">Edit Profile</a></li>
                                    <li><a href="../../user/chart/">Shopping Cart</a></li>
                                    <li><a href="../../user/checkout/">Checkout</a></li>
                                    <li><a href="../../all_user/forum/">Forum</a></li>
                                    <li><a href="../../user/checkout/detail.php">Processing</a></li>
                                    <li><a href="../../user/chat_seller/">Chat With Seller</a></li>
                                    <li><a href="../../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        else{
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="../../register/">Register</a></li>
                                    <li><a href="../../login/">Login</a></li>
                                    <li><a href="../../all_user/forum/">Forum</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="../../"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <br></br>
                        <h5>Electronic</h5>
                        <br></br>
                        <ul class="filter-catagories">
                            <li><a href="electronic.php">Laptop</a></li>
                            <li><a href="electronic.php">Handphone</a></li>
                            <li><a href="electronic.php">Lainnya</a></li>
                        </ul>
                        <br></br>
                        <h5>Toys</h5>
                        <br></br>
                        <ul class="filter-catagories">
                            <li><a href="toys.php">Impor</a></li>
                            <li><a href="toys.php">Ekspor</a></li>
                        </ul>
                        <br></br>
                        <h5>Food</h5>
                        <br></br>
                        <ul class="filter-catagories">
                            <li><a href="food.php">Impor</a></li>
                            <li><a href="food.php">Ekspor</a></li>
                        </ul>
                        <br></br>
                        <h5>Stationary</h5>
                        <br></br>
                        <ul class="filter-catagories">
                            <li><a href="stationary.php">Alat Tulis</a></li>
                            <li><a href="stationary.php">Buku</a></li>
                            <li><a href="stationary.php">Lainnya</a></li>
                        </ul>
                        <br></br>
                        <h5>Fashion</h5>
                        <br></br>
                        <ul class="filter-catagories">
                            <li><a href="fashion.php">Women’s</a></li>
                            <li><a href="fashion.php">Man’s</a></li>
                            <li><a href="fashion.php">Kid’s</a></li>
                        </ul>
                        <br></br>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            <?php

                                $data = mysqli_query($koneksi,"SELECT * FROM barang_dagang");

                                while($row = mysqli_fetch_array($data)){
                                    if($row['kategori']=="electronic"){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" style="width: 200px;">';?>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="index.php?id=<?php echo $row['id_barang'] ?>"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="index.php?id=<?php echo $row['id_barang'] ?>">+ Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $row['jenis']; ?></div>
                                        <a href="index.php?id=<?php echo $row['id_barang'] ?>">
                                            <h5><?php echo $row['nama_barang']; ?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?php echo "Rp ". number_format($row['harga'], 0, ".", "."). "" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                    <a href="index.php"><img src="../../assets/main/img/logonobackwhite.png" alt="" style="center"></a>
                        <img src="../../assets/main/img/logo-carousel/logo_kelas.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../../assets/main/img/logo-carousel/people_1.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">Damas Adiyato</p>
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">--1103184117</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../../assets/main/img/logo-carousel/people_2.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">Denda Rania R.K</p>
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">--1103184072--</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../../assets/main/img/logo-carousel/people_2.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">Dian Rezky W</p>
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">--1103184022--</p>
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="../../assets/main/img/logo-carousel/people_1.png" alt="">
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">M. Naufal Nabil A</p>
                        <p align="center" style="font-size: 25px; font-weight:bold font-color:white">--1103184062--</p>
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
                            <img src="../../assets/main/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../../assets/main/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/main/js/bootstrap.min.js"></script>
    <script src="../../assets/main/js/jquery-ui.min.js"></script>
    <script src="../../assets/main/js/jquery.countdown.min.js"></script>
    <script src="../../assets/main/js/jquery.nice-select.min.js"></script>
    <script src="../../assets/main/js/jquery.zoom.min.js"></script>
    <script src="../../assets/main/js/jquery.dd.min.js"></script>
    <script src="../../assets/main/js/jquery.slicknav.js"></script>
    <script src="../../assets/main/js/owl.carousel.min.js"></script>
    <script src="../../assets/main/js/main.js"></script>


</body>
</html>
