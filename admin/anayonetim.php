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
<title></title>
</head>

<body> <table border="0" cellpadding="0" cellspacing="0" width="680">
                              <tbody><tr>
                                <td> <span class="style7">&gt;&gt;</span><span class="style8">Sık Kullanılan Menüler </span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#cccccc" height="1"></td>
                              </tr>
                            </tbody></table>
                              <table border="0" cellpadding="0" cellspacing="0" width="680">
                                <tbody><tr>
                                  <td align="center" height="55" width="16%"><a href="yonetim.php?kontrol=siteayar"><img src="img/ikonlar/ayarlar.jpg" border="0" width="40" height="40"></a><br></td>
                                  <td align="center" width="16%"><a href="#"></a><a href="yonetim.php?kontrol=radyoayar"><img src="img/ikonlar/radyoayar.png" width="40" height="40" border="0" /></a><br>                                    </td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=yonetici"><img src="img/ikonlar/yonetici.png" border="0" width="32" height="40"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=uyeyonetimi"><img src="img/ikonlar/uyeleriyonet.png" width="40" height="40" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=uyeekle"><img src="img/ikonlar/uyeekle.png" width="38" height="40" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=istekhatti"><img src="img/ikonlar/istekler.png" width="40" height="40" border="0"></a></td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="yonetim.php?kontrol=siteayar">Genel Ayarlar </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=radyoayar">Radyo Ayarları</a><a href="#"></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=yonetici">Yönetici Ayarları </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=uyeyonetimi">Üye Yönetimi </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=uyeekle">Yeni Üye Ekle </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=istekhatti">Bekleyen İstekler</a> </td>
                                </tr>
                                <tr>
                                  <td align="center" height="20">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="yonetim.php?kontrol=albumyonet"><img src="img/ikonlar/album.png" width="40" height="30" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=haberekle"><img src="img/ikonlar/haberekle.png" width="36" height="40" border="0"></a></td>
                           
                                  <td align="center"><a href="yonetim.php?kontrol=top10"><img src="img/ikonlar/top10.png" width="38" height="34" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=reklamyonet"><img src="img/ikonlar/reklam.png" width="40" height="38" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=mailyolla"><img src="img/ikonlar/uyeleremesaj.png" width="38" height="33" border="0"></a></td>
                                  <td align="center" width="16%"><a href="yonetim.php?kontrol=anketyonet"><img src="img/ikonlar/ankety.png" width="40" height="38" border="0"></a></td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="yonetim.php?kontrol=albumyonet">Albüm Yönetimi </a> </td>
                                  <td align="center"><a href="yonetim.php?kontrol=haberekle">Yeni Haber Ekle  </a></td>
                         
                                  <td align="center"><a href="yonetim.php?kontrol=top10">Top10 Güncelle  </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=reklamyonet">Reklam Yönetimi </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=mailyolla">Üyelere Mesaj Yolla</a><a href="" target="_blank"></a></td>
								  <td align="center"><a href="yonetim.php?kontrol=anketyonet">Anket Yönetimi </a></td>
                                </tr>
                                <tr>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="yonetim.php?kontrol=yayinakisi"><img src="img/ikonlar/yayinakisi.png" width="40" height="40" border="0" /></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=dosyadeposu"><img src="img/ikonlar/dosyadepo.png" width="40" height="40" border="0" /></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=dosyayukle"><img src="img/ikonlar/yukle.png" width="30" height="35" border="0" /></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=ziyaretyonet"><img src="img/ikonlar/ziyaret.png" width="38" height="36" border="0" /></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=uyeara"><img src="img/ikonlar/uyeara.png" width="38" height="31" border="0" /></a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=fotoekle"><img src="img/ikonlar/fotoekle.png" width="40" height="34" border="0" /></a></td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="yonetim.php?kontrol=yayinakisi">Yayın Akışı </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=dosyadeposu">Dosya Deposu</a> </td>
                                  <td align="center"><a href="yonetim.php?kontrol=dosyayukle">Dosya Yükle </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=ziyaretyonet">Ziyaretçi Mesaj </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=uyeara">Üye Ara </a></td>
                                  <td align="center"><a href="yonetim.php?kontrol=fotoekle">Fotoğraf Ekle </a><a href="" target="_blank"></a></td>
                                </tr>
                                <tr>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center"><a href="cikis.php"><img src="img/ikonlar/cikis.png" width="40" height="40" border="0" /></a></td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center"><a href="#"></a></td>
                                </tr>
                                <tr>
                                  <td align="center"><p><a href="yonetim.php?kontrol=radyoayar"></a><a href="cikis.php">Çıkış Yap</a></p>
                                  </td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center"><a href="#"></a></td>
                                </tr>
                              </tbody></table>
</body>
</html><?php }?>
