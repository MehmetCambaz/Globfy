<?php 
include 'mysql_connect.php';

foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

    setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
 
  }


$deger1=$_POST["content12_facebook"];
$deger2=$_POST["content12_arkaplan"];



setcookie("sayfaEkle[content12_facebook]",urlencode($deger1),time()+3600);
setcookie("sayfaEkle[content12_arkaplan]",$deger2,time()+3600);


header("Location: kompuret.php?KompanentEkle=90");
?>
