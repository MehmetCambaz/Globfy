<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }


$deger1=$_POST["content2_yazim"];
$deger2=$_POST["content2_arkaplan"];

setcookie("sayfaEkle[content2_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content2_arkaplan]",$deger2,time()+3600);

header("Location: index3.php?KompanentEkle=6");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>