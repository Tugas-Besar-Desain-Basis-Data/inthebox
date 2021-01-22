<?php

    if($rasa=="nol"){
        $counta = 0;
    }
    if($rasa=="satu"){
        $counta = 1;
    }
    if($rasa=="dua"){
        $counta = 2;
    }
    if($rasa=="tiga"){
        $counta = 3;
    }
    if($rasa=="empat"){
        $counta = 4;
    }
    if($rasa=="lima"){
        $counta = 5;
    }
    if($rasa=="enam"){
        $counta = 6;
    }
    if($rasa=="tujuh"){
        $counta = 7;
    }
    if($rasa=="delapan"){
        $counta = 8;
    }
    if($rasa=="sembilan"){
        $counta = 9;
    }
    if($rasa=="sepuluh"){
        $counta = 10;
    }


    //JENIS
    if($jenis=="nol"){
        $countb = 0;
    }
    if($jenis=="satu"){
        $countb = 1;
    }
    if($jenis=="dua"){
        $countb = 2;
    }
    if($jenis=="tiga"){
        $countb = 3;
    }
    if($jenis=="empat"){
        $countb = 4;
    }
    if($jenis=="lima"){
        $countb = 5;
    }
    if($jenis=="enam"){
        $countb = 6;
    }
    if($jenis=="tujuh"){
        $countb = 7;
    }
    if($jenis=="delapan"){
        $countb = 8;
    }
    if($jenis=="sembilan"){
        $countb = 9;
    }
    if($jenis=="sepuluh"){
        $countb = 10;
    }




    //a variasi 3
    $rasa = $_POST['rasa'];
    
    //b variasi 1
    $jenis = $_POST['jenis'];
	
	

	if(($counta > $countb)){
        $total = $counta;
        $nama_hasil = "Rasa";
	}
	if(($countb > $counta)){
        $total = $countb;
        $nama_hasil = "Jenis";
	}
    if( $counta == $countb ){
        $total = $counta;
        $nama_hasil = "Stok";
    }
    
?>
    <br></br>

<?php
    for($i=0;$i<$counta;$i++){
?>				
	    <div class="form-wrapper">
			<input type="text" name="variasi1[]" placeholder="Rasa" class="form-control">
			<i class="zmdi zmdi-account"></i>
		</div>	
<?php
    }
?>
    <br></br>
<?php
    
    for($i=0;$i<$countb;$i++){
?>				
		<div class="form-wrapper">
		    <input type="text" name="variasi2[]" placeholder="Jenis" class="form-control">
			<i class="zmdi zmdi-account"></i>
		</div>
<?php
    }
?>
<br></br>
<?php
    echo"Input Jumlah Berdasarkan $nama_hasil";
?>
    <br></br>
<?php
	for($i=0;$i<$total;$i++){
?>
        
	    <div class="form-wrapper">
		    <input type="number" name="stok[]" placeholder="Stok" class="form-control">
			<i class="zmdi zmdi-account"></i>
        </div>
<?php
    }
?>
    <br></br>