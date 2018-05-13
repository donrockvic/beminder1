 <?php require_once ("includes/initialize.php");?>
 
 <style>
 
th, td {
padding: 7px 10px;}
th {
letter-spacing: 0.1em;
font-size: 90%;
border-bottom: 2px solid #111111;
border-top: 1px solid #999;
text-align: left;}
 
 </style>
<?php
  $num=0; 
 $path="";
 $conditions="";
 if(isset($_SERVER['PATH_INFO'])){
	$tr=$_SERVER['PATH_INFO'];
 	$conditions=explode('/', $tr);
 	$num=count($conditions);
	 for($i=1;$i<$num;$i++){
		$path=$path."../";
	 }  
}
echo '<a href="'. $path .'beminder_sell_buy_seller_dashboard.php">Home</a><br/>';
 if($num==3){
	 $all_orders=$order->find_all();
	 slip($path,$conditions,$all_orders,$user);
	 
 } else {
	  $all_orders=$order->find_order_by_uploader($_SESSION['shopname']);
	 ordershow($all_orders,$path);
 } 
     function slip($path,$conditions,$all_orders,$user){ 
	 foreach($all_orders as $order){
		 if($order->order_id == $conditions[2]){
			 $customer=$user->find_by_email($order->user_email);
			 //var_dump($customer);
			 //var_dump($order);
	 ?>
     		<h4>ORDER DETAILS : </h4>
		 	 <table>
             	
             	<tr> <th>Order Id : <?php echo $order->order_id ?></th> </tr>
                <tr> <th>Book name: <?php echo $order->book_name ?></th></tr>
                <tr><th>Quantity : <?php echo $order->quantity ?> | Price : <?php echo $order->price ?></th></tr>
                <tr><th>Order date: <?php echo $order->order_date." / " .$order->order_time ?></th></tr>
             </table>
             <h4>CUSTOMER DETAILS : </h4>
             <table>
             	<tr><th>NAME : <?php echo $customer->fullname ?></th></tr>
                <tr><th>Email : <?php echo $customer->email ?></th></tr>
                <tr><th>Phone : <?php echo $customer->phone ?></th></tr>
                <tr><th>Address : <br/>
                			Landmark : <?php echo $customer->landmark?>
                            <br/>Address : <?php echo $customer->addr?>
                            <br/>City : <?php echo $customer->city?>
                            <br/>State : <?php echo $customer->state ?>
                            <br/>zip : <?php echo $customer->zip ?>
                </th></tr>
                 
             </table>
		 
    <?php
		 }
	 	}
	 }
	 function ordershow($all_orders,$path){
	?>
        <div>
        	
          
			<div>	
            Orders :
            <div>
            <table border="1">
              <tr><th>Order Id</th><th>For</th><th>Book id</th><th>book name</th><th>Quantity</th><th>Price</th><th>Status</th><th>Book for</th><th>For</th></tr>
        <?php
		foreach($all_orders as $order){
			echo '<tr>
					<th><a href="'.$path.'beminder_admin_orders.php/order/'.$order->order_id.'">'.$order->order_id.'</a> </th>
					<th>'.$order->user_email.'</th>
					<th>'.$order->product_id.' </th>
					<th>'.$order->book_name.'</th>
					<th>'.$order->quantity.' </th>
					<th>'.$order->price.'</th>
					<th>'.$order->status.'</th>
					<th>'.$order->ofor.' </th>
					<th> '.$order->too.'</th>
				</tr>';
			 
		}
		?>	</table>
        		</div>
        	</div>
		</div>
 <?php
 }
 
 ?>
 