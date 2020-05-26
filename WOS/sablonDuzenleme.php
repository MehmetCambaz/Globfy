<?php
include 'mysql_connect.php';

$id=$_SESSION["secilenSablonID"];
$kullaniciAdi = $_SESSION["Kullaniciadi"];

if(isset($_POST['EditorGecis_Hazirlik'])){

    $kullaniciAdi = $_SESSION["Kullaniciadi"];

    $id=$_SESSION["secilenSablonID"];
    if(empty($_COOKIE["suankisayfamANA"])){
        setcookie("suankisayfamANA","Anasayfa",time()+1564);
    }
  
    if(file_exists("Editor/editorsayfalari_".$kullaniciAdi)) 
    {
        KlasorSil("Editor/editorsayfalari_".$kullaniciAdi); 
    }
    if(file_exists("Editor/kullanicisayfalari_".$kullaniciAdi)) 
    {
        KlasorSil("Editor/kullanicisayfalari_".$kullaniciAdi); 
    }
    
    


   /* $onizlemeSayfasi=fopen('Editor/onizleme.php','w+');
    $code="<?php include 'mysql_connect.php';
    include 'editorsayfalari_$kullaniciAdi/indexEditor.php'; ?>";
    fwrite($onizlemeSayfasi,$code);
    fclose($onizlemeSayfasi);*/
    
    if(!file_exists("Editor/editorsayfalari_".$kullaniciAdi)) {
      $olustur = mkdir("Editor/editorsayfalari_".$kullaniciAdi);
    }
    $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$id.'');
      while($sonuc=mysqli_fetch_assoc($sorgu) )
      {
          $code=$sonuc["sablon_editorkodu"]; //Şuanlık veritabanında şablonun ismini tutyorum, gelen isimi alıp dosyaların içerisinde bulunan php dosyası adıyla
                                      //sayfanın konumuna include ediyorum!
          
      }
      $dosya=fopen("Editor/editorsayfalari_".$kullaniciAdi."/indexEditor.php","w");
      $yaz=fwrite($dosya,$code);
      fclose($dosya);

      $dosya2=fopen("Editor/editorsayfalari_".$kullaniciAdi."/log.txt","w");
      fclose($dosya2);

      $dosya3=fopen("Editor/editorsayfalari_".$kullaniciAdi."/wos_onizleme.php","w");
      $code_onizleme="<?php include 'mysql_connect.php';
      include 'indexEditor.php'; ?>";
      $yaz=fwrite($dosya3,$code_onizleme);
      fclose($dosya3);

      $sorgu2=$baglanti->query('select * from sablon_sayfalari where sablon_id='.$id.'');
      while($sonuc=mysqli_fetch_assoc($sorgu2) )
      {
          $code="";

          $sayfa=$sonuc["sayfa_adi"];
          

          $dosya=fopen('Editor/editorsayfalari_'.$kullaniciAdi.'/'.$sayfa.'.php','w');
          if($sonuc["kod"]!=null){
              $yaz=fwrite($dosya,$sonuc["kod"]);
              fclose($dosya);
          }else{
          if($sayfa=="header" && $id != 5 && $id != 13 || $sayfa=="footer" || $sayfa=="header1" ){
            $code='<div style="position:relative; width:100%; cursor:point;">
            <div style="width:40%;
            padding:10 0 10 0;
            border-radius:20px;
            background-color:#5C5C5C; 
            opacity:0.8;
            font-size:24px;
            position:absolute;
            margin-top:3%;
            margin-left: calc( 100% - 70% );
            text-align:center;
            font-size:30px;
            font-weight:bold;
            font-family:calibri;
            color:white;cursor:pointer;
            word-wrap: break-word;
            ">Tıkla ve Düzenle</div></div>';
          }else if($sayfa=="content1" || $sayfa=="content2"|| $sayfa=="content3" || $sayfa=="bar1" || $sayfa=="bar2" || $sayfa=="bar3" || $sayfa=="bar5" || $sayfa=="bar4"){
          
              $code='<div style="position:relative; width:100%;">
              <div style="width:60%;
              
              padding:10 0 10 0;
              border-radius:20px;
              background-color:#5C5C5C; 
              opacity:0.8;
              font-size:24px;
              position:absolute;
              word-wrap:break-word;
              margin-top:15%;
              margin-left: calc( 100% - 80% );
              
              text-align:center;
              font-size:30px;
              font-weight:bold;
              font-family:calibri;
              color:white;
              cursor:pointer;
              ">Tıkla ve Düzenle</div></div>';
         
          }else if( $id==5 && $sayfa=="header"){
            $code='<div style="position:relative; width:100%; cursor:point;">
              <div style="width:40%;
              padding:10 0 10 0;
              border-radius:20px;
              background-color:#5C5C5C; 
              opacity:0.8;
              font-size:24px;
              position:absolute;
              margin-top:10%;
              margin-left: calc( 100% - 70% );
              text-align:center;
              font-size:30px;
              font-weight:bold;
              font-family:calibri;
              color:white;cursor:pointer;
              word-wrap: break-word;
              ">Tıkla ve Düzenle</div></div>';
          }else if( $id==13 && $sayfa=="header"){
            $code='<div style="position:relative; width:100%; cursor:point;">
              <div style="width:40%;
              padding:10 0 10 0;
              border-radius:20px;
              background-color:#5C5C5C; 
              opacity:0.8;
              font-size:24px;
              position:absolute;
              margin-top:3%;
              margin-left: calc( 100% - 70% );
              text-align:center;
              font-size:30px;
              font-weight:bold;
              font-family:calibri;
              color:white;cursor:pointer;
              word-wrap: break-word;
              ">Tıkla ve Düzenle</div></div>';
          }else if($sayfa=="littleheader" || $sayfa=="littleheader1"){
            $code='<div style="position:relative; width:100%; cursor:point;">
            <div style="width:40%;
            padding:10 0 10 0;
            border-radius:20px;
            background-color:#5C5C5C; 
            opacity:0.8;
            font-size:24px;
            position:absolute;
            margin-top:1.5%;
            margin-left: calc( 100% - 70% );
            text-align:center;
            font-size:30px;
            font-weight:bold;
            font-family:calibri;
            color:white;cursor:pointer;
            word-wrap: break-word;
            ">Tıkla ve Düzenle</div></div>';
          }else{
              $code='<div style="position:relative; width:100%;">
              <div style="width:60%;
              
              padding:10 0 10 0;
              border-radius:20px;
              background-color:#5C5C5C; 
              opacity:0.8;
              font-size:24px;
              position:absolute;
              
              margin-top:20%;
              margin-left: calc( 100% - 80% );
              
              text-align:center;
              font-size:30px;
              font-weight:bold;
              font-family:calibri;
              color:white;
              cursor:pointer;
              ">Tıkla ve Düzenle</div></div>';
          }
          $yaz=fwrite($dosya,$code);
          fclose($dosya);
      }}
      $ekran_boyu=$_POST["sablonDuzenle_ekran_boyut"];
      $ekran_konum=$_POST["sablonDuzenle_ekran_konum"];
      $ekran_renk=$_POST["sablonDuzenle_ekran_renk_btn"];



      if(!file_exists("Editor/kullanicisayfalari_".$kullaniciAdi)) {
          $olustur = mkdir("Editor/kullanicisayfalari_".$kullaniciAdi);
        }
        $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$id.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
            $code=$sonuc["sablon_tasarimkodu"]; //Şuanlık veritabanında şablonun ismini tutyorum, gelen isimi alıp dosyaların içerisinde bulunan php dosyası adıyla
                                        //sayfanın konumuna include ediyorum!
            
        }

      if($ekran_konum!=""){
      if($ekran_konum=="center"){
        $code=str_replace('<table class="data" border="0px" id="data" cellspacing="0" height="100%" width="100%">','<center><table class="data" border="0px" id="data" cellspacing="0" height="100%" width="100%">',$code);
        $code=str_replace('</table> ','</table> </center>',$code);
      }else{
        $ceode=str_replace('<table class="data" border="0px" id="data" cellspacing="0" height="100%" width="100%">','<table class="data" border="0px" id="data" cellspacing="0" height="100%" width="100%" style="float:'.$ekran_konum.';">',$code);
      }
      }
      if($ekran_boyu!=""){
      $code=str_replace('<table class="data" border="0px" id="data" cellspacing="0" height="100%" width="100%"','<table class="data" border="0px" id="data" cellspacing="0" height="100%" width="'.$ekran_boyu.'"',$code);
      }
      if($ekran_renk!=""){

      $code=str_replace('body{','body{ background-color:'.$ekran_renk.';',$code);
      }
   
        
      $file = $_FILES['sablonDuzenle_ekran_resim']['name'];
      if($file!=""){
      $dosyaAdiKullanici="Editor/kullanicisayfalari_$kullaniciAdi";
      
          $fileName1 = $_FILES['sablonDuzenle_ekran_resim']['name'];
          $fileTmpName = $_FILES['sablonDuzenle_ekran_resim']['tmp_name'];
          $fileSize = $_FILES['sablonDuzenle_ekran_resim']['size'];
          $fileError = $_FILES['sablonDuzenle_ekran_resim']['error'];
          $fileType = $_FILES['sablonDuzenle_ekran_resim']['type'];
      
          $fileExt = explode('.', $fileName1);
          $fileActualExt = strtolower(end($fileExt));
      
          $allowed = array('jpg', 'jpeg', 'png');
          $error = fopen("ErrorLogs.txt", "a");
      
          if(in_array($fileActualExt, $allowed)){
              if($fileError === 0){
                  if($fileSize < 1024*1024*10000){
                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                      $fileDestination = $fileName1;

                    move_uploaded_file($fileTmpName, $dosyaAdiKullanici."/".$fileDestination);
                    
      
                  }else{
                      echo "Resim fazla büyük !";
                      $txt = "Resim fazla büyük !\n";
                  
                  }
              }else{
                  echo "Resim yüklenirken hata oluştu !";
                  $txt = "Resim yüklenirken hata oluştu !\n";
              
              }
          }else{
              echo "Bu türdeki dosyaları yükleyemezsiniz !";
              $txt = "Bu türdeki dosyaları yükleyemezsiniz !\n";
              
          }
    
  
       
                $code=str_replace('body{','body{
                    background: url('.$fileDestination.');
                    background-repeat: no-repeat;
                    background-size: 100% 100%;
                    background-attachment: fixed;
                   ',$code);
        
          }
          
        
     
            
      

        $dosya=fopen("Editor/kullanicisayfalari_".$kullaniciAdi."/index.php","w");
        $yaz=fwrite($dosya,$code);
        fclose($dosya);
        kullaniciTeslim_sayfalari();
    $_SESSION["IlkGirisKontrol"]="1";
    header ("Refresh: 0; url=Editor/editor.php");
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>WoS | Web Site Oluşturma Sistemi</title>
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">
<style>

</style>
<script>
function boyut_degis() {
  var x = document.getElementById("sablonDuzenle_ekran_boyut").value;
  document.getElementById("sablonDuzenle_gelen_resim").style.width = x; 
  konum_degis();
}
function konum_degis() {
  var x = document.getElementById("sablonDuzenle_ekran_konum").value;
  document.getElementById("sablonDuzenle_sag").style.textAlign = x; 
}
function renk_degis() {
  var x = document.getElementById("sablonDuzenle_ekran_renk").value;
  document.getElementById("sablonDuzenle_sag").style.backgroundColor = x; 
}

function Alert() {
  alert("Burada yaptığınız değişiklikler önizleme sayfanızda görülecektir.");
}

window.addEventListener('load', function() {
      document.querySelector('input[type="file"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
           
              document.getElementById("sablonDuzenle_sag").style.backgroundImage = "url('"+URL.createObjectURL(this.files[0])+"')";
              document.getElementById("sablonDuzenle_sag").style.backgroundSize = "100% 100%";
          }
      });
    });

</script>
</head>
<body>

<?php 
$sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$id.'');
while($sonuc=mysqli_fetch_assoc($sorgu) )
{
    $url=$sonuc["sablon_resim"]; 
}


?>
<center>
<table>
<tr>
<td>
<div class="sablonDuzenle">

<div class="sablonDuzenle_baslik">
			<h2 style="font-family:Calibri;">Şablon Ön Ayar Ekranı</h2>
</div>
<div class="sablonDuzenle_icerik" >
<div class="sablonDuzenle_ust" >
<div class="sablonDuzenle_ust_ic1">
<div class="sablonDuzenle_ust_ic2">http://wo-system.com/</div>

<div class="sablonDuzenle_ust_ic3">X</div>
<div class="sablonDuzenle_ust_ic4"></div>
<div class="sablonDuzenle_ust_ic5"></div>
<div id="sablonDuzenle_sag"> 
<?php echo '<img src="'.$url.'" id="sablonDuzenle_gelen_resim" style="background-color:white; border-radius:2px;"/>'; ?>
</div>
</div>
</div>
<div class="sablonDuzenle_sol" >
<center>
<form method="post"  enctype="multipart/form-data">
<table class="sablonDuzenle_table">
<tr>
<td colspan="3" style="text-align:center;">
<p style=" margin:0 0 15 0;"><b>*Aşağıda yapacağınız ayarlamaları yandaki ekranda görebilirsiniz.</b></p>
</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;">
<input type="submit" value="SIFIRLA" style="background-color:red; color:white; border:1px solid red;"/>
</td>
</tr>
<tr>
<td>Ekran Boyutu: </td>
<td colspan="2">
  <select id="sablonDuzenle_ekran_boyut" name="sablonDuzenle_ekran_boyut" onclick="boyut_degis()">
    <option value="100%">100%</option>
    <option value="90%">90%</option>
    <option value="80%">80%</option>
    <option value="70%">70%</option>
  </select>
</td>
</tr>
<tr>
<td>Ekran Konumu: </td>
<td colspan="2">
  <select id="sablonDuzenle_ekran_konum" name="sablonDuzenle_ekran_konum" onclick="konum_degis()">
    <option value="center">Ortala</option>
    <option value="left">Sola Yasla</option>
    <option value="right">Sağa Yasla</option>
  </select>
</td>
</tr>
<tr>
<td>Ekran Arkaplan Rengi: </td>
<td colspan="2"> 
<input type="color" style="width:90;" name="sablonDuzenle_ekran_renk_btn" value="#ffffff" id="sablonDuzenle_ekran_renk_btn"/>
</td>
</tr>
<tr>
<td>Ekran Arkaplan Resmi: </td>
<td colspan="2">
<input type="file" name="sablonDuzenle_ekran_resim" id="sablonDuzenle_ekran_resim"/>
</td>
</tr>
<tr>
<td colspan="3" style="text-align:right;">
<input type="submit" value="Tasarıma Başla" name="EditorGecis_Hazirlik" onclick="Alert()" class="sablonDuzenle_EditorGecis_Hazirlik"/>
</td>
</tr>
</table>
</form>
</center>
</div>
</div>
</div>
</td>
</tr>
</table>
</center>
</body>
</html>


<?php
function KlasorSil($dir) {
if (substr($dir, strlen($dir)-1, 1)!= '/')
$dir .= '/';
//echo $dir; //silinen klasörün adı
if ($handle = opendir($dir)) {
	while ($obj = readdir($handle)) {
		if ($obj!= '.' && $obj!= '..') {
			if (is_dir($dir.$obj)) {
				if (!KlasorSil($dir.$obj))
					return false;
				} elseif (is_file($dir.$obj)) {
					if (!unlink($dir.$obj))
						return false;
					}
			}
	}
		closedir($handle);
		if (!@rmdir($dir))
		return false;
		return true;
	}
return false;
}
?>

<script>

var c = document.getElementById("sablonDuzenle_ekran_renk_btn");
 var res = document.getElementById("sablonDuzenle_sag");


c.addEventListener("input", function() {
    res.style.backgroundColor  = c.value;
}, false); 

</script>


<?php 


function kullaniciTeslim_sayfalari(){
  include 'mysql_connect.php';
  $gelenkullaniciemail=$_SESSION["Kullaniciadi"];
  $dosyaADI='Editor/kullanicisayfalari_'.$gelenkullaniciemail;
  if (!file_exists($dosyaADI)) {  //klasör kontrol, yoksa oluşturulur!
    mkdir($dosyaADI, 0777, true);
  }

  include 'mysql_connect.php';

  $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$_SESSION["secilenSablonID"].'');
  $fileindexdosyasi = "Editor/kullanicisayfalari_".$gelenkullaniciemail."/index.php";
  while($sonuc=mysqli_fetch_assoc($sorgu) )
  {
    if(!is_file($fileindexdosyasi)){
      $filecreate2 = fopen("Editor/kullanicisayfalari_".$gelenkullaniciemail."/index.php", 'w') or die("Can't create file");
      $fileindexyaz=fwrite($filecreate2, $sonuc["sablon_tasarimkodu"]);
      fclose($filecreate2);
    }
  }

  $sorgu2=$baglanti->query('select * from sablon_sayfalari where sablon_id='.$_SESSION["secilenSablonID"].'');
  while($sonuc2=mysqli_fetch_assoc($sorgu2) )
  {
    $sayfa=$sonuc2["sayfa_adi"];
    if(!is_file('Editor/kullanicisayfalari_'.$gelenkullaniciemail.'/'.$sayfa.'.php')){
    
    $dosya=fopen('Editor/kullanicisayfalari_'.$gelenkullaniciemail.'/'.$sayfa.'.php','w');
    if($sonuc2["kod_kullanici"]!=null){
      $yaz=fwrite($dosya,$sonuc2["kod_kullanici"]);
    }
    fclose($dosya);
  }
  }
}

?>