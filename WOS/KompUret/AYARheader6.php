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
      $file = $_FILES['header6_resim'];
      
  
      $fileName = $_FILES['header6_resim']['name'];
      $fileTmpName = $_FILES['header6_resim']['tmp_name'];
      $fileSize = $_FILES['header6_resim']['size'];
      $fileError = $_FILES['header6_resim']['error'];
      $fileType = $_FILES['header6_resim']['type'];
  
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

$deger7=$_POST["header6_yazi"];
$deger1=$_POST["header6_yazi2"];
$deger2=$_POST["header6_yazi4"];
$deger3=$_POST["header6_yazi5"];

$deger11=replace_tr($deger7);
$deger22=replace_tr($deger1);
$deger33=replace_tr($deger2);
$deger66=replace_tr($deger3);


$deger8=$_POST["header6_button"];

if($deger8 == 1){
  setcookie("sayfaEkle[header6_button]","#008CBA",time()+3600);
}else if($deger8 == 2){
  setcookie("sayfaEkle[header6_button]","#f44336",time()+3600);
}else if($deger8 == 3){
  setcookie("sayfaEkle[header6_button]","#555555",time()+3600);
}

$deger4=$_POST["header6_arkaplan"];
$deger5=$_POST["header6_resim"];

if($_POST["header6_resim_daire"] == null)
      $deger9=" ";
else
      $deger9=$_POST["header6_resim_daire"];

if($_POST["header6_resim_golge"] == null)
      $deger10=" ";
else
      $deger10=$_POST["header6_resim_golge"];
      
$deger14=$_POST["header6_resim_genislik"];
$deger12=$_POST["header6_resim_yükseklik"];

setcookie("sayfaEkle[header6_yazi]",$deger7,time()+3600);
setcookie("sayfaEkle[header6_yazi2]",$deger1,time()+3600);
setcookie("sayfaEkle[header6_yazi4]",$deger2,time()+3600);
setcookie("sayfaEkle[header6_yazi5]",$deger3,time()+3600);

setcookie("sayfaEkle[header6_arkaplan]",$deger4,time()+3600);
setcookie("sayfaEkle[header6_resim]",$fileName,time()+3600);
setcookie("sayfaEkle[header6_resim_daire]",$deger9,time()+3600);
setcookie("sayfaEkle[header6_resim_genislik]",$deger14,time()+3600);
setcookie("sayfaEkle[header6_resim_yükseklik]",$deger12,time()+3600);
setcookie("sayfaEkle[header6_resim_golge]",$deger10,time()+3600);

setcookie("iceriksayfasi[header6_yazi2]",$deger22,time()+3600*60);
setcookie("iceriksayfasi[header6_yazi4]",$deger33,time()+3600*60);
setcookie("iceriksayfasi[header6_yazi5]",$deger66,time()+3600*60);
setcookie("iceriksayfasi[header6_yazi]",$deger11,time()+3600*60);



header("Location: kompuret.php?KompanentEkle=25");//sayfayı yenileyip veritabanından hangi id li kompanentin kodlarını
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