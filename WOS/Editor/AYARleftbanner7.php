<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }



$deger1=$_POST["leftbar7_arkaplan"];
$deger2=$_POST["leftbar7_linkrenk"];
$deger3=$_POST["leftbar7_link1"];
$deger4=$_POST["leftbar7_link2"];


$deger8=$_POST["leftbar7_link1adres"];
$deger9=$_POST["leftbar7_link2adres"];

$deger7=$_POST["leftbar7_linkyazirenk"];
$deger12=$_POST["leftbar7_yazim_fontu"];
$deger13=$_POST["leftbar7_yaziboyutu"];



setcookie("sayfaEkle[leftbar7_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[leftbar7_linkrenk]",$deger2,time()+3600);
setcookie("sayfaEkle[leftbar7_link1]",$deger3,time()+3600);
setcookie("sayfaEkle[leftbar7_link2]",$deger4,time()+3600);

setcookie("sayfaEkle[leftbar7_yazim_fontu]",$deger12,time()+3600);
setcookie("sayfaEkle[leftbar7_yaziboyutu]",$deger13,time()+3600);

setcookie("sayfaEkle[leftbar7_link1adres]",$deger8,time()+3600);
setcookie("sayfaEkle[leftbar7_link2adres]",$deger9,time()+3600);

setcookie("sayfaEkle[leftbar7_linkyazirenk]",$deger7,time()+3600);



header("Location: editor.php?KompanentEkle=93");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>