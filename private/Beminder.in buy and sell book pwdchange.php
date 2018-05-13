 
 
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
	if(isset($_POST['submit']) && strlen($_POST['email'])>0){
		$email=$_POST['email'];
		$fullname=$_POST['fullname'];
		$required_fields=array('email','fullname');
	    validate_presences($required_fields) ;
		$final=form_errors($errors);
		if(!$final){
			$result=mail($email,"change Password","click the link");
		  echo '<script>
		  		alert("A link for the change of email id has been sent to youe email.");
				history.go(-2)</script>';
		}else{
			  displayForm($final,$user);
		}
	}
    displayForm($message,$user);
?>

<?php
function displayForm($message,$user){	
?>
 
<div class="row col-md-offset-4 col-md-4 loginBox">
	<div class="col-md-12">
    	 <div class="login">Fill the form </div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
    	<form id="form1" name="form1" action="Beminder.in buy and sell book pwdchange.php" method="post">
         <input type="hidden"  name="login" id="login" >
         
        <label for="email">Email ID:</label> 
        <input type="email" name="email" id="email" placeholder="Email" >
        
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" placeholder="Fullname">
        <br/>
        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset">
        
        </form>
        
        <hr>
    </div>
</div>

<?php } ?>
  </div>
</div>
</body>
</html>
 