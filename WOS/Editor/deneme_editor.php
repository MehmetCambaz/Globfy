php değişken: <?php $header1_yazi1="Enes Döngez";$header1_arkaplan1="transparent";$header1_resim1="409.jpg";$header1_yazim_fontu1="Times New Roman";$header1_yazim_renk1="AB2567";$header1_resim_daire1="border-radius:50%;";$header1_resim_genislik1="250";$header1_resim_yükseklik1="188";$header1_resim_golge1=" "; ?>


php kod: <div style="position:relative; width:100%; cursor:point;">
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
            ">Tıkla ve Düzenle</div></div><?php echo '<div style="background-color:'.$header1_arkaplan1.';">'; ?>
<center>
<table border="0px" cellpadding="20" style="word-wrap:break-word;">
<tr>
<td>
<center>
<?php echo '<a href="?sayfa=content"><img src="editorsayfalari_enesdongez@gmail.com/resimler/'.$header1_resim1.'" width="'.$header1_resim_genislik1.'px" height="'.$header1_resim_yükseklik1.'px" style="'.$header1_resim_daire1.' '.$header1_resim_golge1.'"/></a>'; ?>
</center>
</td></tr><tr>
<td style="word-wrap:break-word;">
<center>
<?php echo '<a href="?sayfa=content" style="text-decoration:none;"><h1 style="font-family: '.$header1_yazim_fontu1.'; color:'.$header1_yazim_renk1.';">'.$header1_yazi1.'</h1></a>'; ?>
</center>
</td>
</tr>
</table>
</center>
</div> 

 onizleme: <?php echo '<div style="background-color:'.$header1_arkaplan1.';">'; ?>
<center>
<table border="0px" cellpadding="20" style="word-wrap:break-word;">
<tr>
<td>
<center>
<?php echo '<a href="?sayfa=content"><img src="resimler/'.$header1_resim1.'" width="'.$header1_resim_genislik1.'px" height="'.$header1_resim_yükseklik1.'px" style="'.$header1_resim_daire1.' '.$header1_resim_golge1.'"/></a>'; ?>
</center>
</td></tr><tr>
<td style="word-wrap:break-word;">
<center>
<?php echo '<a href="?sayfa=content" style="text-decoration:none;"><h1 style="font-family: '.$header1_yazim_fontu1.'; color:'.$header1_yazim_renk1.';">'.$header1_yazi1.'</h1></a>'; ?>
</center>
</td>
</tr>
</table>
</center>
</div>