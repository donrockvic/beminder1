  <?php
require_once(LIB_PATH.DS.'sql.php');
 
class comments extends Database {
 	protected static $table_name="comments";
	protected static $db_fields = array('id','productid','name','comment');
 	
	public $id;
	public $productid;
	public $name;
	public $comment;
 
 
}
$comment = new comments();
?>