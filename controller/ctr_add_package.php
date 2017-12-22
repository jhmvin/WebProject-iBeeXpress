<?php
/*----------------------------------------------
| 			Mashed Potato Controller
|-----------------------------------------------
*/
/* -------------INIT CONTROLS------------- */
session_start();
@$post = $_SESSION['_rdr'];
unset($_SESSION['_rdr']);
/* --------- ------IMPORTS---------------- */
require_once '../model/model.package.php';
require_once '../potato.router.php';
require_once 'class.mono.php';

/* ---------------------------------------
|	Do your codes here
*//* ------------------------------------- */////
$package = Package::getInstance();
$package->release();
$package->setSender_name(strtoupper($post['txt_psname']));
$package->setSender_address(strtoupper($post['txt_psadd']));
$package->setSender_email($post['txt_psemail']);
$package->setSender_contact($post['txt_pscontact']);

$package->setRec_name(strtoupper($post['txt_prname']));
$package->setRec_address(strtoupper($post['txt_pradd']));
$package->setRec_email($post['txt_premail']);
$package->setRec_contact($post['txt_prcontact']);

//$package->setOrigin();
$package->setDestination($post['txt_destination']);
$package->setSize($post['txt_size']);
$package->setValue($post['txt_amount']);

//date dispatched
$dt = new DateTime();
$mydate = $dt->format('Y-m-d H:i:s');
$package->setDispatch($mydate);

//email details
$datedispatched = $mydate;

//date to deliver
if($post['txt_destination'] == "NCR"){
  $dt->add(new DateInterval('P1D'));
}else{
  $dt->add(new DateInterval('P3D'));
}
$mydate = $dt->format('Y-m-d H:i:s');
$package->setDelivery_date($mydate);
$expecteme = $mydate;

$fee = WebIsReal::getDeliveryRates($post['txt_destination'],$post['txt_size']);
$package->setFee($fee);

$package->setState("DISPATCHED");
//email details
$status = "DISPATCHED";

//$package->setArchive();

$id = $package->insert();
echo $id;
//-------------------------- Email Client
$notif = new WebIsReal();
$mailMessage = "Good Day! Here are the details of the package. TRACKING NO.[RM201700".$id."] >>>> Date Dispatched [".$datedispatched."] >>>> Status [".$status."] >>>> Expected Delivery Date [".$expecteme."] THANK YOU -- iBeeExpress";
$notif->sendEmail("PACKAGE DELIVERY",$mailMessage,$post['txt_premail']);

$smsMessage = "Your Package RM201700".$id." has been dispatched. Please check your email for details.";
$sms_res = $notif->sendCurl('63'.substr($post['txt_prcontact'],1,10),$smsMessage);
 ?>
