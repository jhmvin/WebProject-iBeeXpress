<?php
$get = @$_GET;
require_once 'class.mono.php';
if($get['type'] == "remit"){
  $output = WebIsReal::getRemittanceFee($get['amount']);
}else if($get['type'] == "package"){
  $output = WebIsReal::getDeliveryRates($get['destination'],$get['size']);
}else{
  $output = "0";
}
print $output
 ?>
