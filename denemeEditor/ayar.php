
<?php //Veritabanından çekiyor!!!
include 'mysql_connect.php';
$_SESSION["AyarGecis"]=3;
$sorgu = $baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod,sablon_ayar from sablonlar where sablon_id='.$_SESSION["AyarGecis"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["sablon_ayar"];
	}
?>

