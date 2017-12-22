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
if($staff->remove($get['id'])){
	echo "deleted";
}else{
	echo "failed";
}

?>