<html>
<head>
	<title>Beminder.in | Login</title>
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
	 require_once ("includes/initialize.php");
	  
	if($session->is_logged_in()){
		redirect_to("../public");
	}else{
		if(isset($_POST['submit'])){
			$email=$_POST['email'];
			$password=$_POST['password'];
			$required_fields=array('email','password');
	        validate_presences($required_fields) ;
	        validate_mail($email);        	 
	        $final=form_errors($errors);
			
			if(!$final){
				
				$hash=$user->get_password_mail($email);
				$password=$user->password_check($password,$hash);
				if($password){
					$check=$user->authenticate($email, $hash);
					if($check){
						$session->login($check);
						echo "<script>history.go(-2)</script>";
					}else{
					displayForm("No such User Found try again :",$user);
					}
				}else{
					displayForm("Wrong Password or Email-id , try Again",$user);
				}				
			}else{
				displayForm($final,$user);
			}
		
		}else{
			displayForm("",$user);
		}
	}
	
?>

<?php
function displayForm($message,$user){	
?>
 
<div class="row col-md-offset-4 col-md-4 loginBox">
	<div class="col-md-12">
    	 <div class="login">LOGIN</div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
    	<form id="form1" name="form1" action="login.php" method="post">
         <input type="hidden"  name="login" id="login" >
         
        <label for="email">Email ID:</label> 
        <input type="email" name="email" id="email" placeholder="email" >
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="password">
        <br/>
        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset">
        
        </form>
        <div><a href="Beminder.in buy and sell book pwdchange.php"><small>forget password?</small></a></div>
        <hr>
        <div><a href="UserRegister.php" class="btn btn-primary in" >Sign in</a></div>
        <br/>
        <div style="padding-top:10px;"><small>new user? get registered</small> </div>
    </div>
</div>

<?php } ?>
  </div>
</div>
</body>
</html>
 