<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }
 

$deger1=$_POST["content2_yazim"];
$deger2=$_POST["content2_arkaplan"];
$deger4=$_POST["content2_yazim_rengi"];
$deger9=$_POST["content2_yazim_fontu"];
$deger11=$_POST["content2_yaziboyutu"];

setcookie("sayfaEkle[content2_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content2_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[content2_yazim_rengi]",$deger4,time()+3600);
setcookie("sayfaEkle[content2_yazim_fontu]",$deger9,time()+3600);
setcookie("sayfaEkle[content2_yaziboyutu]",$deger11,time()+3600);


header("Location: kompuret.php?KompanentEkle=6");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>