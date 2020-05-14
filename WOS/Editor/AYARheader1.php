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
      $file = $_FILES['header1_resim'];
      
  
      $fileName = $_FILES['header1_resim']['name'];
      $fileTmpName = $_FILES['header1_resim']['tmp_name'];
      $fileSize = $_FILES['header1_resim']['size'];
      $fileError = $_FILES['header1_resim']['error'];
      $fileType = $_FILES['header1_resim']['type'];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png');
      $error = fopen("ErrorLogs.txt", "a");
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
              if($fileSize < 1024*1024*10){
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


$deger1=$_POST["header1_yazi"];
$deger2=$_POST["header1_arkaplan"];
$deger3=$_POST["header1_resim"];
$deger4=$_POST["header1_yazim_fontu"];
$deger15=$_POST["header1_yazim_renk"];
$deger6=$_POST["header1_resim_genislik"];
$deger7=$_POST["header1_resim_yükseklik"];

if($_POST["header1_resim_daire"] == null)
      $deger5=" ";
else
      $deger5=$_POST["header1_resim_daire"];

if($_POST["header1_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["header1_resim_golge"];
      



setcookie("sayfaEkle[header1_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header1_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[header1_resim]",$fileName,time()+3600);
setcookie("sayfaEkle[header1_yazim_fontu]",$deger4,time()+3600);
setcookie("sayfaEkle[header1_yazim_renk]",$deger15,time()+3600);
setcookie("sayfaEkle[header1_resim_daire]",$deger5,time()+3600);
setcookie("sayfaEkle[header1_resim_genislik]",$deger6,time()+3600);
setcookie("sayfaEkle[header1_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[header1_resim_golge]",$deger8,time()+3600);


header("Location: editor.php?KompanentEkle=2");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>