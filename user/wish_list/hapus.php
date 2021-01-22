<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$data = mysqli_query($koneksi,"delete from wish_list where id_wish='$id'");
 
// mengalihkan halaman kembali ke index.php

if ($data) {
    echo "
        <script>
        alert('Berhasil Menghapus Data Dari Wish List');
        document.location.href='index.php';
        </script>
    ";
}
else{
    echo "
        <script>
        alert('Gagal Menghapus Data Dari Chart');
        document.location.href='index.php';
        </script>
    ";
}

?>