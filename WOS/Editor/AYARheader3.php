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
      $file = $_FILES['header3_resim'];
      
  
      $fileName = $_FILES['header3_resim']['name'];
      $fileTmpName = $_FILES['header3_resim']['tmp_name'];
      $fileSize = $_FILES['header3_resim']['size'];
      $fileError = $_FILES['header3_resim']['error'];
      $fileType = $_FILES['header3_resim']['type'];
  
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


$deger1=$_POST["header3_1yazi"];
$deger2=$_POST["header3_2yazi"];
$deger3=$_POST["header3_3yazi"];
$deger6=$_POST["header3_4yazi"];
$deger7=$_POST["header3_5yazi"];

$deger11=replace_tr($deger1);
$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);
$deger66=replace_tr($deger6);
$deger77=replace_tr($deger7);

$deger4=$_POST["header3_arkaplan"];
$deger5=$_POST["header3_resim"];
$deger8=$_POST["header3_button"];

if($deger8 == 1){
  setcookie("sayfaEkle[header3_button]","#008CBA",time()+3600);
}else if($deger8 == 2){
  setcookie("sayfaEkle[header3_button]","#f44336",time()+3600);
}else if($deger8 == 3){
  setcookie("sayfaEkle[header3_button]","#555555",time()+3600);
}

if($_POST["header3_resim_daire"] == null)
      $deger9=" ";
else
      $deger9=$_POST["header3_resim_daire"];

if($_POST["header3_resim_gölge"] == null)
      $deger10=" ";
else
      $deger10=$_POST["header3_resim_gölge"];
      
$deger14=$_POST["header3_resim_genislik"];
$deger12=$_POST["header3_resim_yükseklik"];

setcookie("sayfaEkle[header3_1yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header3_2yazi]",$deger2,time()+3600);
setcookie("sayfaEkle[header3_3yazi]",$deger3,time()+3600);
setcookie("sayfaEkle[header3_4yazi]",$deger6,time()+3600);
setcookie("sayfaEkle[header3_5yazi]",$deger7,time()+3600);

setcookie("sayfaEkle[header3_1link]",$deger11,time()+3600);
setcookie("sayfaEkle[header3_2link]",$deger22,time()+3600);
setcookie("sayfaEkle[header3_3link]",$deger33,time()+3600);
setcookie("sayfaEkle[header3_4link]",$deger66,time()+3600);
setcookie("sayfaEkle[header3_5link]",$deger77,time()+3600);

setcookie("sayfaEkle[header3_arkaplan]",$deger4,time()+3600);
setcookie("sayfaEkle[header3_resim]",$fileName,time()+3600);


setcookie("iceriksayfasi[header3_yazi2]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[header3_yazi3]",$deger33,time()+3600*60);
setcookie("iceriksayfasi[header3_yazi4]",$deger66,time()+3600*60);
setcookie("iceriksayfasi[header3_yazi5]",$deger77,time()+3600*60);

setcookie("sayfaEkle[header3_resim_daire]",$deger9,time()+3600);
setcookie("sayfaEkle[header3_resim_gölge]",$deger10,time()+3600);
setcookie("sayfaEkle[header3_resim_genislik]",$deger14,time()+3600);
setcookie("sayfaEkle[header3_resim_yükseklik]",$deger12,time()+3600);


header("Location: editor.php?KompanentEkle=4");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
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