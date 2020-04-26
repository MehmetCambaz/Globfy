<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">
<link rel="icon" href="Desing\Pictures\logo.ico" type="image/icon type">
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>
<style>

body{

background: url(wos_background.gif);
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-attachment: fixed;
 }
</style>
</head>
<body>
<center>
<table border="0">
<tr>
<td>
<div class="anasayfa_Main">
<div class="anasayfa_Header">
<?php
	include('header.php');
?>
</div>
<div class="anasayfa_Body">
<?php

$sayfalar_klasor='./';

if(!empty($_GET['sayfa'])){
	$sayfalar=scandir($sayfalar_klasor,0);
	unset($sayfalar[0],$sayfalar[1]);
	
$sayfa=$_GET['sayfa'];

if(in_array($sayfa.'.php', $sayfalar)){
	include($sayfa.'.php');
	
}
else{
	echo 'Aradığınız sayfa bulunamadı';
}
}
else{
	include('body.php');
}

?>
</div>
<div class="anasayfa_Footer">
<?php
	include('footer.php');
?>

</div>
</div>
</td>
</tr>
</table>
</center>
</body>
</html>