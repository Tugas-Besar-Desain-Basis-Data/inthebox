<?php

    include "../../../koneksi.php";


    $username = $_POST['username'];
    $id_forum = $_POST['id'];
    $content = $_POST['content'];
    $counter = $_POST['counter'];

    $total_counter = $counter + 1;

    date_default_timezone_set("Asia/Jakarta");

    $time = date("Y/m/d");
    
    $hour = date('H:i:s');

    $data = "INSERT INTO comment (username,content,tanggal,waktu,forum_id)
                VALUES('$username', '$content', '$time','$hour', '$id_forum') ";
    

    if($koneksi->query($data)){
        mysqli_query($koneksi,"UPDATE forum SET counter = '$total_counter' where forum_id='$id_forum'");
        header("location:../?pesan=sukses");

    }
    else{
        echo $koneksi->error;
        header("location:../?pesan=gagal");

    }

?>