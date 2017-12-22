<?php
class Remittance{

//Database Settings
private $DBServer = '127.0.0.1';
private $DBUser   = 'root';
private $DBPass   = 'root';
private $DBName   = 'webtwo';
private $conn;

//SMS CURLS DETAILS
private $SMS_USER = 'smscurls00001@gmail.com';
private $SMS_PASS = 'Elyssajelyn0908';
private $SMS_SENDER = 'iBeeXprs';
//EMAIL DETAILS
private $EMAIL_USER = 'jandmtechnologiesph@gmail.com';
private $EMAIL_PASS = 'hafabb4d3f5411536363';
private $EMAIL_SENDER = 'iBee Express';
//Remittance prefix
public $R_TRACK = 'RM201700';
public $P_TRACK = 'PK201700';

public function __construct(){
	$this->connect();
}

//Database
private function connect(){
	//@mysql_connect('localhost','root','');
	//mysql_select_db('webmp');
	$this->conn = new mysqli($this->DBServer, $this->DBUser, $this->DBPass, $this->DBName);

	// check connection
	if ($this->conn->connect_error) {
	  die("No Connection");
	}
}

function query($query){
	$result = $this->conn->query($query);
	return $result;
}

function prepare($stmnt){
	return $this->conn->prepare($stmnt);
}
function connection(){
	return $this->conn;
}

//get package details
function getPackage($trackno){
	$trackno = substr($trackno,strlen($this->P_TRACK),strlen($trackno) - strlen($this->P_TRACK));
	$sql = "select * from package where trackno = '".$trackno."'";
	$result = $this->query($sql);
	while($row = $result->fetch_assoc()){
		if($row['state'] == 'DISPATCHED'){
			$row['state'] = 'On Delivery';
		}
	$result->free();
		$row['trackno'] = $this->P_TRACK.$row['trackno'];
		return $row;
	}
	return false;
}

//Get remittance details
function getRemittance($trackno){
	$trackno = substr($trackno,strlen($this->R_TRACK),strlen($trackno) - strlen($this->R_TRACK));
	$sql = "select * from remittance where trackno = '".$trackno."'";
	$result = $this->query($sql);
	while($row = $result->fetch_assoc()){
		if($row['complete'] == "0000-00-00 00:00:00"){
			$row['complete'] = 'Waiting to Claim';
		}
		$result->free();
		$row['trackno'] = $this->R_TRACK.$row['trackno'];
		return $row;
	}
	return false;
}

//Send Email
function sendEmail($mail_subject, $mail_message, $mail_reciever){
		require("../class/PHPMailer/class.phpmailer.php");
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


}//end of class
?>
