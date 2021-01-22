<?php

    require_once("../../koneksi.php");


    $username = $_SESSION['username'];

    $metode = $_POST['metode'];

    $status = "pending";

    $status_user = "Menunggu Konfirmasi";

    $time = date("Y/m/d");

    $hour = date('H:i:s');

    date_default_timezone_set("Asia/Jakarta");

    //ACAK ANGKA DAN HURUF

    $check = mysqli_query($koneksi, "SELECT * FROM chart where username='$username'");

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $resi = substr(str_shuffle($permitted_chars), 20, 25);

    while($get = mysqli_fetch_array($check)){

        $id_chart = $get['id_chart'];

        $id_barang = $get['id_barang'];

        $id_detail = $get['id_detail'];

        $jumlah = $get['jumlah'];

        $update = mysqli_query($koneksi, "SELECT * FROM detail_barang where id='$id_detail'");

        $get_up = mysqli_fetch_assoc($update);

        $stok = $get_up['stok'];

        $total = $stok - $jumlah;


        $data = mysqli_query($koneksi, "INSERT INTO co_user values(NULL,'$username', '$id_barang', '$id_detail', '$jumlah', '$status', '$metode', '$resi', '$time', '$status', '$status') ");

        if($data){

            $lastid = mysqli_insert_id($koneksi);

            $data2 = mysqli_query($koneksi, "INSERT INTO request_checkout values(NULL,'$username', '$lastid', '$status', '$resi', '$metode', '$status_user','$time' )");

            $data3 = mysqli_query($koneksi,"DELETE FROM chart where username='$username'");
            $data4 = mysqli_query($koneksi,"UPDATE detail_barang SET stok='$total' where id='$id_detail'");
        }
        else{
            echo "
            <script>
            alert('Maaf Pesanan Anda Gagal Dibuat!we');
            </script>";
            echo mysqli_error($koneksi);
        }
    }
    if(($data)){



        echo "
        <script>
        alert('Pesanan Anda Berhasil Dibuat. Lakukan Pembayaran Untuk Memproses Barang Anda');
        document.location.href='detail.php';
        </script>";
        echo mysqli_error($koneksi);


    }
    else{
        echo "
        <script>
        alert('Maaf Pesanan Anda Gagal Dibuat!');
        </script>";
        echo mysqli_error($koneksi);
    }


?>