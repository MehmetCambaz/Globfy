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

    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['header4_resim'];
      
  
      $fileName = $_FILES['header4_resim']['name'];
      $fileTmpName = $_FILES['header4_resim']['tmp_name'];
      $fileSize = $_FILES['header4_resim']['size'];
      $fileError = $_FILES['header4_resim']['error'];
      $fileType = $_FILES['header4_resim']['type'];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png');
      $error = fopen("ErrorLogs.txt", "a");
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
              if($fileSize < 999999999999){
                  $fileNameNew = uniqid('', true).".".$fileActualExt;
                  $fileDestination = $fileName;
              
                  
                  if(!file_exists($dosyaAdiEditorResim)) {
                    $olustur = mkdir($dosyaAdiEditorResim);
                  }
                  
                  
                  if(!file_exists($dosyaAdiKullanici)) {
                    $olustur = mkdir($dosyaAdiKullanici);
                  }
                  if(!file_exists($dosyaAdiKullaniciResim)) {
                    $olustur = mkdir($dosyaAdiKullaniciResim);
                  }
  
                  move_uploaded_file($fileTmpName, $dosyaAdiEditorResim."/".$fileDestination);
                  copy($dosyaAdiEditorResim."/".$fileDestination,$dosyaAdiKullaniciResim."/".$fileDestination);
              }else{
                  echo "Resim fazla büyük !";
                  $txt = "Resim fazla büyük !\n";
                  fwrite($error, $txt);
                  fclose($error);
              }
          }else{
              echo "Resim yüklenirken hata oluştu !";
              $txt = "Resim yüklenirken hata oluştu !\n";
              fwrite($error, $txt);
              fclose($error);
          }
      }else{
          echo "Bu türdeki dosyaları yükleyemezsiniz !";
          $txt = "Bu türdeki dosyaları yükleyemezsiniz !\n";
          fwrite($error, $txt);
          fclose($error);
      }
  }

$deger7=$_POST["header4_yazi"];

$deger1=$_POST["header4_1yazi"];
$deger2=$_POST["header4_2yazi"];
$deger3=$_POST["header4_3yazi"];
$deger11=replace_tr($deger1);
$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);

$deger4=$_POST["header4_yazirenk"];
$deger5=$_POST["header4_resim"];
$deger48=$_POST["header4_yazim_fontu"];
$deger57=$_POST["header4_yaziboyutu"];



$deger6=$_POST["header4_button"];
if($deger6 == 1){
  setcookie("sayfaEkle[header4_button]","#008CBA",time()+3600);
}else if($deger6 == 2){
  setcookie("sayfaEkle[header4_button]","#f44336",time()+3600);
}else if($deger6 == 3){
  setcookie("sayfaEkle[header4_button]","#555555",time()+3600);
}

setcookie("sayfaEkle[header4_yazi]",$deger7,time()+3600);

setcookie("sayfaEkle[header4_1yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header4_2yazi]",$deger2,time()+3600);
setcookie("sayfaEkle[header4_3yazi]",$deger3,time()+3600);
setcookie("sayfaEkle[header4_1link]",$deger1,time()+3600);
setcookie("sayfaEkle[header4_2link]",$deger22,time()+3600);
setcookie("sayfaEkle[header4_3link]",$deger33,time()+3600);
setcookie("sayfaEkle[header4_yazim_fontu]",$deger48,time()+3600);
setcookie("sayfaEkle[header4_yaziboyutu]",$deger57,time()+3600);

setcookie("sayfaEkle[header4_yazirenk]",$deger4,time()+3600);
setcookie("sayfaEkle[header4_resim]","'resimler/".$fileName."'",time()+3600);


setcookie("iceriksayfasi[header4_2link]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[header4_3link]",$deger33,time()+3600*60);


header("Location: editor.php?KompanentEkle=11");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
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