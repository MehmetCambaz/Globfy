<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
<div class="footer_Bolumler">
    <center><div class="footer_Bolumler_yazi">
        Üye ol ve son güncellemelerden haberin olsun..
    </div>
    <div class="footer_Bolumler_gonder">
        <form method="POST">
        <input type="email" placeholder="e-posta" name="email_kullanici_anasayfa" class="email_kullanici_anasayfa"/>
        <input type="submit" value="Üye Ol"name="email_kullanici_anasayfa_button" class="email_kullanici_anasayfa_button"/><br>
        <?php
        if(isset($_POST['email_kullanici_anasayfa_button'])){
            include 'mysql_connect.php';

            if($_POST)
            {
            $kullanici_email_kayit = $_POST['email_kullanici_anasayfa'];
            
            if($kullanici_email_kayit!=""){
                $yenikayit = "INSERT INTO eposta_uye values(NULL,'$kullanici_email_kayit')";
                mysqli_query($baglanti,$yenikayit);
                //$kullanici_kaydet = mysql_query("INSERT INTO kullanicilar (kullanici_adi,adi,soyadi,sifre) VALUES ('$kullanici_adi','$adi','$soyadi','$sifre')");
                echo '<b style="color:green;">Kayıt Başarılı</b>';
            }else{
                echo '<b style="color:red;">Lütfen e-posta alanını doldurunuz!</b>';
            }
            }
        }    
        ?>
        </form>
    </div>
    <div class="footer_Bolumler_alt">
        wo-system.com
    </div>
</center>
</div>
</body>
</html>

