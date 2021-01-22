<?php

    include "../../koneksi.php";


    $username = $_POST['username'];
    $id = $_POST['id'];
    $content = $_POST['content'];
    $counter = $_POST['counter'];
    $username_toko = $_POST['username_toko'];

    $total_counter = $counter + 1;

    date_default_timezone_set("Asia/Jakarta");

    $time = date("Y/m/d");
    
    $hour = date('H:i:s');

    $data = mysqli_query($koneksi, "INSERT INTO answer values(NULL, '$username', '$username_toko', '$content', '$time', '$hour', '$id')");
    

    if($data){

        $data2 = mysqli_query($koneksi,"UPDATE pertanyaan SET counter = '$total_counter' where barang_id='$id'");

        if($data2){

                echo "
                <script>
                alert('Sukses Menjawab User');
                document.location.href='index.php?id=$id';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Gagal Menjawab User');
                </script>";
                echo mysqli_error($koneksi);


            }
    }
    else{
        echo "
        <script>
        alert('Gagal Menjawab User');

        </script>";
        echo mysqli_error($koneksi);


    }

?>