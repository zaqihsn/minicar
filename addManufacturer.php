<?php
error_reporting(0);
include("lib.php");
$mfact = new m_fact();
$res=$mfact->saveData($_POST['name']);
if($res){
	echo "OK";
}
else{
	echo "Failed";
}
?>