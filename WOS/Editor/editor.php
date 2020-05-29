<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<link rel="icon" href="..\Desing\Pictures\logo.ico" type="image/icon type">
<link href="page3.css" rel="stylesheet" type="text/css"> <!-- Harici css dosyası bağlantısı! -->

<!-- Bu aşağıdaki css her saniye güncellenen kompanent bölümüne ait harici css dosyasında çalışmıyor! -->
<style type="text/css"> 
body{
 /* padding:0;
  margin:0; */
}
  .editor_TapContent{
      float:left;
      width:19.5%;
      height:100%;
      border:1px solid black;
  }
  .editor_tab {
      overflow: hidden;
  }
  .editor_tab button {
      background-color: #8D8D8D;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 0px;
      transition: 0.3s;
      font-size: 17px;
      color:white;
      width:50%;	
  }
  .editor_tab button:hover {
      background-color: #6D6D6D;
  }
  .editor_tab button.active {
      background-color: #6D6D6D;
  }
  .editor_tabcontent {
      display: none;
      padding: 6px 12px;
  }
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

<script language="JavaScript"> // ayar,kompanent geçiş için javascript kodları
function openPage(evt, page, a) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("editor_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("editor_tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(page).style.display = "block";
	document.getElementById(a).click();
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").onclick();
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {  //ayar,kompanent sayfalarının ajax ile çağırıldığı yer 
    $("#Kompanent").load("kompanent.php");
		$("#Ayar").load("ayar.php");
});
setInterval(function() {$("#Kompanent").load('kompanent.php');}, 1000); //sadece kompanent sayfası 1 saniyede bir tekrar çağırılıyor!

document.getElementById("kilavuz_kaldir").value="New Button Text";
function change(element) {
    element.value = 'sub2';
}
</script>                                                            

</head>
<body>
<?php
include 'mysql_connect.php';
$gelenkullaniciemail=$_SESSION["Kullaniciadi"];
?>
<div class="page3_tumsayfa">

    <div class="onizleme" id="onizleme" onclick="openPage(event, 'Kompanent', 'tablink_komp')"> 
    
      <div style="width:10%; float:left;">
        <form method="post"> <!-- Geri Alma işlemi FORM u! -->
          <input type="submit" name="gerial" value="Geri Al" title="Seçilen bölümdeki son işlemi geri alır." style="width:80px; cursor:pointer; height:40px; background-color:gray; color:white; margin:10 0 0 10;"/>
        </form>
      </div> 
      <div style="width:77%; margin:-20 0 0 0;float:left; text-align:center;">   
        <h1><b style="text-shadow: 0 0 3px yellow, 0 0 5px blue; font-family:Calibri;">Web Site Oluşturma Sistemi</b></h1>
        <form method="post" style="margin:-30 0 5 0;"> <!-- Kılavuz çizgileri kaldırma formu! -->
        <?php 
        if(!empty($_COOKIE["kilavuz_cizgisi"])){
          $buttonisimi=$_COOKIE["kilavuz_cizgisi"];
          echo '<input type="submit" name="kilavuz_cizgisi" value="'.$buttonisimi.'" style="width:170px; cursor:pointer;height:40px; background-color:gray; color:white; margin:10 10 0 0;"/>';
        }else{
          echo '<input type="submit" name="kilavuz_cizgisi" value="Kılavuz Çizgi Kaldır" style=" cursor:pointer; width:170px; height:40px; background-color:gray; color:white; margin:10 10 0 0;"/>';
        }
        ?>
          <!--<input type="submit" name="kilavuz_kaldir" value="Kılavuz Çizgi Kaldır" style="width:170px; height:40px; background-color:gray; color:white; margin:10 10 0 0;"/>
          <input type="submit" name="kilavuz_ekle" value="Kılavuz Çizgi Ekle" style="width:170px; height:40px; background-color:gray; color:white; margin:10 10 0 0;"/>-->
        </form>   
      </div>
      <div style="width:13%; float:left;">
      <?php 
        echo '<form method="post"  action="kullanicisayfalari_'.$gelenkullaniciemail.'/index.php" target="_blank">';
      ?>
          <input type="submit" name="onizle" value="Önizleme" style="float:right;width:80px; cursor:pointer; height:40px;float:right; background-color:gray; color:white; margin:10 10 0 0;"/>
        </form>

        <a href="?sonraki_sayfa" style=" float:right; padding:4 8 5 8; text-decoration:none; font-family:Calibri; font-size:18; cursor:pointer; border:0.5px solid green; background-color:green; margin:10 10 10 0;color:white;">Sonraki Adıma Geç</a>

      </div> 
        <?php include 'onizleme.php'; ?> <!-- kullanıcının sayfası, editör sayfası çağırıldı -->

    </div>

    <div class="editor_TapContent" style="overflow-x: hidden; overflow-y: scroll;"> <!-- Tap content sayfası, sol geçişli bölüm! -->

      <div class="editor_tab">
        <button class="editor_tablinks" id="tablink_ayar" onclick="openPage(event, 'Ayar', 'tablink_ayar')">Ayarlar</button>
        <button class="editor_tablinks" id="tablink_komp" onclick="openPage(event, 'Kompanent', 'tablink_komp')">Bileşenler</button>
      </div>

      <div id="Ayar" id="ayar" class="editor_tabcontent"> <!-- Ayar sayfası açılıyor! -->
        <h3>Ayarlar</h3>
      </div>

      <div id="Kompanent" class="editor_tabcontent"> <!-- Kompanent sayfası açılıyor! -->
      </div>

    </div>

</div>

</body>
</html>

<?php
$ilkgiriskontrol=$_SESSION["IlkGirisKontrol"];
if($ilkgiriskontrol=="1"){
  $_SESSION["IlkGirisKontrol"]="2";
  if(!empty($_COOKIE['iceriksayfasi'])){
  foreach ($_COOKIE['iceriksayfasi'] as $name => $value) {

    setcookie('iceriksayfasi['.$name.']',$name,time()-3600); 
 
  }
}
}
$gelenkullaniciemail=$_SESSION["Kullaniciadi"];
  if(isset($_GET['AyarGecis'])){ //kompanentlere tıklanmışsa o kompanentin ayar sayfasını açıyor!
    ayarSayfasi_yonlendirme();
  }


  if(isset($_GET["KompanentEkle"])){
    
    $secilenBolum=$_COOKIE["secilenkompanent"]; //seçilen sayfa bölümünün adı!
    $secilenKompanent_ID=$_GET["KompanentEkle"]; //seçilen bölüme uygun seçilen kompanentin veritabanındaki ID'si!
    
    kullaniciTeslim_sayfalari($secilenBolum); //kullanici sayfalari oluşturan fonksiyon.

    if( $secilenBolum == "header" || $secilenBolum == "footer" || $secilenBolum == "header1") { //Tek bölüm olan sayfaları bu if in altında ki işlemler uygulanacak!
    
      $dt = fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'w+'); //sayfayı w+ ile açıyorum, içeriği silip yeniden yazmak için. Tek sayfa olduğu için!
      $dt_onizleme = fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'w+');
      $sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim=$sonuc["komp_kod"]; //veritabanından gelen kompanent tasarim kodu!
        }
            $tiklaveduzenlekodu='<div style="position:relative; width:100%; cursor:point;">
            <div style="width:40%;
            padding:10 0 10 0;
            border-radius:20px;
            background-color:#5C5C5C; 
            opacity:0.8;
            font-size:24px;
            position:absolute;
            margin-top:5%;
            margin-left: calc( 100% - 70% );
            text-align:center;
            font-size:35px;
            font-weight:bold;
            font-family:calibri;
            color:white;cursor:pointer;
            ">Tıkla ve Düzenle</div></div>';

      $gelentasarim2=$tiklaveduzenlekodu.$gelentasarim; //php dosyaları hariç sayfaya yazacağım içerik!
      $resimlerkalsoru='src="resimler/';
      $yeniresimlerklasoru='src="editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
      $gelentasarim2=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$gelentasarim2);  
      fwrite($dt, $gelentasarim2); // php dosyaları hariç olan veriyi ilk yazdırdım!
      fclose($dt);
      fwrite($dt_onizleme, $gelentasarim); 
      fclose($dt_onizleme);

      $dosya='editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
      $dosya_onizleme='kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
      $dt2 = fopen($dosya, "r"); // sayfayı tekrar açıyorum! ayar sayfasından gelecekleri eklemek için!
      $dt2_onizleme = fopen($dosya_onizleme, "r");

      if(filesize($dosya)>0) //okumak için açtığım dosyanın içeriğini okuyorum!
      {
        $eski = fread($dt2, filesize($dosya)); //dosya içeriği 'eski' değerinin içerisinde!
        $eski_onizleme = fread($dt2_onizleme, filesize($dosya_onizleme));
      }
      fclose($dt2);
      fclose($dt2_onizleme);
      
  
      $veri="<?php "; //ayar sayfasından gelen verileri tek tek okuyup dökümana php değişkenlerini yazdırmaya başladığım yer!
      if (isset($_COOKIE['sayfaEkle'])) {

      $islemim=$_SESSION["yapilan_islemler"]; //Her yapılan işlemi karışmaması için kullandığım session!
      $_SESSION["yapilan_islemler"]=$islemim+1; //işlemi arttırıyorum!
        
        foreach ($_COOKIE['sayfaEkle'] as $name => $value) {
          $name = htmlspecialchars($name);
          $value = htmlspecialchars($value);
          $yazilacakicerik='$'.$name.$_SESSION["yapilan_islemler"].'="'.$value.'";'; // dosyaya yazdırmak için açtığım değişken,
                                                                                     // içeriği örnek olarak '  $content2_arkaplan3="blue" ' gibi..

          $degisecekicerik=$name." &nbsp;";
          $yenigelecek=$name.$_SESSION["yapilan_islemler"];
          $eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski); //Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                    //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                    //dosyanın içini açıp bul ve değiştir yapıyorum!

          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n";//döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }
      $editor_degisken="editorsayfalari_".$gelenkullaniciemail."/editor_degisken_tut.php";
      $editor_kod="editorsayfalari_".$gelenkullaniciemail."/editor_kod_tut.php";

      $editor_degisken_file=fopen($editor_degisken,"w");
      fwrite($editor_degisken_file,$veri);
      
      $editor_kod_file=fopen($editor_kod,"w");
      fwrite($editor_kod_file,$eski);

      include $editor_degisken;
      include $editor_kod;

      $resimlerkalsoru='src="resimler/';
      $yeniresimlerklasoru='src="editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
      $yazilacak_kod_editor=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$yazilacak_kod); 

      $yeni=$veri.$eski; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
      $yeni_onizleme=$veri.$eski_onizleme;
      
      $logVeri=$yeni;
      $logKayit = fopen('editorsayfalari_'.$gelenkullaniciemail.'/log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,"header|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);

      $dt3=fopen($dosya,"w");
      $yaz=fwrite($dt3, $tiklaveduzenlekodu.$yazilacak_kod_editor); //dosyayı yazdırıyorum!
      fclose($dt3);
      $dt3_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt3_onizleme, $yazilacak_kod); 
      fclose($dt3_onizleme);

      $sayfa=$secilenBolum;

     /* $kodlar = '<script type="text/javascript"> 
                  $(document).ready(function() {
                  $("#'.$secilenBolum.'").load("'.$sayfa.'.php");
                  });
                </script>'; //Anasayfadaki uygun div in içine çağıralacak dosyanın javascript ile çağıralacak kod!
                
      $oku=file_get_contents("indexEditor.php"); //anasayfam!
      $oku_onizleme=file_get_contents("kullanicisayfalari/index.php");

      if(!strstr($oku,$kodlar)){ //eklenecek kodun anasayfada olup olmadığını kontrol ediyorum, yoksa dosyayı açıp anasayfayanın sonuna ekliyorum!
        $dt3 = fopen('indexEditor.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }
      if(!strstr($oku_onizleme,$kodlar)){
        $dt3 = fopen('kullanicisayfalari/index.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }*/
    
      header('Location:'.$_SERVER['HTTP_REFERER']);

    }else if($secilenBolum == "littleheader" || $secilenBolum == "bar1" || $secilenBolum == "littleheader1" || $secilenBolum == "bar2" || $secilenBolum == "bar3"  || $secilenBolum == "bar4" || $secilenBolum == "bar5"  ){
      $dt = fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'w+'); //sayfayı w+ ile açıyorum, içeriği silip yeniden yazmak için. Tek sayfa olduğu için!
      $dt_onizleme = fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'w+');
      $sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim=$sonuc["komp_kod"]; //veritabanından gelen kompanent tasarim kodu!
        }
            $tiklaveduzenlekodu='<div style="position:relative; width:100%; cursor:point;">
            <div style="width:40%;
            padding:10 0 10 0;
            border-radius:20px;
            background-color:#5C5C5C; 
            opacity:0.8;
            font-size:24px;
            position:absolute;
            margin-top:1.5%;
            margin-left: calc( 100% - 70% );
            word-wrap:break-word;
            text-align:center;
            font-size:35px;
            font-weight:bold;
            font-family:calibri;
            color:white;cursor:pointer;
            ">Tıkla ve Düzenle</div></div>';

      $gelentasarim2=$tiklaveduzenlekodu.$gelentasarim; //php dosyaları hariç sayfaya yazacağım içerik!
      $resimlerkalsoru='src="resimler/';
      $yeniresimlerklasoru='src="editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
      $gelentasarim2=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$gelentasarim2); 
      fwrite($dt, $gelentasarim2); // php dosyaları hariç olan veriyi ilk yazdırdım!
      fclose($dt);
      fwrite($dt_onizleme, $gelentasarim); 
      fclose($dt_onizleme);

      $dosya='editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
      $dosya_onizleme='kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
      $dt2 = fopen($dosya, "r"); // sayfayı tekrar açıyorum! ayar sayfasından gelecekleri eklemek için!
      $dt2_onizleme = fopen($dosya_onizleme, "r");

      if(filesize($dosya)>0) //okumak için açtığım dosyanın içeriğini okuyorum!
      {
        $eski = fread($dt2, filesize($dosya)); //dosya içeriği 'eski' değerinin içerisinde!
        $eski_onizleme = fread($dt2_onizleme, filesize($dosya_onizleme));
      }
      fclose($dt2);
      fclose($dt2_onizleme);
      
  
      $veri="<?php "; //ayar sayfasından gelen verileri tek tek okuyup dökümana php değişkenlerini yazdırmaya başladığım yer!
      if (isset($_COOKIE['sayfaEkle'])) {

      $islemim=$_SESSION["yapilan_islemler"]; //Her yapılan işlemi karışmaması için kullandığım session!
      $_SESSION["yapilan_islemler"]=$islemim+1; //işlemi arttırıyorum!
        
        foreach ($_COOKIE['sayfaEkle'] as $name => $value) {
          $name = htmlspecialchars($name);
          $value = htmlspecialchars($value);
          $yazilacakicerik='$'.$name.$_SESSION["yapilan_islemler"].'="'.$value.'";'; // dosyaya yazdırmak için açtığım değişken,
                                                                                     // içeriği örnek olarak '  $content2_arkaplan3="blue" ' gibi..

          $degisecekicerik=$name." &nbsp;";
          $yenigelecek=$name.$_SESSION["yapilan_islemler"];
          $eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski); //Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                    //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                    //dosyanın içini açıp bul ve değiştir yapıyorum!

          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n";//döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }

      $editor_degisken="editorsayfalari_".$gelenkullaniciemail."/editor_degisken_tut.php";
      $editor_kod="editorsayfalari_".$gelenkullaniciemail."/editor_kod_tut.php";

      $editor_degisken_file=fopen($editor_degisken,"w");
      fwrite($editor_degisken_file,$veri);
      
      $editor_kod_file=fopen($editor_kod,"w");
      fwrite($editor_kod_file,$eski);

      include $editor_degisken;
      include $editor_kod;

      $resimlerkalsoru='src="resimler/';
      $yeniresimlerklasoru='src="editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
      $yazilacak_kod_editor=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$yazilacak_kod); 

      $yeni=$veri.$eski; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
      $yeni_onizleme=$veri.$eski_onizleme;
      
      $logVeri=$yeni;
      $logKayit = fopen('editorsayfalari_'.$gelenkullaniciemail.'/log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,"$secilenBolum|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);

      $dt3=fopen($dosya,"w");
      $yaz=fwrite($dt3, $tiklaveduzenlekodu.$yazilacak_kod_editor); //dosyayı yazdırıyorum!
      fclose($dt3);
      $dt3_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt3_onizleme, $yazilacak_kod); 
      fclose($dt3_onizleme);

      $sayfa=$secilenBolum;

     /* $kodlar = '<script type="text/javascript"> 
                  $(document).ready(function() {
                  $("#'.$secilenBolum.'").load("'.$sayfa.'.php");
                  });
                </script>'; //Anasayfadaki uygun div in içine çağıralacak dosyanın javascript ile çağıralacak kod!
                
      $oku=file_get_contents("indexEditor.php"); //anasayfam!
      $oku_onizleme=file_get_contents("kullanicisayfalari/index.php");

      if(!strstr($oku,$kodlar)){ //eklenecek kodun anasayfada olup olmadığını kontrol ediyorum, yoksa dosyayı açıp anasayfayanın sonuna ekliyorum!
        $dt3 = fopen('indexEditor.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }
      if(!strstr($oku_onizleme,$kodlar)){
        $dt3 = fopen('kullanicisayfalari/index.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }*/
    
      header('Location:'.$_SERVER['HTTP_REFERER']);
    }else if($secilenBolum == "content_"){
      $komp=$_COOKIE["secilenkompanentTAM"];
    
      $dosya='editorsayfalari_'.$gelenkullaniciemail.'/'.$komp.'.php';
      $dosya_onizleme='kullanicisayfalari_'.$gelenkullaniciemail.'/'.$komp.'.php';

      $dt5 = fopen($dosya, "r");
      if(filesize($dosya)>0)
      {
        $eski = fread($dt5, filesize($dosya)); //dosyayı tekrar açıp okudum!
      }
      fclose($dt5);
      $dt5_onizleme = fopen($dosya_onizleme, "r");
      if(filesize($dosya_onizleme)>0)
      {
        $eski_onizleme = fread($dt5_onizleme, filesize($dosya_onizleme));
      }
      fclose($dt5_onizleme);
      $sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim2=$sonuc["komp_kod"];   
        }
      
      
      $veri="<?php "; //dosyanın içerisine ekleyeceğim php satırını hazırlamaya başlıyorum.
      if (isset($_COOKIE['sayfaEkle'])) {

        $islemim=$_SESSION["yapilan_islemler"]; //yapılan son işlem numarasını alıyorum.
        $_SESSION["yapilan_islemler"]=$islemim+1;

        foreach ($_COOKIE['sayfaEkle'] as $name => $value) {
          $name = htmlspecialchars($name);
          $value = htmlspecialchars($value);
          $yazilacakicerik='$'.$name.$_SESSION["yapilan_islemler"].'="'.$value.'";'; //ayar sayfasından gelen cookieleri sayfaya ekle

          $degisecekicerik=$name." &nbsp;";
          $yenigelecek=$name.$_SESSION["yapilan_islemler"];
          /*$eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski);//Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                   //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                   //dosyanın içini açıp bul ve değiştir yapıyorum!*/
          $gelentasarim2=str_replace($degisecekicerik,$yenigelecek, $gelentasarim2);
          $resimlerkalsoru='src=\"resimler/';
          $yeniresimlerklasoru='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
          $gelentasarimedit=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$gelentasarim2); 
 
          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n"; //döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }
      if(isset($_COOKIE['galeriEkleme'])){
        $gelenOturum=$_COOKIE['galeriEkleme'];

        $degisbir='src=\"resimler/';
        $degisiki='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
        $gelenbir='src=\"resimler/galeri_'.$gelenOturum.'/';
        $geleniki='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/galeri_'.$gelenOturum.'/';

        $gelentasarim2=str_replace($degisbir,$gelenbir, $gelentasarim2);
        $gelentasarimedit=str_replace($degisiki,$geleniki,$gelentasarimedit); 

        $degisuc='aReflesh';
        $gelenuc='aReflesh'.$gelenOturum;

        $gelentasarim2=str_replace($degisuc,$gelenuc, $gelentasarim2);
        $gelentasarimedit=str_replace($degisuc,$gelenuc,$gelentasarimedit); 

        setcookie("galeriEkleme","asd",time()-3600);
      }
      
      $editor_degisken="editorsayfalari_".$gelenkullaniciemail."/editor_degisken_tut.php";
      $editor_kod="editorsayfalari_".$gelenkullaniciemail."/editor_kod_tut.php";
      $editor_kod_onizleme="editorsayfalari_".$gelenkullaniciemail."/editor_kod_onizleme_tut.php";

      $editor_degisken_file=fopen($editor_degisken,"w");
      fwrite($editor_degisken_file,$veri);
      
      $editor_kod_file=fopen($editor_kod,"w");
      fwrite($editor_kod_file,$gelentasarimedit);

      $editor_kod_onizleme_file=fopen($editor_kod_onizleme,"w");
      fwrite($editor_kod_onizleme_file,$gelentasarim2);

      include $editor_degisken;
      include $editor_kod;
    
      $yeni=$eski.$yazilacak_kod; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
 

      $dt5=fopen($dosya,"w");
      $yaz=fwrite($dt5, $yeni);
      fclose($dt5);
     

      $logVeri=$yazilacak_kod;
      $logKayit = fopen('editorsayfalari_'.$gelenkullaniciemail.'/log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,$komp."|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);
      header('Location:'.$_SERVER['HTTP_REFERER']);

      include $editor_kod_onizleme;
      $yeni_onizleme=$eski_onizleme.$yazilacak_kod;

      $dt5_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt5_onizleme, $yeni_onizleme);
      fclose($dt5_onizleme);


    }else{ //sayfa tek bölümlü değile bu aşağıdaki işlemleri yapıyorum!

      $dt4 = fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'a'); //çok bölümlü sayfalar için gelen sayfayı açıp sonuna ekleme yapmak için 'a' ile dosyayı açıyorum.
      $dt4_onizleme = fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php', 'a');

      /*$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim2=$sonuc["komp_kod"];   
        }
      fwrite($dt4, $gelentasarim2); //okduduğum içeriği dosyanın sonuna ekledim.
      fclose($dt4);
      fwrite($dt4_onizleme, $gelentasarim2);
      fclose($dt4_onizleme);*/

      $dosya='editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
      $dosya_onizleme='kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';

      $dt5 = fopen($dosya, "r");
      if(filesize($dosya)>0)
      {
        $eski = fread($dt5, filesize($dosya)); //dosyayı tekrar açıp okudum!
      }
      fclose($dt5);
      $dt5_onizleme = fopen($dosya_onizleme, "r");
      if(filesize($dosya_onizleme)>0)
      {
        $eski_onizleme = fread($dt5_onizleme, filesize($dosya_onizleme));
      }
      fclose($dt5_onizleme);
      
      $sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim2=$sonuc["komp_kod"];   
        }
      
      
      $veri="<?php "; //dosyanın içerisine ekleyeceğim php satırını hazırlamaya başlıyorum.
      if (isset($_COOKIE['sayfaEkle'])) {

        $islemim=$_SESSION["yapilan_islemler"]; //yapılan son işlem numarasını alıyorum.
        $_SESSION["yapilan_islemler"]=$islemim+1;

        foreach ($_COOKIE['sayfaEkle'] as $name => $value) {
          $name = htmlspecialchars($name);
          $value = htmlspecialchars($value);
       
          $yazilacakicerik='$'.$name.$_SESSION["yapilan_islemler"].'="'.$value.'";'; //ayar sayfasından gelen cookieleri sayfaya ekle

          $degisecekicerik=$name." &nbsp;";
          $yenigelecek=$name.$_SESSION["yapilan_islemler"];
          /*$eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski);//Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                   //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                   //dosyanın içini açıp bul ve değiştir yapıyorum!*/
          $gelentasarim2=str_replace($degisecekicerik,$yenigelecek, $gelentasarim2);
          $resimlerkalsoru='src=\"resimler/';
          $yeniresimlerklasoru='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
          $gelentasarimedit=str_replace($resimlerkalsoru,$yeniresimlerklasoru,$gelentasarim2); 
          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n"; //döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }
      if(isset($_COOKIE['galeriEkleme'])){
        $gelenOturum=$_COOKIE['galeriEkleme'];

        $degisbir='src=\"resimler/';
        $degisiki='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
        $gelenbir='src=\"resimler/galeri_'.$gelenOturum.'/';
        $geleniki='src=\"editorsayfalari_'.$gelenkullaniciemail.'/resimler/galeri_'.$gelenOturum.'/';

        $gelentasarim2=str_replace($degisbir,$gelenbir, $gelentasarim2);
        $gelentasarimedit=str_replace($degisiki,$geleniki,$gelentasarimedit); 

        $degisuc='aReflesh';
        $gelenuc='aReflesh'.$gelenOturum;

        $gelentasarim2=str_replace($degisuc,$gelenuc, $gelentasarim2);
        $gelentasarimedit=str_replace($degisuc,$gelenuc,$gelentasarimedit); 

        setcookie("galeriEkleme","asd",time()-3600);
      }

      $editor_degisken="editorsayfalari_".$gelenkullaniciemail."/editor_degisken_tut.php";
      $editor_kod="editorsayfalari_".$gelenkullaniciemail."/editor_kod_tut.php";
      $editor_kod_onizleme="editorsayfalari_".$gelenkullaniciemail."/editor_kod_onizleme_tut.php";

      $editor_degisken_file=fopen($editor_degisken,"w");
      fwrite($editor_degisken_file,$veri);
      
      $editor_kod_file=fopen($editor_kod,"w");
      fwrite($editor_kod_file,$gelentasarimedit);

      $editor_kod_onizleme_file=fopen($editor_kod_onizleme,"w");
      fwrite($editor_kod_onizleme_file,$gelentasarim2);

      include $editor_degisken;
      include $editor_kod;
    
      $yeni=$eski.$yazilacak_kod; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
      

      $dt5=fopen($dosya,"w");
      $yaz=fwrite($dt5, $yeni);
      fclose($dt5);
    

      $logVeri=$yazilacak_kod;
      $logKayit = fopen('editorsayfalari_'.$gelenkullaniciemail.'/log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,$secilenBolum."|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);

      include $editor_kod_onizleme;
      $yeni_onizleme=$eski_onizleme.$yazilacak_kod;

      $dt5_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt5_onizleme, $yeni_onizleme);
      fclose($dt5_onizleme);
      /*$kodlar = '<script type="text/javascript">
          $(document).ready(function() {
              $("#'.$secilenBolum.'").load("'.$secilenBolum.'.php");
      });
          </script>'; //Anasayfadaki uygun div in içine çağıralacak dosyanın javascript ile çağıralacak kod!
    
      $oku=file_get_contents("indexEditor.php");
      $oku_onizleme=file_get_contents("kullanicisayfalari/index.php");

      
      if(!strstr($oku,$kodlar)){  //eklenecek kodun anasayfada olup olmadığını kontrol ediyorum, yoksa dosyayı açıp anasayfayanın sonuna ekliyorum!
        $dt = fopen('indexEditor.php', 'a');
        fwrite($dt, $kodlar);
        $sayfa=$secilenBolum;
        fclose($dt);
      }
      if(!strstr($oku_onizleme,$kodlar)){ 
        $dt = fopen('kullanicisayfalari/index.php', 'a');
        fwrite($dt, $kodlar);
        $sayfa=$secilenBolum;
        fclose($dt);
      }*/

      header('Location:'.$_SERVER['HTTP_REFERER']);

    }
  }

  if(isset($_POST['gerial'])){ //geri al butonuna basıldığında yapılacaklar
    
    $logOku=file_get_contents("editorsayfalari_".$gelenkullaniciemail."/log.txt");
    $logFile=fopen('editorsayfalari_'.$gelenkullaniciemail.'/log.txt','w');
    $logLine=explode("|--|",$logOku);

    $i=count($logLine);

    $secilenBolum=$_COOKIE["secilenkompanent"];

    for($j=$i-1;$j>=0;$j--){
      $alinanBolum=explode("|**|",$logLine[$j]);

      if("$alinanBolum[0]"=="$secilenBolum"){

        $logOku=str_replace("|--|".$logLine[$j],"",$logOku);

        $silinecekSayfaAdi='editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
        $silenecekSayfaIcerik=file_get_contents($silinecekSayfaAdi);
        $silinecekSayfa=fopen($silinecekSayfaAdi,'w');
        $silenecekSayfaIcerik=str_replace("$alinanBolum[1]","",$silenecekSayfaIcerik);
        fwrite($silinecekSayfa,$silenecekSayfaIcerik);

        $resimlerkalsoru='src="resimler/';
        $yeniresimlerklasoru='src="editorsayfalari_'.$gelenkullaniciemail.'/resimler/';
        $alinanBolum[1]=str_replace($yeniresimlerklasoru,$resimlerkalsoru,$alinanBolum[1]); 

        $onizlemesilinecekSayfaAdi='kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php';
        $onizlemesilenecekSayfaIcerik=file_get_contents($onizlemesilinecekSayfaAdi);
        $onizlemesilinecekSayfa=fopen($onizlemesilinecekSayfaAdi,'w');
        $onizlemesilenecekSayfaIcerik=str_replace("$alinanBolum[1]","",$onizlemesilenecekSayfaIcerik);
        fwrite($onizlemesilinecekSayfa,$onizlemesilenecekSayfaIcerik);

        break;
      }
    }
   setcookie("secilmissunakikomp",$secilenBolum,time()+12154);
    if($secilenBolum=="header" || $secilenBolum=="footer" || $secilenBolum=="header1"){
      $kodlar=' <div style="position:relative; width:100%; cursor:point;">
      <div style="width:40%;
      padding:10 0 10 0;
      border-radius:20px;
      background-color:#5C5C5C; 
      opacity:0.8;
      font-size:24px;
      position:absolute;
      margin-top:1.5%;
      margin-left: calc( 100% - 70% );
      text-align:center;
      font-size:35px;
      font-weight:bold;
      font-family:calibri;
      color:white;cursor:pointer;
      ">Tıkla ve Düzenle</div>';
         
      $okuAnasayfa=file_get_contents("editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php"); //anasayfam!
      $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');
     // $okuAnasayfa=str_replace("$kodlar","",$okuAnasayfa);
      fwrite($anasayfa,$kodlar);
      
      //$onizlemeokuAnasayfa=file_get_contents("kullanicisayfalari/header.php"); //onizleme anasayfam!
      $onizlemeanasayfa=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');

      /*$onizlemeokuAnasayfa=str_replace("$kodlar","",$onizlemeokuAnasayfa);
      fwrite($onizlemeanasayfa,$onizlemeokuAnasayfa);*/
    }else if( $secilenBolum=="bar1" || $secilenBolum=="bar2" || $secilenBolum=="bar3" || $secilenBolum=="bar4" || $secilenBolum=="bar5" ){
      $kodlar='<div style="position:relative; width:100%;">
      <div style="width:60%;
      
      padding:10 0 10 0;
      border-radius:20px;
      background-color:#5C5C5C; 
      opacity:0.8;
      font-size:24px;
      position:absolute;
      
      margin-top:20%;
      margin-left: calc( 100% - 80% );
      
      text-align:center;
      font-size:30px;
      font-weight:bold;
      font-family:calibri;
      color:white;
      cursor:pointer;
      ">Tıkla ve Düzenle</div></div>';

              $okuAnasayfa=file_get_contents("editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php"); //anasayfam!
      $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');
     // $okuAnasayfa=str_replace("$kodlar","",$okuAnasayfa);
      fwrite($anasayfa,$kodlar);
      
      //$onizlemeokuAnasayfa=file_get_contents("kullanicisayfalari/header.php"); //onizleme anasayfam!
      $onizlemeanasayfa=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');

      /*$onizlemeokuAnasayfa=str_replace("$kodlar","",$onizlemeokuAnasayfa);
      fwrite($onizlemeanasayfa,$onizlemeokuAnasayfa);*/

    }else if($secilenBolum=="littleheader" || $secilenBolum=="littleheader1"){
      $kodlar='<div style="position:relative; width:100%; cursor:point;">
      <div style="width:40%;
      padding:10 0 10 0;
      border-radius:20px;
      background-color:#5C5C5C; 
      opacity:0.8;
      font-size:24px;
      position:absolute;
      margin-top:1.5%;
      margin-left: calc( 100% - 70% );
      text-align:center;
      font-size:30px;
      font-weight:bold;
      font-family:calibri;
      color:white;cursor:pointer;
      word-wrap: break-word;
      ">Tıkla ve Düzenle</div></div>';

      $okuAnasayfa=file_get_contents("editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php"); //anasayfam!
      $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');
     // $okuAnasayfa=str_replace("$kodlar","",$okuAnasayfa);
      fwrite($anasayfa,$kodlar);
      
      //$onizlemeokuAnasayfa=file_get_contents("kullanicisayfalari/header.php"); //onizleme anasayfam!
      $onizlemeanasayfa=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$secilenBolum.'.php','w');

      /*$onizlemeokuAnasayfa=str_replace("$kodlar","",$onizlemeokuAnasayfa);
      fwrite($onizlemeanasayfa,$onizlemeokuAnasayfa);*/
    }

    fwrite($logFile,$logOku);

    header('Location:'.$_SERVER['HTTP_REFERER']);

  }

  if(isset($_POST['kilavuz_cizgisi'])){

    if($_COOKIE["kilavuz_cizgisi"] == ""){
      $anasayfaIcerik=file_get_contents('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php');
      $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php','w');
      $anasayfaIcerik=str_replace('<table class="data" border="1px"','<table class="data" border="0px"',$anasayfaIcerik);
      fwrite($anasayfa,$anasayfaIcerik);
     
      setcookie("kilavuz_cizgisi","Kılavuz Çizgisi Ekle",time()+30*30*60);
      
      header('Location:'.$_SERVER['HTTP_REFERER']);
    }else{
      $deger=$_COOKIE["kilavuz_cizgisi"];
      if($deger=="Kılavuz Çizgisi Ekle"){
        $anasayfaIcerik=file_get_contents('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php');
        $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php','w');
        $anasayfaIcerik=str_replace('<table class="data" border="0px"','<table class="data" border="1px"',$anasayfaIcerik);
        fwrite($anasayfa,$anasayfaIcerik);
       
        setcookie("kilavuz_cizgisi","Kılavuz Çizgisi Kaldır",time()+30*30*60);
        
        header('Location:'.$_SERVER['HTTP_REFERER']);
      }else{
        $anasayfaIcerik=file_get_contents('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php');
        $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php','w');
        $anasayfaIcerik=str_replace('<table class="data" border="1px"','<table class="data" border="0px"',$anasayfaIcerik);
        fwrite($anasayfa,$anasayfaIcerik);
       
        setcookie("kilavuz_cizgisi","Kılavuz Çizgisi Ekle",time()+30*30*60);
        
        header('Location:'.$_SERVER['HTTP_REFERER']);
      }

    }


  }

  if(isset($_POST['kilavuz_ekle'])){

    $anasayfaIcerik=file_get_contents('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php');
    $anasayfa=fopen('editorsayfalari_'.$gelenkullaniciemail.'/indexEditor.php','w');
    $anasayfaIcerik=str_replace('class="data" border="0px"','class="data" border="1px"',$anasayfaIcerik);
    fwrite($anasayfa,$anasayfaIcerik);
    
    header('Location:'.$_SERVER['HTTP_REFERER']);

  }

  if(isset($_GET['sonraki_sayfa'])){
    if(empty($_COOKIE['iceriksayfasi'])){
      header("Resfresh:0; url=onizleme.php");
    }
    foreach ($_COOKIE['iceriksayfasi'] as $name => $value) {
      $name = htmlspecialchars($name);
      $value = htmlspecialchars($value);
      /*setcookie("suankisayfam",$value,time()+1564);
	  	setcookie("suankisayfamANA","Anasayfa",time()-1564);*/


      $sayfam=fopen('editorsayfalari_'.$gelenkullaniciemail.'/'.$value.'.php','w');
      $sayfam_onizleme=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$value.'.php','w');
      $sayfam2=fopen('editorsayfalari_'.$gelenkullaniciemail.'/content_'.$value.'.php','w');
      $sayfam_onizleme2=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/content_'.$value.'.php','w');

      $path="<?php include 'content_".$value.".php'; ?>";

      $secilenSablon_ID=$_SESSION["secilenSablonID"];

      if($secilenSablon_ID == 2){
      $code_onizleme='<td id="content_'.$value.'" colspan="5" valign="top" style="word-wrap:break-word; width:100%;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else if($secilenSablon_ID == 3 || $secilenSablon_ID == 6 || $secilenSablon_ID == 11){
        $code_onizleme='<td id="content_'.$value.'" colspan="4" rowspan="4" valign="top" style="word-wrap:break-word; width:100%;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else if($secilenSablon_ID == 4 || $secilenSablon_ID == 5 || $secilenSablon_ID == 8 ){
        $code_onizleme='<td id="content_'.$value.'" colspan="6" valign="top" style="word-wrap:break-word; width:100%;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else if($secilenSablon_ID == 9){
        $code_onizleme='<td id="content_'.$value.'" colspan="3" rowspan="4" valign="top" style="word-wrap:break-word; width:100%;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else if($secilenSablon_ID == 10 || $secilenSablon_ID == 12 || $secilenSablon_ID == 13){
        $code_onizleme='<td id="content_'.$value.'" colspan="2" rowspan="4" valign="top" style="word-wrap:break-word; width:100%;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else if($secilenSablon_ID == 14 || $secilenSablon_ID == 15){
        $code_onizleme='<td id="content_'.$value.'" rowspan="4" valign="top" style="word-wrap:break-word;">  
              <div id="content_'.$value.'">          
              '.$path.'
              </div>         
            </td>';
      }else{
        $code_onizleme='<td id="content_'.$value.'"  valign="top" style="word-wrap:break-word; width:100%;">  
        <div id="content_'.$value.'">          
        '.$path.'
        </div>         
      </td>';
      }
      $code='<html>
      <head>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      </head> 
      <body> 
      <table class="data" border="1px" id="data" cellspacing="0" height="100%" width="100%">         
      <td id="content_'.$value.'" colspan="4" rowspan="4" valign="top" style="word-wrap:break-word; width:100%;">  
                    <div id="content_'.$value.'">          
                    '.$path.'
                    </div>         
                  </td>
      </table> 	  	 
      </body> 	 
      </html>
      ';
      fwrite($sayfam,$code);
      fwrite($sayfam_onizleme,$code_onizleme);

      $ekstra='<div style="position:relative; width:100%;">
      <div style="width:60%;
      
      padding:10 0 10 0;
      border-radius:20px;
      background-color:#5C5C5C; 
      opacity:0.8;
      font-size:24px;
      position:absolute;
      word-wrap:break-word;
      margin-top:30%;
      margin-left: calc( 100% - 80% );
      
      text-align:center;
      font-size:30px;
      font-weight:bold;
      font-family:calibri;
      color:white;
      cursor:pointer;
      ">Tıkla ve Düzenle ('.$value.')</div></div>';

      fwrite($sayfam2,$ekstra);

     
      setcookie("iceriksayfasi[".$name."]",$value,time()-3600*60);
   
      $onizlemeSayfasi=fopen('editorsayfalari_'.$gelenkullaniciemail.'/wos_onizleme.php','w+');
      $code="<?php include 'mysql_connect.php';
      include '".$value.".php'; ?>";
      fwrite($onizlemeSayfasi,$code);
      fclose($onizlemeSayfasi);
      fclose($sayfam);
      fclose($sayfam_onizleme);
      header('Location:'.$_SERVER['HTTP_REFERER']);

    break;
    return;
      //setcookie('iceriksayfasi['.$name.']',$value,time()-3600*60);

    }
  
    echo "<script>window.location='../index.php?sayfa=dosyateslimi'</script>";
    
  }

?>

<?php
  function ayarSayfasi_yonlendirme(){
    echo '<script type="text/javascript">', //ayar sayfasının açılması için javascript fonksiyonunu çağırıyorum
    'openPage(event, "Ayar", "tablink_ayar");',
    '</script>';
    $id2=$_GET['AyarGecis'];
    $_SESSION["KompnanentID"]=$id2; //ayar.php de kullanıyoruz!	 
  }

  function kullaniciTeslim_sayfalari($dosyaadi){
    include 'mysql_connect.php';
    $gelenkullaniciemail=$_SESSION["Kullaniciadi"];
    $dosyaADI='kullanicisayfalari_'.$gelenkullaniciemail;
    if (!file_exists($dosyaADI)) {  //klasör kontrol, yoksa oluşturulur!
      mkdir($dosyaADI, 0777, true);
    }

    $file = "kullanicisayfalari_".$gelenkullaniciemail."/".$dosyaadi.".php";  //dosya kontrol, yoksa oluşturulur!
    if(!is_file($file)){
      $filecreate = fopen("kullanicisayfalari_".$gelenkullaniciemail."/".$dosyaadi.".php", 'w+') or die("Can't create file");
    } //Bu yukarıdaki bölüm konuştuğumuz harici bir önizleme sayfası için gerekli dosyaların oluşturulmasını sağlıyor, şuan birşey eklemiyoruz!

    include 'mysql_connect.php';

    $sorgu = $baglanti->query('select * from sablonlar where sablon_id='.$_SESSION["secilenSablonID"].'');
    $fileindexdosyasi = "kullanicisayfalari_".$gelenkullaniciemail."/index.php";
	  while($sonuc=mysqli_fetch_assoc($sorgu) )
	  {
      if(!is_file($fileindexdosyasi)){
        $filecreate2 = fopen("kullanicisayfalari_".$gelenkullaniciemail."/index.php", 'w') or die("Can't create file");
        $fileindexyaz=fwrite($filecreate2, $sonuc["sablon_tasarimkodu"]);
        fclose($filecreate2);
      }
    }

    $sorgu2=$baglanti->query('select * from sablon_sayfalari where sablon_id='.$_SESSION["secilenSablonID"].'');
		while($sonuc2=mysqli_fetch_assoc($sorgu2) )
		{
      $sayfa=$sonuc2["sayfa_adi"];
      if(!is_file('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$sayfa.'.php')){
			
      $dosya=fopen('kullanicisayfalari_'.$gelenkullaniciemail.'/'.$sayfa.'.php','w');
      if($sonuc2["kod_kullanici"]!=null){
				$yaz=fwrite($dosya,$sonuc2["kod_kullanici"]);
			}
      fclose($dosya);
    }
		}
  }
  
?>

<script> //Burada kullanıcının seçtiği tasarımdaki ekleme yapacağı bölüme(header,content,..) tıkladığı anda tıkladığı bölümün adını cookie atan
         //javascript kodu var! Bu kod handi bölüme tıklandıysa onun adını 'table' ın hangi 'td' sine tıklanmışsa onun id sini alıp yeni bir cookie
         //oluşturup içerisine yazıyor! Bu sayede sol tarafta bulunan kompanent bölümü anlık güncellenebiliyor!
$("#data td").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#data td").removeClass("highlight");
	if(!selected)
		$(this).addClass("highlight");
	var status = $(this).attr("id")
  var res = status.substring(0,8);  

  $(document).ready(function () {
    if(res=="content_"){
      createCookie("secilenkompanentTAM", status, "1");
      status = status.substring(0,8);
    }
    createCookie("secilenkompanent", status, "1");

  });	
});

function createCookie(name, value, days) { //javascripte browsera cookie ekleyen fonksiyon!
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
function createCookie2(name, value, days) { //javascripte browsera cookie ekleyen fonksiyon!
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() - (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
</script>
