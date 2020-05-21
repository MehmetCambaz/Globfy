<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }


$deger1=$_POST["bar2_yazi"];
$deger2=$_POST["bar2_arkaplan"];
$deger4=$_POST["bar2_yazim_rengi"];

$deger9=$_POST["bar2_yazim_fontu"];
$deger11=$_POST["bar2_yaziboyutu"];

setcookie("sayfaEkle[bar2_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[bar2_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[bar2_yazim_rengi]",$deger4,time()+3600);
setcookie("sayfaEkle[bar2_yazim_fontu]",$deger9,time()+3600);
setcookie("sayfaEkle[bar2_yaziboyutu]",$deger11,time()+3600);

header("Location: editor.php?KompanentEkle=33");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>