<html>
<head>
	<title>Beminder.in | Add-Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
 <?php			
	require_once ("includes/initialize.php");
	if(isset($_POST['submit'])){
		$admin->username=$_POST['username'];
		$admin->password=$_POST['password'];
		$admin->fullname=$_POST['fullname'];
		$admin->email=$_POST['email'];
				
        $required_fields=array('username','password','fullname','email');
        validate_presences($required_fields) ;
        validate_mail($admin->email);
        $required_fields1=array('username','fullname');
        validate_text($required_fields1);
 
        $email=$admin->get_emails();
        chk_for_email($email,$admin->email);
		
		$final=form_errors($errors);
		if($final==""){
            $admin->password=$admin->password_encrypt($admin->password);
            if(!$admin->create()){
                die("Unable To Register ");	
            }else{
                echo '<script>
						alert("You are successfull registered");
						history.go(-2);
					</script>' ;
            }	
        }else{
            displayForm($final,$admin);
        }
	}else{
		displayForm("",$admin);
	}
	
?>
 

<?php 

function displayForm($message,$admin){ 
?>
 <div class="container-fluid" style="padding-top:1em;">
	<div class="row col-md-1 col-md-offset-1">
    	<a href="../public/index.php"><img src="../Beminder.in buy and sell books images/beminder logo.png" width="100%" height="100%" class="img-responsive" alt=""></a>
    </div>
</div> 
<div class="container-fluid" style="padding-top:1em;">
   <div class="row col-md-offset-3 col-md-6 loginBox">
	<div class="col-md-12">
    	 <div class="login">ADD ADMIN</div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
	<form action="Beminder.in buy and sell books add_admin.php" method="post">
    
    <label for="username">Username :</label>
    <input type="text" name="username" id="phone" value="<?php echo $admin->username ?>">
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
     
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $admin->fullname ?>">
     
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $admin->email ?>">
   
    <br/>
    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit" >
    <input type="reset"  class="btn btn-primary" name="button" id="button" value="Reset">  
   </form>
	  </div>
    </div>
  </div>
 </div>
 
<?php } ?>

</body>
</html>