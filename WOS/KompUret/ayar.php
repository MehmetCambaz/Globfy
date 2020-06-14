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
width:80%;

font-family:Calibri;
font-size:16;
}

.ayar_table{
font-family:Calibri;
background-color:#FAFAFA;
border-spacing:0;
width:90%;
margin:10 0 0 0 ;
}
.ayar_table td{
border-bottom:1px solid black;
padding:5;
}
.ayar_textarea{
width:80%;
height:100;
}
.ayar_select{
width:80%;
height:28;
}
.ayar_textbox_number{
width:50%;
font-family:Calibri;
font-size:16;	
}



</style>
<div style="width:100%; height:calc(100% - 10px);  background-color:#FAFAFA;">
<center>
<?php
include 'mysql_connect.php';
if(isset($_SESSION["KompnanentID"])){
$sorgu = $baglanti->query('select id,kompanent_icerik,tur,komp_ayar,komp_kod from kompanentler2 where id='.$_SESSION["KompnanentID"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["komp_ayar"];
	}
}
?>
</center>
</div>
