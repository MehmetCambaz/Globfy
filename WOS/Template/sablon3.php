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