<?php
include 'mysql_connect.php';

$gelenkullaniciemail=$_SESSION["Kullaniciadi"];
if(is_file('Olusturulan/'.$gelenkullaniciemail.'.php')){
include 'Olusturulan/'.$gelenkullaniciemail.'.php';
}
?>