<?php
/**
*
*/
class WebIsReal
{
  //SMS CURLS DETAILS
  private $SMS_USER = 'smscurls00002@gmail.com';
  private $SMS_PASS = 'Elyssajelyn0908';
  private $SMS_SENDER = 'iBeeXprs';
  //EMAIL DETAILS
  private $EMAIL_USER = 'jandmtechnologiesph@gmail.com';
  private $EMAIL_PASS = 'hafabb4d3f5411536363';
  private $EMAIL_SENDER = 'iBee Express';

  function __construct()
  {
    # code...
  }

  public static function getRemittanceFee($remittanceAmount){
    $remittance_fee = 0;
    if($remittanceAmount >= 100 and $remittanceAmount <= 100){
      $remittance_fee = 6;
    }else if($remittanceAmount >= 101 and $remittanceAmount <= 200){
      $remittance_fee = 15;
    }else if($remittanceAmount >= 201 and $remittanceAmount <= 300){
      $remittance_fee = 20;
    }else if($remittanceAmount >= 301 and $remittanceAmount <= 400){
      $remittance_fee = 25;
    }else if($remittanceAmount >= 401 and $remittanceAmount <= 500){
      $remittance_fee = 30;
    }else if($remittanceAmount >= 501 and $remittanceAmount <= 600){
      $remittance_fee = 35;
    }else if($remittanceAmount >= 601 and $remittanceAmount <= 700){
      $remittance_fee = 40;
    }else if($remittanceAmount >= 701 and $remittanceAmount <= 800){
      $remittance_fee = 45;
    }else if($remittanceAmount >= 801 and $remittanceAmount <= 900){
      $remittance_fee = 50;
    }else if($remittanceAmount >= 901 and $remittanceAmount <= 1000){
      $remittance_fee = 50;
    }else if($remittanceAmount >= 1001 and $remittanceAmount <= 1500){
      $remittance_fee = 75;
    }else if($remittanceAmount >= 1501 and $remittanceAmount <= 2000){
      $remittance_fee = 100;
    }else if($remittanceAmount >= 2001 and $remittanceAmount <= 2500){
      $remittance_fee = 125;
    }else if($remittanceAmount >= 2501 and $remittanceAmount <= 3000){
      $remittance_fee = 150;
    }else if($remittanceAmount >= 3001 and $remittanceAmount <= 4000){
      $remittance_fee = 180;
    }else if($remittanceAmount >= 4001 and $remittanceAmount <= 5000){
      $remittance_fee = 220;
    }else if($remittanceAmount >= 5001){
      $remittance_fee = 250;
    }


    return $remittance_fee;
  }

  //Delivery Rates
  function getDeliveryRates($place, $size){
    $dlivery_rate = 0;
    if($place == 'NCR'){
      if($size == 'SMALL'){
        $delivery_rate = 200;
      }else if($size == 'MEDIUM'){
        $delivery_rate = 325;
      }else if($size == 'LARGE'){
        $delivery_rate = 600;
      }else if($size == 'EXTRA'){
        $delivery_rate = 1235;
      }else{
        $delivery_rate = 0;
      }
    }else if($place == 'NLUZON'){
      if($size == 'SMALL'){
        $delivery_rate = 255;
      }else if($size == 'MEDIUM'){
        $delivery_rate = 400;
      }else if($size == 'LARGE'){
        $delivery_rate = 800;
      }else if($size == 'EXTRA'){
        $delivery_rate = 1425;
      }else{
        $delivery_rate = 0;
      }
    }else if($place == 'SLUZON'){
      if($size == 'SMALL'){
        $delivery_rate = 255;
      }else if($size == 'MEDIUM'){
        $delivery_rate = 400;
      }else if($size == 'LARGE'){
        $delivery_rate = 800;
      }else if($size == 'EXTRA'){
        $delivery_rate = 1425;
      }else{
        $delivery_rate = 0;
      }
    }else if($place == 'VISAYAS'){
      if($size == 'SMALL'){
        $delivery_rate = 265;
      }else if($size == 'MEDIUM'){
        $delivery_rate = 435;
      }else if($size == 'LARGE'){
        $delivery_rate = 870;
      }else if($size == 'EXTRA'){
        $delivery_rate = 1558;
      }else{
        $delivery_rate = 0;
      }
    }else if($place == 'MINDANAO'){
      if($size == 'SMALL'){
        $delivery_rate = 265;
      }else if($size == 'MEDIUM'){
        $delivery_rate = 435;
      }else if($size == 'LARGE'){
        $delivery_rate = 870;
      }else if($size == 'EXTRA'){
        $delivery_rate = 1558;
      }else{
        $delivery_rate = 0;
      }
    }else {
      $delivery_rate = 0;
    }
    return $delivery_rate;
  }

  //-------------------------
  //Send Email
  function sendEmail($mail_subject, $mail_message, $mail_reciever){
  		require("PHPMailer/class.phpmailer.php");
  		$mailer = new PHPMailer();
  		$mailer->IsSMTP();
  		$mailer->Host = 'ssl://smtp.gmail.com:465';
  		$mailer->SMTPAuth = TRUE;
  		$mailer->Username = $this->EMAIL_USER;
  		$mailer->Password = $this->EMAIL_PASS;
  		$mailer->From = $this->EMAIL_SENDER;
  		$mailer->FromName = $this->EMAIL_SENDER;

  		$mailer->Body = $mail_message;
  		$mailer->Subject = $mail_subject;
  		$mailer->AddAddress($mail_reciever);
  		if($mailer->Send())
  		{
  			 //echo "Mailer Error: " . $mailer->ErrorInfo;
  		   return true;

  		}
  		else
  		{
  			//echo "Mailer Error: " . $mailer->ErrorInfo;
  		   return false;
  		}
  }

  //Send SMS Code Here
  function sendCurl($sendto,$info){
  	// Message details
  	$numbers = array($sendto);
  	$sender = urlencode($this->SMS_SENDER);
  	$message = rawurlencode($info);

  	$numbers = implode(',', $numbers);

  	// Prepare data for POST request
  	$data = array('username' => $this->SMS_USER, 'hash' => $this->SMS_PASS, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

  	// Send the POST request with cURL
  	$ch = curl_init('http://api.txtlocal.com/send/');
  	curl_setopt($ch, CURLOPT_POST, true);
  	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  	$response = curl_exec($ch);
  	curl_close($ch);

  	// Process your response here
  	return $response;
  }



}



?>
