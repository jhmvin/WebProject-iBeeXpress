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
require_once 'class.mono.php';
/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////

$staff = Remittance::getInstance();
$staff->release();
$staff->find("trackno:".$get['id'],'self');
if($staff->getComplete() == "0000-00-00 00:00:00"){
  $dt = new DateTime();
  $mydate = $dt->format('Y-m-d H:i:s');
	$staff->setComplete($mydate);
	echo "claimed";
  //-------------------------------
  $notif = new WebIsReal();
  $smsMessage = $staff->getRcv_name()." has recieved your money remittance. Thank you for using iBeeExpress.";
  $sms_res = $notif->sendCurl('63'.substr($staff->getSender_contact(),1,10),$smsMessage);
  //-------------------------------
}else{
	$staff->setComplete("0000-00-00 00:00:00");
	echo "unclaimed";
}
$staff->update("trackno:".$get['id']);
?>
