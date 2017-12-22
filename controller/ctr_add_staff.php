<?php
/*----------------------------------------------
| 			Mashed Potato Controller
|-----------------------------------------------
*/
/* -------------INIT CONTROLS------------- */
session_start();
$post = $_SESSION['_rdr'];
unset($_SESSION['_rdr']);
/* --------- ------IMPORTS---------------- */
require_once '../model/model.staff.php';
require_once '../potato.router.php';
/* --------------------------------------- 
|	Do your codes here
*//* ------------------------------------- */////
$staff = Staff::getInstance();
$staff->release();
$staff->setUser($post['txt_accname']);
$staff->setPass($post['txt_pass']);
$staff->setName($post['txt_name']);
$staff->setRole("staff");

echo $staff->insert();


?>