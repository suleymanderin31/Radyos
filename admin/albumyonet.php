<?php ob_start(); session_start(); include("baglanti.php"); 

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
                                  <td><span class="navLink">&gt;&gt; </span><span class="navLink"><strong>Albüm Yönetimi </strong></span></td>
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
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Radio Portalınıza yeni albüm bilgisi ekleyebilirsiniz. </td>
                                </tr>
                              </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
 
                                <tbody><tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                         
                              <center>
                              <?php 
								if(isset($_GET['sil']))	{
								
								$silid=$_GET['sil'];
								$silmek=mysql_query("DELETE FROM albumler WHERE id='$silid'");
								if($silmek){
								
								echo '<span class="bilgi">Albüm başarıyla silinmiştir.</span>';
								}else{
								echo '<span class="hata">Albüm silmede hata oluştu!!.</span>';
								}
								}//get kontrol	  
								
								//mesajın onaylanması
								if(isset($_GET['onay']))	{
								
								$onayid=$_GET['onay'];
								$onayla=mysql_query("UPDATE albumler SET onay='1' WHERE id='$onayid'");
								if($onayla){
								
								echo '<span class="bilgi">Albüm yayına alınmıştır..</span>';
								}else{
								echo '<span class="hata">Albüm onaylamada hata oluştu!!.</span>';
								}
								}//get kontrol	 
								
								//mesajın reddedilmesi
								if(isset($_GET['red']))	{
								
								$redid=$_GET['red'];
								$reddet=mysql_query("UPDATE albumler SET onay='0' WHERE id='$redid'");
								if($reddet){
								
								echo '<span class="bilgi">Albüm gösterimden kaldırılmıştır.</span>';
								}else{
								echo '<span class="hata">Albüm reddetmede hata oluştu!!.</span>';
								}
								}//get kontrol	 


							   ?></center>
                              <br />
							  
							  <table border="0" cellpadding="1" cellspacing="1" width="682">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="5" class="SilikYesilTD" bgcolor="#cccccc">Sistemdeki Mesajlar </td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD" width="250">Albüm Başlık </td>
                                  <td class="BeyazGriTD" width="89">Ekleme Tarihi </td>
                                  <td width="110" class="BeyazGriTD"><div align="center">Okunma Sayısı </div></td>
                                  <td width="52" class="BeyazGriTD"><div align="center">Onay</div></td>
                                  <td width="165" class="BeyazGriTD"><label>
                                    <div align="center">Seçenekler
                                    </div>
                                  </label></td>
                                  </tr>
                                

                                
                               
                              <?php
							  $limit	= 25;
$sira	= $_GET["sira"];
if(($sira=="") or !is_numeric($sira)){
$sira	= 1;
}

	$satirsayisi	= mysql_num_rows(mysql_query("SELECT * FROM albumler"));
	$toplamsayfa	= ceil($satirsayisi / $limit);
	$baslangic		= ($sira-1)*$limit;
							echo 'Sayfalar : <br>';  
							 for($x=1; $x<=$toplamsayfa; $x++){

echo "<a href=\"yonetim.php?kontrol=albumyonet&sira=$x\"> $x </a> |";

}
							  
							  
							  
							  $mesajlar=mysql_query("SELECT * FROM albumler ORDER BY id DESC LIMIT $baslangic,$limit");
							  while($mesajcek=mysql_fetch_array($mesajlar)){
							  $id = $mesajcek['id'];
							  $albumbaslik = $mesajcek['albumbaslik'];
							  $tarih = $mesajcek['tarih'];
							  $onaydurum = $mesajcek['onay'];
							  $hit = $mesajcek['hit'];

							  if($onaydurum == 1){
							  $onay='<div align="center"><a href="yonetim.php?kontrol=albumyonet&red='.$id.'"><img src="img/butonlar/onay.png" width="16" height="15" border="0" /></a></div>';
							  }else{
							  $onay='<div align="center"><a href="yonetim.php?kontrol=albumyonet&onay='.$id.'"><img src="img/butonlar/red.png" width="16" height="16" border="0" /></a></div>';
							  }

							  
							  echo '<tr>
                                  <td class="BeyazGriTD">'.$albumbaslik.'</td>
                                  <td class="BeyazGriTD">'.$tarih.'</td>
                                  <td class="BeyazGriTD">'.$hit.'</td>
                                  <td class="BeyazGriTD">'.$onay.'</td>
                                  <td class="BeyazGriTD"><table width="189" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><a href="yonetim.php?kontrol=albumduzenle&id='.$id.'"><img src="img/butonlar/guncelle.gif" width="91" height="21" border="0" /></a></td>
                                      <td><a href="yonetim.php?kontrol=albumyonet&sil='.$id.'"><img src="img/butonlar/albumsil.png" width="91" height="21" border="0" /></a></td>
                                    </tr>
                                  </table></td>
                                </tr> ';}//döngü sonu
							   ?>
</tbody></table>
                           
                              <p>
							  
							  
							  </p></td>
                          </tr>
                        </tbody></table>
</body>
</html><?php }?>
