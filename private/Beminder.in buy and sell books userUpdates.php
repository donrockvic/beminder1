<html>
<head>
	<title>Beminder.in | User-Register</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/display.css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
 <?php			
	require_once ("includes/initialize.php");
	if(isset($_POST['submit'])){
		$user->id=$_SESSION['id'];
		$user->fullname=$_POST['fullname'];
		$user->phone=$_POST['phone'];
		$user->landmark=$_POST['landmark'];
		$user->addr=$_POST['addr'];
		$user->city=$_POST['city'];
		$user->state=$_POST['state'];
		$user->zip=(int)$_POST['zip'];		
		
        $required_fields=array('fullname','phone','landmark','addr','state','zip');
        validate_presences($required_fields) ;
       
        $required_fields1=array('fullname','state','addr');
        validate_text($required_fields1);
        validate_no($user->phone);
		validate_no($user->zip);
        
        $max_fields=array('phone'=>13);
        validate_max_lengths($max_fields) ;
         
		
		$final=form_errors($errors);
		
		if($final==""){
            
            if(!$user->update()){
                die("Unable To Update ");	
            }else{
				
                echo '<script>
						alert("You are successfull updated");
						history.go(-2);
					</script>' ;
				 
                
            }	
        }else{
            displayForm($final,$user);
        }
	}else{
		if(isset($_SESSION['id'])){
		   $userr=$user->find_by_id($_SESSION['id']);
		  displayForm("",$userr);
		}else{
			displayForm("",$user); 
		}
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
    	 <div class="login">Update details</div>
         <div class="alert alert-success" role="alert">
         	<p>You Cannot change your email address</p>
         </div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
	<form action="Beminder.in buy and sell books userUpdates.php" method="post">
     
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $user->fullname ?>">
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" disabled value="<?php echo $user->email ?>">
     
	<label for="phone">Telephone / Phone :</label>
    <input type="text" name="phone" id="phone" value="<?php echo $user->phone ?>">
    
    <label for="landmark">Landmark :</label>
    <input type="text" name="landmark" id="landmark" value="<?php echo $user->landmark ?>">
    
    <label for="addr">Address :</label>
    <textarea name="addr"   rows="3" id="addr"><?php echo $user->addr?></textarea>
    
    <label for="city">City :</label>
    <input type="text"  id="city"  name="city" value="<?php echo $user->city ?>" />
    
     <label for="state">State :</label>
     <?php $states=array("WEST BENGAL"=>"WEST BENGAL","UTTAR PRADESH"=>"UTTAR PRADESH","UTTARAKHAND"=>"UTTARAKHAND","TRIPURA"=>"TRIPURA","TELANGANA"=>"TELANGANA","TAMIL NADU"=>"TAMIL NADU","SIKKIM"=>"SIKKIM","RAJASTHAN"=>"RAJASTHAN","PUNJAB"=>"PUNJAB","PUDUCHERRY"=>"PUDUCHERRY","ODISHA"=>"ODISHA","NAGALAND"=>"NAGALAND","MIZORAM"=>"MIZORAM","MEGHALAYA"=>"MEGHALAYA","MANIPUR"=>"MANIPUR","MAHARASHTRA"=>"MAHARASHTRA","MADHYA PRADESH"=>"MADHYA PRADESH","LAKSHADWEEP"=>"LAKSHADWEEP","KERALA"=>"KERALA","KARNATAKA"=>"KARNATAKA","JHARKHAND"=>"JHARKHAND","JAMMU & KASHMIR"=>"JAMMU & KASHMIR","HIMACHAL PRADESH"=>"HIMACHAL PRADESH","HARYANA"=>"HARYANA","GUJARAT"=>"GUJARAT","GOA"=>"GOA","DELHI"=>"DELHI","DAMAN & DIU"=>"DAMAN & DIU","CHHATTISGARH"=>"CHHATTISGARH","CHANDIGARH"=>"CHANDIGARH","BIHAR"=>"BIHAR","ASSAM"=>"ASSAM","ARUNACHAL PRADESH"=>"ARUNACHAL PRADESH","ANDHRA PRADESH"=>"ANDHRA PRADESH","ANDAMAN & NICOBAR ISLANDS"=>"ANDAMAN & NICOBAR ISLANDS");
	 
	  ?>
    <select name="state" id=""> 	
 	<?php		
		foreach($states as $key=>$value){
           echo '<option value="'.$key.'"'.selected($key,$user->state).'>'.$value.'</option>';
        }	
	?>
    </select>
    
    <label for="zip">PIN/ZIP code :</label> 
    <input type="text" id="zip" name="zip", value="<?php echo $user->zip ?>">
         
    <br/>
    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Update" > 
   </form>
	  </div>
    </div>
    <div class="col-md-3">
            	<p><a type="button" class="btn btn-primary myMenu" href="../public/Beminder.in buy and sell books userprofile.php">My Profile</a></p>
            	<p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell books userUpdates.php"><span class="glyphicon glyphicon-chevron-left"></span> Update your details</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="Beminder.in buy and sell book pwdchange.php">Change Your Password</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../public/Beminder.in buy and sell books user_ebooks.php">Your Ebooks</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../public/beminder_user_order.php">Your Orders</a></p>
                <p><a type="button" class="btn btn-primary myMenu" href="../public/beminder_user_order_history.php"> Orders History</a></p>
            </div>
  </div>
 </div>
 
<?php } 
function selected($str1,$str2){
	if($str1==$str2){
		return "selected";	
	}
}
?>

</body>
</html>