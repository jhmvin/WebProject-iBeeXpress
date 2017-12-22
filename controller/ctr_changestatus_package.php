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
require_once '../model/model.package.php';
require_once 'class.mono.php';
/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////

$staff = Package::getInstance();
$staff->release();
$staff->find("trackno:".$get['id'],'self');
if($staff->getState() == "DISPATCHED"){
	$staff->setState("DELIVERED");
	echo "delivered";
	//--------------------------------------------
	$notif = new WebIsReal();
	$smsMessage = "Your package RM201700".$staff->getTrackno()." has been recieved by ". $staff->getSender_name() .">>iBeeExpress.";
	$sms_res = $notif->sendCurl('63'.substr($staff->getSender_contact(),1,10),$smsMessage);
	//--------------------------------------------
}else{
	$staff->setState("DISPATCHED");
	echo "dispatched";
}
$staff->update("trackno:".$get['id']);


?>
