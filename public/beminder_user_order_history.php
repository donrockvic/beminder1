<?php require_once ("../private/includes/initialize.php");?>
 <?php include ("../protected/header.php");?>
 <style>
th, td {
padding: 7px 10px;}
th {
letter-spacing: 0.1em;
font-size: 90%;
border-bottom: 2px solid #99567f;
border-top: 1px solid #99567f;
text-align: left;}
 
tr:hover {
background-color: #feeebe;}	
 </style>
<?php
 	if($session->is_logged_in()){
		$all_orders=$order->find_order_by_email($_SESSION['email']);
		//print_r($all_orders);
		?>
          
        <div class="container-fluid">
            <h3>Your Previous Orders :</h3>
			<div class="row" style="padding:10px 0px">	
            <div class="col-md-9" style="padding: 10px 20px 10px 30px;">
            <table border="1">
              <tr><th>Order Id</th><th>Book Name</th><th>Quantity</th><th>Price</th><th>Status</th><th>Service as</th><th>From</th><th>Date/time</th> </tr>
        <?php
		foreach($all_orders as $order){
			if($order->status == "Canceled" || $order->status =="Completed"){
			echo '<tr>
					<th>'.$order->order_id.' </th>
					<th>'.$order->book_name.' </th>
					<th>'.$order->quantity.' </th>
					<th>'.$order->price.'</th>
					<th>'.$order->status.'</th>
					<th>'.$order->ofor.' </th>
					<th> '.$order->too.'</th>
					<th>'.$order->order_date." \ ".$order->order_time.'</th>
				</tr>';
			}
		}
		?>	</table>
        	</div>
            <div class="col-md-3">
            	<p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books userprofile.php">My Profile</a></p>
            	<p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell books userUpdates.php">Update your details</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell book pwdchange.php">Change Your Password</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books user_ebooks.php">Your Ebooks</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order.php">Your Orders</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order_history.php"><span class="glyphicon glyphicon-chevron-left"></span> Orders History</a></p>
            </div>    
        	</div>            
		</div>
        <?php
	}else{
		redirect_to("../private/login.php");	
	}
 ?>
 <?php include ("../protected/footer.php");?>