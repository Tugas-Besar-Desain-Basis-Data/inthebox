<?php 
// koneksi database
    include '../../../koneksi.php';

    if(!isset($_POST['hapus'])){
        header("location:index.php");
    }
    else{

        // menangkap data id yang di kirim dari url

        $id = $_POST['id'];
        
        // menghapus data dari database
        
        $data = mysqli_query($koneksi,"delete from user where username='$id'");
            
        // mengalihkan halaman kembali ke index.php

        if ($data) {
            echo "
                <script>
                alert('Data $id berhasil dihapus');
                document.location.href='index.php';
                </script>
                ";
        }
        else{
            echo "
                <script>
                alert('Gagal Hapus Data $id');
                document.location.href='index.php';
                </script>";
            exit;
        }
    }

    

?>