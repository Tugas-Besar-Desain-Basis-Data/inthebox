<?php

    require_once("../../koneksi.php");
    
    if(!isset($_SESSION['status']) ){

        header("location:.?pesan=gagal1");

        if(($_SESSION['level']!="user")){
            header("location:.?pesan=gagal4");
        }

    }

    $username = $_SESSION['username'];

    $id_barang = $_GET['id'];

    $cekdulu= "select * from wish_list where username='$username' and id_barang='$id_barang'";
    $prosescek= mysqli_query($koneksi, $cekdulu);


    if (mysqli_num_rows($prosescek)>0){

        echo "
            <script>
            alert('Barang Ini Sudah Ada Dalam Wish List Anda!');
            document.location.href='index.php?id=$id_barang';
            </script>";
    }
    else{

        $data = mysqli_query($koneksi,"INSERT INTO wish_list values (NULL,'$username', '$id_barang')");

        if($data){

            echo "
            <script>
            alert('Sukses Menambah Data Wish List Anda !');
            document.location.href='index.php?id=$id_barang';
            </script>";
        }
        else{
            echo "
            <script>
            alert('Gagal Menambah Data Wish List Anda!');
            document.location.href='index.php?id=$id_barang';
            </script>";
        }

    }

?>