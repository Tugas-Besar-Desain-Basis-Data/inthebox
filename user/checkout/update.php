<?php

    require_once("../../koneksi.php");

    if(isset($_POST['submit'])){

        echo "
        <script>
        alert('Terimakasih Sudah Berbelanja Di In The Box');
        document.location.href='detail.php';
        </script>";

    }
    if(isset($_POST['selesai'])){


        date_default_timezone_set("Asia/Jakarta");

        $time = date("Y/m/d");

        $hour = date('H:i:s');

        $resi = $_POST['resi'];

        $status_barang = "Pesanan Telah Selesai";

        $username = $_SESSION['username'];

        $review = "";
        $status = "pending";


        $check = mysqli_query($koneksi, "SELECT * FROM co_user where resi='$resi'");

        while($get = mysqli_fetch_array($check)){

            $id_barang = $get['id_barang'];

            $cek_chart_barang = mysqli_query($koneksi,"select * from barang_dagang where id_barang='$id_barang'");

            while($row_data_barang = mysqli_fetch_assoc($cek_chart_barang) ){

                $username_toko = $row_data_barang['username'];
                $nama_toko = $row_data_barang['nama_toko'];
                $total_penghasilan = $row_data_barang['harga']*$get['jumlah'];

                $data2 = mysqli_query($koneksi, "INSERT INTO result_penjual values (NULL,'$username_toko', '$nama_toko', '$total_penghasilan', '$id_barang','$review','$username', $time, '$resi','$status')");
                $data = mysqli_query($koneksi, "UPDATE co_user SET status_barang='$status_barang', tanggal='$time' where resi='$resi'");
            }



        }
        if(($data2) && ($data) ){
            echo "
            <script>
            alert('Silahkan Mengisi Review Dari Barang Yang Anda Sudah Beli');
            document.location.href='../review/index.php?resi=$resi';
            </script>";


        }
        else{
            echo "
            <script>
            alert('Maaf Gagal Menyelesaikan Pesanan');
            </script>";
            echo mysqli_error($koneksi);
        }

    }

    else{

        $time = date("Y/m/d");

        $hour = date('H:i:s');

        date_default_timezone_set("Asia/Jakarta");

        $resi = $_POST['resi'];

        $status = "Menunggu Konfirmasi";

        $check = mysqli_query($koneksi, "SELECT * FROM request_checkout where resi='$resi'");

        while($get = mysqli_fetch_array($check)){

            $data = mysqli_query($koneksi, "UPDATE request_checkout SET
            status_user='$status',
            tanggal='$time' where resi='$resi'");

        }
        if($data){
            echo "
            <script>
            alert('Verifikasi Pembayaran Anda Sudah Terkirim. Kami Akan Melakukan Verifikasi Secepatnya. Terimakasih');
            document.location.href='detail.php';
            </script>";


        }
        else{
            echo "
            <script>
            alert('Maaf Verifikasi Gagal');
            </script>";
            echo mysqli_error($koneksi);
        }
    }

?>