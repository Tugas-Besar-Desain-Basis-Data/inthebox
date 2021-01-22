<?php

    require_once("../../koneksi.php");

    if((isset($_SESSION['status']))){
        $user = $_SESSION['username'];
    }

    $resi = $_GET['resi'];
    $username = $_SESSION['username'];

    

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
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css">
     </head>

<body>
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
                        <li><a href="../../all_user/forum/">Forum</a></li>
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
                                <li><a href="../user/edit_profile/" >Edit Profile </a></li>
                                <li><a href="../user/cart/" >Shopping Cart </a></li>
                                <li><a href="../user/wish_list/" >Wish List </a></li>
                                <li><a href="../user/checkout/detail.php">Processing </a></li>
                                <li><a href="../user/checkout/">Checkout</a></li>
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
    <section class="header-descriptin329">
        <div class="container">
            <h3 align="center">Review Barang Pesanan Oleh <?php echo $username ?></h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Review Barang</a></li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM co_user WHERE resi='$resi'");

                    $penghasilan = 0;
                    $total = 0;
                    $a=0;

                    $query_stat = mysqli_query($koneksi, "SELECT * FROM result_penjual WHERE resi='$resi'");


                            $query = mysqli_query($koneksi, "SELECT * FROM co_user WHERE resi='$resi'");

                            while(($get_data = mysqli_fetch_array($query)) && $get_stat = mysqli_fetch_array($query_stat)){

                                    if($get_stat['status']=="pending"){



                            $id_barang = $get_data['id_barang'];

                            $id_detail = $get_data['id_detail'];

                            $query_barang = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE id_barang='$id_barang'");

                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_barang WHERE id='$id_detail'");

                            $get_barang = mysqli_fetch_assoc($query_barang);

                            while($get_detail = mysqli_fetch_array($query_detail)){

                            $total = ($get_barang['harga']*$get_data['jumlah']);

                            if(($get_detail['varian_satu']!=null) || ($get_detail['varian_dua']!=null) || ($get_detail['varian_tiga']!=null)){

                                $varian_satu = $get_detail['varian_satu'];
                                $varian_dua = $get_detail['varian_dua'];
                                $varian_tiga = $get_detail['varian_tiga'];
                            }}
                            $a++;
                ?>
                    <div class="post-details">
                        <div class="details-header923">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="post-title-left129">
                                        <h2><?php echo $get_barang['nama_barang'] ?></h2>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-que-rep-rihght320"><a class="r-clor10"><?php echo $get_barang['nama_toko'] ?> </a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-details-info1982">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($get_barang['photo']).'" style="width: 200px;">';?>
                        <br></br>
                            <p><?php echo $get_barang['nama_toko'] ?> || <?php echo $get_barang['username'] ?></p>
                            <br></br>
                            <p><?php echo $get_barang['detail_barang'] ?></p>
                            <hr>
                            <div class="post-footer29032"><p>
                                <div class="l-side2023">
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo $varian_satu ?></i>
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo $varian_dua ?></i>
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo $varian_tiga ?></i>
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo $get_data['jumlah'] ?></i>
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo "Rp ". number_format($get_barang['harga'], 0, ".", "."). "" ?></i>
                                    <i class="fa fa-clock-o clock2" aria-hidden="true">&emsp;<?php echo "Rp ". number_format($total, 0, ".", "."). "" ?></i>

                            </div>
                        </div>
                    </div>
                    </span></div>
                    <div class="related3948-question-part"></div>
                    <div class="comment289-box">
                        <h3>Leave A Reply</h3>
                        <hr>
                        <div class="row">
                    <form method="POST" action="proses.php">
                            <div class="col-md-12 nopadding">
                                <textarea name="content" rows="5" cols="116" placeholder="Enter Your Comment"></textarea>
                                <div class="publish-button2389">
                                <input type="hidden" name="total_get" value="<?php echo $total?>">
                                <input type="hidden" name="counter" value="<?php echo $a ?>">
                                <input type="hidden" name="resi" value="<?php echo $resi ?>">
                                <input type="hidden" name="id" value="<?php echo $get_barang['id_barang'] ?>">
                                <button type="submit" name="submit" class="publis1291">Publish Your Comment</button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                    <div class="related3948-question-part"></div>
                    <?php
                        }
                    }
                    $b=0;
                    if($a==$b){
                            ?>
                    <div class="post-details">
                        <div   div class="details-header923">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="post-title-left129">
                                        <h2>ANDA SUDAH ME-REVIEW SEMUA BARANG. TERIMAKASIH</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-details-info1982">
                            <hr>
                            <div class="post-footer29032"><p>
                                <div class="l-side2023">
                            </div>
                        </div>
                    </div>
                    <?php

                    }
                    ?>

                </div>
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
                <div class="col-md-6"></div>
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