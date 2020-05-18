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
      $file = $_FILES['header8_resim'];
      
  
      $fileName = $_FILES['header8_resim']['name'];
      $fileTmpName = $_FILES['header8_resim']['tmp_name'];
      $fileSize = $_FILES['header8_resim']['size'];
      $fileError = $_FILES['header8_resim']['error'];
      $fileType = $_FILES['header8_resim']['type'];
  
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


$deger1=$_POST["header8_yazi"];
$deger2=$_POST["header8_1yazi"];
$deger3=$_POST["header8_2yazi"];
$deger4=$_POST["header8_3yazi"];

$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);
$deger44=replace_tr($deger4);

$deger6=$_POST["header8_arkaplan"];
$deger5=$_POST["header8_resim"];

$deger7=$_POST["header8_button"];

if($deger7 == 1){
  setcookie("sayfaEkle[header8_button]","#008CBA",time()+3600);
}else if($deger7 == 2){
  setcookie("sayfaEkle[header8_button]","#f44336",time()+3600);
}else if($deger7 == 3){
  setcookie("sayfaEkle[header8_button]","#555555",time()+3600);
}

$deger45=$_POST["header8_yazim_fontu"];
$deger155=$_POST["header8_baslikrenk"];
$deger65=$_POST["header8_resim_genislik"];
$deger75=$_POST["header8_resim_yükseklik"];

if($_POST["header8_resim_daire"] == null)
      $deger51=" ";
else
      $deger51=$_POST["header8_resim_daire"];

if($_POST["header8_resim_golge"] == null)
      $deger81=" ";
else
      $deger81=$_POST["header8_resim_golge"];

setcookie("sayfaEkle[header8_yazi]",$deger1,time()+3600);

setcookie("sayfaEkle[header8_1yazi]",$deger2,time()+3600);
setcookie("sayfaEkle[header8_2yazi]",$deger3,time()+3600);
setcookie("sayfaEkle[header8_3yazi]",$deger4,time()+3600);
setcookie("sayfaEkle[header8_1link]",$deger22,time()+3600);
setcookie("sayfaEkle[header8_2link]",$deger33,time()+3600);
setcookie("sayfaEkle[header8_3link]",$deger44,time()+3600);

setcookie("sayfaEkle[header8_yazim_fontu]",$deger45,time()+3600);
setcookie("sayfaEkle[header8_baslikrenk]",$deger155,time()+3600);
setcookie("sayfaEkle[header8_resim_genislik]",$deger65,time()+3600);
setcookie("sayfaEkle[header8_resim_yükseklik]",$deger75,time()+3600);
setcookie("sayfaEkle[header8_resim_daire]",$deger51,time()+3600);
setcookie("sayfaEkle[header8_resim_golge]",$deger81,time()+3600);

setcookie("sayfaEkle[header8_arkaplan]",$deger6,time()+3600);
setcookie("sayfaEkle[header8_resim]",$fileName,time()+3600);


setcookie("iceriksayfasi[header8_2link]",$deger33,time()+3600*60);
setcookie("iceriksayfasi[header8_3link]",$deger44,time()+3600*60);

header("Location: editor.php?KompanentEkle=29");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
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