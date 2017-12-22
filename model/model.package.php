<?php require '../potato.connection.php';
#|Date Created: 2017-05-17 07:17:03
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

class Package {

/*Start Declaration*/
private $trackno_safe;
private $sender_name_safe;
private $sender_address_safe;
private $sender_email_safe;
private $sender_contact_safe;
private $rec_name_safe;
private $rec_address_safe;
private $rec_email_safe;
private $rec_contact_safe;
private $origin_safe;
private $destination_safe;
private $size_safe;
private $value_safe;
private $dispatch_safe;
private $delivery_date_safe;
private $fee_safe;
private $state_safe;
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
public function getSender_address(){
     return $this->sender_address_safe;
}
public function getSender_email(){
     return $this->sender_email_safe;
}
public function getSender_contact(){
     return $this->sender_contact_safe;
}
public function getRec_name(){
     return $this->rec_name_safe;
}
public function getRec_address(){
     return $this->rec_address_safe;
}
public function getRec_email(){
     return $this->rec_email_safe;
}
public function getRec_contact(){
     return $this->rec_contact_safe;
}
public function getOrigin(){
     return $this->origin_safe;
}
public function getDestination(){
     return $this->destination_safe;
}
public function getSize(){
     return $this->size_safe;
}
public function getValue(){
     return $this->value_safe;
}
public function getDispatch(){
     return $this->dispatch_safe;
}
public function getDelivery_date(){
     return $this->delivery_date_safe;
}
public function getFee(){
     return $this->fee_safe;
}
public function getState(){
     return $this->state_safe;
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
public function setSender_address($value){
     $this->sender_address_safe = $value;
}
public function setSender_email($value){
     $this->sender_email_safe = $value;
}
public function setSender_contact($value){
     $this->sender_contact_safe = $value;
}
public function setRec_name($value){
     $this->rec_name_safe = $value;
}
public function setRec_address($value){
     $this->rec_address_safe = $value;
}
public function setRec_email($value){
     $this->rec_email_safe = $value;
}
public function setRec_contact($value){
     $this->rec_contact_safe = $value;
}
public function setOrigin($value){
     $this->origin_safe = $value;
}
public function setDestination($value){
     $this->destination_safe = $value;
}
public function setSize($value){
     $this->size_safe = $value;
}
public function setValue($value){
     $this->value_safe = $value;
}
public function setDispatch($value){
     $this->dispatch_safe = $value;
}
public function setDelivery_date($value){
     $this->delivery_date_safe = $value;
}
public function setFee($value){
     $this->fee_safe = $value;
}
public function setState($value){
     $this->state_safe = $value;
}
public function setArchive($value){
     $this->archive_safe = $value;
}
/*End Mutators*/

/*Reset*/
public function release(){
               $this->trackno_safe = null;
               $this->sender_name_safe = null;
               $this->sender_address_safe = null;
               $this->sender_email_safe = null;
               $this->sender_contact_safe = null;
               $this->rec_name_safe = null;
               $this->rec_address_safe = null;
               $this->rec_email_safe = null;
               $this->rec_contact_safe = null;
               $this->origin_safe = null;
               $this->destination_safe = null;
               $this->size_safe = null;
               $this->value_safe = null;
               $this->dispatch_safe = null;
               $this->delivery_date_safe = null;
               $this->fee_safe = null;
               $this->state_safe = null;
               $this->archive_safe = null;
}
/*End Reset*/


/*Retrieve*/
/*Find*/
public function find($keyvalue,$mode){
$key = explode(':',$keyvalue);
$sql = "SELECT * FROM package WHERE $key[0] = '$key[1]'";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['trackno'] = $row['trackno'];
               $this->trackno_safe = $row['trackno'];
          $res['sender_name'] = $row['sender_name'];
               $this->sender_name_safe = $row['sender_name'];
          $res['sender_address'] = $row['sender_address'];
               $this->sender_address_safe = $row['sender_address'];
          $res['sender_email'] = $row['sender_email'];
               $this->sender_email_safe = $row['sender_email'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rec_name'] = $row['rec_name'];
               $this->rec_name_safe = $row['rec_name'];
          $res['rec_address'] = $row['rec_address'];
               $this->rec_address_safe = $row['rec_address'];
          $res['rec_email'] = $row['rec_email'];
               $this->rec_email_safe = $row['rec_email'];
          $res['rec_contact'] = $row['rec_contact'];
               $this->rec_contact_safe = $row['rec_contact'];
          $res['origin'] = $row['origin'];
               $this->origin_safe = $row['origin'];
          $res['destination'] = $row['destination'];
               $this->destination_safe = $row['destination'];
          $res['size'] = $row['size'];
               $this->size_safe = $row['size'];
          $res['value'] = $row['value'];
               $this->value_safe = $row['value'];
          $res['dispatch'] = $row['dispatch'];
               $this->dispatch_safe = $row['dispatch'];
          $res['delivery_date'] = $row['delivery_date'];
               $this->delivery_date_safe = $row['delivery_date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
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
     $sql = "SELECT * FROM package WHERE $arg1 $condition ?";
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
          $res['sender_address'] = $row['sender_address'];
               $this->sender_address_safe = $row['sender_address'];
          $res['sender_email'] = $row['sender_email'];
               $this->sender_email_safe = $row['sender_email'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rec_name'] = $row['rec_name'];
               $this->rec_name_safe = $row['rec_name'];
          $res['rec_address'] = $row['rec_address'];
               $this->rec_address_safe = $row['rec_address'];
          $res['rec_email'] = $row['rec_email'];
               $this->rec_email_safe = $row['rec_email'];
          $res['rec_contact'] = $row['rec_contact'];
               $this->rec_contact_safe = $row['rec_contact'];
          $res['origin'] = $row['origin'];
               $this->origin_safe = $row['origin'];
          $res['destination'] = $row['destination'];
               $this->destination_safe = $row['destination'];
          $res['size'] = $row['size'];
               $this->size_safe = $row['size'];
          $res['value'] = $row['value'];
               $this->value_safe = $row['value'];
          $res['dispatch'] = $row['dispatch'];
               $this->dispatch_safe = $row['dispatch'];
          $res['delivery_date'] = $row['delivery_date'];
               $this->delivery_date_safe = $row['delivery_date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
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
     $sql = "SELECT * FROM package";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['trackno'] = $row['trackno'];
               $this->trackno_safe = $row['trackno'];
          $res['sender_name'] = $row['sender_name'];
               $this->sender_name_safe = $row['sender_name'];
          $res['sender_address'] = $row['sender_address'];
               $this->sender_address_safe = $row['sender_address'];
          $res['sender_email'] = $row['sender_email'];
               $this->sender_email_safe = $row['sender_email'];
          $res['sender_contact'] = $row['sender_contact'];
               $this->sender_contact_safe = $row['sender_contact'];
          $res['rec_name'] = $row['rec_name'];
               $this->rec_name_safe = $row['rec_name'];
          $res['rec_address'] = $row['rec_address'];
               $this->rec_address_safe = $row['rec_address'];
          $res['rec_email'] = $row['rec_email'];
               $this->rec_email_safe = $row['rec_email'];
          $res['rec_contact'] = $row['rec_contact'];
               $this->rec_contact_safe = $row['rec_contact'];
          $res['origin'] = $row['origin'];
               $this->origin_safe = $row['origin'];
          $res['destination'] = $row['destination'];
               $this->destination_safe = $row['destination'];
          $res['size'] = $row['size'];
               $this->size_safe = $row['size'];
          $res['value'] = $row['value'];
               $this->value_safe = $row['value'];
          $res['dispatch'] = $row['dispatch'];
               $this->dispatch_safe = $row['dispatch'];
          $res['delivery_date'] = $row['delivery_date'];
               $this->delivery_date_safe = $row['delivery_date'];
          $res['fee'] = $row['fee'];
               $this->fee_safe = $row['fee'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
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
$sql = "UPDATE package SET ";
$type = "";
     if(!is_null($this->trackno_safe)){$sql .= "trackno = ?,";$values[] = $this->trackno_safe;$type .="s";}
     if(!is_null($this->sender_name_safe)){$sql .= "sender_name = ?,";$values[] = $this->sender_name_safe;$type .="s";}
     if(!is_null($this->sender_address_safe)){$sql .= "sender_address = ?,";$values[] = $this->sender_address_safe;$type .="s";}
     if(!is_null($this->sender_email_safe)){$sql .= "sender_email = ?,";$values[] = $this->sender_email_safe;$type .="s";}
     if(!is_null($this->sender_contact_safe)){$sql .= "sender_contact = ?,";$values[] = $this->sender_contact_safe;$type .="s";}
     if(!is_null($this->rec_name_safe)){$sql .= "rec_name = ?,";$values[] = $this->rec_name_safe;$type .="s";}
     if(!is_null($this->rec_address_safe)){$sql .= "rec_address = ?,";$values[] = $this->rec_address_safe;$type .="s";}
     if(!is_null($this->rec_email_safe)){$sql .= "rec_email = ?,";$values[] = $this->rec_email_safe;$type .="s";}
     if(!is_null($this->rec_contact_safe)){$sql .= "rec_contact = ?,";$values[] = $this->rec_contact_safe;$type .="s";}
     if(!is_null($this->origin_safe)){$sql .= "origin = ?,";$values[] = $this->origin_safe;$type .="s";}
     if(!is_null($this->destination_safe)){$sql .= "destination = ?,";$values[] = $this->destination_safe;$type .="s";}
     if(!is_null($this->size_safe)){$sql .= "size = ?,";$values[] = $this->size_safe;$type .="s";}
     if(!is_null($this->value_safe)){$sql .= "value = ?,";$values[] = $this->value_safe;$type .="s";}
     if(!is_null($this->dispatch_safe)){$sql .= "dispatch = ?,";$values[] = $this->dispatch_safe;$type .="s";}
     if(!is_null($this->delivery_date_safe)){$sql .= "delivery_date = ?,";$values[] = $this->delivery_date_safe;$type .="s";}
     if(!is_null($this->fee_safe)){$sql .= "fee = ?,";$values[] = $this->fee_safe;$type .="s";}
     if(!is_null($this->state_safe)){$sql .= "state = ?,";$values[] = $this->state_safe;$type .="s";}
     if(!is_null($this->archive_safe)){$sql .= "archive = ?,";$values[] = $this->archive_safe;$type .="s";}
     $sql = substr($sql,0,strlen($sql)-1);
     $sql .= " WHERE $key[0] = ?";
          $statement = self::$con->getConnection()->prepare($sql);
          $type .= "s";
          $values[] = $key[1];
          for($v = 0 ; $v < count($values); $v++){$params[] = &$values[$v];}
          call_user_func_array(array($statement, "bind_param"), array_merge(array($type), $params));
          if($statement->execute()){return self::$con->affected_rows();}else{return false;}
}
/*End Update*/

/*Insert*/
public function insert(){
$sql = "INSERT INTO package (";
     if(!is_null($this->trackno_safe)){$sql .= "trackno,";$values[] = $this->trackno_safe;}
     if(!is_null($this->sender_name_safe)){$sql .= "sender_name,";$values[] = $this->sender_name_safe;}
     if(!is_null($this->sender_address_safe)){$sql .= "sender_address,";$values[] = $this->sender_address_safe;}
     if(!is_null($this->sender_email_safe)){$sql .= "sender_email,";$values[] = $this->sender_email_safe;}
     if(!is_null($this->sender_contact_safe)){$sql .= "sender_contact,";$values[] = $this->sender_contact_safe;}
     if(!is_null($this->rec_name_safe)){$sql .= "rec_name,";$values[] = $this->rec_name_safe;}
     if(!is_null($this->rec_address_safe)){$sql .= "rec_address,";$values[] = $this->rec_address_safe;}
     if(!is_null($this->rec_email_safe)){$sql .= "rec_email,";$values[] = $this->rec_email_safe;}
     if(!is_null($this->rec_contact_safe)){$sql .= "rec_contact,";$values[] = $this->rec_contact_safe;}
     if(!is_null($this->origin_safe)){$sql .= "origin,";$values[] = $this->origin_safe;}
     if(!is_null($this->destination_safe)){$sql .= "destination,";$values[] = $this->destination_safe;}
     if(!is_null($this->size_safe)){$sql .= "size,";$values[] = $this->size_safe;}
     if(!is_null($this->value_safe)){$sql .= "value,";$values[] = $this->value_safe;}
     if(!is_null($this->dispatch_safe)){$sql .= "dispatch,";$values[] = $this->dispatch_safe;}
     if(!is_null($this->delivery_date_safe)){$sql .= "delivery_date,";$values[] = $this->delivery_date_safe;}
     if(!is_null($this->fee_safe)){$sql .= "fee,";$values[] = $this->fee_safe;}
     if(!is_null($this->state_safe)){$sql .= "state,";$values[] = $this->state_safe;}
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
