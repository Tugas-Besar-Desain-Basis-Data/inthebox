<?php
// koneksi database

include '../../../koneksi.php';


// menangkap data yang di kirim dari form

$username   = $_POST['id'];

$checkuser      = $username;


$level_update = "penjual";
$status_update = "verified";

$cekdulu= "SELECT * FROM penjual WHERE username='$id'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);


$update_request = mysqli_query($koneksi, "UPDATE request_user SET status='$status_update' where username='$username'");

$update_penjual = mysqli_query($koneksi, "UPDATE penjual SET status='$status_update' where username='$username'");


$update_user = mysqli_query($koneksi, "UPDATE user INNER JOIN penjual ON user.username = penjual.username 
    SET user.level='$level_update' where user.username='$username'");


if (mysqli_num_rows($prosescek)>0){
    echo "
            <script>
            alert('Gagal Update Data User $username');
            document.location.href='index.php';
            </script>";
        exit;
}
else{

    if(($update_penjual) && ($update_user) && ($update_request) ){

        echo "
        <script>
        alert('Berhasil Update Data User $username dan $username Berubah Menjadi Seller');
        document.location.href='index.php';
        </script>";
        exit;


    }
    else{

        echo "
            <script>
            alert('Gagal Update Data User $username');
            document.location.href='index.php';
            </script>";
        exit;


    }
}

?>