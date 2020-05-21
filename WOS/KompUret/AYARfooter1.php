<?php 

include 'mysql_connect.php';
$gelenkullaniciemail=$_SESSION["Kullaniciadi"];


    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["footer1_arkaplan"];
$deger2=$_POST["footer1_facebook"];
$deger3=$_POST["footer1_youtube"];
$deger4=$_POST["footer1_instagram"];
$deger5=$_POST["footer1_adres"];
$deger7=$_POST["footer1_adres2"];
$deger6=$_POST["footer1_telefon"];


setcookie("sayfaEkle[footer1_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[footer1_facebook]",$deger2,time()+3600);
setcookie("sayfaEkle[footer1_youtube]",$deger3,time()+3600);
setcookie("sayfaEkle[footer1_instagram]",$deger4,time()+3600);
setcookie("sayfaEkle[footer1_adres]",$deger5,time()+3600);
setcookie("sayfaEkle[footer1_adres2]",$deger7,time()+3600);
setcookie("sayfaEkle[footer1_telefon]",$deger6,time()+3600);

header("Location: kompuret.php?KompanentEkle=80");
?>