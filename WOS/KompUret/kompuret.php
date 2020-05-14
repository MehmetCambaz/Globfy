<?php
 $yeni="";

 include 'mysql_connect.php';
 $gelenkullaniciemail=$_SESSION["Kullaniciadi"];

 if(!file_exists("Olusturulan")) {
   $olustur = mkdir("Olusturulan");
 }
 if(isset($_GET["KompanentEkle"])){
	
	 $secilenKompanent_ID=$_GET["KompanentEkle"];
	 
	 $sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim=$sonuc["komp_kod"]; //veritabanından gelen kompanent tasarim kodu!
        }
	$veri="<?php "; //ayar sayfasından gelen verileri tek tek okuyup dökümana php değişkenlerini yazdırmaya başladığım yer!
      if (isset($_COOKIE['sayfaEkle'])) {

        
        foreach ($_COOKIE['sayfaEkle'] as $name => $value) {
          $name = htmlspecialchars($name);
          $value = htmlspecialchars($value);
          $yazilacakicerik='$'.$name.'="'.$value.'";'; // dosyaya yazdırmak için açtığım değişken,
                                                                                     // içeriği örnek olarak '  $content2_arkaplan3="blue" ' gibi..

          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n";
      }
	  $dt= fopen('Olusturulan/'.$gelenkullaniciemail.'.php', 'w');
	  fwrite($dt,$veri);
	  
	  $yeni='<textarea style="width:100%; height:calc(100% - 70px);">'.$gelentasarim.'</textarea>';
	  
	  $dt2= fopen('Olusturulan/'.$gelenkullaniciemail.'.php','a');
	  fwrite($dt2,$yeni);
	 
 }


?>

<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<link rel="icon" href="..\Desing\Pictures\logo.ico" type="image/icon type">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="design/styles_menu.css">
   <script src="design/script_menu.js" type="text/javascript"></script>
   <script src="design/script_menu2.js"></script>
   
   <script>
$(document).ready(function() {
		$("#Ayar").load("ayar.php");
		$("#Kod").load("textarea.php");
});
</script>
<style>
  	/* width */
     ::-webkit-scrollbar {
	width: 8px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
	background: #f1f1f1; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
	background: #6D6D6D; 
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
	background: #555; 
  }


</style>
</head>
<body style="margin:auto; padding:0;">
<div class="bilesen" style="margin:auto;">

<div class="bilesen_ust">
			<h2 style="font-family:Calibri;">Bileşen Üret</h2>
</div>
<div class="bilesen_icerik">
<div style="width:30%; float:left; height:calc(100% - 70px); overflow-y:scroll;">
<div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href='#'>Header</a>
   <ul>
   <?php
   include 'mysql_connect.php';
   if(isset($_GET['AyarGecis'])){ //kompanentlere tıklanmışsa o kompanentin ayar sayfasını açıyor!
    ayarSayfasi_yonlendirme();
  }
  
  
   $sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='header'";
			$sorgu4 = $baglanti->query($sql4);
			    
while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				  echo '<li><a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" style="margin:0 0 0 0;"/>
				</a></li>';
			}
   
   
   ?>

      </ul>
   </li>
   <li class='has-sub'><a href='#'>Content</a>
   <ul>
  <?php
   include 'mysql_connect.php';
   $sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='content1'";
			$sorgu4 = $baglanti->query($sql4);
			    
while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				  echo '<li><a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" style="margin:0 0 0 0;"/>
				</a></li>';
			}
   
   
   ?>
   </ul>
   </li>
      <li class='has-sub'><a href='#'>Bar</a>
   <ul>
      <?php
   include 'mysql_connect.php';
   $sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='bar1'";
			$sorgu4 = $baglanti->query($sql4);
			    
while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				  echo '<li><a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" style="margin:0 0 0 0;"/>
				</a></li>';
			}
   
   
   ?>
   </ul>
   </li>
      <li class='has-sub'><a href='#'>Footer</a>
   <ul>
      <?php
   include 'mysql_connect.php';
   $sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='footer'";
			$sorgu4 = $baglanti->query($sql4);
			    
while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				  echo '<li><a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" style="margin:0 0 0 0;"/>
				</a></li>';
			}
   
   
   ?>
   </ul>
   </li>
      <li class='has-sub'><a href='#'>Leftbanner</a>
   <ul>
      <?php
   include 'mysql_connect.php';
   $sql4 = "SELECT id,tur,kompanent_icerik,komp_pic FROM kompanentler where tur='leftbanner'";
			$sorgu4 = $baglanti->query($sql4);
			    
while($sonuc4=mysqli_fetch_assoc($sorgu4) )
			{
				  echo '<li><a href="?AyarGecis='.$sonuc4['id'].'" style="text-decoration:none; color:white;">
				<img src="'.$sonuc4['komp_pic'].'" width="100%" style="margin:0 0 0 0;"/>
				</a></li>';
			}
   
   
   ?>
   </ul>
   </li>

</ul>
</div>
</div>
<div style="float:left;width:70%; " >
<div style="float:left; width:50%;" id="Ayar" name="Ayar" style="background-color:#FAFAFA;">
Ayar.php
</div>
<div style="float:left; width:50%; " id="Kod" name="Kod">

</div>
</div>
</div>
</div>

</body>
<html>

<?php

function ayarSayfasi_yonlendirme(){
    echo '<script type="text/javascript">', //ayar sayfasının açılması için javascript fonksiyonunu çağırıyorum
    'openPage(event, "Ayar", "tablink_ayar");',
    '</script>';
    $id2=$_GET['AyarGecis'];
    $_SESSION["KompnanentID"]=$id2; //ayar.php de kullanıyoruz!	 
  }

?>