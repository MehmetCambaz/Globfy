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
			<td id="content" >
			<div id="content">
			<?php 
				if($gelen == "content"){
						echo $ekle;
					}
					else{
						echo "Tıkla ve Ekle (content)";
					}
				?>
			</div>
			</td>
			<td id="content">
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
		<tr height="20%">
            <td id="footer" colspan="5">
			<div id="footer">
				<?php 
					if($gelen == "footer"){
						echo $ekle;
					}
					else{
						echo "Tıkla ve Ekle (Footer)";
					}
				?>
			</div>
			</td>
        </tr>
   </table>