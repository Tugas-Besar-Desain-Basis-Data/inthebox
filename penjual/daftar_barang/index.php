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
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="assets/css/tooplate-chilling-cafe.css" rel="stylesheet" />

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

    <div class="tm-container">
      <div class="tm-main-content">
        
      </div>
  </div>
    <div class="tm-container">
      <div class="tm-text-white tm-page-header-container">
        <i class="fas fa-mug-hot fa-2x tm-page-icon"></i>
        <h1 class="tm-page-header">Daftar Barang Jualan Toko <?php echo $nama_toko?></h1>
      </div>
      <div class="tm-main-content"> 
        <div id="tm-intro-img"></div>
        
          <section class="tm-section">
            <h2 class="tm-section-header">FASHION</h2>
            <div class="tm-responsive-table">
            <table border="1">
              <tr class="tm-tr-header">
                <th> NO </th>
                <th> NAMA </th>
                <th> DETAIL </th>
                <th> UKURAN </th>
                <th> WARNA </th>
                <th> MOTIF </th>
                <th> STOK </th>
                <th> HARGA </th>
                <th> KATEGORI </th>
                <th> PHOTO </th>
                <th> OPTION </th>
              </tr>
              <?php

                $no=1;

                $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE username='$username'");

                $get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM barang_dagang WHERE username = '$username'"));
                //$id_one = $get_id['id_barang'];

                //$get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM detail_barang WHERE id_barang = '$id_one'"));

                
                while ($d = mysqli_fetch_array($data) ) {
                  if(($d['kategori'] == "fashion") ) {

                    $id_one = $d['id_barang'];
                    $image=$d['photo'];

                    $datas3 = mysqli_query($koneksi, "SELECT varian_tiga FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas2 = mysqli_query($koneksi, "SELECT varian_dua FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas1 = mysqli_query($koneksi, "SELECT varian_satu FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas = mysqli_query($koneksi, "SELECT * FROM detail_barang  WHERE id_barang = '$id_one'");
		            ?>
              <tr>
                <td><?php echo $no++; ?></>
                <td><?php echo $d['nama_barang']; ?></td>
				        <td><?php echo $d['detail_barang']; ?></td>
                <td>
                <?php
                  
                  while($ds = mysqli_fetch_array($datas1)){ 
                    if(($ds['varian_satu'] != "") ) {
                      
                ?>
                  <li><?php echo $ds['varian_satu']; }}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas2)){ 
                  if(($ds['varian_dua'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_dua'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas3)){
                  if(($ds['varian_tiga'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_tiga'];}} ?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas)){
                ?>
                  <li><?php echo $ds['stok'];} ?></li>
                </td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <?php
                  echo '
                  <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">
                  </td>';
                ?>
                <td>
                  <a href="edit_barang/index_fashion.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="EDIT DATA BARANG KATEGORI FASHION"></input></a>
                  <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="HAPUS DATA BARANG KATEGORI FASHION"></input></a>
                </td>
                </tr>
              <?php
                  }}
                ?>
            </table>
            <table border="1">
              <tr>
                <td colspan="12">
                  <a href="tambah_barang/fashion/inputan.php"></input><input type="submit" value="TAMBAH DATA BARANG KATEGORI FASHION"></a>
                </td>
              </tr>
            </table>
            
          </div>
        </section>

        <section class="tm-section">
            <h2 class="tm-section-header">FOOD</h2>
            <div class="tm-responsive-table">
            <table border="1">
              <tr class="tm-tr-header">
                <th> NO </th>
                <th> NAMA </th>
                <th> DETAIL </th>
                <th> RASA </th>
                <th> JENIS </th>
                <th> BERAT </th>
                <th> STOK </th>
                <th> HARGA </th>
                <th> KATEGORI </th>
                <th> PHOTO </th>
                <th> OPTION </th>
              </tr>
              <?php

                $no=1;

                $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE username='$username'");

                $get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM barang_dagang WHERE username = '$username'"));
                //$id_one = $get_id['id_barang'];

                //$get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM detail_barang WHERE id_barang = '$id_one'"));

                
                while ($d = mysqli_fetch_array($data) ) {
                  if(($d['kategori'] == "food") ) {

                    $id_one = $d['id_barang'];
                    $image=$d['photo'];

                    $datas3 = mysqli_query($koneksi, "SELECT varian_tiga FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas2 = mysqli_query($koneksi, "SELECT varian_dua FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas1 = mysqli_query($koneksi, "SELECT varian_satu FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas = mysqli_query($koneksi, "SELECT * FROM detail_barang  WHERE id_barang = '$id_one'");
		            ?>
              <tr>
                <td><?php echo $no++; ?></>
                <td><?php echo $d['nama_barang']; ?></td>
				        <td><?php echo $d['detail_barang']; ?></td>
                <td>
                <?php
                  
                  while($ds = mysqli_fetch_array($datas1)){ 
                    if(($ds['varian_satu'] != "") ) {
                      
                ?>
                  <li><?php echo $ds['varian_satu']; }}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas2)){ 
                  if(($ds['varian_dua'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_dua'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas3)){ 
                  if(($ds['varian_tiga'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_tiga'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas)){
                ?>
                  <li><?php echo $ds['stok'];} ?></li>
                </td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <?php
                  echo '
                  <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">
                  </td>';
                ?>
              <td>
                  <a href="edit_barang/index_food.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="EDIT DATA BARANG KATEGORI FOOD"></input></a>
                  <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="HAPUS DATA BARANG KATEGORI FOOD"></input></a>
                </td>
                </tr>
              <?php
                  }}
                ?>
            </table>
            <table border="1">
              <tr>
                <td colspan="12">
                  <a href="tambah_barang/food/inputan.php"></input><input type="submit" value="TAMBAH DATA BARANG KATEGORI FOOD"></a>
                </td>
              </tr>
            </table>
            
          </div>
        </section>

        <section class="tm-section">
            <h2 class="tm-section-header">STATIONARY</h2>
            <div class="tm-responsive-table">
            <table border="1">
              <tr class="tm-tr-header">
                <th> NO </th>
                <th> NAMA </th>
                <th> DETAIL </th>
                <th> UKURAN </th>
                <th> WARNA </th>
                <th> MOTIF </th>
                <th> STOK </th>
                <th> HARGA </th>
                <th> KATEGORI </th>
                <th> PHOTO </th>
                <th> OPTION </th>
              </tr>
              <?php

                $no=1;

                $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE username='$username'");

                $get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM barang_dagang WHERE username = '$username'"));
                //$id_one = $get_id['id_barang'];

                //$get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM detail_barang WHERE id_barang = '$id_one'"));

                
                while ($d = mysqli_fetch_array($data) ) {
                  if(($d['kategori'] == "stationary") ) {

                    $id_one = $d['id_barang'];
                    $image=$d['photo'];

                    $datas3 = mysqli_query($koneksi, "SELECT varian_tiga FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas2 = mysqli_query($koneksi, "SELECT varian_dua FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas1 = mysqli_query($koneksi, "SELECT varian_satu FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas = mysqli_query($koneksi, "SELECT * FROM detail_barang  WHERE id_barang = '$id_one'");
		            ?>
              <tr>
                <td><?php echo $no++; ?></>
                <td><?php echo $d['nama_barang']; ?></td>
				        <td><?php echo $d['detail_barang']; ?></td>
                <td>
                <?php
                  
                  while($ds = mysqli_fetch_array($datas1)){ 
                    if(($ds['varian_satu'] != "") ) {
                      
                ?>
                  <li><?php echo $ds['varian_satu']; }}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas2)){ 
                  if(($ds['varian_dua'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_dua'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas3)){
                  if(($ds['varian_tiga'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_tiga'];}} ?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas)){
                ?>
                  <li><?php echo $ds['stok'];} ?></li>
                </td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <?php
                  echo '
                  <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">
                  </td>';
                ?>
              <td>
                  <a href="edit_barang/index_stationary.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="EDIT DATA BARANG KATEGORI STATIONARY"></input></a>
                  <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="HAPUS DATA BARANG KATEGORI STATIONARY"></input></a>
                </td>
                </tr>
              <?php
                  }}
                ?>
            </table>
            <table border="1">
              <tr>
                <td colspan="12">
                  <a href="tambah_barang/stationary/inputan.php"></input><input type="submit" value="TAMBAH DATA BARANG KATEGORI STATIONARY"></a>
                </td>
              </tr>
            </table>
            
          </div>
        </section>

        <section class="tm-section">
            <h2 class="tm-section-header">ELECTRONIC</h2>
            <div class="tm-responsive-table">
            <table border="1">
              <tr class="tm-tr-header">
                <th> NO </th>
                <th> NAMA </th>
                <th> DETAIL </th>
                <th> UKURAN </th>
                <th> WARNA </th>
                <th> MOTIF </th>
                <th> STOK </th>
                <th> HARGA </th>
                <th> KATEGORI </th>
                <th> PHOTO </th>
                <th> OPTION </th>
              </tr>
              <?php

                $no=1;

                $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE username='$username'");

                $get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM barang_dagang WHERE username = '$username'"));
                //$id_one = $get_id['id_barang'];

                //$get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM detail_barang WHERE id_barang = '$id_one'"));

                
                while ($d = mysqli_fetch_array($data) ) {
                  if(($d['kategori'] == "electronic") ) {

                    $id_one = $d['id_barang'];
                    $image=$d['photo'];

                    $datas3 = mysqli_query($koneksi, "SELECT varian_tiga FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas2 = mysqli_query($koneksi, "SELECT varian_dua FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas1 = mysqli_query($koneksi, "SELECT varian_satu FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas = mysqli_query($koneksi, "SELECT * FROM detail_barang  WHERE id_barang = '$id_one'");
		            ?>
              <tr>
                <td><?php echo $no++; ?></>
                <td><?php echo $d['nama_barang']; ?></td>
				        <td><?php echo $d['detail_barang']; ?></td>
                <td>
                <?php
                  
                  while($ds = mysqli_fetch_array($datas1)){ 
                    if(($ds['varian_satu'] != "") ) {
                      
                ?>
                  <li><?php echo $ds['varian_satu']; }}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas2)){ 
                  if(($ds['varian_dua'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_dua'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas3)){
                  if(($ds['varian_tiga'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_tiga'];}} ?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas)){
                ?>
                  <li><?php echo $ds['stok'];} ?></li>
                </td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['jenis']; ?></td>
                <?php
                  echo '
                  <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">
                  </td>';
                ?>
             <td>
                  <a href="edit_barang/index_electronic.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="EDIT DATA BARANG KATEGORI ELECTRONIC"></input></a>
                  <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="HAPUS DATA BARANG KATEGORI ELECTRONIC"></input></a>
                </td>
                </tr>
              <?php
                  }}
                ?>
            </table>
            <table border="1">
              <tr>
                <td colspan="11">
                  <a href="tambah_barang/electronic/inputan.php"></input><input type="submit" value="TAMBAH DATA BARANG KATEGORI ELECTRONIC"></a>
                </td>
              </tr>
            </table>
            
          </div>
        </section>

        <section class="tm-section">
            <h2 class="tm-section-header">TOYS</h2>
            <div class="tm-responsive-table">
            <table border="1">
              <tr class="tm-tr-header">
                <th> NO </th>
                <th> NAMA </th>
                <th> DETAIL </th>
                <th> RASA </th>
                <th> JENIS </th>
                <th> BERAT </th>
                <th> STOK </th>
                <th> HARGA </th>
                <th> KATEGORI </th>
                <th> PHOTO </th>
                <th> OPTION </th>
              </tr>
              <?php

                $no=1;

                $data = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE username='$username'");

                $get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM barang_dagang WHERE username = '$username'"));
                //$id_one = $get_id['id_barang'];

                //$get_id = mysqli_fetch_assoc($koneksi->query("SELECT * FROM detail_barang WHERE id_barang = '$id_one'"));

                
                while ($d = mysqli_fetch_array($data) ) {
                  if(($d['kategori'] == "toys") ) {

                    $id_one = $d['id_barang'];
                    $image=$d['photo'];

                    $datas3 = mysqli_query($koneksi, "SELECT varian_tiga FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas2 = mysqli_query($koneksi, "SELECT varian_dua FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas1 = mysqli_query($koneksi, "SELECT varian_satu FROM detail_barang  WHERE id_barang = '$id_one'");
                    $datas = mysqli_query($koneksi, "SELECT * FROM detail_barang  WHERE id_barang = '$id_one'");
		            ?>
              <tr>
                <td><?php echo $no++; ?></>
                <td><?php echo $d['nama_barang']; ?></td>
				        <td><?php echo $d['detail_barang']; ?></td>
                <td>
                <?php
                  
                  while($ds = mysqli_fetch_array($datas1)){ 
                    if(($ds['varian_satu'] != "") ) {
                      
                ?>
                  <li><?php echo $ds['varian_satu']; }}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas2)){ 
                  if(($ds['varian_dua'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_dua'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas3)){ 
                  if(($ds['varian_tiga'] != "") ) {
                ?>
                  <li><?php echo $ds['varian_tiga'];}}?></li>
                </td>
                <td>
                <?php
                while($ds = mysqli_fetch_array($datas)){
                ?>
                  <li><?php echo $ds['stok'];} ?></li>
                </td>
                <td><?php echo $d['harga']; ?></td>
                <td><?php echo $d['kategori']; ?></td>
                <?php
                  echo '
                  <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($d['photo']).'" style="width: 200px;">
                  </td>';
                ?>
              <td>
                  <a href="edit_barang/index_toys.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="EDIT DATA BARANG KATEGORI TOYS"></input></a>
                  <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>"><input type="submit" value="HAPUS DATA BARANG KATEGORI TOYS"></input></a>
                </td>
                </tr>
              <?php
                  }}
                ?>
            </table>
            <table border="1">
              <tr>
                <td colspan="11">
                  <a href="tambah_barang/toys/inputan.php"></input><input type="submit" value="TAMBAH DATA BARANG KATEGORI TOYS"></a>
                </td>
              </tr>
            </table>
            
          </div>
        </section>


        <hr />
      </div>

      <footer>
        
      </footer>      

    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
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