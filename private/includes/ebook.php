 <?php
require_once(LIB_PATH.DS.'sql.php');
 
class Ebook extends Database {
 	protected static $table_name="ebook";
	protected static $db_fields = array('id','book_id','name');
 	
	public $id;
	public $book_id;
	public $name;
 

	public static function authenticate($book_id="") {
	    global $database;
	    $sql  = "SELECT * FROM ebook ";
	    $sql .= "WHERE book_id ='{$book_id}' ";
	    $sql .= "LIMIT 1";
	    $result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
	}
}
$ebook = new Ebook();
?>
