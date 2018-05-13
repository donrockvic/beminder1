   <?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'sql.php');
 
class orders extends Database {
	
protected static $table_name="orders";
protected static $db_fields = array('order_id','user_email','product_id','book_name','quantity','price','order_date','order_time', 'status','ofor','too');
								
	public $order_id="";
	public $user_email="";
	public $product_id="";
	public $book_name="";
	public $quantity="";
	public $price="";
	public $order_date=""; 
	public $order_time="";
	public $status="";
	public $ofor="";
	public $too="";
	
	public static function find_order_by_email($email="") {
         return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_email='{$email}' order by order_date desc, order_time desc");
	 }
	 
	 public static function find_order_by_uploader($uploader="") {
         return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE too='{$uploader}' order by order_date desc, order_time desc");
	 }
	 
	 public static function cancel($order_id=""){
		 $sql = "UPDATE orders set status='Canceled' where order_id='{$order_id}' ";
		 return static::find_by_sql($sql);
	 }
	 
}
$order = new orders();
?>
