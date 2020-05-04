<?php include 'mysql_connect.php';
$kullanici=$_SESSION["Kullaniciadi"];

setcookie("Kullanicim",$kullanici,time()+1547);
      include 'editorsayfalari_'.$kullanici.'/wos_onizleme.php'; ?>