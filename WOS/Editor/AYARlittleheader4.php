<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }



$deger1=$_POST["littleheader4_arkaplan"];
$deger2=$_POST["littleheader4_linkrenk"];
$deger3=$_POST["littleheader4_link1"];
$deger4=$_POST["littleheader4_link2"];
$deger5=$_POST["littleheader4_link3"];
$deger6=$_POST["littleheader4_link4"];

$deger8=$_POST["littleheader4_link1adres"];
$deger9=$_POST["littleheader4_link2adres"];
$deger10=$_POST["littleheader4_link3adres"];
$deger11=$_POST["littleheader4_link4adres"];
$deger7=$_POST["littleheader4_linkyazirenk"];
$deger12=$_POST["littleheader4_yazim_fontu"];
$deger13=$_POST["littleheader4_yaziboyutu"];



setcookie("sayfaEkle[littleheader4_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[littleheader4_link1]",$deger3,time()+3600);
setcookie("sayfaEkle[littleheader4_link2]",$deger4,time()+3600);
setcookie("sayfaEkle[littleheader4_link3]",$deger5,time()+3600);
setcookie("sayfaEkle[littleheader4_link4]",$deger6,time()+3600);
setcookie("sayfaEkle[littleheader4_yazim_fontu]",$deger12,time()+3600);
setcookie("sayfaEkle[littleheader4_yaziboyutu]",$deger13,time()+3600);

setcookie("sayfaEkle[littleheader4_link1adres]",$deger8,time()+3600);
setcookie("sayfaEkle[littleheader4_link2adres]",$deger9,time()+3600);
setcookie("sayfaEkle[littleheader4_link3adres]",$deger10,time()+3600);
setcookie("sayfaEkle[littleheader4_link4adres]",$deger11,time()+3600);
setcookie("sayfaEkle[littleheader4_linkyazirenk]",$deger7,time()+3600);



header("Location: editor.php?KompanentEkle=105");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>