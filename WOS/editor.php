<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">
function openPage(evt, page) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("editor_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("editor_tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(page).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").onclick();
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
        $("#Kompanent").load("icerik.php");
		//$("#Onizleme").load("onizleme.php");

});
setInterval(function() {$("#Kompanent").load('icerik.php');}, 1000);
//setInterval(function() {$("#Onizleme").load('onizleme.php');}, 1000);

</script>
</head>
<body>
<div class="editor_Ekran">
<div class="editor_Onizleme">
Önizleme
<?php 
include 'mysql_connect.php';
$sablon_id=$_SESSION["secilenSablon"];
echo '<br/>';
echo "Seçilen Şablon ID: ".$sablon_id;
if(isset($_GET['ekle'])){
	$id=$_GET['ekle'];
	setcookie("ekle",$id,time()+86954);
	header('Location:'.$_SERVER['HTTP_REFERER']);
}
/*foreach($baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar') as $row){
	echo $row['sablon_kod'];
}*/
?>
<div id="Onizleme" style="width:100%; margin:auto; height:90%; overflow-y:scroll; " onclick="openPage(event, 'Kompanent')">
<?php
include 'onizleme.php';
/*foreach($baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar where sablon_id='$_SESSION["secilenSablon"]'') as $row){
	echo $row['sablon_kod'];
}
	$sorgu = $baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar where sablon_id='.$_SESSION["secilenSablon"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["sablon_kod"];
	}*/
?>
</div>
</div>
<div class="editor_TapContent">

<div class="editor_tab">
  <button class="editor_tablinks" onclick="openPage(event, 'Ayar')">Ayarlar</button>
  <button class="editor_tablinks" onclick="openPage(event, 'Kompanent')">Kompanentler</button>
</div>

<div id="Ayar" class="editor_tabcontent">
  <h3>Ayarlar</h3>
</div>

<div id="Kompanent" class="editor_tabcontent">

</div>

</div>
</div>
</body>
</html>