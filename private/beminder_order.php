 <?php require_once ("includes/initialize.php");?>
 <?php
    if(!$session->is_logged_in()){
		redirect_to("login.php");
	}else{
		if(isset($_POST['buy'])){
			$task= explode('/', $_POST['for']);
			$order->order_id='beminder'.rand(100,10000);
			$order->user_email=$_SESSION['email'];
			$order->product_id=$_POST['productid'];
			$order->book_name=$_POST['book_name'];
			$order->quantity=$_POST['quantity'];
			$order->price=$task[1]*$_POST['quantity'];
			$order->order_date=date('Y:m:d');
			$order->order_time=date('H:i:s');
			$order->status="Active";
			$order->ofor=$task[0];
			$order->too=$_POST['to'];
			if(!$order->create()){
                die("Unable To make order ");	
            }else{
				 if($_SERVER['HTTP_REFERER']==="http://localhost/beminder/public/usercart.php"){
					 $_SESSION['cart']['books_no']--;
				 }
				 unset($_SESSION['cart']['books'][$_POST['productid']]);
                 redirect_to("../public/beminder_user_order.php");            
            }	
		} 
	}
 ?> 