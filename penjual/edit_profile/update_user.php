<?php 

// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form

$id         = $_POST['id'];
$nama       = $_POST['nama'];
$username    = $_POST['username'];
$password   = $_POST['password'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$hp         = $_POST['hp'];
$level      = $_POST['level'];

if(isset($_POST['jawab'])){
    $jawab=$_POST['jawab'];
    for( $i=0; $i < count($jawab); $i++ ){
        $ans = $jawab[$i];
    }
}
else{
    $ans = NULL;
}



$cekdulu= "select * from user where username='$username'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);


if ( ($ans=="ya")  && ($ans!="tidak") && ($ans!=NULL) ){

    $report = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' ");
    
    if(mysqli_num_rows($report)>0){

        echo "
            <script>
            alert('Username Telah Terdaftar');
            document.location.href='index.php';
            </script>
        ";
        
    }
    else{

        if((ctype_alpha($username)) && ($password!=NULL) && ($username!=NULL) && ($alamat!=NULL) && 
        ($hp!=NULL) && ($email!=NULL) && ($nama!=NULL) && (is_numeric($hp)) && ($ans!="tidak") && ($ans!=NULL)){

            $user = $_SESSION['username'];

            $check1 = mysqli_query($koneksi,"UPDATE user SET 
            username = '$username',
            password ='$password',
            email ='$email',
            nama ='$nama',
            alamat ='$alamat',
            telephone ='$hp',
            level ='$level'
            where username ='$user'");
            echo mysqli_error($koneksi);
            
            if($check1){
                $_SESSION['username']= $username; 
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
                alert('Data tidak berhasil diubah. username tidak boleh mengandung angka dan spasi atau No HP Harus Angka atau data masih ada yang kosong');
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
    
    if((ctype_alpha($username)) && ($password!=NULL) && ($username!=NULL) && ($alamat!=NULL) && ($hp!=NULL) 
        && ($email!=NULL) && ($nama!=NULL) && (is_numeric($hp)) && ($ans=="tidak") && ($ans!="ya")){
    
        //update session
        
        $user = $_SESSION['username'];
        // update data ke database
        
        $check = mysqli_query($koneksi,"UPDATE user SET 
        username = '$username',
        password ='$password',
        email ='$email',
        nama ='$nama',
        alamat ='$alamat',
        telephone ='$hp',
        level ='$level'
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
            alert('Data tidak berhasil diubah. username tidak boleh mengandung angka dan spasi atau No HP Harus Angka atau data masih ada yang kosong');
            document.location.href='index.php';
            </script>
            ";
        }
    }
    else{
        echo "
        <script>
        alert('Gagal Update Data. Pastikan Mencentang Salah Satu Pilihan Ganti Nama Toko');
        document.location.href='index.php';
        </script>
        ";
    }
    
}
?>