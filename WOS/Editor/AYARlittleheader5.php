
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

    foreach ($_COOKIE['iceriksayfasi'] as $name => $value) {

      setcookie('iceriksayfasi['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["littleheader5_1yazi"];
$deger2=$_POST["littleheader5_2yazi"];
$deger3=$_POST["littleheader5_3yazi"];


$deger11=replace_tr($deger1);
$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);

$deger4=$_POST["littleheader5_arkaplan"];

$deger8=$_POST["littleheader5_button"];
if($deger8 == 1){
  setcookie("sayfaEkle[littleheader5_button]","#008CBA",time()+3600);
}else if($deger8 == 2){
  setcookie("sayfaEkle[littleheader5_button]","#f44336",time()+3600);
}else if($deger8 == 3){
  setcookie("sayfaEkle[littleheader5_button]","#555555",time()+3600);
}


setcookie("sayfaEkle[littleheader5_1yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[littleheader5_2yazi]",$deger2,time()+3600);
setcookie("sayfaEkle[littleheader5_3yazi]",$deger3,time()+3600);


setcookie("sayfaEkle[littleheader5_1link]",$deger11,time()+3600);
setcookie("sayfaEkle[littleheader5_2link]",$deger22,time()+3600);
setcookie("sayfaEkle[littleheader5_3link]",$deger33,time()+3600);


setcookie("sayfaEkle[littleheader5_arkaplan]",$deger4,time()+3600);



setcookie("iceriksayfasi[littleheader5_2link]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[littleheader5_3link]",$deger33,time()+3600*60);


header("Location: editor.php?KompanentEkle=106");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>

<?php
function replace_tr($text) {
  $text = trim($text);
  $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
  $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
  $new_text = str_replace($search,$replace,$text);
  return $new_text;
} 
?>