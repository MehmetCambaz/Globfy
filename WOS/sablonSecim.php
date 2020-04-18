<?php
include 'mysql_connect.php';

if(isset($_POST['EditorGecis'])){
  $secimRadio="";
  
  if (!empty($_POST["secimRadio"])) {
	  $id=$_POST["secimRadio"];
	  $_SESSION["secilenSablonID"]=$id;
	  $kullaniciAdi = $_SESSION["Kullaniciadi"];
	  /*if(!empty($_COOKIE["suankisayfam"])){
		  $value=$_COOKIE["suankisayfam"];
		  setcookie("suankisayfam",$value,time()-1564);
	  }*/
	  if(empty($_COOKIE["suankisayfamANA"])){
	  	setcookie("suankisayfamANA","Anasayfa",time()+1564);
	  }
	
	  if(file_exists("Editor/editorsayfalari_".$kullaniciAdi)) 
	  {
	 	 KlasorSil("Editor/editorsayfalari_".$kullaniciAdi); 
	  }
	  if(file_exists("Editor/kullanicisayfalari_".$kullaniciAdi)) 
	  {
	 	 KlasorSil("Editor/kullanicisayfalari_".$kullaniciAdi); 
	  }
	 


	  $onizlemeSayfasi=fopen('Editor/onizleme.php','w+');
      $code="<?php include 'mysql_connect.php';
      include 'editorsayfalari_$kullaniciAdi/indexEditor.php'; ?>";
      fwrite($onizlemeSayfasi,$code);
	  fclose($onizlemeSayfasi);
	  
	  if(!file_exists("Editor/editorsayfalari_".$kullaniciAdi)) {
		$olustur = mkdir("Editor/editorsayfalari_".$kullaniciAdi);
	  }
	  $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$id.'');
		while($sonuc=mysqli_fetch_assoc($sorgu) )
		{
			$code=$sonuc["sablon_editorkodu"]; //Şuanlık veritabanında şablonun ismini tutyorum, gelen isimi alıp dosyaların içerisinde bulunan php dosyası adıyla
										//sayfanın konumuna include ediyorum!
			
		}
		$dosya=fopen("Editor/editorsayfalari_".$kullaniciAdi."/indexEditor.php","w");
		$yaz=fwrite($dosya,$code);
		fclose($dosya);

		$dosya2=fopen("Editor/editorsayfalari_".$kullaniciAdi."/log.txt","w");
		fclose($dosya2);

		$sorgu2=$baglanti->query('select * from sablon_sayfalari where sablon_id='.$id.'');
		while($sonuc=mysqli_fetch_assoc($sorgu2) )
		{
			$code="";

			$sayfa=$sonuc["sayfa_adi"];
			

			$dosya=fopen('Editor/editorsayfalari_'.$kullaniciAdi.'/'.$sayfa.'.php','w');
			if($sonuc["kod"]!=null){
				$yaz=fwrite($dosya,$sonuc["kod"]);
				fclose($dosya);
			}else{
			if($sayfa=="header" || $sayfa=="footer" || $sayfa=="bar1" || $sayfa=="bar2" || $sayfa=="bar3" || $sayfa=="bar5" || $sayfa=="bar4" || $sayfa=="littleheader"){
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
				font-size:30px;
				font-weight:bold;
				font-family:calibri;
				color:white;
				">Tıkla ve Düzenle</div></div>';
			}else if($sayfa=="content1" || $sayfa=="content2"|| $sayfa=="content3"){
				$code='<div style="position:relative; width:100%;">
				<div style="width:60%;
				
				padding:10 0 10 0;
				border-radius:20px;
				background-color:#5C5C5C; 
				opacity:0.8;
				font-size:24px;
				position:absolute;
				
				margin-top:20%;
				margin-left: calc( 100% - 80% );
				
				text-align:center;
				font-size:30px;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>WoS | Web Site Oluşturma Sistemi</title>
<style>
.isHidden {
  display: none; 
}

.label {
  display: inline-block;
  width: 275px;
  height: 274px;
  padding: 5px 10px;
  margin-top:-309px;
  margin-left:-8px;
}

input:checked + .label {  
  border:10px solid;
  border-color:green;
  border-radius:10px;
}

.gecisButton {
    position: fixed;
    bottom: 20px;
	right: 20px;
	background-color:green;
	font-family:Calibri;
	font-size:28px; 
	visibility: hidden;
	border-radius:20px;
}

</style>
<script>
	$(document).ready(function() {
    $('label').click(function() {
        $('#show-me').css("visibility", "visible");
    });
    });
</script>
</head>
<body style="">
<form method="POST" target="_blank">
	<div class="sablonSecim_Ekran">
		<div class="sablonSecim_Ust">
			<h2 style="font-family:Calibri;">Şablon Seçim Ekranı</h2>
		</div>
		<div class="sablonSecim_Sablonlar">
			<div class="sablonSecim_SablonPanel">		
			
			<?php
			
			foreach($baglanti->query('select sablon_id,sablon_adi,sablon_resim from sablonlar') as $row){
				echo '<table border="0px" style="float:left; margin:0 5 15 11;"><tr><td>';
				echo '<img src="'.$row['sablon_resim'].'" width="300px" height="300px"/>';
				echo '</td><tr>
				<tr><td><center><input id="radio_'.$row['sablon_resim'].'" class="radio isHidden" type="radio"  name="secimRadio" value="'.$row['sablon_id'].'">
				<label for="radio_'.$row['sablon_resim'].'" class="label" ></label></center></td>
				</tr>
				</table>
				';
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
		<input id="show-me" type="submit" class="gecisButton" value="Sonraki Adıma Geçiniz" name="EditorGecis"/>	
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