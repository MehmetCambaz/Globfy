<?php 

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
           
                  if(!file_exists("resimler")) {
                    $olustur = mkdir("resimler");
                  }
                  
                  
                  if(!file_exists("kullanicisayfalari")) {
                    $olustur = mkdir("kullanicisayfalari");
                  }
                  if(!file_exists("kullanicisayfalari/resimler")) {
                    $olustur = mkdir("kullanicisayfalari/resimler");
                  }
  
                  move_uploaded_file($fileTmpName, "resimler/".$fileDestination);
                  copy("resimler/".$fileDestination,"kullanicisayfalari/resimler/".$fileDestination);
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

setcookie("sayfaEkle[header1_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header1_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[header1_resim]",$fileName,time()+3600);

header("Location: editor.php?KompanentEkle=2");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>