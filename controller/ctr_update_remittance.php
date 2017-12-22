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
$remit->release("trackno:".$post['txt_id'],"self");
$remit->setSender_name(strtoupper($post['txt_sname']));
$remit->setSender_contact($post['txt_scon']);
$remit->setRcv_name(strtoupper($post['txt_rname']));
$remit->setRcv_contact($post['txt_rcon']);
$remit->setRcv_mail($post['txt_remail']);
$remit->setAmount($post['txt_amount']);
$remit->setPickup(strtoupper($post['txt_pickup']));
//$remit->setDate();
$remit->setFee(WebIsReal::getRemittanceFee($post['txt_amount']));
$remit->setComplete('0000-00-00 00:00:00');
//$remit->setArchive();
echo $remit->update("trackno:".$post['txt_id'],"self");


?>
