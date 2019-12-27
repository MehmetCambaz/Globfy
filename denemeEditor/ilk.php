

<form method="post">
<input type="submit" value="gecis" name="gecisyapin"/>

</form>

<?php //Veritabanından çekiyor!!!
include 'mysql_connect.php';

if(isset($_POST["gecisyapin"])){
	ob_start();
	touch("yenidosya.php"); 
$_SESSION["secilenSablon"]=3;
$sorgu = $baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar where sablon_id='.$_SESSION["secilenSablon"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		//echo $sonuc["sablon_kod"];
		$kodlar = $sonuc["sablon_kod"];


$dt = fopen('yenidosya.php', 'a');
fwrite($dt, $kodlar);
fclose($dt);
header('Location: index3.php');

	}

	}
?>