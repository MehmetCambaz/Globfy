<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["content8_hava"];


setcookie("sayfaEkle[content8_hava]",$deger1,time()+3600);

header("Location: editor.php?KompanentEkle=68");
?>