<?php
   include 'mysql_connect.php';
   $gelenkullaniciemail=$_SESSION["Kullaniciadi"];



   foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

     setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
  
   }


if(isset($_POST['sayfa_ekle'])){
    $file = $_FILES['header10_resim1'];
    

    $fileName1 = $_FILES['header10_resim1']['name'];
    $fileTmpName = $_FILES['header10_resim1']['tmp_name'];
    $fileSize = $_FILES['header10_resim1']['size'];
    $fileError = $_FILES['header10_resim1']['error'];
    $fileType = $_FILES['header10_resim1']['type'];

    $fileExt = explode('.', $fileName1);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1024*1024*10000){
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
if(isset($_POST['sayfa_ekle'])){
    $file = $_FILES['header10_resim1'];
    

    $fileName2 = $_FILES['header10_resim2']['name'];
    $fileTmpName = $_FILES['header10_resim2']['tmp_name'];
    $fileSize = $_FILES['header10_resim2']['size'];
    $fileError = $_FILES['header10_resim2']['error'];
    $fileType = $_FILES['header10_resim2']['type'];

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

$deger1=$_POST["header10_yazi"];
$deger2=$_POST["header10_arkaplan"];
$deger3=$_POST["header10_yazi_rengi"];

$deger4=$_POST["header10_yazim_fontu"];
$deger6=$_POST["header10_resim_genislik"];
$deger7=$_POST["header10_resim_yükseklik"];

if($_POST["header10_resim_daire"] == null)
      $deger5=" ";
else
      $deger5=$_POST["header10_resim_daire"];

if($_POST["header10_resim_golge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["header10_resim_golge"];
      
$deger9=$_POST["header10_yaziboyutu"];


setcookie("sayfaEkle[header10_yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header10_resim1]",$fileName1,time()+3600);
setcookie("sayfaEkle[header10_arkaplan]",$deger2,time()+3600);
setcookie("sayfaEkle[header10_yazi_rengi]",$deger3,time()+3600);
setcookie("sayfaEkle[header10_resim2]",$fileName2,time()+3600);

setcookie("sayfaEkle[header10_yazim_fontu]",$deger4,time()+3600);
setcookie("sayfaEkle[header10_resim_genislik]",$deger6,time()+3600);
setcookie("sayfaEkle[header10_resim_yükseklik]",$deger7,time()+3600);
setcookie("sayfaEkle[header10_resim_daire]",$deger5,time()+3600);
setcookie("sayfaEkle[header10_resim_golge]",$deger8,time()+3600);
setcookie("sayfaEkle[header10_yaziboyutu]",$deger9,time()+3600);




header("Location: kompuret.php?KompanentEkle=91");

?>