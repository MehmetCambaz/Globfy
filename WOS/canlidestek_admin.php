<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
        $("#canliDestekAdmin_Mesajlar").load("ajax.adminmesajlar.php");
});
setInterval(function() {$("#canliDestekAdmin_Mesajlar").load('ajax.adminmesajlar.php');}, 1000);

$(document).ready(function() {
			$("#canliDestekAdmin_Pencere_cevap").load("ajax.adminmesajyaz.php");
});
setInterval(function() {$("#canliDestekAdmin_Pencere_cevap").load('ajax.adminmesajyaz.php');}, 1000);

</script>
</head>
<body>

<div class="canliDestekAdmin_Ekran">
<div class="canliDestekAdmin_Konusma">
<div class="canliDestekAdmin_Pencere">
<div class="canliDestekAdmin_Mesajlar" id="canliDestekAdmin_Mesajlar">
<?php
include 'mysql_connect.php';
/*
$sql4 = "SELECT kullanici_adi,kullanici_yazi,oturum,tarih FROM canli_destek order by tarih desc";
			$sorgu4 = $baglanti->query($sql4);
			echo '<table border="0px">';
			$oturum="";
			while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				$tut=$oturum;
				$oturum=$sonuc4['oturum'];
				if($tut!=$oturum)
				echo '<tr><td style="background-color:blue; color:white;"><b style="margin:0 5 0 5;">'.$sonuc4['kullanici_adi'].'</b></td><td><div style="border:1px solid black; width:140px; padding:5 0 0 0; overflow: hidden; height:25px;"><b style="margin:0 5 0 5;  font-weight:normal;">'.$sonuc4['kullanici_yazi'].'</a></div></td><td><div style=" width:60px; text-align:center; padding:5 0 0 0; height:25px;"><a style="" href="http://localhost:8080/WOS/index.php?sayfa=canlidestek_admin&oturum='.$oturum.'">Cevapla</a></div></td></tr>';

			}
			echo '</table>';
*/

?>
</div>
<div class="canliDestekAdmin_Pencere_cevapver">
<div class="canliDestekAdmin_Pencere_cevap" id="canliDestekAdmin_Pencere_cevap">
<?php
/*if(isset($_GET['oturum']))
{
	/*$oturum_id=$_GET['oturum'];
	$sql5="select canli_destek_cevap.cevap,canli_destek.kullanici_adi,canli_destek.kullanici_yazi,canli_destek.tarih,canli_destek_cevap.date from canli_destek_cevap,canli_destek where canli_destek_cevap.oturum='$oturum_id' OR canli_destek.oturum='$oturum_id'";
	$sorgu5 = $baglanti->query($sql5);
	$cevap="";
	echo '<table border="0px">';
	$cevap="";
	$kullanici_yazi="";
	while($sonuc5=mysqli_fetch_assoc($sorgu5) )
	{	
		$tut=$cevap;
		$tut2=$kullanici_yazi;
		$cevap=$sonuc5['cevap'];
		$kullanici_yazi=$sonuc5['kullanici_yazi'];
		if($tut2!=$kullanici_yazi){
		echo '<tr><td style="color:red;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">'.$sonuc5['kullanici_adi'].'</div></td><td><div style="width:700px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc5['kullanici_yazi'].'</div></td></tr>';
		$admin_tarih=$sonuc5['date'];
		$kullanici_tarih=$sonuc5['tarih'];
		if($admin_tarih>$kullanici_tarih)
		echo '<tr><td>'.$cevap.'</td></tr>';
		}

		//echo $sonuc5['canli_destek.kullanici_adi'];
	}
	echo '</table>';*/
	/*$oturum_id=$_GET['oturum'];
	$kullanici_yazi="";
		$sql4 = "SELECT kullanici_adi,kullanici_yazi,tarih,oturum FROM canli_destek where oturum='$oturum_id' order by tarih";
			$sorgu4 = $baglanti->query($sql4);
			echo '<table border="0px">';
			while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{				
				$kullanici_tarih=$sonuc4['tarih'];
				$tut2=$kullanici_yazi;
				$kullanici_yazi=$sonuc4['kullanici_yazi'];
				if($tut2!=$kullanici_yazi){
					echo '<tr><td style="color:blue;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">'.$sonuc4['kullanici_adi'].'</div></td><td><div style="width:700px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc4['kullanici_yazi'].'</div></td></tr>';
				}
			   $sql5 = "SELECT oturum,date,cevap FROM canli_destek_cevap where oturum='$oturum_id' order by date";
			   $sorgu5 = $baglanti->query($sql5);
			   while($sonuc5=mysqli_fetch_assoc($sorgu5) )
			   {
				   $admin_tarih=$sonuc5['date'];
				   if($kullanici_tarih<$admin_tarih){
					    echo '<tr><td style="color:yellow;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">Admin</div></td><td><div style="width:700px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc5['cevap'].'</div></td></tr>';
				   }
			   }				   
			}
		echo '</table>';*/
		/*$oturum_id=$_GET['oturum'];
		$kullanici_yazi="";
		$sql4 = "select ad,yazi,dt,ot from(
		select kullanici_adi ad,kullanici_yazi yazi, tarih dt, oturum ot from canli_destek
		union
		select 'Admin' ad,cevap yazi,date dt, oturum ot from canli_destek_cevap
		) tt
		where tt.ot='$oturum_id'
		order by tt.dt";
		$sorgu4 = $baglanti->query($sql4);
		echo '<table border="0px">';
		while($sonuc4=mysqli_fetch_assoc($sorgu4) )
		{
			if($sonuc4['ad']=="Admin"){
			echo '<tr><td style="background-color:red; color:white;"><div style="width:110px; border:1px solid black; height:40px; padding-top:20px; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:590px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';
			}
			else{
			echo '<tr><td style="background-color:blue; color:white;"><div style="width:110px; height:40px; padding-top:20px; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:590px; height:40px; padding:20 0 0 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';

			}
		}	
		echo '</table>';	
}*/	
?>
</div>
<div class="canliDestekAdmin_Pencere_cevapyaz">
<form method="POST">
<input type="text" name="admin_yazi" class="canliDestek_admin_Yazi_textbox"/>
<input type="submit" name="gonder_admin" class="canliDestek_admin_Yazi_button"/>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php
if(isset($_POST['gonder_admin'])){
	$date = date('Y-m-d H:i:s');
	$oturum_id=$_GET['oturum'];
	$cevabim = $_POST['admin_yazi'];
	echo $date;
	echo $oturum_id;
	echo $cevabim;
		$sqlkayit = "INSERT INTO canli_destek_cevap values(NULL,'$oturum_id','$date','$cevabim')";
		mysqli_query($baglanti,$sqlkayit);
		header('Location:'.$_SERVER['HTTP_REFERER']);
}
if(isset($_GET['oturum']))
{
	setcookie('oturum_id',$_GET['oturum'],time()+86400);
}

?>

<script>
$("#canliDestekAdmin_Pencere_cevap").animate({ scrollTop: 10000}, 3000);

</script>