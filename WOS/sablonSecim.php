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

/*.label {
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
}*/
.label_secim {
  display: inline-block;
  width: 270px;
  height: 280px;
  padding: 5px 10px;
  margin-top:-306px;
  margin-left:-3px;
  cursor:pointer;
}

input:checked + .label_secim {  
  border:6px solid;
  border-color:green;
  border-radius:0px;
}

.gecisButton1 {
    position: fixed;
    bottom: 20px;
	right: 20px;
	font-family:Calibri;
	font-size:28px; 
	visibility: hidden;
	border-radius:0px;
	background-color:green;
	 cursor:pointer;
	  margin:0 30 50 0;
	   border:1px solid green;
	   color:white;
}
.gecisButton1:hover{
	background-color:#004F00;
	border:1px solid #004F00;
}

.gecisButton2 {
    position: fixed;
    bottom: 20px;
	right: 20px;
	font-family:Calibri;
	font-size:28px; 
	visibility: hidden;
	border-radius:0px;
	background-color:rgb(63,74,84);
	 cursor:pointer;
	  left:40;
	   margin:0 0 50 0; 
	   border:1px solid rgb(63,74,84);
	   color:white;
}
.gecisButton2:hover{
	background-color:#232930;
	border:1px solid #232930;
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

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  transition: 2s;
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  height:300px;
  transition: 2s;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
<script data-ad-client="ca-pub-3191787238536537" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
	$(document).ready(function() {
    $('label').click(function() {
        $('#show-me').css("visibility", "visible");
		$('#show-me2').css("visibility", "visible");
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
				echo '<img src="'.$row['sablon_resim'].'" width="300px" height="300px" />';
				echo '</td><tr>
				<tr><td><center><input id="radio_'.$row['sablon_resim'].'" class="radio isHidden" type="radio" name="secimRadio" value="'.$row['sablon_id'].'">
				<label for="radio_'.$row['sablon_resim'].'" class="label_secim"></label></center></td>
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
		<input id="show-me" type="submit" class="gecisButton1" value="Sonraki Adıma Geçiniz" name="EditorGecis" style=""/>	
		<input id="show-me2" type="button" class="gecisButton2" onclick="bir()" value="Şablon Önizleme" name="EditorGecis_Onizleme" style=""/>	

		</div>
	</div>
	</form>

</div>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>
	<div style="float:left; width:310px;"><img src="how.png" width="250" height="250" id="resim_onizleme" style="margin:5 0 0 25;"/></div>
	<div style="float:left; width:calc(90% - 312px); word-wrap: break-word; margin:10 0 0 0; font-size:21; font-family:Calibri;" id="yazi_onizleme"></div>
	</p>
  </div>
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

var btn = document.getElementById("show-me2");


var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {

  modal.style.display = "block";
  document.getElementById("myModal").style.transition = "all 2s";
  bir();
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


function bir(){

if(document.getElementsByName("secimRadio")[0].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Content bölümüne seçeceğiniz content içeriklerinden istediğiniz kadar ekleyebilirsiniz. Seçmiş olduğunuz content bileşenlerini alt alta ekleme işlemleri gerçekleştirebilirsiniz.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon1.png";
}else if(document.getElementsByName("secimRadio")[1].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne header bileşenlerinden istediğiniz bir tanesini ekleyebilirsiniz. Header bölümü sadece bir bileşen içerebilir ve bu bölüme ekleyeceğiniz yönlendirme butonlarından herbiri için sayfada değişim için kahverengi bölümü değişmektedir. Content1 ve Content2 bölümleri için seçeceğiniz content bileşenlerinden istediğiniz kadar ekleme yapabilirsiniz. Footer bölümü için de header bölümünde olduğu gibi sadece bir bileşen eklenebilir ve header bölümünden yapılacak sayfa değişim isteklerinde bu bölümde sabit kalacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon2.png";
}else if(document.getElementsByName("secimRadio")[2].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşeni eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Left Banner bölümüne seçeceğiniz birden fazla leftbanner bileşeni eklenebilir ve header bölümünden gelen sayfa değişim isteklerinde bu bölümde sabit kalacaktır. Content bölümüne content bileşenlerinden istediğiniz kadar ekleyebilirsiniz, header sayfasından gelecek olan sayfa değişim istekleri bölümün değişmesiyle görüntülenecektir. ";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon3.png";
}else if(document.getElementsByName("secimRadio")[3].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşeni eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Little Header bölümüne ve alt kısımda bulunan Bar bölümlerine sadece bir bileşen eklenebilir. Content1 ve Content2 bölümlerine birden fazla bileşen eklenebilir.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon4.png";
}else if(document.getElementsByName("secimRadio")[4].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Little Header bölümüne seçeceğiniz bir tane little header bileşeni eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Header ve Bar bölümleri için seçilecek bileşen listesinden sadece bir tanesi eklenebilir. Content bölümü için seçilecek bileşenlerden alt alta istenile kadar eklenebilir. ";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon5.png";
}else if(document.getElementsByName("secimRadio")[5].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Left Banner ve Content bölümüne alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan Content bölümünde yeni sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon6.png";
}else if(document.getElementsByName("secimRadio")[6].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Footer bölümü içinde seçilecek sadece bir bölüm eklenebilir. Content bölümüne seçilecek bileşenler alt alta istenilen kadar eklenebilir. Yönlendirme istenildiğinde kahverengi olan Content bölümünde yeni sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon7.png";
}else if(document.getElementsByName("secimRadio")[7].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Little Header bölümüne seçeceğiniz bir tane little header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Bar bölümleri için sadece birer tane bileşen eklenebilir. Content bölümüne seçilen bileşenlerden istenilen kadar alt alta eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümünde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon8.png";
}else if(document.getElementsByName("secimRadio")[8].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Little Header bölümü için seçilecek sadece bir bileşen eklenecektir. Content1, Content2 ve Content3 bölümleri için alt alta istenilen kadar bileşen eklenebilecektir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon9.png";
}else if(document.getElementsByName("secimRadio")[9].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Little Header bölümü için seçilecek sadece bir bileşen eklenecektir. Content1 ve Content2 bölümleri için alt alta istenilen kadar bileşen eklenebilecektir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon10.png";
}else if(document.getElementsByName("secimRadio")[10].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Bar bölümleri için seçilecek sadece bir bileşen eklenebilir. Left Banner ve Content bölümleri için seçilecek bileşenler alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon11.png";
}else if(document.getElementsByName("secimRadio")[11].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Little Header bölümüne seçeceğiniz bir tane little header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Footer bölümü için seçilecek sadece bir bileşen eklenecektir. Content1 ve Content2 bölümleri için seçilecek bileşenler alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon12.png";
}else if(document.getElementsByName("secimRadio")[12].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Little Header bölümüne seçeceğiniz bir tane little header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Header bölümü için seçilecek sadece bir bileşen eklenecektir. Content1, Content2 ve Content3 bölümleri için seçilecek bileşenler alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon13.png";
}else if(document.getElementsByName("secimRadio")[13].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Left Banner1, Left Banner2 ve Content bölümleri için seçilecek bileşenler alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon14.png";
}else if(document.getElementsByName("secimRadio")[14].checked){
	document.getElementById("yazi_onizleme").innerHTML = "Header bölümüne seçeceğiniz bir tane header bileşenei eklenecektir. Bu bölüme sadece bir bileşen eklenebilir ve sayfa değişimi için eklenecek butonlardan gelen yönlendirme istekleri kahverengi olan bölümde açılacaktır. Left Banner ve Content bölümleri için seçilecek bileşenler alt alta istenilen kadar bileşen eklenebilir. Yönlendirme istenildiğinde kahverengi olan bölümde istenilen sayfalar açılacaktır.";
	document.getElementById("resim_onizleme").src = "Desing/Pictures/Sablon_Onizleme/sablon15.png";
}

}

</script>


<script>
/*function btn_name(){
	var name = document.getElementsByName("secimRadio").value;
	documen.getElementById("show-me2").value="asdasd";
}*/
</script>