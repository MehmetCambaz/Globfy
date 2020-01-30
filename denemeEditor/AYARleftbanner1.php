<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }


$deger1=$_POST["leftbar1_arkaplan"];
$deger2=$_POST["leftbar1_linkrenk"];
$deger3=$_POST["leftbar1_link1"];
$deger4=$_POST["leftbar1_link2"];
$deger5=$_POST["leftbar1_link3"];
$deger6=$_POST["leftbar1_link4"];


setcookie("sayfaEkle[leftbar1_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[leftbar1_linkrenk]",$deger2,time()+3600);
setcookie("sayfaEkle[leftbar1_link1]",$deger3,time()+3600);
setcookie("sayfaEkle[leftbar1_link2]",$deger4,time()+3600);
setcookie("sayfaEkle[leftbar1_link3]",$deger5,time()+3600);
setcookie("sayfaEkle[leftbar1_link4]",$deger6,time()+3600);


header("Location: index3.php?KompanentEkle=9");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>