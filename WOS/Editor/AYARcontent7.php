<?php 
include 'mysql_connect.php';

foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

    setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
 
  }


$deger1=$_POST["content7_lig"];
$deger2=$_POST["content7_arkaplan"];



setcookie("sayfaEkle[content7_lig]",$deger1,time()+3600);
setcookie("sayfaEkle[content7_arkaplan]",$deger2,time()+3600);


header("Location: editor.php?KompanentEkle=65");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>