<?php
error_reporting(0);
include("lib.php");
$model = new model();
$res=$model->saveData($_POST['modelname'],$_POST['manid']);
if($res){
	echo "OK";
}
else{
	echo "Failed";
}
?>