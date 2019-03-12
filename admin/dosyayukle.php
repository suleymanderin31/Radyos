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
                                  <td><span class="navLink"><a href="yonetim.php?kontrol=dosyadeposu">&gt;&gt;<strong>Dosya Deposu</strong></a><strong> &gt;&gt;<strong>Yeni Dosya Yükle </strong></strong></span></td>
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
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Dosya deponuza yeni dosya yükleyebilirsiniz. </td>
                                </tr>
                              </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
 
                                <tbody><tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                              <p>&nbsp;</p><center>
                              <?php 
							if(isset($_POST['dosyayukle'])){
							$dosyaadi = $_POST['dosyaadi'];
							
							if($dosyaadi==""){
							echo '<span class="hata">Dosya adını girmediniz.</span>';
							}else{
							$kaynak		= $_FILES["dosya"]["tmp_name"];
							$resimadi	= $_FILES["dosya"]["name"];
							$resimtipi	= $_FILES["dosya"]["type"];
							$resimboyut	= $_FILES["dosya"]["size"];
							$hedef		= "../dosyalar";
							
							$dosyayukle = move_uploaded_file($kaynak,$hedef."/".$resimadi);
							
							if($dosyayukle){
							mysql_query("INSERT INTO dosyadeposu VALUES(NULL, '$dosyaadi','$resimadi','$resimboyut')");
							echo '<span class="bilgi">Yeni dosyanız yüklenmiştir.</span>';
							}else{
							echo '<span class="bilgi">Dosya yüklemede hata oluştu.<br>"dosyalar" klasörüne yazma yetkisi verdiğinizden emin olunuz.</span>';
							}
							
							
							}//dosya adı kontrolü
							}//kontrol
							   ?></center>
                              <br />
							  <form name="dosyayukle" action="yonetim.php?kontrol=dosyayukle" method="post" enctype="multipart/form-data">
							  <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="2" class="SilikYesilTD" bgcolor="#cccccc">Dosya Deposuna Yeni Dosya Ekleyin </td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD" width="144">Dosya Adı </td>
                                  <td width="530" class="BeyazGriTD"><input name="dosyaadi" type="text" id="dosyaadi" size="60" maxlength="60" /></td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD">Dosya Seçin </td>
                                  <td class="BeyazGriTD"><input name="dosya" type="file" id="dosya" size="60" /></td>
                                </tr>
                               
                              
                              </tbody></table>
                           
                              <table border="0" cellpadding="1" cellspacing="1" width="680">
                                <tbody>
                                  <tr>
                                    <td nowrap="nowrap" width="524">&nbsp;</td>
                                    <td align="center" width="149"><input name="dosyayukle" type="submit" id="dosyayukle" value="Dosya Yükle"></td>
                                  </tr>
                                </tbody>
                              </table></form>
                              <br />
                             
                              </td>
                          </tr>
                        </tbody></table>
</body>
</html><?php }?>
