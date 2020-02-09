<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }


$deger1=$_POST["content3_resim"];
$deger2=$_POST["content3_resim2"];
$deger3=$_POST["content3_resim3"];
$deger4=$_POST["content3_resim4"];
$deger5=$_POST["content3_resim5"];
$deger6=$_POST["content3_arkaplan"];


setcookie("sayfaEkle[content3_resim]",$deger1,time()+3600);
setcookie("sayfaEkle[content3_resim2]",$deger2,time()+3600);
setcookie("sayfaEkle[content3_resim3]",$deger3,time()+3600);
setcookie("sayfaEkle[content3_resim4]",$deger4,time()+3600);
setcookie("sayfaEkle[content3_resim5]",$deger5,time()+3600);
setcookie("sayfaEkle[content3_arkaplan]",$deger6,time()+3600);


header("Location: index3.php?KompanentEkle=7");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>