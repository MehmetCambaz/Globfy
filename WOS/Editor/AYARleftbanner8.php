<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

 


$deger1=$_POST["leftbar8_arkaplan"];
$deger2=$_POST["leftbar8_link1"];
$deger3=$_POST["leftbar8_link2"];



$deger8=$_POST["leftbar8_link1adres"];
$deger9=$_POST["leftbar8_link2adres"];

$deger7=$_POST["leftbar8_linkyazirenk"];
$deger12=$_POST["leftbar8_yazim_fontu"];
$deger13=$_POST["leftbar8_yaziboyutu"];


setcookie("sayfaEkle[leftbar8_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[leftbar8_link1]",$deger2,time()+3600);
setcookie("sayfaEkle[leftbar8_link2]",$deger3,time()+3600);

setcookie("sayfaEkle[leftbar8_yazim_fontu]",$deger12,time()+3600);
setcookie("sayfaEkle[leftbar8_yaziboyutu]",$deger13,time()+3600);

setcookie("sayfaEkle[leftbar8_link1adres]",$deger8,time()+3600);
setcookie("sayfaEkle[leftbar8_link2adres]",$deger9,time()+3600);

setcookie("sayfaEkle[leftbar8_linkyazirenk]",$deger7,time()+3600);


header("Location: editor.php?KompanentEkle=95");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>