<?php
/*
#############################################################
#           Mashed Potato PHP Framework Project		     	#
#-----------------------------------------------------------#
#   College of Information and Communications Technology 	#
# 			   Bulacan State University Malolos				#
#-----------------------------------------------------------#
# Author : Jhon Melvin N. Perello	--  BSIT3A-G1			#
# Date   : January 28,2017									#
# Version: 17.03.07											#
#-----------------------------------------------------------#
#	Features:					 							#
#		*Graphical User Interface			 				#
#		*Potato Connection					 				#
#		*Prepared Statements			 					#
#		*Potato Models						 				#
#		*Potato Views						 				#
#		*Potato Controllers						 			#
#		*Singleton Implementation						 	#
#		*MVC Implementation						 			#
#############################################################*/
require_once 'potato.connection.php';
require_once 'potato.env.php';

class PotatoModel{
	private $table;
	private $class_name;
	private $output = "";
	private $dc;
	
	private $fields_pre = [];
	private $fields = [];
	private $fields_safe = [];
	
	protected $nl = NL;
	protected $tab = TAB;
	
	function __construct($tbl_name){
		$this->dc = PotatoConnection::getInstance();
		$this->class_name = ucwords($this->unprefix($tbl_name));
		$this->table = $tbl_name;
		
		$this->output .= "&lt?php require 'potato.connection.php';".$this->nl;
		$this->details();
		$this->getFields();
		$this->createInit();
		$this->createConstruct();
		$this->createStatics();
		$this->createGet();
		$this->createSet();
		$this->createReset();
		$this->createRetrieve();
		$this->createUpdate();
		$this->createInsert();
		
		$this->footer();
		
		$this->output .= $this->nl."}?&gt".$this->nl;
		
		echo $this->output;
	}
	
	function unprefix($field){
		if(strpos($field,'_')){
			//$mark_position = strpos($field,'_') + 1;
			//return substr($field,$mark_position,strlen($field)-$mark_position);
			return ($field);
		}else{
			return ($field);
		}
		
	}
	
	function details(){
		$dt = new DateTime();
		$cache = "#|Date Created: ".$dt->format('Y-m-d H:i:s'). $this->nl;
		$cache .= "#|jhmvin". $this->nl;
		$cache .= "<pre>/*". $this->nl;
		$cache .= "##########################################################" . $this->nl;
		$cache .= "# Mashed Potato Object Relational Mapping                #" . $this->nl;
		$cache .= "# version 17.03.07                                       #" . $this->nl;
		$cache .= "# College of Information and Communications Technology   #" . $this->nl;
		$cache .= "# Bulacan State University                               #" . $this->nl;
		$cache .= "# Author: Jhon Melvin N. Perello -- BSIT3A-G1            #" . $this->nl;
		$cache .= "#--------------------------------------------------------#" . $this->nl;
		$cache .= "#             >>>>>> POTATO MODELS <<<<<<                #" . $this->nl;
		$cache .= "#      This code is computer generated. Do not modify    #" . $this->nl;
		$cache .= "# use controllers instad.                                #" . $this->nl;
		$cache .= "##########################################################*/</pre>" . $this->nl;

		$this->output .= $cache;
	}
	
	//core
	
	function getFields(){
		$cache = "";
		$sql = "show columns from $this->table";
		$result = $this->dc->query($sql);
		$cache = "class $this->class_name {". $this->nl. $this->nl;
		
		$cache .= "/*Start Declaration*/" .$this->nl;
		while($row = $result->fetch_assoc()){
			$this->fields_pre[] = $row['Field'];
			$this->fields[] = $this->unprefix($row['Field']);
			$cache .= 'private &#36'.($this->fields_safe[] = $this->unprefix($row['Field']) . '_safe'). ';';
			$cache .= $this->nl;
		}
		
		$cache .= $this->nl."/*End Declaration*/";
		$this->output .= $cache;
	}
	
	function createInit(){
		$cache = "". $this->nl. $this->nl;
		
		$cache .= "/*Statics*/" . $this->nl;
		$cache .= "private static &#36con;" . $this->nl;
		$cache .= "private static &#36instance;" . $this->nl;
		$cache .= "/*End Statics*/" . $this->nl;

		$this->output .= $cache;
	}
	
	
	
	function createConstruct(){
		$cache = "". $this->nl. $this->nl;
		
		$cache .= "/*Constructor*/" . $this->nl;
			$cache .= "function __construct(){". $this->nl;
			$cache .= $this->tab."self::&#36con = PotatoConnection::getInstance();" . $this->nl;
			$cache .= "}" . $this->nl;
		$cache .= "/*End Constructor*/";
		$this->output .= $cache;
	}
	
	function createStatics(){
		$cache = "". $this->nl. $this->nl;
		
		$cache .= "/*SINGLETON*/" . $this->nl;
			$cache .= "static function getInstance(){". $this->nl;
			$cache .= $this->tab."if(!isset(self::&#36instance)){" . $this->nl;
			$cache .= $this->tab.$this->tab."self::&#36instance = new self();" . $this->nl;
			$cache .= $this->tab."}" . $this->nl;
			$cache .= $this->tab."return self::&#36instance;" . $this->nl;
			$cache .= "}" . $this->nl;
		$cache .= "/*End SINGLETON*/";
		$this->output .= $cache;
	}
	
	function createGet(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Accessors*/" . $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
			$cache .= "public function get".ucwords($this->fields[$x]) ."(){".$this->nl;
			$cache .= $this->tab."return &#36this->".$this->fields_safe[$x]. ";".$this->nl;
			$cache .= "}" . $this->nl;
		}
		$cache .= "/*End Accessors*/";
		$this->output .= $cache;
	}
	
	function createSet(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Mutators*/" . $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
			$cache .= "public function set".ucwords($this->fields[$x]) ."(&#36value){".$this->nl;
			$cache .= $this->tab."&#36this->".$this->fields_safe[$x] . " = &#36value;".$this->nl;
			$cache .= "}" . $this->nl;
		}
		$cache .= "/*End Mutators*/";
		$this->output .= $cache;
	}
	
	//CORE CRUD FUNCTIONS
	function createReset(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Reset*/" . $this->nl;
		$cache .= "public function release(){" . $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
			$cache.= $this->tab.$this->tab.$this->tab."&#36this->".$this->fields_safe[$x]." = null;".$this->nl;
		}
		$cache .= "}" . $this->nl;
		$cache .= "/*End Reset*/" . $this->nl;
		$this->output .= $cache;
	}
	
	function createRetrieve(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Retrieve*/" . $this->nl;
		
		$cache .= "/*Find*/" . $this->nl;
		$cache .= "public function find(&#36keyvalue,&#36mode){" . $this->nl;
		$cache .= "&#36key = explode(':',&#36keyvalue);" . $this->nl;
		$cache .= "&#36sql = \"SELECT * FROM $this->table WHERE &#36key[0] = '&#36key[1]'\";" . $this->nl;
		$cache .= "&#36result = self::&#36con->query(&#36sql);" . $this->nl;
		
		$cache .= $this->tab."while(&#36row = &#36result->fetch_assoc()){" . $this->nl;
		
		for($x = 0 ; $x < count($this->fields) ; $x++){
		//
			$cache.= $this->tab.$this->tab."&#36res['".$this->fields[$x]."'] = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
			
			$cache.= $this->tab.$this->tab.$this->tab."&#36this->".$this->fields_safe[$x]." = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
		}
		$cache .= $this->tab."&#36phpobject[] = &#36res;" . $this->nl;
		$cache .= $this->tab."if(&#36mode == 'self'){break;}" . $this->nl;
		$cache .= $this->tab."}" . $this->nl;
		//
		$cache .= "if(&#36mode == 'array'){" . $this->nl;
		$cache .= "return &#36phpobject;" . $this->nl;
		$cache .= "}else if(&#36mode == 'self'){" . $this->nl;
		$cache .= "return true;" . $this->nl;
		$cache .= $this->tab."}" . $this->nl;
		$cache .= "}" . $this->nl;
		$cache .= "/*End Find*/" . $this->nl;
		
		$cache.= $this->nl;
		$cache.= $this->nl;
		
		//where function
		$cache .= "/*WHERE Function*/". $this->nl;
		$cache .= "public function where(&#36arg1,&#36condition,&#36arg2){" . $this->nl;
		$cache .= $this->tab."&#36sql = \"SELECT * FROM $this->table WHERE &#36arg1 &#36condition ?\";" . $this->nl;
		$cache .= $this->tab."&#36statement = self::&#36con->getConnection()->prepare(&#36sql);". $this->nl;
		$cache .= $this->tab."&#36statement->bind_param(\"s\",&#36arg2);". $this->nl;
		$cache .= $this->tab."&#36statement->execute();". $this->nl;
		$cache .= $this->tab."&#36result = &#36statement->get_result();". $this->nl;
		//loop
		$cache .= $this->tab."while(&#36row = &#36result->fetch_assoc()){" . $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
		//
			$cache.= $this->tab.$this->tab."&#36res['".$this->fields[$x]."'] = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
			
			$cache.= $this->tab.$this->tab.$this->tab."&#36this->".$this->fields_safe[$x]." = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
		}
		$cache .= $this->tab."&#36phpobject[] = &#36res;" . $this->nl;
		$cache .= $this->tab."}" . $this->nl;
		//end loop
		$cache .= "return &#36phpobject;" . $this->nl;
		$cache .= "}" . $this->nl;
		$cache .= "/*End Where*/". $this->nl;
		$cache .= "/*End Retrieve*/".$this->nl.$this->nl;
		
		//all
		$cache .= "/*All Function*/". $this->nl;
		$cache .= "public function all(){" . $this->nl;
		$cache .= $this->tab."&#36sql = \"SELECT * FROM $this->table\";" . $this->nl;
		$cache .= "&#36result = self::&#36con->query(&#36sql);" . $this->nl;
		
		//loop
		$cache .= $this->tab."while(&#36row = &#36result->fetch_assoc()){" . $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
		//
			$cache.= $this->tab.$this->tab."&#36res['".$this->fields[$x]."'] = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
			
			$cache.= $this->tab.$this->tab.$this->tab."&#36this->".$this->fields_safe[$x]." = &#36row['".$this->fields_pre[$x]."'];".$this->nl;
		}
		$cache .= $this->tab."&#36phpobject[] = &#36res;" . $this->nl;
		$cache .= $this->tab."}" . $this->nl;
		//end loop
		$cache .= "return &#36phpobject;" . $this->nl;
		$cache .= "}" . $this->nl;
		$cache .= "/*End Where*/". $this->nl;
		$cache .= "/*End Retrieve*/";
		
		
		$this->output .= $cache;
	}
	
	function createUpdate(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Update*/" . $this->nl;
		
		$cache .= "public function update(&#36keyvalue){" . $this->nl;
		$cache .= "&#36key = explode(':',&#36keyvalue);" . $this->nl;
		
		$cache .= "&#36sql = \"UPDATE $this->table SET \";". $this->nl;
		$cache .= "&#36type = \"\";". $this->nl;
		for($x = 0 ; $x < count($this->fields) ; $x++){
			$cache .= $this->tab."if(!is_null(&#36this->".$this->fields_safe[$x].")){&#36sql .= \"".$this->fields_pre[$x]." = ?,\";&#36values[] = &#36this->".$this->fields_safe[$x].";&#36type .=\"s\";}". $this->nl;
		}
		$cache .= $this->tab."&#36sql = substr(&#36sql,0,strlen(&#36sql)-1);". $this->nl;
		
		$cache .= $this->tab."&#36sql .= \" WHERE &#36key[0] = ?\";" . $this->nl;
		
		//prepare statements
		$cache .= $this->tab.$this->tab."&#36statement = self::&#36con->getConnection()->prepare(&#36sql);". $this->nl;
		
		$cache .= $this->tab.$this->tab."&#36type .= \"s\";" . $this->nl;
		$cache .= $this->tab.$this->tab."&#36values[] = &#36key[1];" . $this->nl;
		$cache .= $this->tab.$this->tab."for(&#36v = 0 ; &#36v < count(&#36values); &#36v++){&#36params[] = &&#36values[&#36v];}" . $this->nl;
		$cache .= $this->tab.$this->tab."call_user_func_array(array(&#36statement, \"bind_param\"), array_merge(array(&#36type), &#36params));". $this->nl;
		$cache .= $this->tab.$this->tab."if(&#36statement->execute()){return self::&#36con->affected_rows();}else{return false;}". $this->nl;
		
		$cache .= "}" . $this->nl;
		$cache .= "/*End Update*/";
		
		$this->output .= $cache;
	}
	
	function createInsert(){
		$cache = "". $this->nl. $this->nl;
		$cache .= "/*Insert*/" . $this->nl;
		$cache .= "public function insert(){" . $this->nl;
		$cache .= "&#36sql = \"INSERT INTO $this->table (\";". $this->nl;
		
		for($x = 0 ; $x < count($this->fields) ; $x++){
			$cache .= $this->tab."if(!is_null(&#36this->".$this->fields_safe[$x].")){&#36sql .= \"".$this->fields_pre[$x].",\";&#36values[] = &#36this->".$this->fields_safe[$x].";}". $this->nl;
		}
		$cache .= $this->tab."&#36sql = substr(&#36sql,0,strlen(&#36sql)-1);". $this->nl;
		$cache .= $this->tab."&#36sql .= \") values (\";". $this->nl;
		//$cache .= $this->tab."for(&#36v = 0 ; &#36v < count(&#36values); &#36v++){&#36sql .= \"'\".&#36values[&#36v].\"',\";}". $this->nl;
		$cache .= $this->tab."&#36type = \"\";".$this->nl;
		$cache .= $this->tab."for(&#36v = 0 ; &#36v < count(&#36values); &#36v++){&#36sql .= \"?,\";&#36type .= \"s\";}". $this->nl;
		$cache .= $this->tab."&#36sql = substr(&#36sql,0,strlen(&#36sql)-1);". $this->nl;
		$cache .= $this->tab."&#36sql .= \")\";". $this->nl;
		//----------------------
		
		$cache .= $this->tab."for(&#36v = 0 ; &#36v < count(&#36values); &#36v++){&#36params[] = &&#36values[&#36v];}". $this->nl;	
		$cache .= $this->tab."&#36statement = self::&#36con->getConnection()->prepare(&#36sql);". $this->nl;
		//$cache .= $this->tab."&#36statement->bind_param(&#36params, ";
		//$cache .= $this->tab."for(&#36v = 0 ; &#36v < count(&#36values); &#36v++){}". $this->nl;
		//
		$cache .= $this->tab."call_user_func_array(array(&#36statement, \"bind_param\"), array_merge(array(&#36type), &#36params));". $this->nl;
		
		$cache .= $this->tab."if(&#36statement->execute()){".$this->nl;
		$cache .= $this->tab.$this->tab."if(isset(&#36this->".$this->fields_safe[0].")){".$this->nl;
		$cache .= $this->tab.$this->tab.$this->tab."return 1;}".$this->nl;
		$cache .= $this->tab.$this->tab."else{".$this->nl;
		$cache .= $this->tab.$this->tab.$this->tab."return self::&#36con->last_id();}". $this->nl;
		$cache .= $this->tab.$this->tab."}else{return 0;}" . $this->nl;
		
		$cache .= "}" . $this->nl;
		$cache .= "/*End Insert*/" . $this->nl;
		$this->output .= $cache;
	}
	
	function footer(){
		$cache = "<pre>/*". $this->nl;
		$cache .= "##########################################################" . $this->nl;
		$cache .= "#             >>>>>> POTATO MODELS <<<<<<                #" . $this->nl;
		$cache .= "#      This code is computer generated. Do not modify    #" . $this->nl;
		$cache .= "# use controllers instad.                                #" . $this->nl;
		$cache .= "##########################################################*/</pre>" . $this->nl;
		$this->output .= $cache;
	}
	
	
}



?>