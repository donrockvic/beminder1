  <?php require_once("../protected/header.php");?>
  <?php 
  	if(isset($_POST['submit'])){
		if(!$session->is_logged_in()){
			redirect_to("../private/login.php");
		}else{
			$msg=$_SESSION['email']." wants job";
			mail("contact@beminder.in","Career",$msg);	
		}
	}
  ?>
  
 <div class="container-fluid">
 	<diiv class="row">
 		<div class="col-md-10 col-md-offset-1">
          Sorry
          <p>No option currently</p>
          <p>Suscribe us to get inform when requires</p>
          <form action="career.php" method="post">
          	<input type="hidden" name="s_for" value="job">
            <input type="submit" class="btn btn-primary" name="submit" value="Suscribe">
          </form>
        </div>
 	</diiv>
 </div>
 <?php require_once("../protected/footer.php");?>