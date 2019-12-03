<?php
include 'mysql_connect.php';
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



?>