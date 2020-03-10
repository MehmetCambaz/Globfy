<?php
include 'mysql_connect.php';

if(isset($_POST['EditorGecis'])){
  $secimRadio="";
  
  if (!empty($_POST["secimRadio"])) {
	  $id=$_POST["secimRadio"];
	  $_SESSION["secilenSablonID"]=$id;

	  /*if(!empty($_COOKIE["suankisayfam"])){
		  $value=$_COOKIE["suankisayfam"];
		  setcookie("suankisayfam",$value,time()-1564);
	  }*/
	  if(empty($_COOKIE["suankisayfamANA"])){
	  	setcookie("suankisayfamANA","Anasayfa",time()+1564);
	  }
	  	  
	  
	  if(file_exists("Editor/editorsayfalari")) 
	  {
	 	 KlasorSil("Editor/editorsayfalari"); 
	  }
	  if(file_exists("Editor/kullanicisayfalari")) 
	  {
	 	 KlasorSil("Editor/kullanicisayfalari"); 
	  }
	 


	  $onizlemeSayfasi=fopen('Editor/onizleme.php','w+');
      $code="<?php include 'mysql_connect.php';
      include 'editorsayfalari/indexEditor.php'; ?>";
      fwrite($onizlemeSayfasi,$code);
	  fclose($onizlemeSayfasi);
	  
	  if(!file_exists("Editor/editorsayfalari")) {
		$olustur = mkdir("Editor/editorsayfalari");
	  }
	  $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$id.'');
		while($sonuc=mysqli_fetch_assoc($sorgu) )
		{
			$code=$sonuc["sablon_editorkodu"]; //Şuanlık veritabanında şablonun ismini tutyorum, gelen isimi alıp dosyaların içerisinde bulunan php dosyası adıyla
										//sayfanın konumuna include ediyorum!
			
		}
		$dosya=fopen("Editor/editorsayfalari/indexEditor.php","w");
		$yaz=fwrite($dosya,$code);
		fclose($dosya);
		$sorgu2=$baglanti->query('select * from sablon_sayfalari where sablon_id='.$id.'');
		while($sonuc=mysqli_fetch_assoc($sorgu2) )
		{
			$code="";

			$sayfa=$sonuc["sayfa_adi"];
			

			$dosya=fopen('Editor/editorsayfalari/'.$sayfa.'.php','w');
			if($sonuc["kod"]!=null){
				$yaz=fwrite($dosya,$sonuc["kod"]);
				fclose($dosya);
			}else{
			if($sayfa=="header" || $sayfa=="footer"){
				$code='<div style="position:relative; width:100%; cursor:point;">
				<div style="width:40%;
				padding:10 0 10 0;
				border-radius:20px;
				background-color:#5C5C5C; 
				opacity:0.8;
				font-size:24px;
				position:absolute;
				margin-top:-30;
				margin-left: calc( 100% - 70% );
				text-align:center;
				font-size:35px;
				font-weight:bold;
				font-family:calibri;
				color:white;
				">Tıkla ve Düzenle</div></div>';
			}else{
				$code='<div style="position:relative; width:100%;">
				<div style="width:60%;
				
				padding:10 0 10 0;
				border-radius:20px;
				background-color:#5C5C5C; 
				opacity:0.8;
				font-size:24px;
				position:absolute;
				
				margin-top:30%;
				margin-left: calc( 100% - 80% );
				
				text-align:center;
				font-size:30px;
				font-weight:bold;
				font-family:calibri;
				color:white;
				
				">Tıkla ve Düzenle</div></div>';
			}
			$yaz=fwrite($dosya,$code);
			fclose($dosya);
		}}
	  header ("Refresh: 0; url=Editor/editor.php");
  }
}
?>
<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">
</script>
</head>
<body>
<form method="POST" target="_blank">
	<div class="sablonSecim_Ekran">
		<div class="sablonSecim_Ust">
			<h3>Şablon Seçiniz</h3>
		</div>
		<div class="sablonSecim_Sablonlar">
			<div class="sablonSecim_SablonPanel">		
			
			<?php
			
			foreach($baglanti->query('select sablon_id,sablon_adi,sablon_resim from sablonlar') as $row){
			echo '<table border="0px" style="float:left; margin:0 5 15 11;"><tr><td>';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['sablon_resim'] ).'" width="300px" height="300px"/>';
			echo '</td><tr>
			<tr><td><center><input type="radio" name="secimRadio" value="'.$row['sablon_id'].'"/>Seç</center></td></tr>
			</table>';
			}
			/*$i=1; // mysql olmadan veri çekme
			while ( $i<=15 ){
			echo '<table border="0px" style="float:left; margin:0 5 15 11;">
			<tr><td><img src="Desing/Pictures/Sablon/sablon'.$i.'.png" width="300px" height="300px"/></td><tr>
			<tr><td><center><input type="radio" name="secimRadio" value="sablon'.$i.'"/>Seç</center></td></tr>
			</table>';
			$i=$i+1;
			}*/
			?>
			
			</div>
		</div>
		<div class="sablonSecim_Alt">
		<?php 
		if($_POST){
			  if (empty($_POST["secimRadio"])) {
				echo "*Şablon Seçmediniz!*";
			  }
		}
		?>
		<input type="submit" class="gecisButton" value="Sonraki Adıma Geçiniz" name="EditorGecis"/>		
		</div>
	</div>
	</form>
</body>
</html>



<?php
function KlasorSil($dir) {
if (substr($dir, strlen($dir)-1, 1)!= '/')
$dir .= '/';
//echo $dir; //silinen klasörün adı
if ($handle = opendir($dir)) {
	while ($obj = readdir($handle)) {
		if ($obj!= '.' && $obj!= '..') {
			if (is_dir($dir.$obj)) {
				if (!KlasorSil($dir.$obj))
					return false;
				} elseif (is_file($dir.$obj)) {
					if (!unlink($dir.$obj))
						return false;
					}
			}
	}
		closedir($handle);
		if (!@rmdir($dir))
		return false;
		return true;
	}
return false;
}
?>