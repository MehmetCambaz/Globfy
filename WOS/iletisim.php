<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
<?php include 'mysql_connect.php'; ?>
<div class="hakkimizda_Bolumler">
<form style="margin-left:300px;" method="POST">
<table>
    <tr>
            <td colspan="2" style="text-align:center; font-weight:bold; font-size:30;">Bizimle İletişime Geçiniz</td>
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
				<textarea name="mesaj" id="mesaj" rows="10" cols="57" >
				</textarea>
			
		</td>
	</tr>
	<tr>
        <td colspan="2" style="text-align:right;"><input class="iletisim_button" type="submit" name="mesaj_gonder"  value="Gönder"/></td>
		</td>
	</tr>
	<tr>
		<td colspan="2" >
		
		<h3 style="color:green; margin:0 0 0 30;">
			<?php
				if(isset($_POST['mesaj_gonder'])){
					$adsoyad= $_POST['adsoyad'];
					$telefon= $_POST['konu'];
					$email = $_POST['email'];
					$mesaj = $_POST['mesaj'];

					if($adsoyad=="" || $telefon=="" || $email=="" || $mesaj==""){
						echo 'Eksik veya hatalı bölüm var! Mesaj Gönderilemedi!';
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
                            echo "Mesajınız alınmıştır, en kısa zamanda dönüş yapılacaktır.";
                            header ("Refresh: 1; url=index.php");
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
</body>
</html>
