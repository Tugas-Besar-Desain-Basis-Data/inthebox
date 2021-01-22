<?php 

// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form

$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$hp         = $_POST['hp'];

if(isset($_POST['jawab'])){
    $jawab=$_POST['jawab'];
    for( $i=0; $i < count($jawab); $i++ ){
        $ans = $jawab[$i];
    }
}
else{
    $ans = NULL;
}



$cekdulu= "select * from penjual where nama_toko='$nama'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);


if ( ($ans=="ya")  && ($ans!="tidak") && ($ans!=NULL) ){

    $report = mysqli_query($koneksi,"SELECT * FROM penjual WHERE nama_toko='$nama'");
    
    if(mysqli_num_rows($report)>0){

        echo "
            <script>
            alert('Nama Toko Telah Terdaftar');
            document.location.href='index.php';
            </script>
        ";
        
    }
    else{

        if(($alamat!=NULL) && ($hp!=NULL) && ($nama!=NULL) && (is_numeric($hp)) && ($ans!="tidak") && ($ans!=NULL)){

            $user = $_SESSION['username'];

            $check1 = mysqli_query($koneksi,"UPDATE penjual SET 
            nama_toko ='$nama',
            alamat_toko ='$alamat',
            hp_toko ='$hp'
            where username ='$user'");
            echo mysqli_error($koneksi);
            
            if($check1){
                echo "
                    <script>
                    alert('Data berhasil diubah');
                    document.location.href='../../index.php';
                    </script>
                    ";
            }
            else{
                echo "
                <script>
                alert('Data tidak berhasil diubah. No HP Harus Angka atau Data masih ada yang kosong');
                document.location.href='index.php';
                </script>
                ";
            }
        }
        else{
            echo "
            <script>
            alert('Gagal Update Data. Pastikan Mencentang Salah Satu Pilihan Ganti Username');
            document.location.href='index.php';
            </script>
            ";
        }
    }
}
    

else{
    
    if(($alamat!=NULL) && ($hp!=NULL) && ($nama!=NULL) && (is_numeric($hp)) 
        && ($ans!=NULL) && ($ans=="tidak") && ($ans!="ya")){
    
        //update session
        
        $user = $_SESSION['username'];
        // update data ke database
        
        $check = mysqli_query($koneksi,"UPDATE penjual SET 
        nama_toko ='$nama',
        alamat_toko ='$alamat',
        hp_toko ='$hp'
        where username ='$user'");
        echo mysqli_error($koneksi);

        // mengalihkan halaman kembali ke index.php

        if($check > 0){
            echo "
                <script>
                alert('Data berhasil diubah');
                document.location.href='../../index.php';
                </script>
            ";
        }
        else{
            echo "
            <script>
            alert('Data tidak berhasil diubah. No HP Harus Angka atau Data masih ada yang kosong');
            document.location.href='index.php';
            </script>
            ";
        }
    }
    else{
        echo "
        <script>
        alert('Gagal Update Data. Pastikan Mencentang Salah Satu Pilihan Ganti Nama Toko $ans');
        document.location.href='index.php';
        </script>
        ";
    }
    
}
?>