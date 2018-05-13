<html>
<head>
	<title>Beminder.in | Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
  <div class="container-fluid" style="padding-top:1em;">
	<div class="row col-md-1 col-md-offset-1">
    	<a href="../public/index.php"><img src="../Beminder.in buy and sell books images/beminder logo.png" width="100%" height="100%" class="img-responsive" alt=""></a>
    </div>
</div> 
	<div class="container-fluid " style="padding-top:1em;" >
<?php	
require_once ("../private/includes/initialize.php");
if(isset($_SESSION['aid'])){
		redirect_to($path."../private/beminder_sell_buy_admin_dashboard.php");
}else{
	if(isset($_POST['submit'])){
		unset($_SESSION['id']);
		$username=$_POST['username'];
		$password=$_POST['password'];
		$required_fields=array('username','password');
		$required_text=array('username');
		validate_presences($required_fields) ;
		validate_text($required_text);        	 
		$final=form_errors($errors);
		if(!$final){
			$hash=$admin->get_password_username($username);
			$password=$admin->password_check($password,$hash);
			echo $hash;
			if($password){
				$check=$admin->authenticate($username, $hash);
				if($check){
					$session->adminlogin($check);
					redirect_to($path."../private/beminder_sell_buy_admin_dashboard.php");
				}else{
				displayForm("No such Admin Found try again :",$admin);
				}
			}else{
				displayForm("Wrong Password or Email-id , try Again",$admin);
			}				
		}else{
			displayForm($final,$admin);
		}
	
	}else{
		displayForm("",$admin);
	}
}
?>

<?php
function displayForm($message,$admin){	
?>
 
<div class="row col-md-offset-4 col-md-4 loginBox">
	<div class="col-md-12">
    	 <div class="login">ADMIN LOGIN</div>
         <?php if (strlen($message) > 0 ){echo'<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
    	<form id="form1" name="form1" action="admin.php" method="post">
         <input type="hidden"  name="login" id="login" >
         
        <label for="username">User Name :</label> 
        <input type="text" name="username" id="username" placeholder="User name" >
        
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder="password">
        <br/>
        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset">
        
        </form>
    </div>
</div>

<?php } ?>
  </div>
</div>
</body>
</html>
 