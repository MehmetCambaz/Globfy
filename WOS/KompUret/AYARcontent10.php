
<?php 

    foreach ($_COOKIE['sayfaEkle'] as $name => $value) {

      setcookie('sayfaEkle['.$name.']',$name,time()-3600); 
   
    }
 

$deger1=$_POST["content10_id"];
$deger2=$_POST["content10_arkaplan"];

$yenideger = explode ("watch?v=",$deger1);

setcookie("sayfaEkle[content10_id]",$yenideger[1],time()+3600);
setcookie("sayfaEkle[content10_arkaplan]",$deger2,time()+3600);

header("Location: kompuret.php?KompanentEkle=83");
?>
