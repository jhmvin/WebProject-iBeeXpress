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
require_once '../model/model.remittance.php';
require_once '../potato.router.php';
require_once 'class.mono.php';


/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////
$remit = Remittance::getInstance();
$remit->release();
$remit->setSender_name(strtoupper($post['txt_sname']));
$remit->setSender_contact($post['txt_scon']);
$remit->setRcv_name(strtoupper($post['txt_rname']));
$remit->setRcv_contact($post['txt_rcon']);

$rcontact = $post['txt_rcon'];

$remit->setRcv_mail($post['txt_remail']);
$remit->setAmount($post['txt_amount']);
$remit->setPickup(strtoupper($post['txt_pickup']));
//$remit->setDate();
$remit->setFee(WebIsReal::getRemittanceFee($post['txt_amount']));
$remit->setComplete('0000-00-00 00:00:00');
//$remit->setArchive();
$id =  $remit->insert();
echo $id;
//---------------------------------
$notif = new WebIsReal();
$smsMessage = "You have a money remittance ready to be picked-up, Check your e-mail for more details. DO NOT REPLY";
$mailMessage = "Good Day! Here are the details of your money remittance. TRACKING NO.[RM201700".$id."] >>>> AMOUNT[".$post['txt_amount']."] >>>> PICKUP BRANCH[".$post['txt_pickup']."] >>>> SENDER[".$post['txt_sname']."] THANK YOU -- iBeeExpress";
$notif->sendEmail("MONEY REMITTANCE",$mailMessage,$post['txt_remail']);

$sms_res = $notif->sendCurl('63'.substr($rcontact,1,10),$smsMessage);
echo $sms_res;

?>
