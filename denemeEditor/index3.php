

<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<link href="page3.css" media="screen" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<style type="text/css">
.editor_TapContent{
	float:left;
	width:19.5%;
    height:100%;
	border:1px solid black;
}
.editor_tab {
    overflow: hidden;
}
.editor_tab button {
    background-color: #8D8D8D;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 0px;
    transition: 0.3s;
    font-size: 17px;
    color:white;
	width:50%;
	
}
.editor_tab button:hover {
    background-color: #6D6D6D;
}
.editor_tab button.active {
    background-color: #6D6D6D;
}
.editor_tabcontent {
    display: none;
    padding: 6px 12px;
}

</style>
<script language="JavaScript"> // Tab geçiş sol div
function openPage(evt, page, a) {
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
	document.getElementById(a).click();
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").onclick();
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {  //Tab divlerin güncellemesi
        $("#Kompanent").load("icerik.php");
		$("#Ayar").load("ayar.php");
		//$("#onizleme").load("yenidosya.php");

});
setInterval(function() {$("#Kompanent").load('icerik.php');}, 1000);
setInterval(function() {$("#Ayar").load('ayar.php');}, 1000);
//setInterval(function() {$("#onizleme").load('yenidosya.php');}, 1000);


</script>

</head>
<body>
<div class="page3_tumsayfa" >

<div style="width:100%;height:60px; float:left;">
<form method="post">
<input type="submit" name="gerial" value="Geri Al"/>
</form>
</div>
	<div class="onizleme" id="onizleme" onclick="openPage(event, 'Kompanent', 'tablink_komp')">
		<?php include 'onizleme.php'; ?>
   </div>

<div class="editor_TapContent">

<div class="editor_tab">
  <button class="editor_tablinks" id="tablink_ayar" onclick="openPage(event, 'Ayar', 'tablink_ayar')">Ayarlar</button>
  <button class="editor_tablinks" id="tablink_komp" onclick="openPage(event, 'Kompanent', 'tablink_komp')">Kompanentler</button>
</div>

<div id="Ayar" id="ayar" class="editor_tabcontent">
  <h3>Ayarlar</h3>
</div>

<div id="Kompanent" class="editor_tabcontent">

</div>

</div>
</div>


</body>
</html>


<?php

if(isset($_GET['ekle'])){
	$id=$_GET['ekle'];

	setcookie("ekle",$id,time()+86954);
	header('Location:'.$_SERVER['HTTP_REFERER']);

}
if(isset($_GET['AyarGecis'])){
	echo '<script type="text/javascript">',
     'openPage(event, "Ayar", "tablink_ayar");',
     '</script>';
	 $id2=$_GET['AyarGecis'];
	 $_SESSION["lagaluga"]=$id2;

	 
}


if(isset($_GET["denemeayar"])){
	
	//setcookie("ekle","Enes",time()+86954);
	$gelen=$_COOKIE["secilenkompanent"];
	$sayi=$_GET["denemeayar"];


if( $gelen == "header" ) {
	echo $gelen;
		$dt2 = fopen('header.php', 'w+');
		$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$sayi.'');
			while($sonuc=mysqli_fetch_assoc($sorgu) )
			{
				$style=$sonuc["komp_kod"];
				
			}
		fwrite($dt2, $style);
		fclose($dt2);
//$sayfa=$gelen.''.$sayi;
$sayfa=$gelen;

$kodlar = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("'.$sayfa.'.php");
});
     </script>';
$degisecek = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("bos.php");
});
     </script>';

		$oku=file_get_contents("sablon3.php");

		if(strstr($oku,$degisecek)){
$path_to_file = 'sablon3.php';
$file_contents = file_get_contents($path_to_file);
   
$file_contents = str_replace($degisecek,$kodlar,$file_contents);

file_put_contents($path_to_file,$file_contents);


		}else if(strstr($oku,$kodlar)){
						
		}else{

$dt = fopen('sablon3.php', 'a');
fwrite($dt, $kodlar);
fclose($dt);


		}

	header('Location:'.$_SERVER['HTTP_REFERER']);

}else{

	//$sayfa=$gelen.''.$sayi;


$kodlar = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("'.$gelen.'.php");
});
     </script>';
$degisecek = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("bos.php");
});
     </script>';

		$oku=file_get_contents("sablon3.php");
$dt2 = fopen(''.$gelen.'.php', 'a');
$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$sayi.'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		$path=$sonuc["komp_kod"];
		
	}
fwrite($dt2, $path);
fclose($dt2);
		if(strstr($oku,$degisecek)){
$path_to_file = 'sablon3.php';
$file_contents = file_get_contents($path_to_file);
   
$file_contents = str_replace($degisecek,$kodlar,$file_contents);

file_put_contents($path_to_file,$file_contents);






		}else if(strstr($oku,$kodlar)){
						
		}else{

$dt = fopen('sablon3.php', 'a');
fwrite($dt, $kodlar);
$sayfa=$gelen;



fclose($dt);	
	}

	header('Location:'.$_SERVER['HTTP_REFERER']);

}

}
if(isset($_POST['gerial'])){
	$gelen=$_COOKIE["secilenkompanent"];

$degisecek = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("bos.php");
});
     </script>';
$degistirilecek = '<script type="text/javascript">
     $(document).ready(function() {
        $("#'.$gelen.'").load("'.$gelen.'.php");
});
     </script>';
$path_to_file = 'sablon3.php';
$file_contents = file_get_contents($path_to_file);
   
$file_contents = str_replace($degistirilecek,$degisecek,$file_contents);

file_put_contents($path_to_file,$file_contents);

header('Location:'.$_SERVER['HTTP_REFERER']);

}


?>


<script>
$("#data td").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#data td").removeClass("highlight");
	if(!selected)
		$(this).addClass("highlight");
	var status = $(this).attr("id")
	 //$("#a").html(status+"asdasd");
    myFunction(status);
	
});
function myFunction(param) {


$(document).ready(function () {
  createCookie("secilenkompanent", param, "10");
});

}
function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
</script>