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
<input type="submit" name="dosya_indir" class="dosyateslim_button_tasarim" value="İNDİR"/>

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
if(isset($_POST["dosya_indir"])){


    zip_download($name);
}

function zip_download($name){
	$dir = "Editor/kullanicisayfalari_".$name; 
	$zip_file = "Editor/kullanicisayfalari_".$name."/wos.zip";

	// Get real path for our folder
	$rootPath = realpath($dir);

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			// Add current file to archive
			$zip->addFile($filePath, $relativePath);
		}
	}

	// Zip archive will be created only after closing object
	$zip->close();


	$file_url = $zip_file;
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
		readfile($file_url); 
}

?>

