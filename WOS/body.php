<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>

<script language="JavaScript">
function Alert() {
  alert("Giriş Yapmanız Gerekmektedir!");
}

function setVisibility() {
  var x = document.getElementById("neden");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

window.onload = function() {
    setVisibility();
};
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="body_Bolumler">
<div class="body_Bolum" ><!--style="background-color:#F5FFEC;" -->
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/Create.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Ücretsiz Web Sitenizi Hemen Yapmaya Başlayın </h1> </td>
<td> <?php
include 'mysql_connect.php';
    if(!empty($_SESSION["Kullaniciadi"])){
        echo '<a href="index.php?sayfa=sablonSecim" style="background-color:#008000; border:1px solid #007500; color:white;" class="body_Button1">BAŞLA</a>';
    }else{
        echo '<a onclick="Alert()" href="index.php?sayfa=girisislem" style="background-color:#008000; border:1px solid #007500; color:white;" class="body_Button1">BAŞLA</a>';
    }
    ?>        
</td></tr>
</table>
</div>
<div class="body_Bolumler">
<div class="body_Bolum" >
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/Komp.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Web Bileşeni Üretme İşlemine Hemen Başlayın </h1> </td>
<td> <?php
include 'mysql_connect.php';
    if(!empty($_SESSION["Kullaniciadi"])){
        echo '<a href="KompUret/kompuret.php" target="_blank" style="background-color:#930000; border:1px solid #930000; color:white;" class="body_Button1">ÜRET</a>';
    }else{
        echo '<a onclick="Alert()" href="index.php?sayfa=girisislem" style="background-color:#930000; border:1px solid #930000; color:white;" class="body_Button1">ÜRET</a>';
    }
    ?>        
</td></tr>
</table>
</div><!--
<div class="body_Bolum">  style="background-color:#E1F0FF;"
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/Why.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Neden Bir Web Sitesine Sahip Olmalıyız...</h1> </td>
<td> <button onclick="setVisibility()" style="background-color:#0061C1; color:white; border:1px solid #0061C1; cursor:pointer;" class="body_Button1">ÖĞREN</button> </td></tr>
</table>
<div id="neden" style="margin-left:270px; margin-top:-30px; width:70%; height:150px;" style={{visibility: this.state.visibility }}>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
</div>
</div>-->
<div class="body_Bolum" style="margin-bottom:50;" > <!-- style="background-color:#F0E1FF;" -->
<table border="0px">
<tr>
<td> <img src="Desing/Pictures/How.png" class="body_Resim"/> </td>
<td> <h1 class="body_Yazi">Web Site Oluşturma Sistemi Nasıl Kullanılıyor? </h1> </td>
<td> <a href="index.php?sayfa=nasilkullanilir" class="body_Button1" style="background-color:#6900D2; color:white; border:1px solid #6900D2;">ÖĞREN</a> </td></tr>
</table>
</div>
</div>
</body>
</html>

<?php

?>