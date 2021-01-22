<?php

    include "../../koneksi.php";


    $resi = $_POST['resi'];
    $penghasilan = ['total_get'];
    $review = $_POST['content'];
    $jumlah = $_POST['counter'];
    $id = $_POST['id'];


    $status="verified";

    $query = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE id_barang='$id'");
    $get1 = mysqli_fetch_assoc($query);
    $query2 = mysqli_query($koneksi, "SELECT * FROM co_user WHERE id_barang='$id' and resi='$resi'");
    $get2 = mysqli_fetch_assoc($query2);

    $total = ($get1['harga']*$get2['jumlah']);


    date_default_timezone_set("Asia/Jakarta");

    $time = date("Y/m/d");
    
    $hour = date('H:i:s');

        $data = mysqli_query($koneksi,"UPDATE result_penjual SET review='$review', penghasilan='$total', tanggal='$time', status='$status'
        where id_barang='$id' and resi='$resi'");




    if($data){

        echo "
        <script>
        alert('Review Anda Berhasil Ditambah. Terimakasih');
        document.location.href='index.php?resi=$resi';
        </script>";
        echo mysqli_error($koneksi);

    }
    else{
        echo "
        <script>
        alert('Maaf Review Anda Gagal Dibuat !');
        document.location.href='index.php';
        </script>";
        echo mysqli_error($koneksi);
    }


?>