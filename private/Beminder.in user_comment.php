 <?php
 require_once("includes/initialize.php");
 if($session->is_logged_in()){
	 if(isset($_POST)){
	  $comment->productid=$_POST['pid'];
	  $comment->name=$_SESSION['fullname'];
	  $comment->comment=$_POST['comment'];
	  if($comment->save()){
		echo '<script>history.go(-1);</script>';  
	  }else{
		  echo '<script>history.go(-1);</script>'; 
	  }
	 }
 }else{
	 redirect_to("login.php");
 }
 ?>
	 
 