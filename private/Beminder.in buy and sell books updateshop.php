 <html>
<head>
	<title>Beminder.in | shop detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
 <?php			
	require_once ("includes/initialize.php"); 	
	if(isset($_POST['submit']) && isset($_SESSION['shopid'])){
		$shop->id=$_SESSION['shopid'];
		$shop->address=$_POST['address'];
		$shop->landmark=$_POST['landmark'];
		$shop->city=$_POST['city'];
		$shop->state=$_POST['state'];
		$shop->zip=(int)$_POST['zip'];
		$shop->shop_phone=$_POST['shop_phone'];		
		$shop->shop_email=$_POST['shop_email'];	
		
        $required_fields=array('landmark','address','city','zip');
        validate_presences($required_fields) ;
        validate_mail($shop->shop_email);
		validate_no($shop->zip);
		
		$final=form_errors($errors);
		
		if($final==""){
            if(!$shop->update()){
                die("Unable To Register ");	
            }else{
				echo '<script>alert("Your information has been updated");
					history.go(-2);</script>';
            }	
        }else{
			displayForm($final,$shop);
		}
	}else{
		$shop=$shop->authenticate($_SESSION['shopid']);
		if($shop){
			displayForm("",$shop);
		}else{
			displayForm("",$shop);
		}
	}
?>
 

<?php 

function displayForm($message,$shop){ 
?>
  <div class="container-fluid" style="padding-top:1em;">
	<div class="row col-md-1 col-md-offset-1">
    	<a href="../public/index.php"><img src="../Beminder.in buy and sell books images/beminder logo.png" width="100%" height="100%" class="img-responsive" alt=""></a>
    </div>
</div> 
 <div class="container-fluid" style="padding-top:2em;padding-bottom:2em">
 	<div class="row col-md-5 col-md-offset-3">
     Welcome ! <?php echo $_SESSION['fullname'];?> ,
     <p>Your shop <strong>"<?php echo $_SESSION['shopname'] ;?>"</strong> is successfully registered.Your shop id is
     <strong>"<?php echo $_SESSION['shopid'];?>"</strong>.</p>
     <p>Now You have to enter few of your shop details..</p>
    </div>
    <div class="row"> 
 		<div class="col-md-5 col-md-offset-3 loginBox">
        <div class="login">Add Your shop Details</div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
         <form action="Beminder.in buy and sell books updateshop.php" method="post">
         	  <label for="landmark">Landmark : </label>
              <input type="text" name="landmark" value="<?php echo $shop->landmark?>">
              
              <label for="address">Address : </label>
              <input type="text" name="address" value="<?php echo $shop->address?>">
              
              <label for="city">City</label>			  
			  <input type="text" name="city" value="<?php echo $shop->city?>">
              
              <label for="state">State</label>
              <select name="state" id=""> 
              	<option value="WEST BENGAL" <?php echo selected("WEST BENGAL",$shop->state); ?>>WEST BENGAL</option>
                <option value="UTTAR PRADESH" <?php echo selected("UTTAR PRADESH",$shop->state); ?>>UTTAR PRADESH</option>
                <option value="UTTARAKHAND" <?php echo selected("UTTARAKHAND",$shop->state); ?>>UTTARAKHAND</option>
                <option value="TRIPURA" <?php echo selected("TRIPURA",$shop->state); ?>>TRIPURA</option>
                <option value="TELANGANA" <?php echo selected("TELANGAN",$shop->state); ?>>TELANGANA</option>
                <option value="TAMIL NADU" <?php echo selected("TAMIL NADU",$shop->state); ?>>TAMIL NADU</option>
              	<option value="SIKKIM" <?php echo selected("SIKKIM",$shop->state); ?>>SIKKIM</option>
              	<option value="RAJASTHAN" <?php echo selected("RAJASTHAN",$shop->state); ?>>RAJASTHAN</option>
                <option value="PUNJAB" <?php echo selected("PUNJAB",$shop->state); ?>>PUNJAB</option>
                <option value="PUDUCHERRY" <?php echo selected("PUDUCHERRY",$shop->state); ?>>PUDUCHERRY</option>
                <option value="ODISHA" <?php echo selected("ODISHA",$shop->state); ?>>ODISHA</option>
              	<option value="NAGALAND" <?php echo selected("NAGALAND",$shop->state); ?>>NAGALAND</option>
               	<option value="MIZORAM" <?php echo selected("MIZORAM",$shop->state); ?>>MIZORAM</option>
                <option value="MEGHALAYA" <?php echo selected("MEGHALAYA",$shop->state); ?>>MEGHALAYA</option>
              	<option value="MANIPUR" <?php echo selected("MANIPUR",$shop->state); ?>>MANIPUR</option>
                <option value="MAHARASHTRA" <?php echo selected("MAHARASHTRA",$shop->state); ?>>MAHARASHTRA</option>
              	<option value="MADHYA PRADESH" <?php echo selected("English",$shop->state); ?>>MADHYA PRADESH</option>
                <option value="LAKSHADWEEP" <?php echo selected("English",$shop->state); ?>>LAKSHADWEEP</option>
                <option value="KERALA" <?php echo selected("KERALA",$shop->state); ?>>KERALA</option>
              	<option value="KARNATAKA" <?php echo selected("KARNATAKA",$shop->state); ?>>KARNATAKA</option>
              	<option value="JHARKHAND" <?php echo selected("JHARKHAND",$shop->state); ?>>JHARKHAND</option>	
                <option value="JAMMU & KASHMIR" <?php echo selected("JAMMU & KASHMIR",$shop->state); ?>>JAMMU & KASHMIR</option>
              	<option value="HIMACHAL PRADESH" <?php echo selected("HIMACHAL PRADESH",$shop->state); ?>>HIMACHAL PRADESH</option>
              	<option value="HARYANA" <?php echo selected("HARYANA",$shop->state); ?>>HARYANA</option>	
               	<option value="GUJARAT" <?php echo selected("GUJARAT",$shop->state); ?>>GUJARAT</option>
              	<option value="GOA" <?php echo selected("GOA",$shop->state); ?>>GOA</option>
                <option value="DELHI" <?php echo selected("DELHI",$shop->state); ?>>DELHI</option>
                <option value="DAMAN & DIU" <?php echo selected("DAMAN & DIU",$shop->state); ?>>DAMAN & DIU</option>
              	<option value="DADRA & NAGAR HAVELI" <?php echo selected("DADRA & NAGAR HAVELI",$shop->state); ?>>DADRA & NAGAR HAVELI</option>
              	<option value="CHHATTISGARH" <?php echo selected("CHHATTISGARH",$shop->state); ?>>CHHATTISGARH</option>
                <option value="CHANDIGARH" <?php echo selected("CHANDIGARH",$shop->state); ?>>CHANDIGARH</option>
              	<option value="BIHAR" <?php echo selected("BIHAR",$shop->state); ?>>BIHAR</option>
              	<option value="ASSAM" <?php echo selected("ASSAM",$shop->state); ?>>ASSAM</option>
              	<option value="ARUNACHAL PRADESH" <?php echo selected("ARUNACHAL PRADESH",$shop->state); ?>>ARUNACHAL PRADESH</option>
              	<option value="ANDHRA PRADESH" <?php echo selected("ANDHRA PRADESH",$shop->state); ?>>ANDHRA PRADESH</option>
              	<option value="ANDAMAN & NICOBAR ISLANDS" <?php echo selected("ANDAMAN & NICOBAR ISLANDS",$shop->state); ?>>ANDAMAN & NICOBAR ISLANDS</option>
              </select>
              
              <label for="zip">Zip</label>
              <input type="text" name="zip" value="<?php echo $shop->zip?>">
              
              <label for="shop_phone">Shop Phone(in any)</label>
              <input type="text" name="shop_phone" value="<?php echo $shop->shop_phone?>">
              
              <label for="shop_email">Shop email(if any)</label>
              <input type="text" name="shop_email" value="<?php echo $shop->shop_email?>">
              
              <input type="submit" name="submit" class="btn btn-primary" value="SAVE">
 
         </form>
        </div>
 	</div>
 </div>
 <?php
}function selected($str1,$str2){
	if($str1==$str2){
		return "selected";	
	}
}
?>
</body>
</html>
