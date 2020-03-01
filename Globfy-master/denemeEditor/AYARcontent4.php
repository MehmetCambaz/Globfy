<?php

if(isset($_POST['submit'])){
    $file = $_FILES['content4_resim'];
    

    $fileName = $_FILES['content4_resim']['name'];
    $fileTmpName = $_FILES['content4_resim']['tmp_name'];
    $fileSize = $_FILES['content4_resim']['size'];
    $fileError = $_FILES['content4_resim']['error'];
    $fileType = $_FILES['content4_resim']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 999999999999){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
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

$deger1=$_POST["content4_yazim"];
$deger2=$_POST["content4_resim"];
$deger3=$_POST["content4_arkaplan"];
$deger4=$_POST["content4_yazim_rengi"];
setcookie("sayfaEkle[content4_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content4_resim]",$fileName,time()+3600);
setcookie("sayfaEkle[content4_arkaplan]",$deger3,time()+3600);
setcookie("sayfaEkle[content4_yazim_rengi]",$deger4,time()+3600);

header("Location: index3.php?KompanentEkle=12");

?>
