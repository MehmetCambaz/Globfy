<?php
include 'mysql_connect.php';
	if(!empty($_COOKIE["secilenkompanent"])){
		$gelen=$_COOKIE["secilenkompanent"];
		$sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='$gelen'";
			$sorgu4 = $baglanti->query($sql4);
			$oturum="";
			echo '<table border="0px" width="100%">';
			echo '<tr><td><h1 style="text-align:center; font-family:Calibri;">'.mb_strtoupper($gelen).'</h1></td></tr>';
			
			while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				echo '<tr><td cellpadding="20" style="background-color:; height:90px; margin:10 0 10 0; text-align:center;">
				<a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" height="100%"  style="margin:0 0 0 0;"/>
				</a></td></tr>';
			}
			echo '</table>';

	}else{
		echo "YOK";
	}

	if(isset($_GET['ekle'])){
		$id=$_GET['ekle'];
		//setcookie("ekle",$id,time()+86954);
		header('Location:'.$_SERVER['HTTP_REFERER']);

	}
?>