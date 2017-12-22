<?php require '../potato.connection.php';
#|Date Created: 2017-04-30 08:21:31
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

class Staff {

/*Start Declaration*/
private $id_safe;
private $user_safe;
private $pass_safe;
private $name_safe;
private $role_safe;
private $state_safe;

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
public function getId(){
     return $this->id_safe;
}
public function getUser(){
     return $this->user_safe;
}
public function getPass(){
     return $this->pass_safe;
}
public function getName(){
     return $this->name_safe;
}
public function getRole(){
     return $this->role_safe;
}
public function getState(){
     return $this->state_safe;
}
/*End Accessors*/

/*Mutators*/
public function setId($value){
     $this->id_safe = $value;
}
public function setUser($value){
     $this->user_safe = $value;
}
public function setPass($value){
     $this->pass_safe = $value;
}
public function setName($value){
     $this->name_safe = $value;
}
public function setRole($value){
     $this->role_safe = $value;
}
public function setState($value){
     $this->state_safe = $value;
}
/*End Mutators*/

/*Reset*/
public function release(){
               $this->id_safe = null;
               $this->user_safe = null;
               $this->pass_safe = null;
               $this->name_safe = null;
               $this->role_safe = null;
               $this->state_safe = null;
}
/*End Reset*/


/*Retrieve*/
/*Find*/
public function find($keyvalue,$mode){
$key = explode(':',$keyvalue);
$sql = "SELECT * FROM staff WHERE $key[0] = '$key[1]'";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['id'] = $row['id'];
               $this->id_safe = $row['id'];
          $res['user'] = $row['user'];
               $this->user_safe = $row['user'];
          $res['pass'] = $row['pass'];
               $this->pass_safe = $row['pass'];
          $res['name'] = $row['name'];
               $this->name_safe = $row['name'];
          $res['role'] = $row['role'];
               $this->role_safe = $row['role'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
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
     $sql = "SELECT * FROM staff WHERE $arg1 $condition ?";
     $statement = self::$con->getConnection()->prepare($sql);
     $statement->bind_param("s",$arg2);
     $statement->execute();
     $result = $statement->get_result();
	 $phpobject = null;
     while($row = $result->fetch_assoc()){
          $res['id'] = $row['id'];
               $this->id_safe = $row['id'];
          $res['user'] = $row['user'];
               $this->user_safe = $row['user'];
          $res['pass'] = $row['pass'];
               $this->pass_safe = $row['pass'];
          $res['name'] = $row['name'];
               $this->name_safe = $row['name'];
          $res['role'] = $row['role'];
               $this->role_safe = $row['role'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
     $phpobject[] = $res;
     }
return $phpobject;
}
/*End Where*/
/*End Retrieve*/

/*All Function*/
public function all(){
     $sql = "SELECT * FROM staff";
$result = self::$con->query($sql);
     while($row = $result->fetch_assoc()){
          $res['id'] = $row['id'];
               $this->id_safe = $row['id'];
          $res['user'] = $row['user'];
               $this->user_safe = $row['user'];
          $res['pass'] = $row['pass'];
               $this->pass_safe = $row['pass'];
          $res['name'] = $row['name'];
               $this->name_safe = $row['name'];
          $res['role'] = $row['role'];
               $this->role_safe = $row['role'];
          $res['state'] = $row['state'];
               $this->state_safe = $row['state'];
     $phpobject[] = $res;
     }
return $phpobject;
}
/*End Where*/
/*End Retrieve*/

/*Update*/
public function update($keyvalue){
$key = explode(':',$keyvalue);
$sql = "UPDATE staff SET ";
$type = "";
     if(!is_null($this->id_safe)){$sql .= "id = ?,";$values[] = $this->id_safe;$type .="s";}
     if(!is_null($this->user_safe)){$sql .= "user = ?,";$values[] = $this->user_safe;$type .="s";}
     if(!is_null($this->pass_safe)){$sql .= "pass = ?,";$values[] = $this->pass_safe;$type .="s";}
     if(!is_null($this->name_safe)){$sql .= "name = ?,";$values[] = $this->name_safe;$type .="s";}
     if(!is_null($this->role_safe)){$sql .= "role = ?,";$values[] = $this->role_safe;$type .="s";}
     if(!is_null($this->state_safe)){$sql .= "state = ?,";$values[] = $this->state_safe;$type .="s";}
     $sql = substr($sql,0,strlen($sql)-1);
     $sql .= " WHERE $key[0] = ?";
          $statement = self::$con->getConnection()->prepare($sql);
          $type .= "s";
          $values[] = $key[1];
          for($v = 0 ; $v < count($values); $v++){$params[] = &$values[$v];}
          call_user_func_array(array($statement, "bind_param"), array_merge(array($type), $params));
          if($statement->execute()){return self::$con->affected_rows();}else{return -1;}
}
/*End Update*/

/*Insert*/
public function insert(){
$sql = "INSERT INTO staff (";
     if(!is_null($this->id_safe)){$sql .= "id,";$values[] = $this->id_safe;}
     if(!is_null($this->user_safe)){$sql .= "user,";$values[] = $this->user_safe;}
     if(!is_null($this->pass_safe)){$sql .= "pass,";$values[] = $this->pass_safe;}
     if(!is_null($this->name_safe)){$sql .= "name,";$values[] = $this->name_safe;}
     if(!is_null($this->role_safe)){$sql .= "role,";$values[] = $this->role_safe;}
     if(!is_null($this->state_safe)){$sql .= "state,";$values[] = $this->state_safe;}
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
          if(isset($this->id_safe)){
               return 1;}
          else{
               return self::$con->last_id();}
          }else{return 0;}
}
/*End Insert*/

/* custom code */
public function remove($id){
     $sql = "DELETE FROM staff WHERE id = ".$id;
	 if(self::$con->query($sql)){
		return 1;
	 }else{
		 return 0;
	 }

}
/* end custom code */

/*
##########################################################
#             >>>>>> POTATO MODELS <<<<<<                #
#      This code is computer generated. Do not modify    #
# use controllers instad.                                #
##########################################################*/


}?>