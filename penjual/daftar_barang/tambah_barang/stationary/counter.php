<?php

    if($motif=="nol"){
        $counta = 0;
    }
    if($motif=="satu"){
        $counta = 1;
    }
    if($motif=="dua"){
        $counta = 2;
    }
    if($motif=="tiga"){
        $counta = 3;
    }
    if($motif=="empat"){
        $counta = 4;
    }
    if($motif=="lima"){
        $counta = 5;
    }
    if($motif=="enam"){
        $counta = 6;
    }
    if($motif=="tujuh"){
        $counta = 7;
    }
    if($motif=="delapan"){
        $counta = 8;
    }
    if($motif=="sembilan"){
        $counta = 9;
    }
    if($motif=="sepuluh"){
        $counta = 10;
    }

    //UKURAN
    if($ukuran=="nol"){
        $countb = 0;
    }
    if($ukuran=="satu"){
        $countb = 1;
    }
    if($ukuran=="dua"){
        $countb = 2;
    }
    if($ukuran=="tiga"){
        $countb = 3;
    }
    if($ukuran=="empat"){
        $countb = 4;
    }
    if($ukuran=="lima"){
        $countb = 5;
    }
    if($ukuran=="enam"){
        $countb = 6;
    }
    if($ukuran=="tujuh"){
        $countb = 7;
    }
    if($ukuran=="delapan"){
        $countb = 8;
    }
    if($ukuran=="sembilan"){
        $countb = 9;
    }
    if($ukuran=="sepuluh"){
        $countb = 10;
    }

    //WARNA

    if($warna=="nol"){
        $countc = 0;
    }
    if($warna=="satu"){
        $countc = 1;
    }
    if($warna=="dua"){
        $countc = 2;
    }
    if($warna=="tiga"){
        $countc = 3;
    }
    if($warna=="empat"){
        $countc = 4;
    }
    if($warna=="lima"){
        $countc = 5;
    }
    if($warna=="enam"){
        $countc = 6;
    }
    if($warna=="tujuh"){
        $countc = 7;
    }
    if($warna=="delapan"){
        $countc = 8;
    }
    if($warna=="sembilan"){
        $countc = 9;
    }
    if($warna=="sepuluh"){
        $countc = 10;
    }

    //a variasi 3
    $motif = $_POST['motif'];
    //b variasi 1
	$ukuran = $_POST['ukuran'];
	//c variasi 2
	$warna = $_POST['warna'];
	

    if(($counta > $countb) && ($counta > $countc)){
        $total = $counta;
        $sisaa = 0;
        $sisac = $total - $countc;
        $sisab = $total - $countb;
        $nama_hasil = "Motif";
	}
	if(($countb > $counta) && ($countb > $countc)){
        $total = $countb;
        $sisac = $total - $countc;
        $sisaa = $total - $counta;
        $sisab = 0;
        $nama_hasil = "Ukuran";
	}
	if(($countc > $countb) && ($countc > $counta)){
        $total = $countc;
        $sisaa = $total - $counta;
        $sisab = $total - $countb;
        $sisac = 0;
        $nama_hasil = "Warna";
    }
    if(($counta == $countb) && ($countb > $countc) ){
        $total = $counta;
        $sisaa = $total - $counta;
        $sisab = $total - $countb;
        $sisac = 0;
        $nama_hasil = "Stok";
    }
    if(($counta == $countc)&& ($countc > $countb) ){
        $total = $countc;
        $sisaa = $total - $counta;
        $sisab = $total - $countb;
        $sisac = 0;
        $nama_hasil = "Stok";
    }
    if(($countb == $countc) && ($countb > $counta)){
        $total = $countc;
        $sisaa = $total - $counta;
        $sisab = $total - $countb;
        $sisac = 0;
        $nama_hasil = "Stok";
    }

?>