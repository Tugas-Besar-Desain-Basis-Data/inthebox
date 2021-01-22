<?php

  require_once('../../koneksi.php');
  $username = $_SESSION['username'];

  $get_name = mysqli_fetch_assoc($koneksi->query("SELECT * FROM penjual WHERE username = '$username'"));

  $nama_toko = $get_name['nama_toko']



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #808080;
      color: white;
    }
  </style>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>In The Box</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet" />
  <link href="fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="css/tooplate-chilling-cafe.css" rel="stylesheet" />
</head>

<body>
  <div class="topnav">
  <a class="active" href="../../">Home</a>
  <a href="../chat_from/">Chat From Customer</a>
  <a href="../pesanan/">List Pesanan Masuk</a>
  <a href="../../all_user/forum/">Forum</a>
  <a href="../edit_profile/">Edit Profile</a>
  <a href="../edit_toko/">Edit Toko</a>
  <a href="../../logout.php">Logout</a>
  </div>
  </div>
  </div>
  <div class="tm-container">
    <div class="tm-text-white tm-page-header-container">
      <i class="fas fa-mug-hot fa-2x tm-page-icon"></i>
      <h1 class="tm-page-header">Daftar Pesanan User Pada Toko  </h1>
    </div>
    <div class="tm-main-content">
      <div id="tm-intro-img" style="min-height: 0.0;"></div>

      <!-- Food Menu -->

      <section class="tm-section">
        <h2 class="tm-section-header"></h2>
        <div class="tm-responsive-table">
          <table border="1">
            <tr class="tm-tr-header">
              <th>NO</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>NO HP</th>
              <th>NO RESI</th>
              <th>NAMA BARANG</th>
              <th>JUMLAH</th>
              <th>TOTAL BAYAR</th>
              <th> OPTION </th>
            </tr>
            <?php

            $no = 1;
            /*$data2 = mysqli_query($koneksi, "SELECT user.username,user.nama,
            penjual.nama_toko, request_checkout.resi, request_checkout.status_user,
            penjual.hp_toko FROM request_checkout INNER JOIN user ON user.username=request_checkout.username;");

            $get = mysqli_fetch_assoc($data2);*/


            $data = mysqli_query($koneksi, "SELECT user.username,user.nama, request_checkout.status,
            request_checkout.resi, request_checkout.status_user,  request_checkout.id_checkout
            FROM request_checkout INNER JOIN user ON user.username=request_checkout.username;");

            $total = 0;
            while ($d = mysqli_fetch_array($data)) {
              if ( ($d['status'] == "verified")  ) {


                $id_checkout = $d['id_checkout'];

                $check = mysqli_query($koneksi, "SELECT * FROM co_user WHERE id='$id_checkout'");

                while($get = mysqli_fetch_array($check)){

                  $id_check = $get['id_barang'];

                  $get_nama_user = $get['username'];

                  $check_nama = mysqli_fetch_assoc($koneksi->query("SELECT * FROM user WHERE username = '$get_nama_user'"));

                  $nama = $check_nama['nama'];
                  $alamat = $check_nama['alamat'];
                  $hp = $check_nama['telephone'];


                  $check_detail = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE id_barang='$id_check'");

                  while($get_detail = mysqli_fetch_array($check_detail)){

                    $get_user = $get_detail['username'];
                    $total = (($get_detail['harga'])*($get['jumlah']));


                    if($get_user == $username){

            ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $nama ?></td>
                  <td><?php echo $alamat ?></td>
                  <td><?php echo $hp ?></td>
                  <td><?php echo $d['resi']; ?></td>
                  <td><?php echo $get_detail['nama_barang']; ?></td>
                  <td><?php echo $get['jumlah']; ?></td>
                  <td><?php echo "Rp ". number_format($total, 0, ".", "."). "" ?></td>
                  <td>
                    <form action="ubah_status.php" method="post">
                      <input type="hidden" name="resi" value="<?php echo $d['resi']; ?>" class="form-control">
                      <input type="hidden" name="id" value="<?php echo $get['id']; ?>" class="form-control">
                      <?php
                        if($get['status_barang']=="Sedang Dikemas"){
                        ?>
                        <input type="submit" name="change" value="KIRIM BARANG"></input>
                      <?php
                        }
                        else if($get['status_barang']=="Proses Pengiriman") {
                        ?>
                          <input type="submit" disabled value="MENUNGGU VERIFIKASI USER"></input>
                        <?php
                        }
                        else{
                          ?>
                            <input type="submit" disabled value="PESANAN TELAH SELESAI"></input>
                          <?php
                          }
                        ?>
                    </form>
                  </td>
                </tr>
            <?php
              }}}}}
            ?>
          </table>
          <table border="1">
              <tr>
                <?php

                    $total_pendapatan = 0;

                    $check_info = mysqli_query($koneksi, "SELECT * FROM result_penjual WHERE username='$username'");

                    while($info = mysqli_fetch_array($check_info)){

                      $pendapatan = $info['penghasilan'];
                      $total_pendapatan = $total_pendapatan + $pendapatan;
                    }

                ?>
                <td colspan="9">TOTAL PENDAPATAN DARI HASIL PENJUALAN MU ADALAH : <?php echo "Rp ". number_format($total_pendapatan, 0, ".", "."). "" ?></td>
              </tr>
          </table>
        </div>
      </section>
      <hr />
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
    $(function() {
      $(window).resize(function() {
        var img = $("#tm-intro-img");
        var imgWidth = img.width();

        // 640x425 ratio
        var imgHeight = (imgWidth * 425) / 640;

        if (imgHeight < 300) {
          imgHeight = 300;
        }

        img.css("min-height", imgHeight + "px");
      });
    });
  </script>
</body>

</html>