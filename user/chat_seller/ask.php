<?php

    require_once("../../koneksi.php");

    if((!isset($_SESSION['status'])) || ($_SESSION['level']!="user") ){
        echo "
        <script>
        alert('Anda Tidak Memiliki Akses Ini');
        document.location.href='../../';
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

    $id= $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang_dagang where id_barang='$id'");

    $get_detail = mysqli_fetch_assoc($query);
    

    


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
                    <a class="navbar-brand" href="../../index.php"><img src="../assets/image/logoo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../all_user/">Forum</a></li>
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
                                <li><a href="../edit_profile/" >Edit Profile </a></li>
                                <li><a href="../cart/" >Shopping Cart </a></li>
                                <li><a href="../wish_list/" >Wish List </a></li>
                                <li><a href="../checkout/detail.php">Processing </a></li>
                                <li><a href="../checkout/">Checkout</a></li>
                                <li><a href="../chat_seller/" >Chat With Seller</a></li>
                                <li><a href="../../logout.php" >Logout </a></li>
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
                <h2>Welcome To Forum Website E-Commerce In The Box</h2>
                <p>You Can Enjoy, Connect And Know Another User In This Website From This Forum. You Can Also Disscuss About Anything</p>
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
    
        <section class="header-descriptin329">
            <div class="container">
                <h3>ASK TO SELLER</h3>
                <ol class="breadcrumb breadcrumb839">
                    <li><a href="../../">HOME</a></li>
                    <li class="active">ASK TO SELLER</li>
                </ol>
            </div>
        </section>
            <section class="main-content920">
                <div class="container">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="ask-question-input-part032">
                            <h4>Make New Question</h4>
                        <hr>
                        <form method="POST" action="proses.php">
                            <div class="email-part320">
                                <span class="form-description433">Nama Barang</span>
                                &emsp;<input type="text" disabled name="username" class="username029" value="<?php echo $get_detail['nama_barang'] ?>">
                            </div>
                            <div class="question-title39">
                                <span class="form-description433">Nama Toko</span>
                                &emsp;&emsp;<input type="text" disabled name="judul" class="username029" placeholder="<?php echo $get_detail['nama_toko'] ?>">
                            </div>
                            <div class="details2-239">
                                <div class="col-md-12 nopadding">
                                    <input type="hidden" name="id" class="username029" value="<?php echo $id ?>">
                                    <textarea name="content" rows="10" cols="106" placeholder="Enter Your Content"></textarea>
                                </div>
                            </div>	
                            <div class="publish-button2389">
                                <button type="submit" name="submit" class="publis1291">Ask Seller Now</button>
                            </div>
                        </form>
                </div>
                </div>
<!--                end of col-md-9 -->
            </div>
        </div>
    </section>
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