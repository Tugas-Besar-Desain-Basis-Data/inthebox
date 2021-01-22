<?php

    require_once("../../../koneksi.php");

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
    <title>Forum In The Box</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/editor.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"> </head>

<body>
     <!-- ==========header mega navbar=======-->
     <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="../../../index.php"><img src="../assets/image/logoo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../../index.php">Home</a></li>
                        <li><a href="../">Forum</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category Item <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../../detail_product/fashion.php">Fashion</a></li>
                                <li><a href="../../detail_product/food.php">Food</a></li>
                                <li><a href="../../detail_product/toys.php">Toys</a></li>
                                <li><a href="../../detail_product/stationary.php">Stationary</a></li>
                                <li><a href="../../detail_product/electronic.php">Electronic</a></li>
                            </ul>
                        </li>
                        <?php
                            if((isset($_SESSION['status'])) && (isset($_SESSION['level'])=="user")){
                        ?>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../../../user/edit_profile/" >Edit Profile </a></li>
                                <li><a href="../../../user/cart/" >Shopping Cart </a></li>
                                <li><a href="../../../user/wish_list/" >Wish List </a></li>
                                <li><a href="../../../user/checkout/detail.php">Processing </a></li>
                                <li><a href="../../../user/checkout/">Checkout</a></li>
                                <li><a href="../../../user/chat_seller/" >Chat With Seller</a></li>
                                <li><a href="../../../logout.php" >Logout </a></li>
                            </ul>
                        </li>
                        <?php
                        }
                        else if(isset(($_SESSION['status'])) && (isset($_SESSION['level'])=="penjual")){
                        ?>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../../../penjual/edit_profile/">Edit Profile </a></li>
                                <li><a href="../../../penjual/edit_toko/">Edit Toko</a></li>
                                <li><a href="../../../penjual/pesanan">Pesanan Masuk </a></li>
                                <li><a href="../../../penjual/chat_from/">Chat From User</a></li>
                                <li><a href="../../../logout.php" >Logout </a></li>
                                <li><a href="../../../penjual/daftar_barang/">Daftar Barang</a></li>
                                <li><a href="../index.php">Forum</a></li>
                                <li><a href="../../../logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                        }
                        else if(isset(($_SESSION['status'])) && (isset($_SESSION['level'])=="penjual")){
                        ?>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="../../../penjual/edit_profile/" >Edit Profile </a></li>
                                <li><a href="../../../penjual/pesanan">Pesanan Masuk </a></li>
                                <li><a href="../../../penjual/chat_from/" >Chat From User</a></li>
                                <li><a href="../../../logout.php">Logout </a></li>
                            </ul>
                        </li>
                        <?php
                        }
                        else{
                        ?>
                        <li><a href="../../../login/" >Login </a></li>
                        <?php
                        }
                        ?>
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
                <h3>Make New Forum</h3>
                <ol class="breadcrumb breadcrumb839">
                    <li><a href="../">Forum</a></li>
                    <li class="active">Make New Forum</li>
                </ol>
            </div>
        </section>
            <section class="main-content920">
                <div class="container">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="ask-question-input-part032">
                            <h4>Make New Forum</h4>
                        <hr>
                        <form method="POST" action="proses.php">
                            <div class="username-part940">
                                <input type="hidden" name="username" class="username029" value="<?php echo $user ?>">  
                            </div>
                            <div class="question-title39">
                                <span class="form-description433">Forum Title * </span>
                                <input type="text" name="judul" class="question-ttile32" placeholder="Write Your Forum Title">
                            </div>
                            <div class="details2-239">
                                <div class="col-md-12 nopadding">
                                    <textarea name="content" rows="10" cols="106" placeholder="Enter Your Content"></textarea>
                                </div>
                            </div>	
                            <div class="publish-button2389">
                                <button type="submit" name="submit" class="publis1291">Publish Your New Forum</button>
                            </div>
                        </form>
                </div>
              
                </div>
<!--                end of col-md-9 -->
           
             <!--strart col-md-3 (side bar)-->
             <aside class="col-md-3 sidebar97239">
                    <!--        start recent post  -->
                    <div class="recent-post3290">
                        <h4>Recent Post</h4>
                        <?php
                            $get_data = "SELECT * FROM forum ORDER BY waktu desc";
                            $data_forum = $koneksi->query($get_data);

                            $get_time = "SELECT * FROM forum ORDER BY tanggal asc";
                            $data_time = $koneksi->query($get_data);

                            while (($row = mysqli_fetch_array($data_forum)) && ($rows = mysqli_fetch_array($data_time)) ){

                                    $usrname = $row['username'];
                                    $an_id = $row['forum_id'];
                                    $tanggal_forum = $row['tanggal'];
                                    $waktu_forum = $row['waktu'];
                                    $judul_forum = $row['judul'];
                                    $content_forum = $row['content'];

                                    $nama = mysqli_fetch_assoc($koneksi->query("SELECT * FROM user WHERE username = '$usrname'"));

                                    if(!empty($row)){
                                        $real_name  = $nama['nama'];
                                        $level      = $nama['level'];
                                    }

                                    $get_ans = "SELECT * FROM comment where forum_id ='$an_id'";
                                    $result_ans = $koneksi->query($get_ans);
                                    $count_ans = 0;
                                        
                                    while($answer_count = mysqli_fetch_assoc($result_ans)){
                    
                                        $count_ans++;
                                    }
                                ?>
                            <div class="post-details021">
                                <a href="ans_forum/index.php?id=<?php echo $row['forum_id'] ?>"><h5><?php echo $judul_forum ?></h5></a>
                                <p><?php echo $content_forum ?></p> <small style="color: #848991"><?php echo $tanggal_forum; echo $waktu_forum; ?></small> </div>
                        <hr>
                        <?php
                            }
                                
                        ?>
                    <!--       end recent post    -->
                </aside>
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
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/editor.js"></script>
  
</body>

</html>