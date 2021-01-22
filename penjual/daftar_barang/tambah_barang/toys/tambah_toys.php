<?php 
    // koneksi database
    include '../../../../koneksi.php';

    // menangkap data yang di kirim dari form

    //ukuran
    $variasi1a = $_POST['variasi1'];
    //warna
    $variasi2a = $_POST['variasi2'];
    //motif
    $variasi3a = $_POST['variasi3'];
    
    $stoka     = $_POST['stok'];
    $nama = $_POST['nama'];
    $content = $_POST['content'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $photo = $_FILES['photo'];

    

   //a
	$rasa = $_POST['rasa'];
	//b
	$jenis = $_POST['jenis'];
    
    include 'counter.php';


    $kategori ="toys";



    // menginput data ke database

    if($_FILES['photo']['tmp_name']==null){
        echo 'File yang anda pilih tidak gambar';
    }
    else{
            if(($nama!=NULL) && ($content!=NULL) && ($jenis!=NULL) && ($harga!=NULL) &&
            (is_numeric($harga)) && ($photo!=NULL) && ($kategori!=NULL) ){

                $username = $_SESSION['username'];

                $get = mysqli_fetch_assoc($koneksi->query("SELECT * FROM penjual WHERE username = '$username'"));

                $nama_toko = $get['nama_toko'];

                $file=addslashes(file_get_contents($_FILES['photo']['tmp_name']));

                $data = mysqli_query($koneksi, "insert into barang_dagang values(NULL,'$username','$nama_toko',
                '$nama','$content','$harga','$kategori','$jenis','$file')");
                
                
                if (($data)) {

                    $lastid = mysqli_insert_id($koneksi);

                        for($i=0;$i<$total;$i++){


                            if((!empty($stok)) || (!empty($variasi1)) || (!empty($variasi2)) || (!empty($variasi3)) ){

                                $variasi1a[$i];
                                $variasi2a[$i];
                                
                                
                            }
                            $sql = mysqli_query($koneksi, "insert into detail_barang values(NULL,'$variasi1a[$i]','$variasi2a[$i]','$variasi3a','$stoka[$i]', '$lastid')");
                        }
                        if($sql){
                            echo "
                            <script>
                            alert('Data berhasil ditambahkan');
                            document.location.href='../../index.php';
                            </script>
                            ";
                        }
                        else{
                            echo "
                            <script>
                            alert('Gagal Menyimpan Data');
                            document.location.href='../../index.php';
                            </script>";
                        }     
                }
                else{
                    echo "
                        <script>
                        alert('Gagal Menyimpan Data. Pastikan Tidak Ada Yang Kosong');
                        document.location.href='../../index.php';
                        </script>";
                }    
            }
            else{
                echo"
                <script>
                alert('Gagal Menyimpan Data');
                document.location.href='../../index.php';
                </script>";
            }
        }
            
            
    
    
?>