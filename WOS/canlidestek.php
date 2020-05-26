<?php
include 'mysql_connect.php';
?>
<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
        $("#canliDestek_Pencere").load("ajax.kullanicimesaj.php");
});
setInterval(function() {$("#canliDestek_Pencere").load('ajax.kullanicimesaj.php');}, 1000);

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<form method="POST">
<div class="canliDestek_Ekran">
<div class="canliDestek_Konusma">
<div class="canliDestek_Kullanici">
<?php
include 'mysql_connect.php';

$email=$_SESSION["Kullaniciadi"];
	$sql = "SELECT * FROM kullanicilar where email='$email'";
    $sonuc = $baglanti->query($sql);
    if ($sonuc->num_rows > 0) 
    {
        while($sorgu=mysqli_fetch_assoc($sonuc) )
        {
            $ad_soyad=$sorgu["ad"]." ".$sorgu["soyad"];
		}
	}
echo '<b style="font-weight:normal;">Hoşgeldiniz </b><b style="font-size:20;"><i>'.ucwords($ad_soyad).'</i></b>';
?>

</div>
<div class="canliDestek_Pencere" id="canliDestek_Pencere">
<?php
/*
if(empty($_SESSION["Kullaniciadi"])){
	
}else{
	$ad=$_SESSION["Kullaniciadi"];
	$oturum=$_SESSION["Oturum_Bilgisi"];
	$sql4 = "select ad,yazi,dt,ot from(
		select kullanici_adi ad,kullanici_yazi yazi, tarih dt, oturum ot from canli_destek
		union
		select 'Admin' ad,cevap yazi,date dt, oturum ot from canli_destek_cevap
		) tt
		where tt.ot='$oturum'
		order by tt.dt";			
		$sorgu4 = $baglanti->query($sql4);
			echo '<table border="0px">';
			while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{		
			   if($sonuc4['ad']=="Admin"){		
			    echo '<tr><td style="background-color:red; color:white;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:700px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';
			   }else{
				echo '<tr><td style="background-color:blue; color:white;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:700px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';  
			   }
			}
		echo '</table>';
}
*/?>
</div>

<div class="canliDestek_Yazi">

<input type="text" name="kullanici_yazi" class="canliDestek_Yazi_textbox"/>
<input type="submit" id="gonder" name="gonder" value="Gönder" onclick="scroll()" class="canliDestek_Yazi_button"/>

</div>
</div>
</div>

</form>
</body>
</html>

<?php
if(isset($_POST['gonder'])){
		$kullanici_adi = $_SESSION["Kullaniciadi"];
		$kullanici_yazi = $_POST['kullanici_yazi'];
		$date = date('Y-m-d H:i:s');
		$sayi=0;

		if(empty($_SESSION["Kullaniciadi"])){
			
			$_SESSION["Kullaniciadi"]=$kullanici_adi;
				$sql1 = "SELECT oturum FROM canli_destek order by oturum";
				$sorgu = $baglanti->query($sql1);
				
				while($sonuc=mysqli_fetch_assoc($sorgu) )
				{
					$sayi=$sonuc["oturum"];
				}
				$sayi=$sayi+1;
			//$_SESSION["Oturum_Bilgisi"]=$sayi;			
		}
		else{
			if($_SESSION["Kullaniciadi"]==$kullanici_adi){
				$sql1 = "SELECT oturum FROM canli_destek where kullanici_adi='$kullanici_adi'";
				$sorgu = $baglanti->query($sql1);
				
				while($sonuc=mysqli_fetch_assoc($sorgu) )
				{
					$sayi=$sonuc["oturum"];
				}
				//$_SESSION["Oturum_Bilgisi"]=$sayi;	
				
			}else{
				$_SESSION["Kullaniciadi"]=$kullanici_adi;
					$sql1 = "SELECT oturum FROM canli_destek order by oturum";
				$sorgu = $baglanti->query($sql1);
				
				while($sonuc=mysqli_fetch_assoc($sorgu) )
				{
					$sayi=$sonuc["oturum"];
				}
				$sayi=$sayi+1;
				//$_SESSION["Oturum_Bilgisi"]=$sayi;	
			}
		}
		$sql = "SELECT * FROM kullanicilar where email='$kullanici_adi' ";
		$sonuc = $baglanti->query($sql);
		if ($sonuc->num_rows > 0) 
		{
			while($sorgu=mysqli_fetch_assoc($sonuc) )
			{
			  $sayi=$sorgu["id"];
			}
		}
		$_SESSION["Oturum_Bilgisi"]=$sayi;
		setcookie("Oturum_Bilgisi",$sayi,time()+1*24*60*60*1000);
		$sqlkayit = "INSERT INTO canli_destek values(NULL,'$ad_soyad', '$kullanici_yazi','$date','$sayi')";
		mysqli_query($baglanti,$sqlkayit);
		header('Location:'.$_SERVER['HTTP_REFERER']);

}
?>

<script>
$("#canliDestek_Pencere").animate({ scrollTop: 10000}, 3000);

function scroll(){
	$("#canliDestek_Pencere").animate({ scrollTop: 10000}, 3000);
}
</script>


