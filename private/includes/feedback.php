  <?php
require_once(LIB_PATH.DS.'sql.php');
 
class feedback extends Database {
 	protected static $table_name="feedback";
	protected static $db_fields = array('id','name','email','feedback');
 	
	public $id;
	public $name="";
	public $email="";
	public $feedback="";
 
 
}
$report = new feedback();
?>