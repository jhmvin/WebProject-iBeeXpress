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
require_once '../potato.auth.php';
require_once '../model/model.staff.php';
/* --------------------------------------- 
|	Do your codes here
*//* ------------------------------------- */////
$staff = Staff::getInstance();
$staff->release();
$res = $staff->where('user','=',$get['user']);
if($res != null){
	echo "true";
}else{
	echo "false";
}
?>