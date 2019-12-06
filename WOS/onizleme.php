   <style>
    .highlight { background-color:#D3D3D3; }

    .selected { margin: 0; width: 100%; height: 10%; border: solid; visibility: visible;}
    .unselected { margin: 0; width: 100%; height: 10%; border: solid; visibility: hidden;}

    </style>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<?php 
if(isset($_COOKIE["secilenkompanent"]) and isset($_COOKIE["ekle"])){
	$ekle=$_COOKIE["ekle"];
	$gelen=$_COOKIE["secilenkompanent"];
}
else{
	$gelen="asd";
}


?>
<table class="data" id="data" border="1" cellspacing="1" height="100%" width="100%">
        <tr height="20%">
            <td id="header" colspan="5">
			<div id="header">
				<?php 
					if($gelen == "header"){
						echo $ekle;
					}
					else{
						echo "Tıkla ve Ekle (Header)";
					}
				?>
			</div>
			</td>
        </tr>
        <tr>
			<td id="leftbanner"  rowspan="4" width="20%">
			<div id="leftbanner">
			<?php 
				if($gelen == "leftbanner"){
						echo $ekle;
					}
					else{
						echo "Tıkla ve Ekle (leftbanner)";
					}
				?>
			</div>
			</td>
			<td id="content" colspan="4" rowspan="4">
			<div id="content">
				<?php 
					if($gelen == "content"){
						echo $ekle;
					}
					else{
						echo "Tıkla ve Ekle (Content)";
					}
				?>
			</div>
			</td>  
        </tr>
   </table>

<?php //Veritabanından çekiyor!!!
/*include 'mysql_connect.php';

$sorgu = $baglanti->query('select sablon_id,sablon_adi,sablon_resim,sablon_kod from sablonlar where sablon_id='.$_SESSION["secilenSablon"].'');
	while($sonuc=mysqli_fetch_assoc($sorgu) )
	{
		echo $sonuc["sablon_kod"];
	}*/
?>

<script>
$("#data td").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#data td").removeClass("highlight");
	if(!selected)
		$(this).addClass("highlight");
	var status = $(this).attr("id")
	 //$("#a").html(status+"asdasd");
    myFunction(status);
	
});
function myFunction(param) {


$(document).ready(function () {
  createCookie("secilenkompanent", param, "10");
});

}
function createCookie(name, value, days) {
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