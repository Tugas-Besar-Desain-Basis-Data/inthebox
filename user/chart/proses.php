<?php

    require_once("../../koneksi.php");
    
    if(!isset($_SESSION['status']) ){

        header("location:.?pesan=gagal1");

        if(($_SESSION['level']!="user")){
            header("location:.?pesan=gagal4");
        }

    }

    $username = $_SESSION['username'];

    $jumlah = $_POST['jumlah'];
    $id_barang = $_POST['id_barang'];
    $id_detail = $_POST['id_detail'];
    $max = $_POST['max'];
    $id = $_POST['id'];
    $a=0;

    $cekdulu= "select * from chart where username='$username' and id_chart='$id'";
    $prosescek= mysqli_query($koneksi, $cekdulu);


if (mysqli_num_rows($prosescek)>0){

    while($get_stock = mysqli_fetch_assoc($prosescek)){

        $id_get = $get_stock['id_detail'];

        $username_get = $get_stock['username'];
    }

    $update_total = $jumlah;

    if( $update_total <= $max){


        $update = mysqli_query($koneksi,"UPDATE chart SET jumlah = '$update_total' where username='$username' and id_chart='$id'");

        if($update){

            echo "
            <script>
            alert('Sukses Mengupdate Data Barang Ke Chart Anda!');
            document.location.href='index.php';
            </script>";
        }
        else{
            echo "
            <script>
            alert('Gagal Mengupdate Data Barang Ke Chart Anda!');
            document.location.href='index.php';
            </script>";
        }
    }
    else{
        echo "
            <script>
            alert('Gagal Menyimpan Data Anda! Total Jumlah Barang Yang Anda Pilih Sudah Melebihi Stok Yang Ada');
            document.location.href='index.php';
            </script>";
    }
}

else{

    echo "
    <script>
    alert('Gagal Menambah Data Ke Chart Anda!');
    document.location.href='index.php';
    </script>";
}






?>