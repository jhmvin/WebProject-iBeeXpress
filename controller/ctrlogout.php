<?php
/*----------------------------------------------
| 			Mashed Potato Controller
|-----------------------------------------------
*/
/* -------------INIT CONTROLS------------- */
session_start();
/* ----------------IMPORTS---------------- */
require_once '../potato.router.php';
require_once '../potato.auth.php';
/* --------------------------------------- 
|	Do your codes here
*//* ------------------------------------- */////

Auth::logout();
header('location: rdr.php?rdr=index');
//Route::getview('index','res=logout');
?>