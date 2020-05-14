<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>
<style>
.container {
  position: relative;
  width:80%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.5;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

</style>
</head>
<body>
<?php 
    include 'mysql_connect.php';
	$name=$_SESSION["Kullaniciadi"];

	$sql = "SELECT * FROM kullanicilar where email='$name'";
    $sonuc = $baglanti->query($sql);
    if ($sonuc->num_rows > 0) 
    {
        while($sorgu=mysqli_fetch_assoc($sonuc) )
        {
            $ad_soyad=$sorgu["ad"]." ".$sorgu["soyad"];
		}
    }
?>
    <form method="post" enctype="multipart/form-data">
<div style="width:50%;margin:auto; height:600;">
<div style="width:100%; float:left;">
<div style="float:left; width:30%;">
<?php 
$resim_file="Kullanici_Profil/".$name.".png";
if(is_file($resim_file)){
    echo '
    <div class="container">
  <img src="'.$resim_file.'" alt="Avatar" class="image" style="width:250; height:250;">
  <div class="middle">
  <input type="file" name="file" value="Resim Seç" style="margin:0 0 0 35;">
  </div>

</div>
<input type="submit" name="submit" value="Resmi Değiştir" style="padding:10; cursor:pointer;background-color:black; border:1px solid black; color:white; font-family:Calibri; margin:5 0 0 152;">
    ';
}else{
  
    ?>
    <div class="container">

  <img src="Desing\Pictures\profil_pic.png" alt="Avatar" class="image" style="width:250; height:250;">
  <div class="middle">
  <input type="file" name="file" value="Resim Seç">

  </div>


</div>
<input type="submit" name="submit" value="Resmi Yükle" style="padding:10; cursor:pointer;background-color:black; border:1px solid black; color:white; font-family:Calibri; margin:5 0 0 152;">
 <?php
}

?>


</div>
<div style="float:left; width:30%; font-family:Calibri;">
<b style="color:gray;">Ad Soyad</b><br>
<?php 
echo '<b style="font-size:25px; margin:4 0 0 0;">'.ucwords($ad_soyad).'</b><br><br>'; 
?>
<b style="color:gray;">E-Mail</b><br>
<?php 
echo '<b style="font-size:25px; margin:4 0 0 0;">'.$name.'</b>';
?>
</div>

</div>
<div style="width:100%; float:left; margin:50 0 0 0;">
<?php 
$dosya="Editor/Son_Islem/kullanicisayfalari_".$name."/wos.zip";
echo '<div style="width:100%; float:left;background-color:gray; color:white; font-family:Calibri;">';
echo '<h3 style="margin:15 0 15 15;">En son oluşturduğunuz web sitenizi aşağıdan indirebilirsiniz.</h3>';
echo '</div>';
if(is_file($dosya)) {
echo '<div style="width:100%; float:left;">';
echo '<table><tr><td>';
echo '<b style="margin:35 0 0 15;">► '.date ("F d Y H:i:s", filemtime($dosya)).'</b>';
echo '</td><td>';
echo '<input type="submit" name="son_file" value="İNDİR" style="background-color:green; border:1px solid green; color:white; padding:10; margin:0 0 0 40; cursor:pointer;"/>';
echo '</td></tr></table>';
}
?>
</div>
</div>
</form>
</body>
</html>

<?php
if(isset($_POST["son_file"])){
    $file_url = $dosya;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . $file_url . "\""); 
    readfile($file_url); 

}

if(isset($_POST['submit'])) {
  $image = $_FILES['file']['name'];

 if($image!=""){

   $temp_name = $_FILES["file"]["tmp_name"];


   $file_size =$_FILES['file']['size'];
     $expensions= array("jpeg","jpg","png","gif");

     if($file_size > 99097152){
        $errors[]='File size must be excately 2 MB';
     }
     if(!file_exists("Kullanici_Profil")) {
      $olustur = mkdir("Kullanici_Profil");
    }
     if(empty($errors)==true){
        move_uploaded_file($temp_name,"Kullanici_Profil/".$name.".png");
        header ("Refresh: 0; url=?sayfa=profil");
     }
     header ("Refresh: 0; url=?sayfa=profil");
 }else{
  echo "<script type='text/javascript'>alert('Resim Seçiniz');</script>";
 }
}
   

?>