<?php
###################################
# SQL Connection PHP Class   	  #
# Version : 1.0.0				  #
# Author: jhmvin				  #
# Date : 01-28-2017				  #
###################################
require_once 'potato.env.php';
class PotatoConnection{
	private static $instance;
	private $connection;
	
	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new self();
			return self::$instance;
		}
	}
	
	function __construct(){
		if($this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)){
			
		}else{
			
		}
	}

	public function getConnection(){
		return $this->connection;
	}
	
	public function query($query){
		$result = $this->connection->query($query);
		return $result;
	}
	
	public function last_id(){
		return $this->connection->insert_id;
	}
	
	public function affected_rows(){
		return $this->connection->affected_rows;
	}
	
}
?>