<html>
<head>
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
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
</body>
</html>