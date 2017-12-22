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
require_once '../potato.auth.php';
/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////

$user = trim($post['txt_account']);
$pass = trim($post['txt_pass']);

$staff = Staff::getInstance();
$staff->release();
$staff->find("user:$user",'self');
if($staff->getuser()){
	if($staff->getState() >= 3){
		//Route::getview('login','res=blockedUser');
		echo "Blocked User";
		exit();
	}

	if($staff->getuser() == $user){
		if($staff->getpass() == $pass){
			Auth::login($staff->getid(),$staff->getuser(),$staff->getname(),$staff->getrole(),'1');
			//Route::getview('main','res=success');
			echo "success";
		}else{
			//Route::getview('login','res=WrongPassword');
			echo "Wrong Password";
		}
	}
}else{
	//Route::getview('login','res=InvalidUser');
	echo "User Not Existing";
}
?>
