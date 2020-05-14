<?php 
include 'mysql_connect.php';

foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

    setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
 
  }


$deger1=$_POST["content11_haber"];
$deger2=$_POST["content11_arkaplan"];



setcookie("sayfaEkle[content11_haber]",$deger1,time()+3600);
setcookie("sayfaEkle[content11_arkaplan]",$deger2,time()+3600);


header("Location: kompuret.php?KompanentEkle=89");
?>