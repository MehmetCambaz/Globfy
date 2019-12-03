<?php
include 'mysql_connect.php';
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

?>