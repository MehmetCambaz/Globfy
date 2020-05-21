<?php
include 'mysql_connect.php';
$sql5 = "SELECT kullanici_adi,kullanici_yazi,oturum,tarih FROM canli_destek order by tarih desc";
			$kullaniciadlari=array();
			$sorgu5 = $baglanti->query($sql5);
			while($sonuc5=mysqli_fetch_assoc($sorgu5) )
			{
				$kullanici_adi=$sonuc5['kullanici_adi'];
				array_push($kullaniciadlari,$kullanici_adi);
			}
			$TemizListe = array_unique($kullaniciadlari);
			$TemizListe2=array_values($TemizListe);
			//echo $TemizListe2[1];
			/*for($i=0;$i<count($TemizListe);$i++){
				$kullanicim=$TemizListe[$i]
				$sql5 = "SELECT kullanici_adi,kullanici_yazi,oturum,tarih FROM canli_destek where kullanici_adi='$kullanicim' order by tarih desc";
			}*/
			$sql4 = "SELECT kullanici_adi,kullanici_yazi,oturum,tarih FROM canli_destek order by tarih desc";
			$kullaniciadlari=array();
			$sorgu4 = $baglanti->query($sql4);
			echo '<table border="0px">';
			$oturum="";
			$sayac=0;
			$toplam=count($TemizListe2);
			
			while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				if($sayac<$toplam){
				$tutKullanici=$TemizListe2[$sayac];
				$tutKullanici_gelen=$sonuc4['kullanici_adi'];
				$tut=$oturum;
				
				$oturum=$sonuc4['oturum'];
				if($tutKullanici==$tutKullanici_gelen){
				if($tut!=$oturum){
				echo '<tr><td style="background-color:blue; color:white;"><b style="margin:0 5 0 5;">'.$sonuc4['kullanici_adi'].'</b></td><td><div style="border:1px solid black; width:140px; padding:5 0 0 0; overflow: hidden; height:25px;"><b style="margin:0 5 0 5;  font-weight:normal;">'.$sonuc4['kullanici_yazi'].'</a></div></td><td><div style=" width:60px; text-align:center; padding:5 0 0 0; height:25px;">
				<a style="" href="index.php?sayfa=canlidestek_admin&oturum='.$oturum.'">Cevapla</a></div></td></tr>';
				}
				$sayac++;
				}
				}
			}
			echo '</table>';








/*while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				$tut=$oturum;
				$oturum=$sonuc4['oturum'];
		
				if($tut!=$oturum){
				echo '<tr><td style="background-color:blue; color:white;"><b style="margin:0 5 0 5;">'.$sonuc4['kullanici_adi'].'</b></td><td><div style="border:1px solid black; width:140px; padding:5 0 0 0; overflow: hidden; height:25px;"><b style="margin:0 5 0 5;  font-weight:normal;">'.$sonuc4['kullanici_yazi'].'</a></div></td><td><div style=" width:60px; text-align:center; padding:5 0 0 0; height:25px;">
			<a style="" href="index.php?sayfa=canlidestek_admin&oturum='.$oturum.'">Cevapla</a></div></td></tr>';
				}*/

				
?>