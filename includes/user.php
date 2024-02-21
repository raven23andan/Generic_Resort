<?php
require_once('database.php');
class User{
	
	protected static $tbl_name = "tbluseraccount";
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
	function listOfmembers(){
		global $mydb;
		$mydb->setQuery("Select * from ".self::$tbl_name);
		$cur = $mydb->loadResultList();
		return $cur;
	
	}
	function admin_details(){
	    global $mydb; 
		$mydb->setQuery("SELECT * FROM `tbluseraccount` WHERE `ROLE`='Administrator' LIMIT 1");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		 if ($row_count == 1){
		 $found_user = $mydb->loadSingleResult(); 
            $_SESSION['ADMIN_TITLE']    	    = $found_user->UNAME;
            $_SESSION['ADMIN_LOGO']		        = $found_user->Logo; 
        	    return true;
			}else{
				return false;
			}	
				
	}
	function single_user($id=0){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where `USERID`= {$id} LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function find_all_user($name=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE  `UNAME` ='{$name}'");
			$cur = $mydb->executeQuery();
			$row_count = $mydb->num_rows($cur);
			return $row_count;
	}

	 static function AuthenticateUser($email="", $h_upass=""){
		global $mydb;
		$mydb->setQuery("SELECT * FROM `tbluseraccount` WHERE `USER_NAME`='" . $email . "' and `UPASS`='" . $h_upass ."' LIMIT 1");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		 if ($row_count == 1){
		 $found_user = $mydb->loadSingleResult();
		    $_SESSION['ADMIN_ID'] 	 		= $found_user->USERID;
            $_SESSION['ADMIN_UNAME']    	= $found_user->UNAME;
            $_SESSION['ADMIN_USERNAME']		= $found_user->USER_NAME;
            $_SESSION['ADMIN_UPASS']		= $found_user->UPASS;
            $_SESSION['ADMIN_UROLE']    	= $found_user->ROLE;
			$_SESSION['ADMIN_2WAY']    		= $found_user->twoWayAuth;
			$_SESSION['ADMIN_2WAYDONE']     = $found_user->twoWayAuth === '1' ? '0' : '1'; 
			$_SESSION['ADMIN_EMAIL']		= $found_user->User_Email;
        	return true;
			}else{
				return false;
			}	
				
	} 	
	
	
	
	static function instantiate($record) {
		$object = new self;

		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		} 
		return $object;
	}
	
	

	private function has_attribute($attribute) {
	  
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		
	  global $mydb;
	  $attributes = array();
	  foreach($this->db_fields() as $field) {
	    if(property_exists($this, $field)) {
			$attributes[$field] = $this->$field;
		}
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $mydb;
	  $clean_attributes = array();

	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $mydb->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	

	public function save() {

	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;

		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$tbl_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	echo $mydb->setQuery($sql);
	
	 if($mydb->executeQuery()) {
	    $this->id = $mydb->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update($id=0) {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tbl_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE USERID=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tbl_name;
		  $sql .= " WHERE USERID=". $id;
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
	
	}
		
}
?>