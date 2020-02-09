
<?php
include 'mysql_connect.php';

$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$_SESSION["KompnanentID"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["komp_ayar"];
	}

?>

