<link href="page3.css" rel="stylesheet" type="text/css"> 
<script src="jscolor.js"></script>
<style>
.ayar_button{
background-color:#7D7D7D;
border:1px solid #7D7D7D;
width:30%;
height:32;
color:white;
font-family:Calibri;
font-size:18;

}
.ayar_textbox{
width:100%;

font-family:Calibri;
font-size:16;
}

.ayar_table{
font-family:Calibri;
background-color:#FAFAFA;
border-spacing:0;
}
.ayar_table td{
border-bottom:1px solid black;
padding:5;
}
.ayar_textarea{
width:100%;
height:100;
}



</style>
<?php
include 'mysql_connect.php';

$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler where id='.$_SESSION["KompnanentID"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["komp_ayar"];
	}

?>
