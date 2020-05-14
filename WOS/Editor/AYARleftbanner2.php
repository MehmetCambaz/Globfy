<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

 


$deger1=$_POST["leftbar2_arkaplan"];
$deger2=$_POST["leftbar2_link1"];
$deger3=$_POST["leftbar2_link2"];
$deger4=$_POST["leftbar2_link3"];
$deger5=$_POST["leftbar2_link4"];


$deger8=$_POST["leftbar2_link1adres"];
$deger9=$_POST["leftbar2_link2adres"];
$deger10=$_POST["leftbar2_link3adres"];
$deger11=$_POST["leftbar2_link4adres"];
$deger7=$_POST["leftbar2_linkyazirenk"];
$deger12=$_POST["leftbar2_yazim_fontu"];
$deger13=$_POST["leftbar2_yaziboyutu"];


setcookie("sayfaEkle[leftbar2_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[leftbar2_link1]",$deger2,time()+3600);
setcookie("sayfaEkle[leftbar2_link2]",$deger3,time()+3600);
setcookie("sayfaEkle[leftbar2_link3]",$deger4,time()+3600);
setcookie("sayfaEkle[leftbar2_link4]",$deger5,time()+3600);
setcookie("sayfaEkle[leftbar2_yazim_fontu]",$deger12,time()+3600);
setcookie("sayfaEkle[leftbar2_yaziboyutu]",$deger13,time()+3600);

setcookie("sayfaEkle[leftbar2_link1adres]",$deger8,time()+3600);
setcookie("sayfaEkle[leftbar2_link2adres]",$deger9,time()+3600);
setcookie("sayfaEkle[leftbar2_link3adres]",$deger10,time()+3600);
setcookie("sayfaEkle[leftbar2_link4adres]",$deger11,time()+3600);
setcookie("sayfaEkle[leftbar2_linkyazirenk]",$deger7,time()+3600);


header("Location: editor.php?KompanentEkle=10");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>