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
	  
  
	  header ("Refresh: 0; url=?sayfa=sablonDuzenleme");
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  cursor:pointer;
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
	background-color:red;
	font-family:Calibri;
	font-size:28px; 
	visibility: hidden;
	border-radius:0px;
}

.container {
  position: relative;
  width: 10%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-color: #008CBA;
  overflow: hidden;
  width: 100%;
  height:0;
  transition: .5s ease;
}

.container:hover .overlay {
  bottom: 0;
  height: 100%;
  opacity:0.8;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
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
				
			  }
		}
		?>
		<input id="show-me" type="submit" class="gecisButton" value="Sonraki Adıma Geçiniz" name="EditorGecis" style="background-color:green; cursor:pointer; margin:0 30 50 0; border:1px solid green;;"/>	
		</div>
	</div>
	</form>

</div>

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

<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>