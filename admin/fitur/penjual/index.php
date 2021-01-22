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
    <a class="active" href="../../">HOME</a>
    <a href="../user/">DAFTAR USER</a>
    <a href="../penjual/">DAFTAR SELLER</a>
    <a href="../request_user/">LIST REQUEST MENJADI SELLER</a>
    <a href="../verif_bayar/">LIST VERIFIKASI PEMBAYARAN</a>
    <a href="../../logout.php">LOGOUT</a>
  </div>
  </div>
  </div>
  <div class="tm-container">
    <div class="tm-text-white tm-page-header-container">
      <i class="fas fa-mug-hot fa-2x tm-page-icon"></i>
      <h1 class="tm-page-header">Daftar Penjual Website In The Box</h1>
    </div>
    <div class="tm-main-content">
      <div id="tm-intro-img" style="min-height: 0.0;"></div>

      <!-- Food Menu -->

      <section class="tm-section">
        <h2 class="tm-section-header"></h2>
        <div class="tm-responsive-table">
        <table>
            <tr class="tm-tr-header">
              <th>NO</th>
              <th>USERNAME</th>
              <th>NAMA</th>
              <th>EMAIL</th>
              <th>ALAMAT PRIBADI</th>
              <th>ALAMAT TOKO</th>
              <th>NO HP PRIBADI</th>
              <th>NO HP TOKO</th>
              <th> OPTION </th>
            </tr>
            <?php
            include '../../../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM penjual");

            $data = mysqli_query($koneksi, "SELECT user.username,user.nama, 
            user.email, user.alamat, user.telephone, penjual.nama_toko, penjual.alamat_toko, penjual.status,
            penjual.hp_toko FROM user INNER JOIN penjual ON user.username=penjual.username;");

            while ($d = mysqli_fetch_array($data)) {
              if ( ($d['status'] == "verified")  ) {
            ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['username']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['email']; ?></td>
                  <td><?php echo $d['alamat']; ?></td>
                  <td><?php echo $d['alamat_toko']; ?></td>
                  <td><?php echo $d['telephone']; ?></td>
                  <td><?php echo $d['hp_toko']; ?></td>
                  <td>
                    <form action="hapus_penjual.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $d['username']; ?>" class="form-control">
                      <input type="submit" name="hapus" value="RUBAH MENJADI USER"></input>
                    </form>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>
      </section>
      <hr />
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
    $(function() {
      // Adjust intro image height based on width.
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