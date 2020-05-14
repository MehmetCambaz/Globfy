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
    $file = $_FILES['content5_resim1'];
    

    $fileName1 = $_FILES['content5_resim1']['name'];
    $fileTmpName = $_FILES['content5_resim1']['tmp_name'];
    $fileSize = $_FILES['content5_resim1']['size'];
    $fileError = $_FILES['content5_resim1']['error'];
    $fileType = $_FILES['content5_resim1']['type'];

    $fileExt = explode('.', $fileName1);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1024*1024*10000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName1;
         
              
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
if(isset($_POST['sayfa_ekle'])){
    $file = $_FILES['content5_resim1'];
    

    $fileName2 = $_FILES['content5_resim2']['name'];
    $fileTmpName = $_FILES['content5_resim2']['tmp_name'];
    $fileSize = $_FILES['content5_resim2']['size'];
    $fileError = $_FILES['content5_resim2']['error'];
    $fileType = $_FILES['content5_resim2']['type'];

    $fileExt = explode('.', $fileName2);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1024*1024*10000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName2;
         
              
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

$deger1=$_POST["content5_yazi"];
$deger3=$_POST["content5_arkaplan"];
$deger4=$_POST["content5_yazi_rengi"];

$deger5=$_POST["content5_yazim_fontu"];
$deger6=$_POST["content5_resim_genislik"];
$deger7=$_POST["content5_resim_yükseklik"];

if($_POST["content5_resim_daire"] == null)
      $deger9=" ";
else
      $deger9=$_POST["content5_resim_daire"];

if($_POST["content5_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["content5_resim_golge"];
      
$deger10=$_POST["content5_yaziboyutu"];


setcookie("sayfaEkle[content5_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[content5_resim1]",$fileName1,time()+3600);
setcookie("sayfaEkle[content5_arkaplan]",$deger3,time()+3600);
setcookie("sayfaEkle[content5_yazi_rengi]",$deger4,time()+3600);
setcookie("sayfaEkle[content5_resim2]",$fileName2,time()+3600);

setcookie("sayfaEkle[content5_yazim_fontu]",$deger5,time()+3600);
setcookie("sayfaEkle[content5_resim_genislik]",$deger6,time()+3600);
setcookie("sayfaEkle[content5_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[content5_resim_daire]",$deger9,time()+3600);
setcookie("sayfaEkle[content5_resim_golge]",$deger8,time()+3600);
setcookie("sayfaEkle[content5_yaziboyutu]",$deger10,time()+3600);


header("Location: editor.php?KompanentEkle=44");

?>
