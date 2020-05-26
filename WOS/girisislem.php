<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WoS | Web Site Oluşturma Sistemi</title>

<script language="JavaScript">

</script>

</head>
<body>
<div class="girisislem">
    <div class="girisislem_giris">
        <center>
        <form method="POST">
        <table>
            <tr>
                <td colspan="2" style="text-align:center; font-weight:bold; font-size:30;">Giriş Yap</td>
            </tr>
            <tr>
                <td>E-Posta:</br><input class="girisislem_text" type="text" name="giris_kullanici_email"/></td>
            </tr>
            <tr>
                <td>Şifre:</br><input class="girisislem_text" type="password" name="giris_kullanici_sifre"/></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;"><input class="girisislem_button" type="submit" name="giris_button" value="Giriş Yap"/></td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">
                    <?php
                       if(isset($_POST['giris_button'])){
                        include 'mysql_connect.php';
            
                        if($_POST)
                        {
                        $kullanici_email = $_POST['giris_kullanici_email'];
                        $sifre = $_POST['giris_kullanici_sifre'];
                        $sql = "SELECT * FROM kullanicilar where email='$kullanici_email' and sifre='$sifre'";
                        $sonuc = $baglanti->query($sql);
                        if ($sonuc->num_rows > 0) 
                        {
                            while($sorgu=mysqli_fetch_assoc($sonuc) )
                            {
                              $ad_soyad=$sorgu["ad"]." ".$sorgu["soyad"];
                            }
                            //setcookie("Kullaniciadi",$ad_soyad,time()+1*24*60*60*1000);
                            include 'mysql_connect.php';

                            $_SESSION["Kullaniciadi"]=$kullanici_email;
                                header("Refresh: 0; url=index.php");
                        }
                        else
                        {
                            echo 'GİRİŞ BAŞARISIZ';	
                        }
                        }	
                        }
                    ?>
                </td>
            </tr>
        </table>
        </form>
        </center>
    </div>
    <div class="girisislem_kayit">
    <center>
        <form method="POST">
        <table>
            <tr>
                <td colspan="2" style="text-align:center; font-weight:bold; font-size:30;">Kayıt Ol</td>
            </tr>
            <tr>
                <td>Ad:</br><input class="girisislem_text" type="text" name="kayit_kullanici_ad"/></td>
            </tr>
            <tr>
                <td>Soyad:</br><input class="girisislem_text" type="text" name="kayit_kullanici_soyad"/></td>
            </tr>
            <tr>
                <td>E-Posta:</br><input class="girisislem_text" type="text" name="kullanici_email_kayit"/></td>
            </tr>
            <tr>
                <td>Şifre:</br><input class="girisislem_text" type="password" name="kayit_kullanici_sifre"/></td>
            </tr>
            <tr>
                <td>Şifre Onay:</br><input class="girisislem_text" type="password" name="kayit_kullanici_sifre2"/></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;"><input class="girisislem_button" type="submit" name="kayit_button" value="Kayıt Ol"/></td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <?php
                       if(isset($_POST['kayit_button'])){
                        include 'mysql_connect.php';
            
                        if($_POST)
                        {
                        $kullanici_adi = $_POST['kayit_kullanici_ad'];
                        $kullanici_soyad = $_POST['kayit_kullanici_soyad'];
                        $kullanici_email_kayit = $_POST['kullanici_email_kayit'];
                        $sifre = $_POST['kayit_kullanici_sifre'];
                        $sifre2 = $_POST['kayit_kullanici_sifre2'];
                        
                        $eposta=$kullanici_email_kayit;

                        $sql = "SELECT * FROM kullanicilar where email='$kullanici_email_kayit'";
                        $sonuc = $baglanti->query($sql);
                        if($kullanici_adi=="" || $kullanici_soyad=="" || $kullanici_email_kayit = "" || $sifre=="" || $sifre2=="")
                        {
                            echo '<b style="color:red;">Lütfen tüm alanları doldurunuz!<b>';		
                        }
                        elseif ($sonuc->num_rows > 0) 
                        {
                            echo '<b style="color:red;">E-Posta hesabı kullanılmaktadır!<b>';		
                        }
                        elseif($sifre != $sifre2)
                        {
                            echo '<b style="color:red;">Parola onaylanmadı!</b>';			
                        }
                        else{	
         
                        $yenikayit = "INSERT INTO kullanicilar values(NULL,'$kullanici_adi', '$kullanici_soyad', '$eposta', '$sifre')";
                        mysqli_query($baglanti,$yenikayit);
                        //$kullanici_kaydet = mysql_query("INSERT INTO kullanicilar (kullanici_adi,adi,soyadi,sifre) VALUES ('$kullanici_adi','$adi','$soyadi','$sifre')");
                        echo '<b style="color:green;">Kayıt Başarılı</b>';
                        
                        }		
                        }	
                        }
                    ?>
                </td>
            </tr>
        </table>
        </form>
        </center>
    </div>
</div>
</body>
</html>

<script type="text/javascript">

function check()
{
    if (document.getElementById('kayit_kullanici_ad').value==""
     || document.getElementById('kayit_kullanici_soyad').value==""
     || document.getElementById('kayit_kullanici_email').value==""
     || document.getElementById('kayit_kullanici_sifre').value==""
     || document.getElementById('kayit_kullanici_sifre2').value=="")
    {
        alert ("Lütfen tüm alanları doldurunuz..");
        return false;
    }
    return true;
}

</script>