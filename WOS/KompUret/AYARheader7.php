<?php 
  include 'mysql_connect.php';
  $gelenkullaniciemail=$_SESSION["Kullaniciadi"];


    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

    foreach ($_COOKIE['iceriksayfasi'] as $name => $value) {

      setcookie('iceriksayfasi['.$name.']',$name,time()-3600); 
   
    }

$deger1=$_POST["header7_yazi"];
$deger2=$_POST["header7_yazi2"];
$deger3=$_POST["header7_yazi3"];
$deger6=$_POST["header7_yazi4"];
$deger7=$_POST["header7_yazi5"];

$deger11=replace_tr($deger1);
$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);
$deger66=replace_tr($deger6);
$deger77=replace_tr($deger7);

$deger8=$_POST["header7_yazi6"];
$deger9=$_POST["header7_altyazirenk"];
$deger4=$_POST["header7_arkaplan"];
$deger10=$_POST["header7_button"];
$deger12=$_POST["header7_yaziboyutu"];

if($deger10 == 1){
  setcookie("sayfaEkle[header7_button]","#008CBA",time()+3600);
}else if($deger10 == 2){
  setcookie("sayfaEkle[header7_button]","#f44336",time()+3600);
}else if($deger10 == 3){
  setcookie("sayfaEkle[header7_button]","#555555",time()+3600);
}



setcookie("sayfaEkle[header7_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header7_yazi2]",$deger2,time()+3600);
setcookie("sayfaEkle[header7_yazi3]",$deger3,time()+3600);
setcookie("sayfaEkle[header7_yazi4]",$deger6,time()+3600);
setcookie("sayfaEkle[header7_yazi5]",$deger7,time()+3600);
setcookie("sayfaEkle[header7_yazi6]",$deger8,time()+3600);

setcookie("sayfaEkle[header7_altyazirenk]",$deger9,time()+3600);
setcookie("sayfaEkle[header7_arkaplan]",$deger4,time()+3600);
setcookie("sayfaEkle[header7_arkaplan]",$deger4,time()+3600);

setcookie("sayfaEkle[header7_link]",$deger11,time()+3600*60);
setcookie("sayfaEkle[header7_link2]",$deger22,time()+3600*60);
setcookie("sayfaEkle[header7_link3]",$deger33,time()+3600*60);
setcookie("sayfaEkle[header7_link4]",$deger66,time()+3600*60);
setcookie("sayfaEkle[header7_link5]",$deger77,time()+3600*60);
setcookie("sayfaEkle[header7_yaziboyutu]",$deger12,time()+3600*60);

setcookie("iceriksayfasi[header7_link]",$deger11,time()+3600*60);
setcookie("iceriksayfasi[header7_link2]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[header7_link3]",$deger33,time()+3600*60);
setcookie("iceriksayfasi[header7_link4]",$deger66,time()+3600*60);
setcookie("iceriksayfasi[header7_link5]",$deger77,time()+3600*60);

header("Location: kompuret.php?KompanentEkle=28");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
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