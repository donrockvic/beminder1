 <?php include ("../private/includes/initialize.php");?>
 <?php include ("../protected/header.php");?>
 <div class="container">
    <div class="row" style="margin-top:2em">
   <div class="col-md-7 col-md-offset-2" style="border:1px solid #D4C9CA;padding: 10px 20px 10px 30px;">
 <?php
 echo "Link of Your books are";
 	if($session->is_logged_in()){
		$userebooks=$userebook->find_by_email_id($_SESSION['email']);
		foreach($userebooks as $ebooks){
				 $final=$ebook->authenticate($ebooks->ebook_id);
				 show($final);
		}
	}else{
		redirect_to("../public/");
	}	
 ?>
     </div>
    <div class="col-md-3">
        		<p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books userprofile.php"> My Profile</a></p>
            	<p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell books userUpdates.php">Update your details</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell book pwdchange.php">Change Your Password</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books user_ebooks.php"><span class="glyphicon glyphicon-chevron-left"></span>Your Ebooks</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order.php">Your Orders</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order_history.php"> Orders History</a></p>
        </div>
    </div>
    </div>
 <?php
 	function show($book){
	 
		
		echo '<ul><li><a href="../ebooks/'.$book->name.'">'.$book->name.'</a></li></ul>';
	 	
	}
 ?>