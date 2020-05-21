<?php
   include 'mysql_connect.php';

   foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

     setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
  
   }

$deger1=$_POST["littleheader3_yazi"];
$deger2=$_POST["littleheader3_arkaplan"];
$deger3=$_POST["littleheader3_yazi_rengi"];

$deger4=$_POST["littleheader3_yazim_fontu"];

      
$deger9=$_POST["littleheader3_yaziboyutu"];


setcookie("sayfaEkle[littleheader3_yazi]",$deger1,time()+3600);

setcookie("sayfaEkle[littleheader3_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[littleheader3_yazi_rengi]",$deger3,time()+3600);


setcookie("sayfaEkle[littleheader3_yazim_fontu]",$deger4,time()+3600);

setcookie("sayfaEkle[littleheader3_yaziboyutu]",$deger9,time()+3600);




header("Location: kompuret.php?KompanentEkle=104");

?>