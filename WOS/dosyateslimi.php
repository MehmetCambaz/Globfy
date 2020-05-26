<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
<center>
<table border="0">
<tr>
<td>
<div class="dosyateslim">
<div style="width:1050;">
<div class="dosyateslim_yazi">
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

echo '<h2 style="">◎  Bizi tercih ettiğin için teşekkürler <i>'.ucwords($ad_soyad).',</i> aşağıda ki bağlantıdan dosyalarınıza erişebilirsiniz...</h2>'; ?>
</div>
<div class="dosyateslim_button">
<form method="POST">
<input type="submit" name="dosya_indir" class="dosyateslim_button_tasarim" value="KAYNAK KODLARI İNDİR" style="cursor:pointer;"/>

</form>
</div>
<div class="dosyateslim_yazi">

</div>
<div class="dosyateslimi_anket_button">

<button class="dosyateslimi_anket_button_ic" id="dosyateslimi_anket_button_ic" href="#dosyateslimi_anket_yap">Ankete Katıl ▽</button>

</div>
<div class="dosyateslimi_anket_yap" id="dosyateslimi_anket_yap"  style=" display:none; float:left;height:980px;">
<form method="post">
<table border="0" style="">
<tr>
<td>
<ul>
      <li class="li_ana">
        <div>
          <div>
            <h3>
              Merhabalar, aşağıdaki soruları cevaplarmısınız..
            </h3>
            <div>
				<?php
			echo '<p style="">Kullanıcı: <i>'.ucwords($ad_soyad).'</i></p>'; 
			?>
            </div>
          </div>
        </div>
      </li>
	  <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;"> Bu web sitesinden nasıl haberdar oldunuz? </div>
		<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio1_bir" name="radio1" value="Sosyal Medya" />
              <label id="label_input_3_0" for="radio1_bir"> Sosyal Medya </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio1_iki" name="radio1" value="Reklam" />
              <label id="label_input_3_0" for="radio1_iki"> Reklam </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio1_uc" name="radio1" value="Arama Motoru" />
              <label id="label_input_3_0" for="radio1_uc"> Arama Motoru </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio1_dort" name="radio1" value="Arkadaş Tavsiyesi" />
              <label id="label_input_3_0" for="radio1_dort"> Arkadaş Tavsiyesi </label>
        </div>
      </li>
	  
	  <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;"> Hangi tarayıcıyı kullanıyorsunuz? </div>
		<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio2_bir" name="radio2" value="Google Chrome" />
              <label id="label_input_3_0" for="radio2_bir"> Google Chrome </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio2_iki" name="radio2" value="Firefox" />
              <label id="label_input_3_0" for="radio2_iki"> Firefox </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio2_uc" name="radio2" value="IE" />
              <label id="label_input_3_0" for="radio2_uc"> IE </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio2_dort" name="radio2" value="Safari" />
              <label id="label_input_3_0" for="radio2_dort"> Safari </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio2_bes" name="radio2" value="Opera" />
              <label id="label_input_3_0" for="radio2_bes"> Opera </label>
        </div>
      </li>
	    <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;">  Oluşturmuş olduğunuz site ihtiyaçlarınızı karşılıyor mu? </div>
		<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio3_bir" name="radio3" value="Evet karsiliyor" />
              <label id="label_input_3_0" for="radio3_bir"> Evet karşılıyor </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio3_iki" name="radio3" value="Birkac duzenlemeden sonra karsilayacak" />
              <label id="label_input_3_0" for="radio3_iki"> Birkaç düzenlemeden sonra karşılayacak </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio3_uc" name="radio3" value="Hayir karsilamiyor" />
              <label id="label_input_3_0" for="radio3_uc"> Hayır Karşılamıyor </label>
        </div>
			
	  </li>
	  
	  <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;">  Web Site Oluşturma Sistemini arkadaşlarınıza tavsiye edecek misiniz? </div>
		<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio5_bir" name="radio5" value="Evet" />
              <label id="label_input_3_0" for="radio5_bir"> Evet </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio5_iki" name="radio5" value="Hayir" />
              <label id="label_input_3_0" for="radio5_iki"> Hayır </label>			
      </li>
	  
	  	  <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;"> Web Site Oluşturma Sistemimizde bulduğunuz için memnun musun? </div>
		<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio4_bir" name="radio4" value="Cok Memnunum" />
              <label id="label_input_3_0" for="radio4_bir"> Çok Memnunum </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio4_iki" name="radio4" value="Memnunum" />
              <label id="label_input_3_0" for="radio4_iki"> Memnunum </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio4_uc" name="radio4" value="Kararsizim" />
              <label id="label_input_3_0" for="radio4_uc"> Kararsızım </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio4_dort" name="radio4" value="Memnun Degilim" />
              <label id="label_input_3_0" for="radio4_dort"> Memnun Değilim </label>
        </div>
			<div style="width:100%; float:left; margin:0 0 5 0;">
              <input type="radio" id="radio4_bes" name="radio4" value="Hic Memnun Degilim" />
              <label id="label_input_3_0" for="radio4_bes"> Hiç Memnun Değilim </label>
        </div>
      </li>
	  
	  	  	  <li class="li_alt">
        <div style="width:100%; float:left; margin:0 0 5 0; font-weight:bold;"> Tavsiye veya diğer görüşlerinizi belirteilirsiniz. </div>
		<div style="width:100%; float:left;">
		<textarea  rows="6" cols="60" style="resize:none; font-size:14; text-indent:5;" placeholder="" id="kullanici_gorusu" name="kullanici_gorusu"></textarea>
		
		</div>
	  </li>
	  <li class="li_alt">
	<button value="Gönder" name="gonder_anket" class="gonder_anket" id="gonder_anket" onclick="return check();">Gönder</button>
</li>
	  </ul>
	  </td>
	  </tr>
	  </table>
</div>
<div class="dosyateslimi_anket_yap2" id="dosyateslimi_anket_yap2"  style="  float:left; width:100%;">
<script type="text/javascript">
function check()
{
	if (!document.getElementById('radio1_bir').checked && !document.getElementById('radio1_iki').checked && !document.getElementById('radio1_uc').checked && !document.getElementById('radio1_dort').checked)
    {
        alert ("Lütfen Haber Alma durumunuzu belirtiniz..");
        return false;
    }else if (!document.getElementById('radio2_bir').checked && !document.getElementById('radio2_iki').checked && !document.getElementById('radio2_uc').checked && !document.getElementById('radio2_dort').checked && !document.getElementById('radio2_bes').checked)
    {
        alert ("Lütfen Tarayıcınızı belirtiniz..");
        return false;
    }else if (!document.getElementById('radio3_bir').checked && !document.getElementById('radio3_iki').checked && !document.getElementById('radio3_uc').checked)
    {
        alert ("Lütfen İhtiyaçlarınızı Karşıladımı belirtiniz..");
        return false;
    }else if (!document.getElementById('radio5_bir').checked && !document.getElementById('radio5_iki').checked )
    {
        alert ("Lütfen Tavsiye Durumunuz belirtiniz..");
        return false;
    }else if (!document.getElementById('radio4_bir').checked && !document.getElementById('radio4_iki').checked && !document.getElementById('radio4_uc').checked && !document.getElementById('radio4_dort').checked && !document.getElementById('radio4_bes').checked)
    {
        alert ("Lütfen Memnuniyetinizi belirtiniz..");
        return false;
    }else if (document.getElementById('kullanici_gorusu').value==""
        || document.getElementById('kullanici_gorusu').value==undefined)
    {
        alert ("Lütfen Tavsiye ve Görüşlerinizi belirtiniz..");
        return false;
    }
        return true;
    }
</script>
<?php
include 'mysql_connect.php';

if(isset($_POST["gonder_anket"])){
$kullanici=$ad_soyad;
$haber_alma=$_POST["radio1"];
$tarayici=$_POST["radio2"];
$ihtiyac=$_POST["radio3"];
$tavsiye=$_POST["radio5"];
$bulunma_durumu=$_POST["radio4"];
$kullanici_gorusu=$_POST["kullanici_gorusu"];

$sqlkayit = "INSERT INTO anket values(NULL,'$kullanici', '$haber_alma','$tarayici','$ihtiyac','$tavsiye', '$bulunma_durumu','$kullanici_gorusu')";
mysqli_query($baglanti,$sqlkayit);
echo '<p style="font-family:Calibri; font-size:19;">Anketimize Katıldığınız için teşekkür ederiz.</p>';
}


?>

</div>
</div>
</div>
</td>
</tr>
</form>
</table>
</center>
</body>
</html>

<?php
son_islem_kayit($name);
if(isset($_POST["dosya_indir"])){
    zip_download($name);
}

function zip_download($name){
	$dir = "Editor/kullanicisayfalari_".$name; 
	$zip_file = "Editor/kullanicisayfalari_".$name."/wos.zip";

	if(!is_file($zip_file)){
	$rootPath = realpath($dir);

	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{

		if (!$file->isDir())
		{

			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();
	}else{
		unlink($zip_file);

		$rootPath = realpath($dir);

	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{

		if (!$file->isDir())
		{

			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();
	}

	$file_url = $zip_file;
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . $file_url . "\""); 
		readfile($file_url); 
}


function son_islem_kayit($name){
	if(!file_exists("Editor/Son_Islem")) {
		$olustur = mkdir("Editor/Son_Islem");
	  }
	  if(!file_exists("Editor/Son_Islem/kullanicisayfalari_".$name)) {
		$olustur = mkdir("Editor/Son_Islem/kullanicisayfalari_".$name);
	  }
	$dir = "Editor/kullanicisayfalari_".$name; 
	$zip_file = "Editor/Son_Islem/kullanicisayfalari_".$name."/wos.zip";
	
	if(!is_file($zip_file)){
	
	$rootPath = realpath($dir);

	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{

		if (!$file->isDir())
		{

			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();
	}else{
		unlink($zip_file);

		$rootPath = realpath($dir);

	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{

		if (!$file->isDir())
		{

			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			$zip->addFile($filePath, $relativePath);
		}
	}

	$zip->close();
	}
}
?>


<script>
  var x = document.getElementById("dosyateslimi_anket_yap2");
$( "#dosyateslimi_anket_button_ic" ).click(function() {

  $( "#dosyateslimi_anket_yap" ).toggle( "slow" );
  x.style.display = "none";
  $('html,body').animate({
        scrollTop: $("#dosyateslimi_anket_yap").offset().top},
        'slow');
});

$( "#gonder_anket" ).click(function() {


/*$('html,body').animate({
	  scrollTop: $("#dosyateslimi_anket_yap2").offset().top},
	  'slow');*/
});
</script>





