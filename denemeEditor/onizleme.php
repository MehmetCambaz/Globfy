<?php //Veritabanından çekiyor!!!
include 'mysql_connect.php';
$_SESSION["secilenSablon"]=3;
$sorgu = $baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar where sablon_id='.$_SESSION["secilenSablon"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
    $path=$sonuc["sablon_kod"]; //Şuanlık veritabanında şablonun ismini tutyorum, gelen isimi alıp dosyaların içerisinde bulunan php dosyası adıyla
                                //sayfanın konumuna include ediyorum!
		include $path;
	}

?>