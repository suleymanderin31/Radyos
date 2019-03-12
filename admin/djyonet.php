<?php ob_start(); session_start(); include("baglanti.php"); mysql_query("SET NAMES latin5");

$yonet = $_SESSION["radyositemv1_yonetim"];

if($yonet==""){

header("location:index.php");

die();
}else{


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

</head>

<body> <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td><span class="navLink">&gt;&gt; </span><span class="navLink"><strong>DJ Yönetimi </strong></span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                              <p>&nbsp;</p>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td align="center" height="35" width="50"><img src="img/warning.gif" width="24" height="21" /></td>
                                  <td bgcolor="#cccccc" valign="top" width="1"></td>
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Sitede kayıtlı DJ'leri görebilirsiniz.DJ silip düzenleyebilirsiniz.. </td>
                                </tr>
                              </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
 
                                <tbody><tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                              <p>&nbsp;</p><center>
                              <?php 
							  if(isset($_GET['djsil'])){
							  $silid = $_GET['djsil'];
							  
							  $uyesil = mysql_query("DELETE FROM djler WHERE id='$silid'");
								if($uyesil){
								echo '<span class="bilgi">DJ başarıyla silinmiştir.</span>';
								}else{
								echo '<span class="hata">DJ silmede bir hata oluştu.</span>';
								}}//uyesil
							   ?></center>
                              <br />
							  
							  <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="2" class="SilikYesilTD" bgcolor="#cccccc">Sitedeki Tüm DJ'ler </td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD">DJ adı ve soyadı </td>
                                  <td width="204" class="BeyazGriTD"><label>
                                    <div align="center">Seçenekler</div>
                                  </label></td>
                                </tr>
								
								

                               
                              <?php
							  
$limit	= 25;
$sira	= $_GET["sira"];
if(($sira=="") or !is_numeric($sira)){
$sira	= 1;
}

	$satirsayisi	= mysql_num_rows(mysql_query("SELECT * FROM djler"));
	$toplamsayfa	= ceil($satirsayisi / $limit);
	$baslangic		= ($sira-1)*$limit;
							echo 'Sayfalar : <br>';  
							 for($x=1; $x<=$toplamsayfa; $x++){

echo "<a href=\"yonetim.php?kontrol=djyonet&sira=$x\"> $x </a> |";

}
							  
							  
							  $uyeler=mysql_query("SELECT * FROM djler ORDER BY id DESC LIMIT $baslangic,$limit");
							  while($uyecek=mysql_fetch_array($uyeler)){
							  $id       = $uyecek['id'];
							  $adsoyad = $uyecek['adsoyad'];
							  
							  echo '<tr>
                                  <td class="BeyazGriTD">'.$adsoyad.'</td>
                                  <td class="BeyazGriTD"><table width="189" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="96"><a href="yonetim.php?kontrol=djduzenle&id='.$id.'"><img src="img/butonlar/guncelle.gif" width="91" height="21" border="0" /></a></td>
                                      <td width="93"><a href="yonetim.php?kontrol=djyonet&djsil='.$id.'"><img src="img/butonlar/uyesil.jpg" width="91" height="21" border="0" /></a></td>
                                    </tr>
                                  </table></td>
                                </tr>';}//döngü sonu
							   ?>
                              </tbody></table>
                           
                              <p>
							  
							  
							  </p></td>
                          </tr>
                        </tbody></table>
</body>
</html>
<?php }?>