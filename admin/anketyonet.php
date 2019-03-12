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
                                  <td><span class="navLink">&gt;&gt; </span><span class="navLink"><strong>Anket Yönetimi </strong></span></td>
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
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Siteniz için yeni anket oluşturabilir, varolan anketleri güncelleyebilirsiniz. </td>
                                </tr>
                              </tbody></table>
                           
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody>
                                  <tr>
                                    <td bgcolor="#cccccc" height="1"></td>
                                  </tr>
                                </tbody>
                              </table>
                              <br />
                     <center>         <?php 
							  if(isset($_GET['anketsil'])){
							  $silid = $_GET['anketsil'];
							  
							  $uyesil = mysql_query("DELETE FROM anketler WHERE id='$silid'");
							  mysql_query("DELETE FROM anketdetay WHERE anketid=$silid");
								if($uyesil){
								echo '<span class="bilgi">ANKET başarıyla silinmiştir.</span>';
								}else{
								echo '<span class="hata">ANKET silmede bir hata oluştu.</span>';
								}}
							   
							   if(isset($_POST['anketekle'])){
							  $anket = $_POST['anket'];
							  
							  if($anket == ""){
							  echo '<font color=red size=2 face=tahoma>Lütfen anket sorusunu doldurunuz..</font>';
							  }else{
							  
							  
							  $ekle = mysql_query("INSERT INTO anketler VALUES (NULL, '$anket')");
							  
							  if($ekle){
							  echo '<font color=#009900 size=2 face=tahoma>Anket başarıyla oluşturuldu..</font>';
							  } else{
							  echo '<font color=red size=2 face=tahoma>Anket oluşturulamadı</font>';
							  }
							   
							  
							   }
							   }						   
							   
							   ?></center>
							   
							   
							   
                              <br />
                              <form action="yonetim.php?kontrol=anketyonet" method="post" name="anketekle">   <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody>
                                  <tr bgcolor="#cccccc">
                                    <td colspan="3" class="SilikYesilTD" bgcolor="#cccccc">Yeni Anket Ekle </td>
                                  </tr>
                                  <tr>
                                    <td width="128" class="BeyazGriTD">Anket Sorusu: </td>
                                    <td width="272" class="BeyazGriTD"><label>
                                      <input name="anket" type="text" id="anket" size="50" />
                                    </label></td>
                                    <td class="BeyazGriTD"><input name="anketekle" type="submit" id="anketekle" value="Anket Ekle" /></td>
                                  </tr>
                                </tbody>
</table></form>                              
<br />
                              <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="2" class="SilikYesilTD" bgcolor="#cccccc">Tüm Anketler </td>
                                  </tr>
                                <tr>
                                  <td class="BeyazGriTD">Anket Adı </td>
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

	$satirsayisi	= mysql_num_rows(mysql_query("SELECT * FROM anketler"));
	$toplamsayfa	= ceil($satirsayisi / $limit);
	$baslangic		= ($sira-1)*$limit;
							echo 'Sayfalar : <br>';  
							 for($x=1; $x<=$toplamsayfa; $x++){

echo "<a href=\"yonetim.php?kontrol=anketyonet&sira=$x\"> $x </a> |";

}
							  
							  
							  $uyeler=mysql_query("SELECT * FROM anketler ORDER BY id DESC LIMIT $baslangic,$limit");
							  while($uyecek=mysql_fetch_array($uyeler)){
							  $id       = $uyecek['id'];
							  $adi = $uyecek['adi'];
							  
							  echo '<tr>
                                  <td class="BeyazGriTD">'.$adi.'</td>
                                  <td class="BeyazGriTD"><table width="189" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="96"><a href="yonetim.php?kontrol=anketduzenle&id='.$id.'"><img src="img/butonlar/yonet.gif" width="91" height="21" border="0" /></a></td>
                                      <td width="93"><a href="yonetim.php?kontrol=anketyonet&anketsil='.$id.'"><img src="img/butonlar/anketsil.png" width="91" height="21" border="0" /></a></td>
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
</html><?php }?>
