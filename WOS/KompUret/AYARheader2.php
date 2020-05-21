<?php 
  include 'mysql_connect.php';
  $gelenkullaniciemail=$_SESSION["Kullaniciadi"];

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }
    foreach ($_COOKIE['iceriksayfasi'] as $name => $value) {

      setcookie('iceriksayfasi['.$name.']',$name,time()-3600); 
   
    }



    if(isset($_POST['sayfa_ekle'])){
      $file = $_FILES['header2_resim'];
      
  
      $fileName = $_FILES['header2_resim']['name'];
      $fileTmpName = $_FILES['header2_resim']['tmp_name'];
      $fileSize = $_FILES['header2_resim']['size'];
      $fileError = $_FILES['header2_resim']['error'];
      $fileType = $_FILES['header2_resim']['type'];
  
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


$deger1=$_POST["header2_1yazi"];
$deger2=$_POST["header2_2yazi"];
$deger3=$_POST["header2_3yazi"];



$deger111=replace_tr($deger1);
$deger22=replace_tr($deger2);
$deger33=replace_tr($deger3);

$deger4=$_POST["header2_4yazi"];
$deger15=$_POST["header2_yazirenk"];
$deger7=$_POST["header2_button"];

if($deger7 == 1){
  setcookie("sayfaEkle[header2_button]","#008CBA",time()+3600);
}else if($deger7 == 2){
  setcookie("sayfaEkle[header2_button]","#f44336",time()+3600);
}else if($deger7 == 3){
  setcookie("sayfaEkle[header2_button]","#555555",time()+3600);
}

$deger6=$_POST["header2_arkaplan"];
$deger5=$_POST["header2_resim"];

if($_POST["header2_resim_gölge"] == null)
      $deger8=" ";
else
      $deger8=$_POST["header2_resim_gölge"];

if($_POST["header2_resim_daire"] == null)
      $deger11=" ";
else
      $deger11=$_POST["header2_resim_daire"];

$deger9=$_POST["header2_resim_genislik"];
$deger10=$_POST["header2_resim_yükseklik"];
$deger12=$_POST["header2_yazim_fontu"];


setcookie("sayfaEkle[header2_4yazi]",$deger4,time()+3600);
setcookie("sayfaEkle[header2_yazirenk]",$deger15,time()+3600);

setcookie("sayfaEkle[header2_1yazi]",$deger1,time()+3600);
setcookie("sayfaEkle[header2_2yazi]",$deger2,time()+3600);
setcookie("sayfaEkle[header2_3yazi]",$deger3,time()+3600);

setcookie("sayfaEkle[header2_1link]",$deger111,time()+3600);
setcookie("sayfaEkle[header2_2link]",$deger22,time()+3600);
setcookie("sayfaEkle[header2_3link]",$deger33,time()+3600);

setcookie("sayfaEkle[header2_arkaplan]",$deger6,time()+3600);
setcookie("sayfaEkle[header2_resim]",$fileName,time()+3600);

setcookie("iceriksayfasi[header2_1link]",$deger111,time()+3600*60);
setcookie("iceriksayfasi[header2_2link]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[header2_3link]",$deger33,time()+3600*60);

setcookie("sayfaEkle[header2_resim_gölge]",$deger8,time()+3600);
setcookie("sayfaEkle[header2_resim_daire]",$deger11,time()+3600);
setcookie("sayfaEkle[header2_resim_genislik]",$deger9,time()+3600);
setcookie("sayfaEkle[header2_resim_yükseklik]",$deger10,time()+3600);
setcookie("sayfaEkle[header2_yazim_fontu]",$deger12,time()+3600);


header("Location: kompuret.php?KompanentEkle=3");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
// çekeceğini anasayfaya 'KompanentEkle' ile gönderiyorum! 
//index3.php de de bunu okuyup işlem yapıyorum!
?>

<?php
function replace_tr($text) {
  $text = trim($text);
  $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
  $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
  $new_text = str_replace($search,$replace,$text);
  return $new_text;
} 
?>