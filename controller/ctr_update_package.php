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
$package->find("trackno:".$post['txt_id'],"self");
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

//date to deliver
if($post['txt_destination'] == "NCR"){
  $dt->add(new DateInterval('P1D'));
}else{
  $dt->add(new DateInterval('P3D'));
}
$mydate = $dt->format('Y-m-d H:i:s');
$package->setDelivery_date($mydate);

$fee = WebIsReal::getDeliveryRates($post['txt_destination'],$post['txt_size']);
$package->setFee($fee);

$package->setState("DISPATCHED");
//$package->setArchive();

echo $package->update("trackno:".$post['txt_id']);

?>
