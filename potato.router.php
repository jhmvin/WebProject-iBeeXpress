<?php
class Route{
	
private static $home = HOME."/";

public static function get($route,$get){
	$ref = self::$home.$route.".php?";
	$vars = explode(':',$get);
	for($x = 0 ; $x < count($vars) ; $x++){
		if($x == (count($vars)-1)){
			$ref .= $vars[$x];
			break;
		}else{
			$ref .= $vars[$x]."&";
		}
	}
	header("location:".$ref);
}

public static function getview($route,$get){
	$ref = self::$home."view/".$route.".php?";
	$vars = explode(':',$get);
	for($x = 0 ; $x < count($vars) ; $x++){
		if($x == (count($vars)-1)){
			$ref .= $vars[$x];
			break;
		}else{
			$ref .= $vars[$x]."&";
		}
	}
	header("location:".$ref);
}

public static function postview($route){
	$ref = self::$home."view/".$route.".php?";
	header("location:".$ref);
}

public static function getctrl($route,$get){
	$ref = self::$home."controller/".$route.".php?";
	$vars = explode(':',$get);
	for($x = 0 ; $x < count($vars) ; $x++){
		if($x == (count($vars)-1)){
			$ref .= $vars[$x];
			break;
		}else{
			$ref .= $vars[$x]."&";
		}
	}
	header("location:".$ref);
}

public static function postctrl($route){
	$ref = self::$home."controller/".$route.".php?";
	header("location:".$ref);
}
	
}
?>