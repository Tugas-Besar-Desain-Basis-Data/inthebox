<?php

    include "../../koneksi.php";


    $username = $_SESSION['username'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    date_default_timezone_set("Asia/Jakarta");

    $time = date("Y/m/d");
    
    $hour = date('H:i:s');

    $counter = 0;

    $cekdulu= "select * from pertanyaan where barang_id='$id' and username='$username'";
    $prosescek= mysqli_query($koneksi, $cekdulu);

    $cek= mysqli_query($koneksi, "select * from pertanyaan where barang_id='$id'");

    $proses = mysqli_fetch_assoc($cek);

    $get_count = $proses['counter'];

    $total_counter = $get_count + 1;



if (mysqli_num_rows($prosescek)>0){

    $data = mysqli_query($koneksi, "INSERT INTO answer values(NULL, '$username', '$content', '$time', '$hour', '$id')");

    if($data){

        $data2 = mysqli_query($koneksi,"UPDATE pertanyaan SET counter = '$total_counter' where barang_id='$id'");

        if($data2){

                echo "
                <script>
                alert('Sukses Menambahkan Pertanyaan Seller');
                document.location.href='index.php?id=$id';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Gagal Menambahkan Pertanyaan Seller');
                document.location.href='index.php?id=$id';
                </script>";

            }
    }
}
else{

    $data = mysqli_query($koneksi,"INSERT INTO pertanyaan values (NULL, '$username', '$content', '$time','$hour', '$counter','$id')");

    
    if($data){
        echo "
        <script>
        alert('Sukses Menambahkan Pertanyaan Seller');
        document.location.href='index.php?id=$id';
        </script>";
    }
    else{
        echo "
        <script>
        alert('Gagal Menambahkan Pertanyaan Seller');
        document.location.href='index.php?id=$id';
        </script>";

    }
}

?>