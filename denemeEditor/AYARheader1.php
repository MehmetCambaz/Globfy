<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }


$deger1=$_POST["header1_yazi"];
$deger2=$_POST["header1_arkaplan"];
$deger3=$_POST["header1_resim"];

setcookie("sayfaEkle[header1_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header1_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[header1_resim]",$deger3,time()+3600);

header("Location: index3.php?denemeayar=2");
?>