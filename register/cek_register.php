<?php
// koneksi database

include '../koneksi.php';


// menangkap data yang di kirim dari form
$nama       = $_POST['name'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$nohp       = $_POST['phone'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$choose     = $_POST['pilihan'];

$checkuser  = $username;
$checkps    = $password;
$checkal    = $alamat;
$checknohp  = $nohp;
$checkmail  = $email;
$checknama  = $nama;
$check_input = $choose;



$cekdulu= "select * from user where username='$username'"; 
$prosescek= mysqli_query($koneksi, $cekdulu);


if (mysqli_num_rows($prosescek)>0){
    header("location:.?pesan=gagal2");
}
else{
    if((ctype_alpha($checkuser)) && ($checkps!=NULL) && ($checkuser!=NULL) && ($checkal!=NULL) 
    && ($checknohp!=NULL) && ($checkmail!=NULL) && ($checknama!=NULL) && ($check_input!=NULL) && ($check_input=="pembeli") && (is_numeric($checknohp))){
    // menginput data ke database
    
        $data = mysqli_query($koneksi, "insert into user values('$username','$password','$email','$nama','$alamat','$nohp','user')");
    
        if ($data) {
            header("location:../login?pesan=daftarsukses"); 
        }
        else{
            header("location:.?pesan=gagal3");
        }
    }
    else if ((ctype_alpha($checkuser)) && ($checkps!=NULL) && ($checkuser!=NULL) && ($checkal!=NULL) 
    && ($checknohp!=NULL) && ($checkmail!=NULL) && ($checknama!=NULL) && ($check_input!=NULL) && ($check_input=="penjual") && (is_numeric($checknohp)) ){

        $data = mysqli_query($koneksi, "insert into user values('$username','$password','$email','$nama','$alamat','$nohp','user')");
            if($data){
                $_SESSION['username'] = $username;
                header("location:../penjual/register?pesan=daftarsukses"); 
            }
            else{
                header("location:.?pesan=gagal3");
            }
            

    }
    else{
        header("location:.?pesan=gagal");
    }
}

?>
