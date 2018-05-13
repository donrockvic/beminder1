<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'sql.php');
 
class User extends Database {
 	protected static $table_name="user";
	protected static $db_fields = array('id','fullname','email','password','phone','landmark','addr','city','state','zip','aupdate');
	
	protected static $dbu_fields = array('fullname','phone','landmark','addr','city','state','zip');
 	
	public $id;
	public $password;
	public $fullname=""; 
	public $email="";
	public $phone="";
	public $landmark="";
	public $addr="";
	public $city="";
	public $state="";
	public $zip="";
	public $aupdate="";

	

	public static function authenticate($email="", $password="") {
	    global $database;
	    $username = $database->escape_value($email);
	    $password = $database->escape_value($password);
	    $sql  = "SELECT * FROM user ";
	    $sql .= "WHERE email ='{$email}' ";
	    $sql .= "AND password = '{$password}' ";
	    $sql .= "LIMIT 1";
	    $result_array = self::find_by_sql($sql);
	    	//echo $sql;
			return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	protected function fields() { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(static::$dbu_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attribute() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->fields() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	public function update() {
	  global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attribute();
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
	
	
	public static function find_by_email($email="") {
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email='{$email}' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	 }
	
}
$user = new User();
?>
