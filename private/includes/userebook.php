  <?php
require_once(LIB_PATH.DS.'sql.php');
 
class Userebook extends Database {
 	protected static $table_name="userebook";
	protected static $db_fields = array('enroll_id','ebook_id','email_id');
 	
	public $enroll_id;
	public $ebook_id;
	public $email_id;
 

	 public static function find_by_email_id($email_id="") {
       return   static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email_id='{$email_id}'");
		 
	 }
}
$userebook = new Userebook();
?>
