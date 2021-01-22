<?php 
    // koneksi database
    include '../../../koneksi.php';

    $nama = $_POST['nama'];
    $content = $_POST['content'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];

    $id_barang = $_POST['id_barang'];



    // menginput data ke database

    $username = $_SESSION['username'];


    $data = mysqli_query($koneksi, "UPDATE barang_dagang SET
    nama_barang = '$nama',
    detail_barang = '$content',
    jenis ='$jenis',
    harga = '$harga' where id_barang='$id_barang'");




    if (($data)) {

        echo "
        <script>
        alert('Data berhasil ditambahkan');
        </script>
        ";
        echo mysqli_error($koneksi);
    }
    else{
        echo "
        <script>
        alert('Gagal Menyimpan Data');
        </script>";
        echo mysqli_error($koneksi);
    }



?>