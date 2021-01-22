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
    $id = $_POST['id_barang'];
    $id_detail = $_POST['id_detail'];
    $max = $_POST['max'];
    $a=0;

    $cekdulu= "select * from chart where username='$username' and id_detail='$id_detail'";
    $prosescek= mysqli_query($koneksi, $cekdulu);


if (mysqli_num_rows($prosescek)>0){

    while($get_stock = mysqli_fetch_assoc($prosescek)){

        $total = $get_stock['jumlah'];

        $id_get = $get_stock['id_detail'];

        $username_get = $get_stock['username'];
    }
    $total_jumlah = $total + $jumlah;

    if( $total_jumlah <= $max){


        $update = mysqli_query($koneksi,"UPDATE chart SET jumlah = '$total_jumlah' where username='$username' and id_detail='$id_detail'");

        if($update){

            echo "
            <script>
            alert('Sukses Menambahkan Ke Chart Anda!');
            document.location.href='index.php?id=$id';
            </script>";
        }
        else{
            echo "
            <script>
            alert('Gagal Menambah Data Ke Chart Anda!');
            document.location.href='index.php?id=$id';
            </script>";
        }
    }
    else{
        echo "
            <script>
            alert('Gagal Menyimpan Data Anda! Total Jumlah Barang Yang Anda Pilih Sudah Melebihi Stok Yang Ada');
            document.location.href='index.php?id=$id';
            </script>";
    }
}

else{
                $data = mysqli_query($koneksi,"INSERT INTO chart values (NULL,'$username', '$jumlah', '$id_detail', '$id')");
                //$data = mysqli_query($koneksi, "insert into user values(NULL,'$username','$password','$nama','$email','$umur','$berat','$tinggi','$status_user')");

                if($data){

                    echo "
                    <script>
                    alert('Sukses Menambahkan Ke Chart Anda!');
                    document.location.href='index.php?id=$id';
                    </script>";
                }
                else{
                    echo "
                    <script>
                    alert('Gagal Menambah Data Ke Chart Anda!');
                    document.location.href='index.php?id=$id';
                    </script>";
                }
            }






?>