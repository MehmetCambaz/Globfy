<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">
<link rel="icon" href="Desing\Pictures\logo.ico" type="image/icon type">
<link rel="stylesheet" href="Desing/styles_menu.css">

   <script src="Desing/script_menu.js" type="text/javascript"></script>
   <script src="Desing/script_menu2.js"></script>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script data-ad-client="ca-pub-3191787238536537" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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