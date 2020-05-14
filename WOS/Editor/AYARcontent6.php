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

  
    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['content6_resim'];
      
  
      $fileName = $_FILES['content6_resim']['name'];
      $fileTmpName = $_FILES['content6_resim']['tmp_name'];
      $fileSize = $_FILES['content6_resim']['size'];
      $fileError = $_FILES['content6_resim']['error'];
      $fileType = $_FILES['content6_resim']['type'];
  
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

$deger7=$_POST["content6_yazi"];

$deger4=$_POST["content6_yazirenk"];
$deger5=$_POST["content6_resim"];
$deger42=$_POST["content6_yazim_fontu"];
$deger53=$_POST["content6_yaziboyutu"];

setcookie("sayfaEkle[content6_yazi]",$deger7,time()+3600);


setcookie("sayfaEkle[content6_yazirenk]",$deger4,time()+3600);
setcookie("sayfaEkle[content6_resim]","'resimler/".$fileName."'",time()+3600);
setcookie("sayfaEkle[content6_yazim_fontu]",$deger42,time()+3600);
setcookie("sayfaEkle[content6_yaziboyutu]",$deger53,time()+3600);



header("Location: editor.php?KompanentEkle=63");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>