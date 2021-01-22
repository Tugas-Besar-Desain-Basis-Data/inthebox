<?php
    // koneksi database

    include '../../koneksi.php';


    // menangkap data yang di kirim dari form

    $resis   = $_POST['resi'];
    $id = $_POST['id'];

    $status = "verified";
    $status_barang = "Proses Pengiriman";

    $times = date("Y/m/d");

    date_default_timezone_set("Asia/Jakarta");

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $resi = substr(str_shuffle($permitted_chars), 25, 20);

    $checks = mysqli_query($koneksi, "SELECT * FROM co_user where resi='$resis'");

    while($check = mysqli_fetch_array($checks)){

        $update_barang = mysqli_query($koneksi, "UPDATE co_user SET
        status_barang='$status_barang', tanggal='$times', resi_barang='$resi' where resi='$resis' and id='$id'");



        if( $update_barang ){

            echo "
            <script>
            alert('Berhasil Mengupdate Status Barang. Hasil Penjualan Berdasarkan Verifikasi Dari User $times');
            document.location.href='index.php';
            </script>";
        }
        else{

            echo "
            <script>
            alert('Gagal Mengupdate Status Barang');
            document.location.href='index.php';
            </script>";
        }
    }

?>