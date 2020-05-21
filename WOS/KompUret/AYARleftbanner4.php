<?php 
    include 'mysql_connect.php';
    $gelenkullaniciemail=$_SESSION["Kullaniciadi"];


    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }



    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['leftbanner4_resim'];
      
  
      $fileName = $_FILES['leftbanner4_resim']['name'];
      $fileTmpName = $_FILES['leftbanner4_resim']['tmp_name'];
      $fileSize = $_FILES['leftbanner4_resim']['size'];
      $fileError = $_FILES['leftbanner4_resim']['error'];
      $fileType = $_FILES['leftbanner4_resim']['type'];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png');
      $error = fopen("ErrorLogs.txt", "a");
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
              if($fileSize < 1024*1024*10){
                  $fileNameNew = uniqid('', true).".".$fileActualExt;
                  $fileDestination = $fileName;
          

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


$deger1=$_POST["leftbanner4_yazi"];
$deger2=$_POST["leftbanner4_arkaplan"];
$deger3=$_POST["leftbanner4_resim"];

$deger12=$_POST["leftbanner4_yazim_fontu"];
$deger13=$_POST["leftbanner4_yaziboyutu"];
$deger14=$_POST["leftbanner4_yazi_rengi"];

$deger9=$_POST["leftbanner4_resim_genislik"];
$deger7=$_POST["leftbanner4_resim_yükseklik"];

if($_POST["leftbanner4_resim_daire"] == null)
      $deger5=" ";
else
      $deger5=$_POST["leftbanner4_resim_daire"];

if($_POST["leftbanner4_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["leftbanner4_resim_golge"];


setcookie("sayfaEkle[leftbanner4_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[leftbanner4_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[leftbanner4_resim]",$fileName,time()+3600);

setcookie("sayfaEkle[leftbanner4_resim_genislik]",$deger9,time()+3600);
setcookie("sayfaEkle[leftbanner4_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[leftbanner4_resim_daire]",$deger5,time()+3600);
setcookie("sayfaEkle[leftbanner4_resim_golge]",$deger8,time()+3600);

setcookie("sayfaEkle[leftbanner4_yazim_fontu]",$deger12,time()+3600);
setcookie("sayfaEkle[leftbanner4_yaziboyutu]",$deger13,time()+3600);
setcookie("sayfaEkle[leftbanner4_yazi_rengi]",$deger14,time()+3600);

header("Location: kompuret.php?KompanentEkle=32");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>