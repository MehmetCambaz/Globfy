<?php
include 'mysql_connect.php';
if(!empty($_COOKIE["oturum_id"])){

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

		$oturum_id=$_COOKIE["oturum_id"];
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
			echo '<tr><td style="background-color:red; color:white;"><div style="width:auto; vertical-align: middle; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:90%; word-break:break-all;height:auto; padding:10 10 10 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';
			}
			else{
			echo '<tr><td style="background-color:blue; color:white;"><div style="width:auto; vertical-align: middle; text-align:center;">'.$sonuc4['ad'].'</div></td><td><div style="width:90%; word-break:break-all;height:auto; padding:10 10 10 10; border:1px solid black; ">'.$sonuc4['yazi'].'</div></td></tr>';

			}
		}	
		echo '</table>';		
}

?>