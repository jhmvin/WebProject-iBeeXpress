<?php
@session_start();
require_once 'potato.router.php';
require_once 'potato.env.php';
class Auth{
//default views
private static $default = DENIED;
private static $grant = GRANT;
//########################################################



public static function noview(){
	if(@$_SESSION['_auth_state'] == 1){
		
	}else{
		header("location: rdr.php?rdr=" . DENIED);
		exit();
	}
}

public static function verifycover(){
	if(@$_SESSION['_auth_state'] == 1){
		header("location: rdr.php?rdr=" . GRANT);
		exit();
	}else{
		
	}
}

public static function id(){
	return $_SESSION['_auth_id'];
}
public static function user(){
	return $_SESSION['_auth_user'];
}
public static function name(){
	return $_SESSION['_auth_name'];
}
public static function role(){
	return $_SESSION['_auth_role'];
}
public static function state(){
	return $_SESSION['_auth_state'];
}
//
public static function login($id, $user, $name, $role, $state){
	$_SESSION['_auth_id'] = $id;
	$_SESSION['_auth_user'] = $user;
	$_SESSION['_auth_name'] = $name;
	$_SESSION['_auth_role'] = $role;
	$_SESSION['_auth_state'] = $state;
}

public static function logout(){
	unset($_SESSION['_auth_id']);
	unset($_SESSION['_auth_user']);
	unset($_SESSION['_auth_name']);
	unset($_SESSION['_auth_role']);
	unset($_SESSION['_auth_state']);
	unset($_SESSION['_auth_pages']);
}
	
}
?>