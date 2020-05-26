<html>
<head>

<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
<?php include 'mysql_connect.php'; ?>
<div class="hakkimizda_Bolumler">
<center>
<form style="margin:50 0 10 0;" method="POST">
<table>
    <tr>
            <td colspan="2" style="text-align:center; font-weight:bold; font-size:33;">Bizimle İletişime Geçiniz</td>
    </tr>
	<tr>
		<td>
			Ad Soyad:<br><input type="text" name="adsoyad" class="girisislem_text"/>
		</td>
	</tr>
	<tr>
		<td>
			Konu: <br><input type="text" name="konu"  class="girisislem_text" />
		</td>
	</tr>
	<tr>
		<td>
			Email: <br><input type="email" name="email" class="girisislem_text" />
		</td>
	</tr>
	<tr>
		<td>
			Mesaj: <br>
				<textarea name="mesaj" id="mesaj" rows="10" style="padding:5; width:420px; font-size:17;"></textarea>
			
		</td>
	</tr>
	<tr>
        <td colspan="2" style="text-align:right;"><input class="iletisim_button" type="submit" name="mesaj_gonder"  value="Gönder"/></td>
		</td>
	</tr>
	<tr>
		<td colspan="2" >
		
		<h3 style="color:green; text-align:center;">
			<?php
				if(isset($_POST['mesaj_gonder'])){
					$adsoyad= $_POST['adsoyad'];
					$konu= $_POST['konu'];
					$email = $_POST['email'];
					$mesaj = $_POST['mesaj'];

					if($adsoyad=="" || $konu=="" || $email=="" || $mesaj==""){
						echo '<a style="color:red;">Eksik veya hatalı bölüm var!</a>';
					}else{
						$icerik = 'Ad Soyad:'.$adsoyad.'    Konu:'.$konu.'    E-Mail:'.$email.'    Mesaj:'.$mesaj;
						$icerik=wordwrap($icerik, 70, "\r\n");

						$message = '<html><body>';
						$message .= '<p style="color:black;"><b>Ad Soyad:</b> '.$adsoyad.'</p>';
						$message .= '<p style="color:black;"><b>Konu:</b> '.$konu.'</p>';
						$message .= '<p style="color:black;"><b>E-Mail:</b> '.$email.'</p>';
						$message .= '<p style="color:black;"><b>Mesaj:</b> '.$mesaj.'</p>';
						$message .= '</body></html>';

						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
						$headers .= 'From: '.$email."\r\n".
							'Reply-To: '.$email."\r\n" .
							'X-Mailer: PHP/' . phpversion();
	
						if(mail("enesdongez@gmail.com",$konu,$message,$headers)){
                            echo "Mesajınız alınmıştır.";
                           // header ("Refresh: 1; url=index.php");
						}else{
							
						}
					
					}	

				}	
			?>
		</h3>
		
		</td>
	</tr>
	</table>
	</form>
			</div>
</div>
<div style="width:100%; margin:auto;">
<center>
<table border="0" cellpadding="10">
<tr>
<td style="text-align:center;">
<p style="text-align:center; font-weight:bold; font-size:33; font-family:Calibri;">Arge Ofisi</p>
</td>
<td style="text-align:center;">
<p style="text-align:center; font-weight:bold; font-size:33; font-family:Calibri;">Ana Ofisi</p>
</td>
</tr>
<tr>
<td style="text-align:center;">
<div style="height:auto;">
<div style="background-color:transparent;">
<iframe width="510" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=Aşağı dudullu mahallesi / Galata sokak / No:40&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>
<style>.mapouter{position:relative;text-align:left;height:400px;width:475px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:475px;}</style>
</div>
</td>
<td>
<div style="width:100%; height:auto;">
<div style="background-color:transparent;">
<iframe width="510" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=Kıbrıs&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
<style>.mapouter{position:relative;text-align:right;height:500px;width:575px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:575px;}</style>
</div></div>
</td>
</tr>
</table>
</center>
</div>

</body>
</html>
