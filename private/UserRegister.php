<html>
<head>
	<title>Beminder.in | User-Register</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
 <?php			
	require_once ("includes/initialize.php");
	if(isset($_POST['submit']) && isset($_POST['chk']) ){
		$user->fullname=$_POST['fullname'];
		$user->email=$_POST['email'];
		$user->password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$user->phone=$_POST['phone'];
		$user->landmark=$_POST['landmark'];
		$user->addr=$_POST['addr'];
		$user->city=$_POST['city'];
		$user->state=$_POST['state'];
		$user->zip=(int)$_POST['zip'];
		$user->aupdate=date('Y:m:d');		
		
        $required_fields=array('fullname','email','password','phone','landmark','addr','city','zip');
        validate_presences($required_fields) ;
        validate_mail($user->email);
        $required_fields1=array('fullname','state','addr');
        validate_text($required_fields1);
        validate_no($user->phone);
		validate_no($user->zip);
        
        $max_fields=array('phone'=>13);
        validate_max_lengths($max_fields) ;
        //check email uniqness
        $email=$user->get_emails();
        chk_for_email($email,$user->email);
        //check phone number uniqness
        $phone_all=$user->get_phone();
        chk_for_phone($phone_all,$user->phone);
        
        pass_chk($user->password,$cpassword);
		
		$final=form_errors($errors);
		
		if($final==""){
            $user->password=$user->password_encrypt($user->password);
            if(!$user->create()){
                die("Unable To Register ");	
            }else{
				
                echo '<script>
						alert("You are successfull registered");
						history.go(-2);
					</script>' ;
				 
                
            }	
        }else{
            displayForm($final,$user);
        }
		
		
	}else{
		displayForm("",$user);
	}
	
?>
 

<?php 

function displayForm($message,$user){ 
?>
 <div class="container-fluid" style="padding-top:1em;">
	<div class="row col-md-1 col-md-offset-1">
    	<a href="../public/index.php"><img src="../Beminder.in buy and sell books images/beminder logo.png" width="100%" height="100%" class="img-responsive" alt=""></a>
    </div>
</div> 
<div class="container-fluid" style="padding-top:1em;">
   <div class="row col-md-offset-3 col-md-6 loginBox">
	<div class="col-md-12">
    	 <div class="login">REGISTER FORM</div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
	<form action="UserRegister.php" method="post">
     
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $user->fullname ?>">
     
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user->email ?>">
     
	<label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <label for="cpassword">Retype Password:</label>
    <input type="password" name="cpassword" id="cpassword"> 
    
    <label for="phone">Telephone / Phone :</label>
    <input type="text" name="phone" id="phone" value="<?php echo $user->phone ?>">
    
    <label for="landmark">Landmark :</label>
    <input type="text" name="landmark" id="landmark" value="<?php echo $user->landmark ?>">
    
    <label for="addr">Address :</label>
    <textarea name="addr"   rows="3" id="addr" value="<?php echo $user->addr?>"></textarea>
    
    <label for="city">City :</label>
    <input type="text"  id="city"  name="city" value="<?php echo $user->city ?>" />
    
    <label for="state">State :</label>
    <select name="state" id=""> 
        <option value="WEST BENGAL">WEST BENGAL</option>
        <option value="UTTAR PRADESH">UTTAR PRADESH</option>
        <option value="UTTARAKHAND">UTTARAKHAND</option>
        <option value="TRIPURA">TRIPURA</option>
        <option value="TELANGANA">TELANGANA</option>
        <option value="TAMIL NADU">TAMIL NADU</option>
        <option value="SIKKIM">SIKKIM</option>
        <option value="RAJASTHAN">RAJASTHAN</option>
        <option value="PUNJAB">PUNJAB</option>
        <option value="PUDUCHERRY">PUDUCHERRY</option>
        <option value="ODISHA">ODISHA</option>
        <option value="NAGALAND">NAGALAND</option>
        <option value="MIZORAM">MIZORAM</option>
        <option value="MEGHALAYA">MEGHALAYA</option>
        <option value="MANIPUR">MANIPUR</option>
        <option value="MAHARASHTRA">MAHARASHTRA</option>
        <option value="MADHYA PRADESH" selected>MADHYA PRADESH</option>
        <option value="LAKSHADWEEP">LAKSHADWEEP</option>
        <option value="KERALA">KERALA</option>
        <option value="KARNATAKA">KARNATAKA</option>
        <option value="JHARKHAND">JHARKHAND</option>	
        <option value="JAMMU & KASHMIR" >JAMMU & KASHMIR</option>
        <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
        <option value="HARYANA">HARYANA</option>	
        <option value="GUJARAT">GUJARAT</option>
        <option value="GOA">GOA</option>
        <option value="DELHI">DELHI</option>
        <option value="DAMAN & DIU">DAMAN & DIU</option>
        <option value="DADRA & NAGAR HAVELI">DADRA & NAGAR HAVELI</option>
        <option value="CHHATTISGARH">CHHATTISGARH</option>
        <option value="CHANDIGARH">CHANDIGARH</option>
        <option value="BIHAR">BIHAR</option>
        <option value="ASSAM">ASSAM</option>
        <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
        <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
        <option value="ANDAMAN & NICOBAR ISLANDS">ANDAMAN & NICOBAR ISLANDS</option>
      </select>
    
    <label for="zip">PIN/ZIP code :</label> 
    <input type="text" id="zip" name="zip", value="<?php echo $user->zip ?>">
     
    <input type="hidden" name="login" id="login">
    <div style=" text-overflow:clip;padding:1em 1em">
    <input type="checkbox" id="show" name="chk">  I  agree with <a href="">User Terms & Conditions</a>    </div>
    
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