<html>
<head>
<title>WoS | Web Site Oluşturma Sistemi</title>

<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

<link href="page3.css" rel="stylesheet" type="text/css"> <!-- Harici css dosyası bağlantısı! -->

<!-- Bu aşağıdaki css her saniye güncellenen kompanent bölümüne ait harici css dosyasında çalışmıyor! -->
<style type="text/css"> 
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
</script>                                                            

</head>
<body>
<div class="page3_tumsayfa">

    <div class="onizleme" id="onizleme" onclick="openPage(event, 'Kompanent', 'tablink_komp')"> 
    
      <div style="width:10%; float:left;">
        <form method="post"> <!-- Geri Alma işlemi FORM u! -->
          <input type="submit" name="gerial" value="Geri Al" style="width:80px; height:40px; background-color:gray; color:white; margin:10 0 0 10;"/>
        </form>
      </div> 
      <div style="width:80%; float:left; text-align:center;"><h2>Web Site Oluşturma Sistemi</h2></div>
      <div style="width:10%; float:left;">
        <form method="post" style="float:right;" action="verilecek/index.php" target="_blank"> <!-- Önizleme işlemi FORM u! -->
          <input type="submit" name="onizle" value="Önizleme" style="width:80px; height:40px; background-color:gray; color:white; margin:10 10 0 0;"/>
        </form>
      </div> 
        <?php include 'onizleme.php'; ?> <!-- kullanıcının sayfası, editör sayfası çağırıldı -->

    </div>

    <div class="editor_TapContent"> <!-- Tap content sayfası, sol geçişli bölüm! -->

      <div class="editor_tab">
        <button class="editor_tablinks" id="tablink_ayar" onclick="openPage(event, 'Ayar', 'tablink_ayar')">Ayarlar</button>
        <button class="editor_tablinks" id="tablink_komp" onclick="openPage(event, 'Kompanent', 'tablink_komp')">Kompanentler</button>
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
  if(isset($_GET['AyarGecis'])){ //kompanentlere tıklanmışsa o kompanentin ayar sayfasını açıyor!
    ayarSayfasi_yonlendirme();
  }


  if(isset($_GET["KompanentEkle"])){
    
    $secilenBolum=$_COOKIE["secilenkompanent"]; //seçilen sayfa bölümünün adı!
    $secilenKompanent_ID=$_GET["KompanentEkle"]; //seçilen bölüme uygun seçilen kompanentin veritabanındaki ID'si!
    
    kullaniciTeslim_sayfalari($secilenBolum); //kullanici sayfalari oluşturan fonksiyon.

    if( $secilenBolum == "header" ) { //Tek bölüm olan sayfaları bu if in altında ki işlemler uygulanacak!
    
      $dt = fopen($secilenBolum.'.php', 'w+'); //sayfayı w+ ile açıyorum, içeriği silip yeniden yazmak için. Tek sayfa olduğu için!
      $dt_onizleme = fopen('verilecek/'.$secilenBolum.'.php', 'w+');
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
            margin-top:10%;
            margin-left: calc( 100% - 70% );
            text-align:center;
            font-size:35px;
            font-weight:bold;
            font-family:calibri;
            color:white;
            ">Tıkla ve Düzenle</div></div>';

      $gelentasarim2=$tiklaveduzenlekodu.$gelentasarim; //php dosyaları hariç sayfaya yazacağım içerik!

      fwrite($dt, $gelentasarim2); // php dosyaları hariç olan veriyi ilk yazdırdım!
      fclose($dt);
      fwrite($dt_onizleme, $gelentasarim); 
      fclose($dt_onizleme);

      $dosya=$secilenBolum.'.php';
      $dosya_onizleme='verilecek/'.$secilenBolum.'.php';
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

          $degisecekicerik=$name.'.';
          $yenigelecek=$name.$_SESSION["yapilan_islemler"].'.';
          $eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski); //Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                    //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                    //dosyanın içini açıp bul ve değiştir yapıyorum!

          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n";//döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }


      $yeni=$veri.$eski; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
      $yeni_onizleme=$veri.$eski_onizleme;
      
      $logVeri=$yeni;
      $logKayit = fopen('log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,"header|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);

      $dt3=fopen($dosya,"w");
      $yaz=fwrite($dt3, $yeni); //dosyayı yazdırıyorum!
      fclose($dt3);
      $dt3_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt3_onizleme, $yeni_onizleme); 
      fclose($dt3_onizleme);

      $sayfa=$secilenBolum;

      $kodlar = '<script type="text/javascript"> 
                  $(document).ready(function() {
                  $("#'.$secilenBolum.'").load("'.$sayfa.'.php");
                  });
                </script>'; //Anasayfadaki uygun div in içine çağıralacak dosyanın javascript ile çağıralacak kod!
                
      $oku=file_get_contents("sablon3.php"); //anasayfam!
      $oku_onizleme=file_get_contents("verilecek/index.php");

      if(!strstr($oku,$kodlar)){ //eklenecek kodun anasayfada olup olmadığını kontrol ediyorum, yoksa dosyayı açıp anasayfayanın sonuna ekliyorum!
        $dt3 = fopen('sablon3.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }
      if(!strstr($oku_onizleme,$kodlar)){
        $dt3 = fopen('verilecek/index.php', 'a'); 
        fwrite($dt3, $kodlar);
        fclose($dt3);
      }
    
      header('Location:'.$_SERVER['HTTP_REFERER']);

    }
    else{ //sayfa tek bölümlü değile bu aşağıdaki işlemleri yapıyorum!

      $dt4 = fopen(''.$secilenBolum.'.php', 'a'); //çok bölümlü sayfalar için gelen sayfayı açıp sonuna ekleme yapmak için 'a' ile dosyayı açıyorum.
      $dt4_onizleme = fopen('verilecek/'.$secilenBolum.'.php', 'a');

      /*$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$secilenKompanent_ID.'');
        while($sonuc=mysqli_fetch_assoc($sorgu) )
        {
          $gelentasarim2=$sonuc["komp_kod"];   
        }
      fwrite($dt4, $gelentasarim2); //okduduğum içeriği dosyanın sonuna ekledim.
      fclose($dt4);
      fwrite($dt4_onizleme, $gelentasarim2);
      fclose($dt4_onizleme);*/

      $dosya=''.$secilenBolum.'.php';
      $dosya_onizleme='verilecek/'.$secilenBolum.'.php';

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

          $degisecekicerik=$name.'.';
          $yenigelecek=$name.$_SESSION["yapilan_islemler"].'.';
          /*$eski_onizleme= str_replace($degisecekicerik,$yenigelecek, $eski_onizleme);
          $eski= str_replace($degisecekicerik,$yenigelecek, $eski);//Bu 3 satırdada dosyanın içindeki veritabanından gelen örnek değişken adını
                                                                   //alıp yerine son işlem değeri ile birleştirdiğim değişken adını yazdırıyorum!
                                                                   //dosyanın içini açıp bul ve değiştir yapıyorum!*/
          $gelentasarim2=str_replace($degisecekicerik,$yenigelecek, $gelentasarim2);
          $veri.= $yazilacakicerik;
        }

      $veri.=" ?>\n"; //döngüden çıkıp bütün değişkenleri de içinde bulunduran php satırını tamamlıyorum! 
      }
      
      $yeni=$eski.$veri.$gelentasarim2; //yeni değişkeninin başına php değişken satırını ekleyip altınada veritabanından gelen değeri ekleyorum!
      $yeni_onizleme=$eski_onizleme.$veri.$gelentasarim2;

      $dt5=fopen($dosya,"w");
      $yaz=fwrite($dt5, $yeni);
      fclose($dt5);
      $dt5_onizleme=fopen($dosya_onizleme,"w");
      $yaz_onizleme=fwrite($dt5_onizleme, $yeni_onizleme);
      fclose($dt5_onizleme);

      $logVeri=$veri.$gelentasarim2;
      $logKayit = fopen('log.txt', 'a');
      fwrite($logKayit,"|--|");
      fwrite($logKayit,$secilenBolum."|**|");
      fwrite($logKayit,$logVeri);
    
      fclose($logKayit);

      $kodlar = '<script type="text/javascript">
          $(document).ready(function() {
              $("#'.$secilenBolum.'").load("'.$secilenBolum.'.php");
      });
          </script>'; //Anasayfadaki uygun div in içine çağıralacak dosyanın javascript ile çağıralacak kod!
    
      $oku=file_get_contents("sablon3.php");
      $oku_onizleme=file_get_contents("verilecek/index.php");

      
      if(!strstr($oku,$kodlar)){  //eklenecek kodun anasayfada olup olmadığını kontrol ediyorum, yoksa dosyayı açıp anasayfayanın sonuna ekliyorum!
        $dt = fopen('sablon3.php', 'a');
        fwrite($dt, $kodlar);
        $sayfa=$secilenBolum;
        fclose($dt);
      }
      if(!strstr($oku_onizleme,$kodlar)){ 
        $dt = fopen('verilecek/index.php', 'a');
        fwrite($dt, $kodlar);
        $sayfa=$secilenBolum;
        fclose($dt);
      }

      header('Location:'.$_SERVER['HTTP_REFERER']);

    }
  }

  if(isset($_POST['gerial'])){ //geri al butonuna basıldığında yapılacaklar
    
    $logOku=file_get_contents("log.txt");
    $logFile=fopen('log.txt','w');
    $logLine=explode("|--|",$logOku);

    $i=count($logLine);

    $secilenBolum=$_COOKIE["secilenkompanent"];

    for($j=$i-1;$j>=0;$j--){
      $alinanBolum=explode("|**|",$logLine[$j]);

      if("$alinanBolum[0]"=="$secilenBolum"){

        $logOku=str_replace("|--|".$logLine[$j],"",$logOku);

        $silinecekSayfaAdi=$secilenBolum.'.php';
        $silenecekSayfaIcerik=file_get_contents($silinecekSayfaAdi);
        $silinecekSayfa=fopen($silinecekSayfaAdi,'w');
        $silenecekSayfaIcerik=str_replace("$alinanBolum[1]","",$silenecekSayfaIcerik);
        fwrite($silinecekSayfa,$silenecekSayfaIcerik);

        $onizlemesilinecekSayfaAdi='verilecek/'.$secilenBolum.'.php';
        $onizlemesilenecekSayfaIcerik=file_get_contents($onizlemesilinecekSayfaAdi);
        $onizlemesilinecekSayfa=fopen($onizlemesilinecekSayfaAdi,'w');
        $onizlemesilenecekSayfaIcerik=str_replace("$alinanBolum[1]","",$onizlemesilenecekSayfaIcerik);
        fwrite($onizlemesilinecekSayfa,$onizlemesilenecekSayfaIcerik);

        break;
      }
    }
    if("$secilenBolum"=="header"){
      $kodlar = '<script type="text/javascript"> 
                  $(document).ready(function() {
                  $("#'.$secilenBolum.'").load("'.$secilenBolum.'.php");
                  });
                </script>';
                
      $okuAnasayfa=file_get_contents("sablon3.php"); //anasayfam!
      $anasayfa=fopen('sablon3.php','w');
      $okuAnasayfa=str_replace("$kodlar","",$okuAnasayfa);
      fwrite($anasayfa,$okuAnasayfa);

      $onizlemeokuAnasayfa=file_get_contents("verilecek/index.php"); //onizleme anasayfam!
      $onizlemeanasayfa=fopen('verilecek/index.php','w');
      $onizlemeokuAnasayfa=str_replace("$kodlar","",$onizlemeokuAnasayfa);
      fwrite($onizlemeanasayfa,$onizlemeokuAnasayfa);
    }

    fwrite($logFile,$logOku);

    header('Location:'.$_SERVER['HTTP_REFERER']);

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

    if (!file_exists('verilecek')) {  //klasör kontrol, yoksa oluşturulur!
      mkdir('verilecek', 0777, true);
    }

    $file = "verilecek/".$dosyaadi.".php";  //dosya kontrol, yoksa oluşturulur!
    if(!is_file($file)){
      $filecreate = fopen("verilecek/".$dosyaadi.".php", 'w+') or die("Can't create file");
    } //Bu yukarıdaki bölüm konuştuğumuz harici bir önizleme sayfası için gerekli dosyaların oluşturulmasını sağlıyor, şuan birşey eklemiyoruz!

    include 'mysql_connect.php';
    $sorgu = $baglanti->query('select sablon_id,sablon_tasarimkodu from sablonlar where sablon_id=3');
    $fileindexdosyasi = "verilecek/index.php";
	  while($sonuc=mysqli_fetch_assoc($sorgu) )
	  {
      if(!is_file($fileindexdosyasi)){
        $filecreate2 = fopen("verilecek/index.php", 'w') or die("Can't create file");
        $fileindexyaz=fwrite($filecreate2, $sonuc["sablon_tasarimkodu"]);
        fclose($filecreate2);
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

  $(document).ready(function () {
    createCookie("secilenkompanent", status, "10");
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
</script>
