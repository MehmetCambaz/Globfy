<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Desing/general.css" media="screen" rel="stylesheet" type="text/css">

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

echo '<h2>Bizi tercih ettiğin için teşekkürler <i>'.ucwords($ad_soyad).',</i> aşağıda ki bağlantıdan dosyalarınıza erişebilirsiniz...</h2>'; ?>
</div>
<div class="dosyateslim_button">
<form method="POST">
<input type="submit" name="dosya_indir" class="dosyateslim_button_tasarim" value="İNDİR" style="cursor:pointer;"/>

</form>
</div>

</div>
</td>
</tr>
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

