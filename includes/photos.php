<?php
require_once('database.php');
class photos {
	
	protected static $tbl_name = "photos";

	
	public function attach_file($file) {
		
		if(!$file || empty($file) || !is_array($file)) {
		  
		  $this->errors[] = "No file was uploaded.";
		  return false;
		} elseif($file['error'] != 0) {
		  
		  $this->errors[] = $this->upload_errors[$file['error']];
		  return false;
		} else {
			
		  $this->temp_path  = $file['tmp_name'];
		  $this->filename   = basename($file['name']);
		  $this->type       = $file['type'];
		  $this->size       = $file['size'];
			
			return true;

		}
	}
	public function save() {
		
		if(isset($this->id)) {
			
			$this->update();
		} else {
			
			
			
		  if(!empty($this->errors)) { return false; }
		  
			
		  if(strlen($this->caption) > 255) {
				$this->errors[] = "The caption can only be 255 characters long.";
				return false;
			}
		
		  
		  if(empty($this->filename) || empty($this->temp_path)) {
		    $this->errors[] = "The file location was not available.";
		    return false;
		  }
			
			
		  $target_path = SITE_ROOT .DS. 'uploads' .DS. $this->upload_dir .DS. $this->filename;
		  
		  
		  if(file_exists($target_path)) {
		    $this->errors[] = "The file {$this->filename} already exists.";
		    return false;
		  }
		
			
			if(move_uploaded_file($this->temp_path, $target_path)) {
		  
				if($this->create()) {
					
					unset($this->temp_path);
					return true;
				}
			} else {
				
		    $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
		    return false;
			}
		}
	}
	
	public function image_path() {
	  return $this->upload_dir.DS.$this->filename;
	}
	
	public function size_as_text($size) {
		if($size < 1024) {
			return "{$size} bytes";
		} elseif($size < 1048576) {
			$size_kb = round($size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($size/1048576, 1);
			return "{$size_mb} MB";
		}
	}
	
	
	
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }

	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
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
		$sql .= " WHERE b_id=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($id=0) {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tbl_name;
		  $sql .= " WHERE b_id=". $id;
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
	
	}
	
	
}

?>