<?php

    require_once("../../../koneksi.php");

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<script>alert('Gagal Membuat Comment Baru $koneksi->error')</script>";
        } 
        else if ($_GET['pesan'] == "sukses") {
            echo "<script>alert('Berhasil Membuat Comment Baru')</script>";
        }
    }

   

    if((isset($_SESSION['status']))){
        $user = $_SESSION['username'];
    }

    $id = $_GET['id'];

    $query = "SELECT * FROM forum WHERE forum_id='$id' ";
    
    $question = $koneksi->query($query);
    
    $row = mysqli_fetch_assoc($question);
    $username_komunitas = $row['username'];
    
    $table_user = mysqli_query($koneksi, "SELECT * FROM user where username = '$username_komunitas'");

    $cek = mysqli_num_rows($table_user);

    if($cek>0){

        $fetch  = mysqli_fetch_assoc($table_user);
        $nama   = $fetch['nama'];
        $level  = $fetch['level'];
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
                        else{
                        ?>
                        <li><a href="../../../login/">Login </a></li>
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
    <section class="header-descriptin329">
        <div class="container">
            <h3><?php echo $row['judul'] ?></h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="../">Forum</a></li>
                <li class="active"><?php echo $row['judul'] ?></li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="post-details">
                        <div class="details-header923">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="post-title-left129">
                                        <h3><?php echo $row['judul'] ?></h3> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-que-rep-rihght320"><a class="r-clor10"><?php echo $nama ?> </a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-details-info1982">
                            <p><?php echo $row['content'] ?></p>
                            <hr>
                            <div class="post-footer29032">
                                <div class="l-side2023"><i class="fa fa-clock-o clock2" aria-hidden="true"> <?php echo $row['waktu'] ?></i><i class="fa fa-clock-o clock2" aria-hidden="true"> <?php echo $row['tanggal'] ?></i><i class="fa fa-commenting commenting2" aria-hidden="true">&emsp;<?php echo $row['counter'] ?></i>
                            </div>
                        </div>
                    </div>
                </span></div>
                    <div class="related3948-question-part"></div>

                    <div class="comment-list12993">
                        <div class="container">
                            <div class="row">
                            <?php
                                $query_comment = "SELECT * FROM comment WHERE forum_id = '$id' ORDER BY waktu asc";
                                $query_comments = "SELECT * FROM comment WHERE forum_id = '$id' ORDER BY tanggal desc";

                                $kondisi2 = $koneksi->query($query_comments);
                                        
                                $kondisi1 = $koneksi->query($query_comment);
                                
                                $i = 0;
                                $a=0;

                                while ( ($answer = mysqli_fetch_array($kondisi1)) && ($get_answer = mysqli_fetch_array($kondisi2))  ){

                                    $i++;
                                    
                                    //$answer = mysqli_fetch_assoc($answers);
                                
                                    if( (!empty($answer)) && (!empty($get_answer)) ){ 
                                
                                        $usrname = $answer['username'];
                                        
                                        $nama = mysqli_fetch_assoc($koneksi->query("SELECT * FROM user WHERE username = '$usrname'"));
                                        
                                        $real_name  = $nama['nama'];
                                        $level      = $fetch['level'];
                                        
                            ?>
                                <div class="comments-container">
                                    <ul id="comments-list" class="comments-list">
                                        <li>
                                            <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="../assets/image/images.png" alt=""></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><?php echo $real_name ?></h6><span><i class="fa fa-clock-o" aria-hidden="true"><?php  echo" "; echo $answer['tanggal']; echo", "; echo $answer['waktu'];?></i></span></div>
                                                    <div class="comment-content"><?php echo $answer['content'] ?></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                                }
                            }
                                if($a==$i){
                            ?>
                                <div class="comments-container">
                                    <ul id="comments-list" class="comments-list">
                                        <li>
                                            <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="../assets/image/images.png" alt=""></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                    <div class="comment-content">Belum Ada Comment</div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="related3948-question-part"></div>
                    <hr>
                    <?php
                        if(isset($_SESSION['status'])){
                    ?>
                    <div class="comment289-box">
                        <h3>Leave A Reply</h3>
                        <hr>
                        <div class="row">
                        <form method="POST" action="proses.php"> 
                            <div class="col-md-12 nopadding">
                                <input type="hidden" name="counter" class="username029" value="<?php echo $row['counter'] ?>">
                                <input type="hidden" name="username" class="username029" value="<?php echo $username_komunitas ?>">
                                <input type="hidden" name="id" class="username029" value="<?php echo $id ?>">
                                <textarea name="content" rows="5" cols="116" placeholder="Enter Your Comment"></textarea>
                            </div>
                            <div class="publish-button2389">
                                <button type="submit" name="submit" class="publis1291">Publish Your Comment</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
                            $data_time = $koneksi->query($get_time);

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
                        <div class="post-details021"><h5><?php echo $judul_forum ?></h5></a>
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