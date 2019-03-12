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
<script>
function soru(){
  alert("Site Ayarları Güncellensin mi?",yesno);
}
</script>
</head>

<body> <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td><span class="navLink">&gt;&gt; </span><span class="navLink"><strong>Dosya Deposu </strong></span></td>
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
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Dosya deponuzdaki dosyaları görebilir ve yönetebilirsiniz.. </td>
                                </tr>
                              </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
 
                                <tbody><tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                              <p>&nbsp;</p><center>
                              <?php 
							//silme işlemi
							function dosyasil($silinecek){
							$yol = "../dosyalar";
							$dizinac = opendir($yol);
                            $dosya = readdir($dizinac);
                            unlink($yol."/".$silinecek);
							}
							
							if(isset($_GET['dosyasil'])){
							$silid = $_GET['dosyasil'];
							
							$dosyaadcek=mysql_fetch_array(mysql_query("SELECT * FROM dosyadeposu WHERE id='".$silid."'"));
							$silinecek = $dosyaadcek['link'];
							$dosyasil=mysql_query("DELETE FROM dosyadeposu WHERE id='".$silid."'");
							if($dosyasil){
							echo '<span class="bilgi">Dosyanız, depodan silinmiştir.</span>';
							dosyasil($silinecek);
							}else{
							echo '<span class="hata">Dosya silmede hata oluştu.. <br> "dosyalar" klasörünün yazma izni olup olmadığını kontrol ediniz.</span>';
							}
							
							
							}//silme
							  
							  
							  


							   ?></center>
                              <br />
							  
							  <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="4" class="SilikYesilTD" bgcolor="#cccccc">Dosya Deposundaki Dosyalarınız </td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD" width="166">Dosya Adı </td>
                                  <td width="301" class="BeyazGriTD">Dosya linki </td>
                                  <td width="87" class="BeyazGriTD"><div align="center">Boyut</div></td>
                                  <td width="114" class="BeyazGriTD"><label>
                                    <div align="center">Seçenekler</div>
                                  </label></td>
                                </tr>
                                
                               
                              <?php
							  
$limit	= 25;
$sira	= $_GET["sira"];
if(($sira=="") or !is_numeric($sira)){
$sira	= 1;
}

	$satirsayisi	= mysql_num_rows(mysql_query("SELECT * FROM dosyadeposu"));
	$toplamsayfa	= ceil($satirsayisi / $limit);
	$baslangic		= ($sira-1)*$limit;
							echo 'Sayfalar : <br>';  
							 for($x=1; $x<=$toplamsayfa; $x++){

echo "<a href=\"yonetim.php?kontrol=dosyadeposu&sira=$x\"> $x </a> |";
							  
							}  
							  $dosyalar=mysql_query("SELECT * FROM dosyadeposu ORDER BY id DESC LIMIT $baslangic,$limit");
							  while($dosyacek=mysql_fetch_array($dosyalar)){
							  $id = $dosyacek['id'];
							  $dosyaadi = $dosyacek['dosyaadi'];
							  $link = $dosyacek['link'];
							  $boyut = $dosyacek['boyut'];
							  

							  
							  echo '  <tr>
                                  <td class="BeyazGriTD">'.$dosyaadi.'</td>
                                  <td class="BeyazGriTD"><a href="../dosyalar/'.$link.'">'.$link.'</a></td>
                                  <td class="BeyazGriTD"><div align="center">'.$boyut.' bayt</div></td>
                                  <td class="BeyazGriTD"><div align="center"><a href="yonetim.php?kontrol=dosyadeposu&dosyasil='.$id.'"><img src="img/butonlar/dosyasil.jpg" width="91" height="21" border="0" /></a></div></td>
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