<?php
   include 'mysql_connect.php';

   foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

     setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
  
   }

$deger1=$_POST["littleheader2_yazi"];
$deger2=$_POST["littleheader2_arkaplan"];
$deger3=$_POST["littleheader2_yazi_rengi"];

$deger4=$_POST["littleheader2_yazim_fontu"];

      
$deger9=$_POST["littleheader2_yaziboyutu"];


setcookie("sayfaEkle[littleheader2_yazi]",$deger1,time()+3600);

setcookie("sayfaEkle[littleheader2_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[littleheader2_yazi_rengi]",$deger3,time()+3600);


setcookie("sayfaEkle[littleheader2_yazim_fontu]",$deger4,time()+3600);

setcookie("sayfaEkle[littleheader2_yaziboyutu]",$deger9,time()+3600);




header("Location: editor.php?KompanentEkle=103");

?>