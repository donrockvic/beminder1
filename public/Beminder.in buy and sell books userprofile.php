 <?php require_once("../protected/header.php");?>
 <?php
 	if($session->is_logged_in()){
		$details=$user->find_by_id($_SESSION['id']);
		//print_r($details);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-2"><h4>Your Profile</h4> </div>
        
		<div class="col-md-7 col-md-offset-2" style="border:1px solid #D4C9CA;padding: 10px 20px 10px 30px;">
        	<div class="row">
        		<div class="col-md-3 col-md-offset-1"><img src="../Beminder.in buy and sell books images/Beminder.in buy and sell books user.svg" alt="User Image" width="120px" class="img-responsive"></div>
        		<div class="col-md-6">
                <br/>
                	<p><strong>Name :</strong> <?php echo $details->fullname; ?></p>
                    <p><strong>Email :</strong> <?php echo $details->email; ?></p>
                    <p><strong>Phone :</strong> <?php echo $details->phone; ?></p>
                    <p><strong>Added on :</strong> <?php echo $details->aupdate?></p>
                </div>
        	</div>
            <hr/>
            <div class="row">
            <h5><strong>Your Address :</strong></h5>
            <address>
            	<p><strong>Landmark :</strong> <?php echo $details->landmark ?></p>
                <p><strong>Address :</strong> <?php echo $details->addr?></p>
                <p><strong>City : </strong><?php echo $details->city?></p>
                <p><strong>State :</strong> <?php echo $details->state?></p>
                <p><strong>Zip : </strong><?php echo $details->zip?></p>
             </address>  
            </div>
            <hr/>
            
        </div>
        <div class="col-md-3">
        		<p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books userprofile.php"><span class="glyphicon glyphicon-chevron-left"></span> My Profile</a></p>
            	<p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell books userUpdates.php">Update your details</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../private/Beminder.in buy and sell book pwdchange.php">Change Your Password</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books user_ebooks.php">Your Ebooks</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order.php">Your Orders</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="beminder_user_order_history.php"> Orders History</a></p>
        </div>
	</div>
</div>
<?php
	}else{
		redirect_to("../private/login.php");	
	}
 ?>
 <?php require_once("../protected/footer.php");?>