<?php 
    include 'mysql_connect.php';
    $gelenkullaniciemail=$_SESSION["Kullaniciadi"];


    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }



    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['bar3_resim'];
      
  
      $fileName = $_FILES['bar3_resim']['name'];
      $fileTmpName = $_FILES['bar3_resim']['tmp_name'];
      $fileSize = $_FILES['bar3_resim']['size'];
      $fileError = $_FILES['bar3_resim']['error'];
      $fileType = $_FILES['bar3_resim']['type'];
  
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



$deger2=$_POST["bar3_arkaplan"];
$deger3=$_POST["bar3_resim"];

setcookie("sayfaEkle[bar3_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[bar3_resim]",$fileName,time()+3600);

header("Location: kompuret.php?KompanentEkle=34");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>