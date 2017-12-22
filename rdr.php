<?php
session_start();
require_once 'potato.env.php';
/*---------------------------------------
|
|Potato Router Helper
|
*/

if(isset($_GET['rdr'])){$_rdr = $_GET['rdr'];}else{$_rdr = "";}
if(isset($_GET['res'])){$res = $_GET['res'];}else{$res = "";}
if(!empty($_rdr)){
	header("location: ". HOME ."/route.php?rdr=" . $_rdr . "&res=" . $res);
	exit();
}else{
	if(isset($_POST['_mode'])){$_mode = $_POST['_mode'];}else{$_mode = "";}
	if($_mode == ""){header("location: ". HOME ."/index.php");exit();}
	$_SESSION['_rdr'] = $_POST;
	header("location: ". HOME ."/route.php?rdr=".$_POST['_mode']);
	exit();
}

?>
