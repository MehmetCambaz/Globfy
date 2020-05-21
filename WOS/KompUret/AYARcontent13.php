<?php
   include 'mysql_connect.php';
   $gelenkullaniciemail=$_SESSION["Kullaniciadi"];


   foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

     setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
  
   }

if(isset($_POST['sayfa_ekle'])){
    $file = $_FILES['content13_resim'];
    

    $fileName = $_FILES['content13_resim']['name'];
    $fileTmpName = $_FILES['content13_resim']['tmp_name'];
    $fileSize = $_FILES['content13_resim']['size'];
    $fileError = $_FILES['content13_resim']['error'];
    $fileType = $_FILES['content13_resim']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1024*1024*10000){
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

$deger1=$_POST["content13_yazim"];
$deger2=$_POST["content13_resim"];
$deger3=$_POST["content13_arkaplan"];
$deger4=$_POST["content13_yazim_rengi"];

$deger9=$_POST["content13_yazim_fontu"];
$deger6=$_POST["content13_resim_genislik"];
$deger7=$_POST["content13_resim_yükseklik"];

if($_POST["content13_resim_daire"] == null)
      $deger5=" ";
else
      $deger5=$_POST["content13_resim_daire"];

if($_POST["content13_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["content13_resim_golge"];
      
$deger11=$_POST["content13_yaziboyutu"];



setcookie("sayfaEkle[content13_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content13_resim]",$fileName,time()+3600);
setcookie("sayfaEkle[content13_arkaplan]",$deger3,time()+3600);
setcookie("sayfaEkle[content13_yazim_rengi]",$deger4,time()+3600);

setcookie("sayfaEkle[content13_yazim_fontu]",$deger9,time()+3600);
setcookie("sayfaEkle[content13_resim_genislik]",$deger6,time()+3600);
setcookie("sayfaEkle[content13_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[content13_resim_daire]",$deger5,time()+3600);
setcookie("sayfaEkle[content13_resim_golge]",$deger8,time()+3600);
setcookie("sayfaEkle[content13_yaziboyutu]",$deger11,time()+3600);

header("Location: kompuret.php?KompanentEkle=125");

?>
