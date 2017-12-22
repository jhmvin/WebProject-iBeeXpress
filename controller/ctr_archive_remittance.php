<?php
/*----------------------------------------------
| 			Mashed Potato Controller
|-----------------------------------------------
*/
/* -------------INIT CONTROLS------------- */
session_start();
$get = @$_GET;
/* ----------------IMPORTS---------------- */
require_once '../potato.router.php';
require_once '../model/model.remittance.php';
/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////

$staff = Remittance::getInstance();
$staff->release();
$staff->find("trackno:".$get['id'],'self');
if($staff->getArchive() == 1){
	$staff->setArchive(0);
	echo "unarchive";
}else{
	$staff->setArchive(1);
	echo "archived";
}
$staff->update("trackno:".$get['id']);

?>
