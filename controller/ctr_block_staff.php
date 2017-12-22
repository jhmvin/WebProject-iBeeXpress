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
require_once '../model/model.staff.php';
/* --------------------------------------- 
|	Do your codes here
*//* ------------------------------------- */////

$staff = Staff::getInstance();
$staff->release();
$staff->find("id:".$get['id'],'self');
if($staff->getState() >= 3){
	$staff->setState(0);
	echo "unblock";
}else{
	$staff->setState(3);
	echo "block";
}
$staff->update("id:".$get['id']);

?>