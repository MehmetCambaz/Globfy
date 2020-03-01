<div style="width:100%; margin:auto;">
<div style="width:30%; float:left;">

<img src="a.jpg" width="150px" height="150px" style=""/>
</div>
</div>
<div style="width:70%; float:left; margin:40 0 0 0;">
<h3>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</br>asdasdasdasdasdasdasd</h3>
</div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<center>
<table border="0px" cellpadding="20">
<tr>
<td>
<img src="a.png" width="1000px" height="250px" style=""/>
</td></tr><tr>
<td>
<center>
<h1>Web Site Oluşturma Sistemi</h1>
</center>
</td>
</tr>
</table>
</center>

<br/><br/><br/><br/><br/><br/><br/><br/>
<form method="GET">
<input type="text" name="baslik"/>
<input type="text" name="baslik2"/>
<?php
$baslik="";
$baslik=$_GET['baslik'];

echo '<a href="b.php?dene='.$baslik.'&dene2=dongez">asdasd</a>'; 
?>
</form>

<br/><br/><br/><br/><br/><br/><br/><br/>

<form method="POST">
<input type="text" name="isim"/>
<input type="submit" name="ekle" value="ekle"/>
</form>
<?php
 $_SESSION["yapilan_islemler"]=0;
if(isset($_POST['isim'])){
    $deger=$_POST['isim'];

   
$dd=$_SESSION["yazdir"];
echo $dd;
}

?>