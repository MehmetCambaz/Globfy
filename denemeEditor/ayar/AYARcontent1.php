<?php 
$deger1=$_POST["content_baslik"];
$deger2=$_POST["content_yazi"];
setcookie("sayfaEkle[1]",$deger1,time()+15945);
setcookie("sayfaEkle[2]",$deger2,time()+15945);
header("Location: index3.php");
?>