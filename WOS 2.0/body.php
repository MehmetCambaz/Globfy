<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">
function Alert() {
  alert("Giriş Yapmanız Gerekmektedir!");
}
</script>

</head>
<body>
<div class="body_Bolumler">
<div class="body_Bolum">
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/anasayfa_tasarim.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Ücretsiz Web Sitenizi Hemen Yapmaya Başlayabilirsiniz...</h1> </td>
<td> <?php
    if(!empty($_COOKIE["Kullaniciadi"])){
        echo '<a href="index.php?sayfa=sablonSecim" class="body_Button1">BAŞLA</a>';
    }else{
        echo '<a onclick="Alert()" href="index.php?sayfa=girisislem" class="body_Button1">BAŞLA</a>';
    }

    ?>        
</td></tr>
</table>
</div>
<div class="body_Bolum">
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/anasayfa_tasarim.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Neden Bir Web Sitesine Sahip Olmalıyız...</h1> </td>
<td> <a href="#" class="body_Button1">ÖĞREN</a> </td></tr>
</table>
</div>
<div class="body_Bolum">
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/anasayfa_tasarim.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Web Site Oluşturma Sistemi Nasıl Kullanılıyor...</h1> </td>
<td> <a href="#" class="body_Button1">ÖĞREN</a> </td></tr>
</table>
</div>
</div>
</body>
</html>

<?php

?>