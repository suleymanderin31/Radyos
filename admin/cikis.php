<?php  ob_start();  session_start();

$yonet = $_SESSION["radyositemv1_yonetim"];

session_destroy();
setcookie("radyositemv1_yonetim","",time()-1);
header("location:../index.php");

?>