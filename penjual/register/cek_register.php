<?php
// koneksi database

include '../../koneksi.php';


// menangkap data yang di kirim dari form
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$nohp       = $_POST['hp'];
$username   = $_POST['username'];

$status = "pending";

$cekdulu= "select * from penjual where nama_toko='$nama'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);


if(isset($_POST['syarat'])){
    $syarat =$_POST['syarat'];
}
else{
    $syarat = NULL;
}

if (mysqli_num_rows($prosescek)>0){
    header("location:.?pesan=gagal2");
}
else{
    if( ($nama!=NULL) && ($nohp!=NULL) && ($alamat!=NULL) && (is_numeric($nohp))){
    // menginput data ke database
        $data = mysqli_query($koneksi, "INSERT INTO penjual VALUES('$username', '$nama', '$alamat', '$nohp', '$status')");
        $check_stat = mysqli_query($koneksi, "INSERT INTO request_user VALUES('$username','$status')");

    
        if (($data) && ($check_stat)) {
            header("location:../../login?pesan=daftarsukses2"); 
        }
        else{
            header("location:.?pesan=gagal3");
        }
    }
    else{
        header("location:.?pesan=gagal");
    }
}

?>