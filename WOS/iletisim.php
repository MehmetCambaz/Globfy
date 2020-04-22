<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

</script>

</head>
<body>
<div class="hakkimizda_Bolumler">
<form style="margin-left:330px;">
    <table>
        <tr>
            <td colspan="2" style="text-align:center; font-weight:bold; font-size:30;">Bizimle İletişime Geçiniz</td>
        </tr>
        <tr>
            <td>İsim:</br><input class="girisislem_text" type="text" name="iletisim_kullanici_isim"/></td>
        </tr>
        <tr>
            <td>Soyisim:</br><input class="girisislem_text" type="text" name="iletisim_kullanici_soyisim"/></td>
        </tr>
        <tr>
            <td>E-Posta:</br><input class="girisislem_text" type="text" name="iletisim_kullanici_email"/></td>
        </tr>
        <tr>
            <td>Başlık:</br><input class="girisislem_text" type="text" name="iletisim_kullanici_subject"/></td>
        </tr>
        <tr>
                <td>İçerik:</br>
                <textarea rows="10" cols="57" name="iletisim_kullanici_message"></textarea></td>
        </tr>
        <tr>
                <td colspan="2" style="text-align:right;"><input class="iletisim_button" type="submit" name="iletişim_button" value="Gönder"/></td>
        </tr>

        <?php
            if(isset($_POST['iletisim_button']))
            {
                $to   = 'Bravetheros@gmail.com';
                $kullanici_isim = $_POST['iletisim_kullanici_isim'];
                $kullanici_soyisim = $_POST['iletisim_kullanici_soyisim'];
                $kullanici_email = $_POST['iletisim_kullanici_email'];
                $kullanici_subject = $_POST['iletisim_kullanici_subject'];
                $kullanici_message = $_POST['iletisim_kullanici_message'];
                
                mail($to, $kullanici_subject, $kullanici_message);
            }
            ?>
    </table>
</form>
</div>
</body>
</html>