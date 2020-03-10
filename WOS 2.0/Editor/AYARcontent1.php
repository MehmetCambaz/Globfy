<?php

if(isset($_POST['submit'])){
    $file = $_FILES['content1_resim'];
    

    $fileName = $_FILES['content1_resim']['name'];
    $fileTmpName = $_FILES['content1_resim']['tmp_name'];
    $fileSize = $_FILES['content1_resim']['size'];
    $fileError = $_FILES['content1_resim']['error'];
    $fileType = $_FILES['content1_resim']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    $error = fopen("ErrorLogs.txt", "a");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 999999999999){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName;


                if(!file_exists("editorsayfalari/resimler")) {
                  $olustur = mkdir("editorsayfalari/resimler");
                }
                
                
                if(!file_exists("kullanicisayfalari")) {
                  $olustur = mkdir("kullanicisayfalari");
                }
                if(!file_exists("kullanicisayfalari/resimler")) {
                  $olustur = mkdir("kullanicisayfalari/resimler");
                }

                move_uploaded_file($fileTmpName, "editorsayfalari/resimler/".$fileDestination);
                copy("editorsayfalari/resimler/".$fileDestination,"kullanicisayfalari/resimler/".$fileDestination);
           


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

$deger1=$_POST["content1_yazim"];
$deger2=$_POST["content1_resim"];
$deger3=$_POST["content1_arkaplan"];
$deger4=$_POST["content1_yazim_rengi"];
setcookie("sayfaEkle[content1_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content1_resim]",$fileName,time()+3600);
setcookie("sayfaEkle[content1_arkaplan]",$deger3,time()+3600);
setcookie("sayfaEkle[content1_yazim_rengi]",$deger4,time()+3600);

header("Location: editor.php?KompanentEkle=5");

?>
