<?php

    include "../../../koneksi.php";


    $username = $_POST['username'];
    $judul = $_POST['judul'];
    $content = $_POST['content'];

    date_default_timezone_set("Asia/Jakarta");

    $time = date("Y/m/d");
    
    $hour = date('H:i:s');

    $data = "INSERT INTO forum (judul,username,content,tanggal,waktu)
                VALUES('$judul', '$username', '$content', '$time','$hour') ";
    
    if($koneksi->query($data)){

        header("location:../.?pesan=sukses");

    }
    else{
        echo $koneksi->error;
        header("location:.?pesan=gagal");

    }

?>