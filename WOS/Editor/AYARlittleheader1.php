<?php 
  include 'mysql_connect.php';
  $gelenkullaniciemail=$_SESSION["Kullaniciadi"];

  $dosyaAdiEditor="editorsayfalari_$gelenkullaniciemail";
  $dosyaAdiKullanici="kullanicisayfalari_$gelenkullaniciemail";
  $dosyaAdiEditorResim="editorsayfalari_$gelenkullaniciemail/resimler";
  $dosyaAdiKullaniciResim="kullanicisayfalari_$gelenkullaniciemail/resimler";

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["littleheader1_yazi"];
$deger2=$_POST["littleheader1_yazi2"];
$deger3=$_POST["littleheader1_yazi3"];
$deger6=$_POST["littleheader1_yazi4"];
$deger7=$_POST["littleheader1_yazi5"];
$deger4=$_POST["littleheader1_arkaplan"];


setcookie("sayfaEkle[littleheader1_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[littleheader1_yazi2]",$deger2,time()+3600);
setcookie("sayfaEkle[littleheader1_yazi3]",$deger3,time()+3600);
setcookie("sayfaEkle[littleheader1_yazi4]",$deger6,time()+3600);
setcookie("sayfaEkle[littleheader1_yazi5]",$deger7,time()+3600);
setcookie("sayfaEkle[littleheader1_arkaplan]",$deger4,time()+3600);


setcookie("iceriksayfasi[littleheader1_yazi]",$deger1,time()+3600*60);
setcookie("iceriksayfasi[littleheader1_yazi2]",$deger2,time()+3600*60);
setcookie("iceriksayfasi[littleheader1_yazi3]",$deger3,time()+3600*60);
setcookie("iceriksayfasi[littleheader1_yazi4]",$deger6,time()+3600*60);
setcookie("iceriksayfasi[littleheader1_yazi5]",$deger7,time()+3600*60);

header("Location: editor.php?KompanentEkle=26");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>