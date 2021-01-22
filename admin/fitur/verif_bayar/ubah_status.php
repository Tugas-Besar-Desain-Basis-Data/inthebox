<?php
    // koneksi database

    include '../../../koneksi.php';


    // menangkap data yang di kirim dari form

    $resi   = $_POST['resi'];


    $status = "verified";
    $status_barang = "Sedang Dikemas";

    $check = mysqli_query($koneksi, "SELECT * FROM request_checkout where resi='$resi'");

    while($check = mysqli_fetch_array($check)){

        $update_request = mysqli_query($koneksi, "UPDATE request_checkout SET
            status_user='$status',status='$status' where resi='$resi'");

        $update_barang = mysqli_query($koneksi, "UPDATE co_user SET
        status_barang='$status_barang',status='$status' where resi='$resi'");



        if( ($update_request) && ($update_barang) ){

            echo "
            <script>
            alert('Berhasil Memverifikasi Pembayaran Yang Dilakukan User');
            document.location.href='index.php';
            </script>";
        }
        else{

            echo "
            <script>
            alert('Gagal Memverifikasi Pembayaran Yang Dilakukan User');
            document.location.href='index.php';
            </script>";
        }
    }

?>