<html>
<head>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head> 
<body> 
<table class="data" border="1px" id="data" cellspacing="0" height="100%" width="100%">          
<tr height="20%">             
<td id="header" colspan="5" style="word-break:break-all;">                 
<div id="header">         
                    <?php include('header.php'); ?>           
</div> 			
</td>         
</tr>         
<tr> 			
<td id="leftbanner"  rowspan="4" width="20%" valign="top" style="word-break:break-all;">
<div id="leftbanner">  
                <?php include('leftbanner.php'); ?>             
</div> 			
</td> 			
  
	<?php

                    $sayfalar_klasor='editorsayfalari/';

                    if(!empty($_GET['sayfa'])){
                        $sayfalar=scandir($sayfalar_klasor,0);
                        unset($sayfalar[0],$sayfalar[1]);
                        
                    $sayfa=$_GET['sayfa'];

                    if(in_array($sayfa.'.php', $sayfalar)){
                        include($sayfa.'.php');
                        
                        
                    }
                    else{
                        echo 'Aradığınız sayfa bulunamadı';
                    }
                    }
                    else{
                        include('content.php');

                    }


    ?>                                  
           
</tr>    
</table> 	  	 
</body> 	 
</html>
