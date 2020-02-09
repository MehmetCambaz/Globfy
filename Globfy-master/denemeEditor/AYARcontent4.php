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

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 50000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Resim fazla büyük !";
            }
        }else{
            echo "Resim yüklenirken hata oluştu !";
        }
    }else{
        echo "Bu türdeki dosyaları yükleyemezsiniz !";
    }
}

$deger1=$_POST["content4_yazim"];
$deger2=$_POST["content4_resim"];
$deger3=$_POST["content4_arkaplan"];
setcookie("sayfaEkle[content4_yazim]",$deger1,time()+3600);
setcookie("sayfaEkle[content4_resim]",$deger2,time()+3600);
setcookie("sayfaEkle[content4_arkaplan]",$deger3,time()+3600);

header("Location: index3.php?KompanentEkle=12");

?>
