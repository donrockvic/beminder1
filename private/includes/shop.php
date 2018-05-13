 <?php
require_once(LIB_PATH.DS.'sql.php');
 
class Shop extends Database {
 	protected static $table_name="shops";
	protected static $db_fields = array('id','address','landmark','city','state','zip','shop_phone','shop_email');
 	
	public $id;
	public $landmark;
	public $address;
	public $city;
	public $state;
	public $zip;
	public $shop_phone;
	public $shop_email;

	public static function authenticate($id="") {
	    global $database;
	    $username = $database->escape_value($id);
	    $sql  = "SELECT * FROM shops ";
	    $sql .= "WHERE id ='{$id}' ";
	    $sql .= "LIMIT 1";
	    $result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
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
		$sql .= " WHERE id='". $database->escape_value($this->id)."'";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}
	
}
$shop = new Shop();
?>
