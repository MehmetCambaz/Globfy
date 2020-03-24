<?php
    include 'mysql_connect.php';

    session_destroy();

    setcookie("Kullaniciadi","",time()-1*24*60*60*1000);
    setcookie("Oturum_Bilgisi","",time()-1*24*60*60*1000);

    header("Refresh: 0; url=index.php");
?>