<?php
$vthost       ="localhost";
$vtkullanici  ="gevezefm_radyo";
$vtsifre      ="radyo1905";
$vtadi        ="gevezefm_radyo";
$baglan = @mysql_connect($vthost,$vtkullanici,$vtsifre);
if(! $baglan) die ("Mysql baglantisi saglanamadi");

mysql_select_db($vtadi,$baglan) or die ("Veritabanina baglanti saglanamadi");

?>
