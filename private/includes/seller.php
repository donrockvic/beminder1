 <?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'sql.php');
 
class Seller extends Database {
 	protected static $table_name="seller";
	protected static $db_fields = array('id','email','shopname');
 	
	public $id;
	public $email="";
	public $shopname="";
	

	public static function authenticate($email="") {
	    global $database;
	    $username = $database->escape_value($email);
	    $password = $database->escape_value($password);
	    $sql  = "SELECT * FROM seller ";
	    $sql .= "WHERE email ='{$email}' ";
	    $sql .= "LIMIT 1";
	    $result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	
	
}
$seller = new Seller();
?>
