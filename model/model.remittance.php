<?php require '../potato.connection.php';
#|Date Created: 2017-05-01 09:16:34
#|jhmvin
/*
##########################################################
# Mashed Potato Object Relational Mapping                #
# version 17.03.07                                       #
# College of Information and Communications Technology   #
# Bulacan State University                               #
# Author: Jhon Melvin N. Perello -- BSIT3A-G1            #
#--------------------------------------------------------#
#             >>>>>> POTATO MODELS <<<<<<                #
#      This code is computer generated. Do not modify    #
# use controllers instad.                                #
##########################################################*/

class Remittance {

/*Start Declaration*/
private $trackno_safe;
private $sender_name_safe;
private $sender_contact_safe;
private $rcv_name_safe;
private $rcv_contact_safe;
private $rcv_mail_safe;
private $amount_safe;
private $pickup_safe;
private $date_safe;
private $fee_safe;
private $complete_safe;
private $archive_safe;

/*End Declaration*/

/*Statics*/
private static $con;
private static $instance;
/*End Statics*/


/*Constructor*/
function __construct(){
     self::$con = PotatoConnection::getInstance();
}
/*End Constructor*/

/*SINGLETON*/
static function getInstance(){
     if(!isset(self::$instance)){
          self::$instance = new self();
     }
     return self::$instance;
}
/*End SINGLETON*/

/*Accessors*/
public function getTrackno(){
     return $this->trackno_safe;
}
public function getSender_name(){
     return $this->sender_name_safe;
}
public function getSender_contact(){
     return $this->sender_contact_safe;
}
public function getRcv_name(){
     return $this->rcv_name_safe;
}
public function getRcv_contact(){
     return $this->rcv_contact_safe;
}
public function getRcv_mail(){
     return $this->rcv_mail_safe;
}
public function getAmount(){
     return $this->amount_safe;
}
public function getPickup(){
     return $this->pickup_safe;
}
public function getDate(){
     return $this->date_safe;
}
public function getFee(){
     return $this->fee_safe;
}
public function getComplete(){
     return $this->complete_safe;
}
public function getArchive(){
     return $this->archive_safe;
}
/*End Accessors*/

/*Mutators*/
public function setTrackno($value){
     $this->trackno_safe = $value;
}
public function setSender_name($value){
     $this->sender_name_safe = $value;
}
public function setSender_contact($value){
     $this->sender_contact_safe = $value;
}
public function setRcv_name($value){
     $this->rcv_name_safe = $value;
}
public function setRcv_contact($value){
     $this->rcv_contact_safe = $value;
}
public function setRcv_mail($value){
     $this->rcv_mail_safe = $value;
}
public function setAmount($value){
     $this->amount_safe = $value;
}
public function setPickup($value){
     $this->pickup_safe = $value;
}
public function setDate($value){
     $this->date_safe = $value;
}
public function setFee($value){
     $this->fee_safe = $value;
}
public function setComplete($value){
     $this->complete_safe = $value;
}
public function setArchive($value){
     $this->archive_safe = $value;
}
/*End Mutators*/

/*Reset*/
public function release(){
               $this->trackno_safe = null;
               $this->sender_name_safe = null;
               $this->sender_contact_safe = null;
               $this->rcv_name_safe = null;
               $this->rcv_contact_safe = null;
               $this->rcv_mail_safe = null;
               $this->amount_safe = null;
               $this->pickup_safe = null;
               $this->date_safe = null;
               $this->fee_safe = null;
               $this->complete_safe = null;
               $this->archive_safe = null;
}
/*End Reset*/


/*Retrieve*/
/*Find*/
public function find($keyvalue,$mode){
$key = explode(':',$keyvalue);
$sql = "SELECT * FROM remittance WHERE $key[0] = '$key[1]'";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['trackno'] = $row['trackno'];
               $this->trackno_safe = $row['trackno'];
          $res['sender_name'] = $row['sender_name'];
               $this->sender_name_safe = $row['sender_name'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rcv_name'] = $row['rcv_name'];
               $this->rcv_name_safe = $row['rcv_name'];
          $res['rcv_contact'] = $row['rcv_contact'];
               $this->rcv_contact_safe = $row['rcv_contact'];
          $res['rcv_mail'] = $row['rcv_mail'];
               $this->rcv_mail_safe = $row['rcv_mail'];
          $res['amount'] = $row['amount'];
               $this->amount_safe = $row['amount'];
          $res['pickup'] = $row['pickup'];
               $this->pickup_safe = $row['pickup'];
          $res['date'] = $row['date'];
               $this->date_safe = $row['date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['complete'] = $row['complete'];
               $this->complete_safe = $row['complete'];
          $res['archive'] = $row['archive'];
               $this->archive_safe = $row['archive'];
     $phpobject[] = $res;
     if($mode == 'self'){break;}
     }
if($mode == 'array'){
return $phpobject;
}else if($mode == 'self'){
return true;
     }
}
/*End Find*/


/*WHERE Function*/
public function where($arg1,$condition,$arg2){
     $sql = "SELECT * FROM remittance WHERE $arg1 $condition ?";
     $statement = self::$con->getConnection()->prepare($sql);
     $statement->bind_param("s",$arg2);
     $statement->execute();
     $result = $statement->get_result();
     $phpobject = null;
     while($row = $result->fetch_assoc()){
          $res['trackno'] = $row['trackno'];
               $this->trackno_safe = $row['trackno'];
          $res['sender_name'] = $row['sender_name'];
               $this->sender_name_safe = $row['sender_name'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rcv_name'] = $row['rcv_name'];
               $this->rcv_name_safe = $row['rcv_name'];
          $res['rcv_contact'] = $row['rcv_contact'];
               $this->rcv_contact_safe = $row['rcv_contact'];
          $res['rcv_mail'] = $row['rcv_mail'];
               $this->rcv_mail_safe = $row['rcv_mail'];
          $res['amount'] = $row['amount'];
               $this->amount_safe = $row['amount'];
          $res['pickup'] = $row['pickup'];
               $this->pickup_safe = $row['pickup'];
          $res['date'] = $row['date'];
               $this->date_safe = $row['date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['complete'] = $row['complete'];
               $this->complete_safe = $row['complete'];
          $res['archive'] = $row['archive'];
               $this->archive_safe = $row['archive'];
     $phpobject[] = $res;
     }
return $phpobject;
}
/*End Where*/
/*End Retrieve*/

/*All Function*/
public function all(){
     $sql = "SELECT * FROM remittance";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['trackno'] = $row['trackno'];
               $this->trackno_safe = $row['trackno'];
          $res['sender_name'] = $row['sender_name'];
               $this->sender_name_safe = $row['sender_name'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rcv_name'] = $row['rcv_name'];
               $this->rcv_name_safe = $row['rcv_name'];
          $res['rcv_contact'] = $row['rcv_contact'];
               $this->rcv_contact_safe = $row['rcv_contact'];
          $res['rcv_mail'] = $row['rcv_mail'];
               $this->rcv_mail_safe = $row['rcv_mail'];
          $res['amount'] = $row['amount'];
               $this->amount_safe = $row['amount'];
          $res['pickup'] = $row['pickup'];
               $this->pickup_safe = $row['pickup'];
          $res['date'] = $row['date'];
               $this->date_safe = $row['date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['complete'] = $row['complete'];
               $this->complete_safe = $row['complete'];
          $res['archive'] = $row['archive'];
               $this->archive_safe = $row['archive'];
     $phpobject[] = $res;
     }
return $phpobject;
}
/*End Where*/
/*End Retrieve*/

/*Update*/
public function update($keyvalue){
$key = explode(':',$keyvalue);
$sql = "UPDATE remittance SET ";
$type = "";
     if(!is_null($this->trackno_safe)){$sql .= "trackno = ?,";$values[] = $this->trackno_safe;$type .="s";}
     if(!is_null($this->sender_name_safe)){$sql .= "sender_name = ?,";$values[] = $this->sender_name_safe;$type .="s";}
     if(!is_null($this->sender_contact_safe)){$sql .= "sender_contact = ?,";$values[] = $this->sender_contact_safe;$type .="s";}
     if(!is_null($this->rcv_name_safe)){$sql .= "rcv_name = ?,";$values[] = $this->rcv_name_safe;$type .="s";}
     if(!is_null($this->rcv_contact_safe)){$sql .= "rcv_contact = ?,";$values[] = $this->rcv_contact_safe;$type .="s";}
     if(!is_null($this->rcv_mail_safe)){$sql .= "rcv_mail = ?,";$values[] = $this->rcv_mail_safe;$type .="s";}
     if(!is_null($this->amount_safe)){$sql .= "amount = ?,";$values[] = $this->amount_safe;$type .="s";}
     if(!is_null($this->pickup_safe)){$sql .= "pickup = ?,";$values[] = $this->pickup_safe;$type .="s";}
     if(!is_null($this->date_safe)){$sql .= "date = ?,";$values[] = $this->date_safe;$type .="s";}
     if(!is_null($this->fee_safe)){$sql .= "fee = ?,";$values[] = $this->fee_safe;$type .="s";}
     if(!is_null($this->complete_safe)){$sql .= "complete = ?,";$values[] = $this->complete_safe;$type .="s";}
     if(!is_null($this->archive_safe)){$sql .= "archive = ?,";$values[] = $this->archive_safe;$type .="s";}
     $sql = substr($sql,0,strlen($sql)-1);
     $sql .= " WHERE $key[0] = ?";
          $statement = self::$con->getConnection()->prepare($sql);
          $type .= "s";
          $values[] = $key[1];
          for($v = 0 ; $v < count($values); $v++){$params[] = &$values[$v];}
          call_user_func_array(array($statement, "bind_param"), array_merge(array($type), $params));
          if($statement->execute()){return self::$con->affected_rows();}else{return "error";}
}
/*End Update*/

/*Insert*/
public function insert(){
$sql = "INSERT INTO remittance (";
     if(!is_null($this->trackno_safe)){$sql .= "trackno,";$values[] = $this->trackno_safe;}
     if(!is_null($this->sender_name_safe)){$sql .= "sender_name,";$values[] = $this->sender_name_safe;}
     if(!is_null($this->sender_contact_safe)){$sql .= "sender_contact,";$values[] = $this->sender_contact_safe;}
     if(!is_null($this->rcv_name_safe)){$sql .= "rcv_name,";$values[] = $this->rcv_name_safe;}
     if(!is_null($this->rcv_contact_safe)){$sql .= "rcv_contact,";$values[] = $this->rcv_contact_safe;}
     if(!is_null($this->rcv_mail_safe)){$sql .= "rcv_mail,";$values[] = $this->rcv_mail_safe;}
     if(!is_null($this->amount_safe)){$sql .= "amount,";$values[] = $this->amount_safe;}
     if(!is_null($this->pickup_safe)){$sql .= "pickup,";$values[] = $this->pickup_safe;}
     if(!is_null($this->date_safe)){$sql .= "date,";$values[] = $this->date_safe;}
     if(!is_null($this->fee_safe)){$sql .= "fee,";$values[] = $this->fee_safe;}
     if(!is_null($this->complete_safe)){$sql .= "complete,";$values[] = $this->complete_safe;}
     if(!is_null($this->archive_safe)){$sql .= "archive,";$values[] = $this->archive_safe;}
     $sql = substr($sql,0,strlen($sql)-1);
     $sql .= ") values (";
     $type = "";
     for($v = 0 ; $v < count($values); $v++){$sql .= "?,";$type .= "s";}
     $sql = substr($sql,0,strlen($sql)-1);
     $sql .= ")";
     for($v = 0 ; $v < count($values); $v++){$params[] = &$values[$v];}
     $statement = self::$con->getConnection()->prepare($sql);
     call_user_func_array(array($statement, "bind_param"), array_merge(array($type), $params));
     if($statement->execute()){
          if(isset($this->trackno_safe)){
               return 1;}
          else{
               return self::$con->last_id();}
          }else{return 0;}
}
/*End Insert*/
/*
##########################################################
#             >>>>>> POTATO MODELS <<<<<<                #
#      This code is computer generated. Do not modify    #
# use controllers instad.                                #
##########################################################*/


}?>
