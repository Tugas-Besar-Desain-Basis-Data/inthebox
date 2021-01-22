<?php

    require_once('../../koneksi.php');

    if((!isset($_SESSION['status'])) && ($_SESSION['level']!="user") ){

        header("location:../../.?pesan=gagal4");
    }
    if(isset($_SESSION['status'])){
        $user = $_SESSION['username'];
        $level = $_SESSION['level'];
        $sub ="WELCOME BACK $user TO IN THE BOX E-COMMERCE WEBSITE";
    }
    else{
        $sub ="WELCOME BACK TO IN THE BOX E-COMMERCE WEBSITE";
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

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");

    $data_user = mysqli_fetch_assoc($query);


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
                                <a href="#">
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
                                <a href="../chart/index.php">
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
                                                        <a href="hapus.php?id=<?php echo $chart['id_chart'] ?>"><i class="ti-close"></i></a>
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
                                        <a href="../chart/" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
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
                            <li class="active"><a href="../../all_user/detail_product/stationary.php">Stationary</a></li>
                            <li><a href="../../all_user/detail_product/food.php">Food</a></li>
                            <li><a href="../../all_user/detail_product/fashion.php">Fashion</a></li>
                            <li><a href="../../all_user/detail_product/electronic.php">Electronic</a></li>
                            <li><a href="../../all_user/detail_product/toys.php">Toys</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="../../all_user/detail_product/fashion.php">Fashion</a>
                            <ul class="dropdown">
                                <li><a href="../../all_user/detail_product/fashion.php">Man's</a></li>
                                <li><a href="../../all_user/detail_product/fashion.php">Woman's</a></li>
                                <li><a href="../../all_user/detail_product/fashion.php">Kid's</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="../../all_user/detail_product/food.php">Food</a>
                            <ul class="dropdown">
                                <li><a href="../../all_user/detail_product/food.php">Impor</a></li>
                                <li><a href="../../all_user/detail_product/food.php">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="../../all_user/detail_product/electronic.php">Electronic</a>
                            <ul class="dropdown">
                                <li><a href="../../all_user/detail_product/electronic.php">Handphone</a></li>
                                <li><a href="../../all_user/detail_product/electronic.php">Laptop</a></li>
                                <li><a href="../../all_user/detail_product/electronic.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="../../all_user/detail_product/stationary.php">Stationary</a>
                            <ul class="dropdown">
                                <li><a href="../../all_user/detail_product/stationary.php">Alat Tulis</a></li>
                                <li><a href="../../all_user/detail_product/stationary.php">Buku</a></li>
                                <li><a href="../../all_user/detail_product/stationary.php">Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="../../all_user/detail_product/toys.php">Toys</a>
                            <ul class="dropdown">
                                <li><a href="../../all_user/detail_product/toys.php">Impor</a></li>
                                <li><a href="../../all_user/detail_product/">Expore</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <?php

                        if($level == "user"){
                        ?>
                            <li class="active"><a href="#">Profile</a>
                                <ul class="dropdown">
                                    <li><a href="../user/edit_profile/">Edit Profile</a></li>
                                    <li><a href="index.php">Shopping Cart</a></li>
                                    <li><a href="../user/checkout/">Checkout</a></li>
                                    <li><a href="../../all_user/forum/">Forum</a></li>
                                    <li><a href="detail.php">Processing</a></li>
                                    <li><a href="../user/chat_seller/">Chat With Seller</a></li>
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
                    <div class="breadcrumb-text product-more">
                        <a href="../../"><i class="fa fa-home"></i> Home</a>
                        <a href="../../all_user/detail_product/all_list.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="proses.php" method="POST" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Biiling Details</h4>
                        <p>Jika Kamu Ingin Merubah Data Dibawah Ini, Lakukan Edit Data Pada Menu Edit Profile</p>
                        <br></br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Name<span>*</span></label>
                                <input type="text" id="fir" name="nama" disabled value="<?php echo $data_user['nama']?>" required="required">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="street" class="street-first" disabled value="<?php echo $data_user['alamat']?>" required="required">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email" disabled value="<?php echo $data_user['email']?>" required="required">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone" disabled value="<?php echo $data_user['telephone']?>" required="required">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Payment Method<span>*</span></label>
                                <select name="metode" class="col-lg-12" required="required">
                                    <option value="indomaret">Indomaret</option>
                                    <option value="alfamart">Alfamart</option>
                                    <option value="mandiri">ATM Mandiri</option>
                                    <option value="bni">ATM BNI</option>
                                    <option value="bca">ATM BCA</option>
                                    <option value="bri">ATM BRI</option>
                                </select>
                            </div>
                            <div class="col-lg-12"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php

                                        $chart_cek = mysqli_query($koneksi,"select * from chart where username='$user'");
                                        $total_chart = 0;
                                        $jumlah_check =0;
                                        while($chart = mysqli_fetch_array($chart_cek)){
                                            $number_chart++;
                                            $id_chart_detail = $chart['id_detail'];
                                            $id_chart_barang = $chart['id_barang'];
                                            $jumlah_barang = $chart['jumlah'];
                                            $jumlah_check++;
                                            ?>

                                            <?php

                                            $cek_chart_detail = mysqli_query($koneksi,"select * from detail_barang where id='$id_chart_detail'");

                                            while ($row_detail_chart = mysqli_fetch_assoc($cek_chart_detail)){

                                                $cek_chart_barang = mysqli_query($koneksi,"select * from barang_dagang where id_barang='$id_chart_barang'");

                                                while($row_data_barang = mysqli_fetch_assoc($cek_chart_barang) ){

                                                    $total_chart = $total_chart + ($row_data_barang['harga']*$chart['jumlah']);
                                                    $total_barang = $row_data_barang['harga']*$chart['jumlah'];
                                    ?>
                                    <li class="fw-normal"><?php echo $row_data_barang['nama_barang'] ?> x <?php echo $chart['jumlah'] ?> <span><?php echo "Rp ". number_format($total_barang, 0, ".", "."). "" ?></span></li>
                                    <?php
                                        }}}
                                    ?>
                                    <li class="fw-normal">Subtotal <span><?php echo "Rp ". number_format($total_chart, 0, ".", "."). "" ?></span></li>
                                    <li class="total-price">Total <span><?php echo "Rp ". number_format($total_chart, 0, ".", "."). "" ?></span></li>

                                </ul>
                                <div class="order-btn">
                                    <input type="hidden" name="id[]" value="<?php echo $jumlah_check ?>">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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