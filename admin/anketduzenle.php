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
                                  <td><span class="navLink"><a href="yonetim.php?kontrol=anketyonet">&gt;&gt; </a></span><a href="yonetim.php?kontrol=anketyonet"><span class="navLink"><strong>Anket Y�netimi</strong></span></a><span class="navLink"><strong> &gt;&gt; <strong>Ankete se�enek ekle </strong></strong></span></td>
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
                                  <td> <span class="style8"><strong> &nbsp;</strong></span>Anketinize se�enek ekleyebilirsiniz. </td>
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
								if($uyesil){
								echo '<span class="bilgi">ANKET ba�ar�yla silinmi�tir.</span>';
								}else{
								echo '<span class="hata">ANKET silmede bir hata olu�tu.</span>';
								}}
								
								 if(isset($_GET['seceneksil'])){
							  $silid = $_GET['seceneksil'];
							  
							  $uyesil = mysql_query("DELETE FROM anketdetay WHERE id='$silid'");
								if($uyesil){
								echo '<span class="bilgi">Se�enek ba�ar�yla silinmi�tir.</span>';
								}else{
								echo '<span class="hata">Se�enek silmede bir hata olu�tu.</span>';
								}}
							   
							   if(isset($_POST['anketduzenle'])){
							   $id=$_POST['id'];
							  $anket = $_POST['anket'];
							  
							  if($anket == ""){
							  echo '<font color=red size=2 face=tahoma>L�tfen anket sorusunu doldurunuz..</font>';
							  }else{
							  
							  
							  $ekle = mysql_query("UPDATE anketler SET adi='$anket' WHERE id='$id'");
							  
							  if($ekle){
							  echo '<font color=#009900 size=2 face=tahoma>Anket ismi de�i�tirildi..</font>';
							  } else{
							  echo '<font color=red size=2 face=tahoma>Anket ismi de�i�tirilemedi.</font>';
							  }
							   
							  
							   }
							   }
							   
							   
							   //------------------------------------------------------
							   
							  if(isset($_POST['secenekekle'])){
							  $anketid=$_POST['id2'];
							  $secenek = $_POST['secenek'];
							  
							  if($secenek == ""){
							  echo '<font color=red size=2 face=tahoma>L�tfen anket se�ene�ini doldurunuz..</font>';
							  }else{
							  
							  
							  $ekle = mysql_query("INSERT INTO anketdetay VALUES(NULL, '$secenek', 0, $anketid)");
							  
							  if($ekle){
							  echo '<font color=#009900 size=2 face=tahoma>Se�enek Eklenmi�tir...</font>';
							  } else{
							  echo '<font color=red size=2 face=tahoma>Se�enek eklenemedi.</font>';
							  }
							   
							  
							   }
							   }	
							   
							   //-----------------------						   
							   $id = $_GET['id'];
							   $aciklamaal=mysql_fetch_array(mysql_query("SELECT * FROM anketler WHERE id='$id'"));
							   $anket = $aciklamaal['adi'];
							   ?></center>
							   
							   
							   
                              <br />
                              <form action="yonetim.php?kontrol=anketduzenle&id=<?php echo $id; ?>" method="post" name="anketekle">   <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody>
                                  <tr bgcolor="#cccccc">
                                    <td colspan="3" class="SilikYesilTD" bgcolor="#cccccc">Anket D�zenle </td>
                                  </tr>
                                  <tr>
                                    <td width="128" class="BeyazGriTD">Anket Sorusu: </td>
                                    <td width="272" class="BeyazGriTD"><label>
                                      <input name="anket" value="<?php echo $anket; ?>" type="text" id="anket" size="50" />
                                    </label></td>
                                    <td class="BeyazGriTD"><input name="anketduzenle" type="submit" id="anketduzenle" value="D�zenle" />
                                    <input name="id" value="<?php echo $id; ?>" type="hidden" id="id" /></td>
                                  </tr>
                                </tbody>
</table></form>                              
<br /><form action="yonetim.php?kontrol=anketduzenle&id=<?php echo $id; ?>" method="post" name="secenekekle">   <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody>
                                  <tr bgcolor="#cccccc">
                                    <td colspan="3" class="SilikYesilTD" bgcolor="#cccccc">Anket'e Se�enek Ekleyin </td>
                                  </tr>
                                  <tr>
                                    <td width="128" class="BeyazGriTD">Anket ��kk�: </td>
                                    <td width="272" class="BeyazGriTD"><label>
                                      <input name="secenek" type="text" id="secenek" size="50" />
                                    </label></td>
                                    <td class="BeyazGriTD"><input name="secenekekle" type="submit" id="secenekekle" value="��k Ekle" />
                                    <input name="id2" value="<?php echo $id; ?>" type="hidden" id="id2" /></td>
                                  </tr>
                                </tbody>
</table></form>                       <br />
                              <table border="0" cellpadding="1" cellspacing="1" width="681">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="3" class="SilikYesilTD" bgcolor="#cccccc">Anketinizin Se�enekleri </td>
                                  </tr>
                                <tr>
                                  <td width="381" class="BeyazGriTD">Anket ��klar� </td>
                                  <td width="80" class="BeyazGriTD"><div align="center">Hit</div></td>
                                  <td width="210" class="BeyazGriTD"><label>
                                    <div align="center">Se�enekler</div>
                                  </label></td>
                                </tr>
								
								

                               
                              <?php
							  
						  
							  $uyeler=mysql_query("SELECT * FROM anketdetay WHERE anketid='$id' ORDER BY id ASC");
							  while($uyecek=mysql_fetch_array($uyeler)){
							  $secenekid       = $uyecek['id'];
							  $secenek = $uyecek['secenek'];
							  $hit     = $uyecek['hit'];
							  
							  
							  echo '<tr>
                                <td class="BeyazGriTD"><input name="secenek" type="text" id="secenek" value="'.$secenek.'" size="60" /></td>
                                  <td class="BeyazGriTD"><div align="center">'.$hit.'</div></td>
                                  <td class="BeyazGriTD"><table width="189" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                             <td width="93"><a href="yonetim.php?kontrol=anketduzenle&id='.$id.'&seceneksil='.$secenekid.'"><img src="img/butonlar/seceneksil.png" width="91" height="21" border="0" /></a></td>
                                    </tr>
                                  </table></td>
                                </tr>';}//d�ng� sonu
							   ?>
                              </tbody></table>
                           
                              <p>
							  
							  
							  </p></td>
                          </tr>
                        </tbody></table>
</body>
</html>
<?php }?>