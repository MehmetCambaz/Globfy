<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["leftbanner6_arkaplan"];


setcookie("sayfaEkle[leftbanner6_arkaplan]",$deger1,time()+3600);

header("Location: kompuret.php?KompanentEkle=81");
?>