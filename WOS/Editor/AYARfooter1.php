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

$deger1=$_POST["footer1_arkaplan"];
$deger2=$_POST["footer1_facebook"];
$deger3=$_POST["footer1_youtube"];
$deger4=$_POST["footer1_instagram"];
$deger5=$_POST["footer1_adres"];
$deger7=$_POST["footer1_adres2"];
$deger6=$_POST["footer1_telefon"];

if(!file_exists($dosyaAdiEditorResim)) {
    $olustur = mkdir($dosyaAdiEditorResim);
  }

if(!file_exists($dosyaAdiKullaniciResim)) {
    $olustur = mkdir($dosyaAdiKullaniciResim);
  }

copy("komp/facebook_wos.png",$dosyaAdiKullaniciResim."/facebook_wos.png");
copy("komp/youtube_wos.png",$dosyaAdiKullaniciResim."/youtube_wos.png");
copy("komp/instagram_wos.png",$dosyaAdiKullaniciResim."/instagram_wos.png");

copy("komp/facebook_wos.png",$dosyaAdiEditorResim."/facebook_wos.png");
copy("komp/youtube_wos.png",$dosyaAdiEditorResim."/youtube_wos.png");
copy("komp/instagram_wos.png",$dosyaAdiEditorResim."/instagram_wos.png");

setcookie("sayfaEkle[footer1_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[footer1_facebook]",$deger2,time()+3600);
setcookie("sayfaEkle[footer1_youtube]",$deger3,time()+3600);
setcookie("sayfaEkle[footer1_instagram]",$deger4,time()+3600);
setcookie("sayfaEkle[footer1_adres]",$deger5,time()+3600);
setcookie("sayfaEkle[footer1_adres2]",$deger7,time()+3600);
setcookie("sayfaEkle[footer1_telefon]",$deger6,time()+3600);

header("Location: editor.php?KompanentEkle=80");
?>