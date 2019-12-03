<?php
include 'mysql_connect.php';
if(isset($_POST['EditorGecis'])){
  $secimRadio="";
  
  if (!empty($_POST["secimRadio"])) {
	  $id=$_POST["secimRadio"];
	  echo $id;
	  $_SESSION["secilenSablon"]=$id;
	  header ("Refresh: 0; url=index.php?sayfa=editor");
  }
}
?>
<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">
</script>
</head>
<body>
<form method="POST">
	<div class="sablonSecim_Ekran">
		<div class="sablonSecim_Ust">
			<h3>Şablon Seçiniz</h3>
		</div>
		<div class="sablonSecim_Sablonlar">
			<div class="sablonSecim_SablonPanel">		
			
			<?php
			
			foreach($baglanti->query('select sablon_id,sablon_adi,sablon_resim from sablonlar') as $row){
			echo '<table border="0px" style="float:left; margin:0 5 15 11;"><tr><td>';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['sablon_resim'] ).'" width="300px" height="300px"/>';
			echo '</td><tr>
			<tr><td><center><input type="radio" name="secimRadio" value="'.$row['sablon_id'].'"/>Seç</center></td></tr>
			</table>';
			}
			/*$i=1; // mysql olmadan veri çekme
			while ( $i<=15 ){
			echo '<table border="0px" style="float:left; margin:0 5 15 11;">
			<tr><td><img src="Desing/Pictures/Sablon/sablon'.$i.'.png" width="300px" height="300px"/></td><tr>
			<tr><td><center><input type="radio" name="secimRadio" value="sablon'.$i.'"/>Seç</center></td></tr>
			</table>';
			$i=$i+1;
			}*/
			?>
			
			</div>
		</div>
		<div class="sablonSecim_Alt">
		<?php 
		if($_POST){
			  if (empty($_POST["secimRadio"])) {
				echo "*Şablon Seçmediniz!*";
			  }
		}
		?>
		<input type="submit" class="gecisButton" value="Sonraki Adıma Geçiniz" name="EditorGecis"/>		
		</div>
	</div>
	</form>
</body>
</html>