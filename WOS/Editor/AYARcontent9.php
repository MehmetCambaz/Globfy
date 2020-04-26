<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["content9_konum"];
$deger2=$_POST["content9_görünüm"];
$deger3=$_POST["content9_arkaplan"];


setcookie("sayfaEkle[content9_konum]",$deger1,time()+3600);
setcookie("sayfaEkle[content9_görünüm]",$deger2,time()+3600);
setcookie("sayfaEkle[content9_arkaplan]",$deger3,time()+3600);

header("Location: editor.php?KompanentEkle=69");
?>