<?php 

include 'mysql_connect.php';
$gelenkullaniciemail=$_SESSION["Kullaniciadi"];


    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }

    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['footer2_profil'];
      
  
      $fileName = $_FILES['footer2_profil']['name'];
      $fileTmpName = $_FILES['footer2_profil']['tmp_name'];
      $fileSize = $_FILES['footer2_profil']['size'];
      $fileError = $_FILES['footer2_profil']['error'];
      $fileType = $_FILES['footer2_profil']['type'];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png');
      $error = fopen("ErrorLogs.txt", "a");
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
              if($fileSize < 999999999999){
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

  if(isset($_POST['sayfa_ekle'])){
    $file = $_FILES['footer2_logo'];
    

    $fileName1 = $_FILES['footer2_logo']['name'];
    $fileTmpName = $_FILES['footer2_logo']['tmp_name'];
    $fileSize = $_FILES['footer2_logo']['size'];
    $fileError = $_FILES['footer2_logo']['error'];
    $fileType = $_FILES['footer2_logo']['type'];

    $fileExt = explode('.', $fileName1);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 999999999999){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName1;
            
            
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

$deger1=$_POST["footer2_arkaplan"];
$deger2=$_POST["footer2_facebook"];
$deger3=$_POST["footer2_youtube"];
$deger4=$_POST["footer2_instagram"];
$deger5=$_POST["footer2_adres"];
$deger7=$_POST["footer2_adres2"];
$deger6=$_POST["footer2_telefon"];
$deger8=$_POST["footer2_profil"];
$deger9=$_POST["footer2_logo"];


setcookie("sayfaEkle[footer2_arkaplan]",$deger1,time()+3600);
setcookie("sayfaEkle[footer2_facebook]",$deger2,time()+3600);
setcookie("sayfaEkle[footer2_youtube]",$deger3,time()+3600);
setcookie("sayfaEkle[footer2_instagram]",$deger4,time()+3600);
setcookie("sayfaEkle[footer2_adres]",$deger5,time()+3600);
setcookie("sayfaEkle[footer2_adres2]",$deger7,time()+3600);
setcookie("sayfaEkle[footer2_telefon]",$deger6,time()+3600);
setcookie("sayfaEkle[footer2_profil]",$fileName,time()+3600);
setcookie("sayfaEkle[footer2_logo]",$fileName1,time()+3600);

header("Location: kompuret.php?KompanentEkle=88");
?>