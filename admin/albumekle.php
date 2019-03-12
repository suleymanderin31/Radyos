<?php ob_start(); session_start(); include("baglanti.php"); 

$yonet = $_SESSION["radyositemv1_yonetim"];

if($yonet==""){

header("location:index.php");

die();
}else{


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" /></head>

<body> <script type="text/javascript" src="editor/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "admin",
			staffid : "test"
		}
	});
</script><table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td><span class="navLink"><a href="yonetim.php?kontrol=albumyonet">&gt;&gt; <strong>Albüm Yönetimi</strong></a><strong> </strong> &gt;&gt; </span><strong>Yeni Albüm Ekle </strong></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#cccccc" height="1"></td>
                                </tr>
                              </tbody></table>
                        

                              <br />
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
                                  <tbody>
                                    <tr>
                                      <td bgcolor="#cccccc" height="1"></td>
                                    </tr>
                                  </tbody>
</table>
                                <table border="0" cellpadding="0" cellspacing="0" width="680">
                                  <tbody>
                                    <tr>
                                      <td align="center" height="35" width="50"><img src="img/warning.gif" width="24" height="21" /></td>
                                      <td bgcolor="#cccccc" valign="top" width="1"></td>
                                      <td><span class="style8"><strong> &nbsp;</strong></span>Radio Portalınıza yeni bir albüm bilgisi ekleyebilirsiniz. </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" width="680">
                                  <tbody>
                                    <tr>
                                      <td bgcolor="#cccccc" height="1"></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <center>
                                  <br />
                                  <?php 
							if(isset($_POST['albumekle'])){
							$baslik = $_POST['baslik'];
							$haber  = $_POST['haber'];
							
							if($baslik==""){
							echo '<span class="hata">Albüme başlık girmediniz.</span>';
							}else{
							$kaynak		= $_FILES["dosya"]["tmp_name"];
							$resimadi	= $_FILES["dosya"]["name"];
							$resimtipi	= $_FILES["dosya"]["type"];
							$resimboyut	= $_FILES["dosya"]["size"];
							$hedef		= "../albumimg";
							$radi		= substr(uniqid(md5(rand())), 0,20);
							$ruzanti	= substr($resimadi, -4);
							$yeniad		= $radi.$ruzanti;
							
							$dosyayukle = move_uploaded_file($kaynak,$hedef."/".$yeniad);
							
							if($dosyayukle){
							$tarih = date("d.m.Y");
							$ekle = mysql_query("INSERT INTO albumler (albumbaslik,albumicerik,resimlink,tarih,onay)VALUES('$baslik','$haber','$yeniad','$tarih',1)");
							if($ekle){
							echo '<span class="bilgi">Yeni albüm oluşturulmuştur.</span>';}else{
							echo '<span class="bilgi">Albüm oluşturmada hata oluştu.</span>';
							}
							}else{
							echo '<span class="hata">Albüm oluşturmada hata<br>"albumimg" klasörüne yazma yetkisi verdiğinizden emin olunuz.</span>';
							}
							
							
							}//dosya adı kontrolü
							}//kontrol
							   ?>
                                  <br /><br />
							  </center>
                              <form action="yonetim.php?kontrol=albumekle" method="post" enctype="multipart/form-data" >
							  <table border="0" cellpadding="1" cellspacing="1" width="680">
                                <tbody><tr bgcolor="#cccccc">
                                  <td colspan="2" class="SilikYesilTD" bgcolor="#cccccc">Albüm  Ekleme </td>
                                  </tr>
                                
                               
                                <tr>
                                  <td width="175" class="BeyazGriTD">Albüm Başlık </td>
                                  <td width="498" class="BeyazGriTD"><input name="baslik" value="<?php echo $baslik; ?>"  type="text" id="baslik" size="60" /></td>
                                </tr>
                                <tr>
                                  <td class="BeyazGriTD">Albüm Resmi </td>
                                  <td class="BeyazGriTD"><input name="dosya" type="file" id="dosya" />
                                  Resim seçiniz. </td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="BeyazGriTD"><textarea name="haber" rows="10" id="haber"><?php echo $haber; ?></textarea></td>
                                  </tr>
                              </tbody></table>
                              <table border="0" cellpadding="1" cellspacing="1" width="680">
                                <tbody><tr>
                                  <td nowrap="nowrap" width="524">&nbsp;</td>
                                  <td align="center" width="149"><input name="albumekle" type="submit" id="uyeekle" value="Oluştur"  /></td>
                                </tr>
                              </tbody></table>
</form>
                              <p>
							  
							  
							  </p></td>
                          </tr>
                        </tbody></table>
</body>
</html>
<?php }?>