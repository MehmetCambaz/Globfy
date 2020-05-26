<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WoS | Web Site Oluşturma Sistemi</title>
<script language="JavaScript">

function Alert() {
  alert("Giriş Yapmanız Gerekmektedir!");
}

</script>
</head>
<body>
<div class="header_Bolum">
<a href="index.php?sayfa=body"><img src="Desing/Pictures/logo.png" class="header_Picture"/></a>
</div>
<div class="header_Bolum">
<h1 class="header_Text">Web Site Oluşturma Sistemi</h1>
</div>
<div style="float:left; width:100%; margin:0 0 20 0;">
<hr class="header_line"/>
</div>

<div class="header_Button">
<center>
<a href="index.php?sayfa=body">Anasayfa</a>
<a href="index.php?sayfa=hakkimizda">Hakkımızda</a>
<a href="index.php?sayfa=iletisim">İletişim</a>
<?php 
include 'mysql_connect.php';
    if(!empty($_SESSION["Kullaniciadi"])  && $_SESSION["Kullaniciadi"]!="ADMIN"){
        echo '<a style="margin: 0 4 0 0;" href="index.php?sayfa=canlidestek">Canlı Destek</a>';
    }else if(!empty($_SESSION["Kullaniciadi"]) && $_SESSION["Kullaniciadi"]=="ADMIN"){
        echo '<a style="margin: 0 4 0 0;" href="index.php?sayfa=canlidestek_admin">Canlı Destek Admin</a>';
    }else{
        echo '<a style="margin: 0 4 0 0;" onclick="Alert()" href="index.php?sayfa=girisislem">Canlı Destek</a>';
    }
     
    if(empty($_SESSION["Kullaniciadi"])){
        echo '<a href="index.php?sayfa=girisislem">Giriş & Kayıt Ol</a>';
    }else{
        if($_SESSION["Kullaniciadi"]!="ADMIN"){
        echo '<a class="profil" href="index.php?sayfa=profil"">Profil</a>';
        }
        echo '<a class="cikis" href="index.php?sayfa=cikisislem"">Çıkış Yap</a>';
    }
?>
</center>
</div>

</body>
</html>

