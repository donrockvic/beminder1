<?php

class Database{

	//these are comman methods extended by all classes

	public static function find_all() {
		return static::find_by_sql("SELECT * FROM ".static::$table_name);
    }

    public static function find_by_id($id=0) {
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	 }
	 
	   public static function find_by_text_id($id="") {
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id='{$id}' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	 }
	 
	 public static function find_by_text_pid($pid="") {
         return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE productid='{$pid}'");
	 }
	 
	 
	 

	public static function find_by_sql($sql="") {
	    global $database;
	    $result_set = $database->query($sql);
	    $object_array = array();
	    while ($row = $database->fetch_array($result_set)) {
			$object_array[] = static::instantiate($row);
	    }
	    return $object_array;
 	 }
	 
	 public static function find_by_title($title) {
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE title='{$title}' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	 }
	 
	  public static function find_by_subtype($subtype) {
         return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE subtype='{$subtype}'");
	 }
	 
	  public static function find_by_type($type) {
         return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE type='{$type}'");
	 }
	 
 	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".static::$table_name;
      $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
      return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
   		 $object = new static;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(static::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	 	$sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  	$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	    if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update() {
	  global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete($id) {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
		  $sql = "DELETE FROM ".static::$table_name;
		  $sql .= " WHERE id=". $database->escape_value($id);
		  $sql .= " LIMIT 1";
		  $database->query($sql);
		  return ($database->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update() 
		// after calling $user->delete().
	}
	
	//
	
	public function get_emails(){
		global $database;
		$sql="SELECT email from ".static::$table_name; 
		$result= $database->query($sql);
		if(!$result){
			die("QUERY TO FIND MAIL FAILED");	
		}
		return $result;
	}
	
	
	
	 //get details function is equivalent to find all 
	
	public function get_unames(){
		global $database;
		$sql="SELECT uname from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("QUERY TO FIND USER FAILED");	
		}
		return $result;
	}
	
	
	public function get_phone(){
		global $database;
		$sql="SELECT phone from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("query to find phone failed");	
		}
		return $result;
	}
	
	public function get_ids(){
		global $database;
		$sql="SELECT id from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("query to find phone failed");	
		}
		return $result;
	}
	
	//password 
	
	private function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}

	public function get_password_id($id){
		global $database;
		$sql="SELECT password FROM ".static::$table_name." WHERE id={$id} LIMIT 1";
		$result = $database->query($sql); 
		$row = $database->fetch_array($result);
		if(!$result){
			die("query to find password failed");	
		}
		return !empty($result) ?  $row[0] : false;
	}
	
	public function get_password_username($uname){
		global $database;
		$sql="SELECT password FROM ".static::$table_name." WHERE username='{$uname}' LIMIT 1";
		$result = $database->query($sql); 
		$row = $database->fetch_array($result);
		if(!$result){
			die("query to find password failed");	
		}
		return !empty($result) ?  $row[0] : false;
	}
	
	public function get_password_mail($email){
		global $database;
		$sql="SELECT password FROM ".static::$table_name." WHERE email='{$email}' LIMIT 1";
		$result = $database->query($sql); 
		$row = $database->fetch_array($result);
		if(!$result){
			die("query to find password failed");	
		}
		return !empty($result) ?  $row[0] : false;
	}
	
	public function password_encrypt($password) {
  	  $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 	      // Blowfish salts should be 22-characters or more
	  $salt = $this->generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
	  return $hash;
	}
	
	public function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  //echo $hash." | ";
	  if ($hash === $existing_hash ) {
	    return true;
	  } else {
	    return false;
	  }
	}


	/*for books*/
	public function get_ISBN(){
		global $database;
		$sql="SELECT ISBN1 from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("query to find phone failed");	
		}
		return $result;
	}
	
	public function get_titles(){
		global $database;
		$sql="SELECT title from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("query to find phone failed");	
		}
		return $result;
	}
	
	public function get_authors(){
		global $database;
		$sql="SELECT author from ".static::$table_name;
		$result= $database->query($sql);
		if(!$result){
			die("query to find phone failed");	
		}
		return $result;
	}
	

}
?>