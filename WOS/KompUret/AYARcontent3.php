<?php 

include 'mysql_connect.php';
$gelenkullaniciemail=$_SESSION["Kullaniciadi"];


foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

  setcookie('sayfaEkle['.$name.']',$name,time()-3600); 

}


if(isset($_POST['sayfa_ekle'])){
  $file = $_FILES['content3_2resim'];
 

  $fileName2 = $_FILES['content3_2resim']['name'];
  $fileTmpName = $_FILES['content3_2resim']['tmp_name'];
  $fileSize = $_FILES['content3_2resim']['size'];
  $fileError = $_FILES['content3_2resim']['error'];
  $fileType = $_FILES['content3_2resim']['type'];
 
  $fileExt = explode('.', $fileName2);
  $fileActualExt = strtolower(end($fileExt));
 
  $allowed = array('jpg', 'jpeg', 'png');
  $error = fopen("ErrorLogs.txt", "a");
 
  if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
          if($fileSize < 1024*1024*10000){
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = $fileName2;
       
   
 
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

  $file = $_FILES['content3_3resim'];
 

 $fileName3 = $_FILES['content3_3resim']['name'];
 $fileTmpName = $_FILES['content3_3resim']['tmp_name'];
 $fileSize = $_FILES['content3_3resim']['size'];
 $fileError = $_FILES['content3_3resim']['error'];
 $fileType = $_FILES['content3_3resim']['type'];

 $fileExt = explode('.', $fileName3);
 $fileActualExt = strtolower(end($fileExt));

 $allowed = array('jpg', 'jpeg', 'png');
 $error = fopen("ErrorLogs.txt", "a");

 if(in_array($fileActualExt, $allowed)){
     if($fileError === 0){
         if($fileSize < 1024*1024*10000){
             $fileNameNew = uniqid('', true).".".$fileActualExt;
             $fileDestination = $fileName3;
     

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
 $file = $_FILES['content3_4resim'];
 

 $fileName4 = $_FILES['content3_4resim']['name'];
 $fileTmpName = $_FILES['content3_4resim']['tmp_name'];
 $fileSize = $_FILES['content3_4resim']['size'];
 $fileError = $_FILES['content3_4resim']['error'];
 $fileType = $_FILES['content3_4resim']['type'];

 $fileExt = explode('.', $fileName4);
 $fileActualExt = strtolower(end($fileExt));

 $allowed = array('jpg', 'jpeg', 'png');
 $error = fopen("ErrorLogs.txt", "a");

 if(in_array($fileActualExt, $allowed)){
     if($fileError === 0){
         if($fileSize < 1024*1024*10000){
             $fileNameNew = uniqid('', true).".".$fileActualExt;
             $fileDestination = $fileName4;
   

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


$deger6=$_POST["content3_arkaplan"];
$deger9=$_POST["content3_resim_genislik"];
$deger7=$_POST["content3_resim_yükseklik"];

if($_POST["content3_resim_daire"] == null)
      $deger5=" ";
else
      $deger5=$_POST["content3_resim_daire"];

if($_POST["content3_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["content3_resim_golge"];


setcookie("sayfaEkle[content3_2resim]",$fileName2,time()+3600);
setcookie("sayfaEkle[content3_3resim]",$fileName3,time()+3600);
setcookie("sayfaEkle[content3_4resim]",$fileName4,time()+3600);
setcookie("sayfaEkle[content3_arkaplan]",$deger6,time()+3600);

setcookie("sayfaEkle[content3_resim_genislik]",$deger9,time()+3600);
setcookie("sayfaEkle[content3_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[content3_resim_daire]",$deger5,time()+3600);
setcookie("sayfaEkle[content3_resim_golge]",$deger8,time()+3600);


header("Location: kompuret.php?KompanentEkle=36");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>