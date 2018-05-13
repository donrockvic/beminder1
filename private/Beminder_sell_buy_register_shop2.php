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
	if(isset($_SESSION['shopid'])){
		$data=$shop->authenticate($_SESSION['shopid']);
		if($data){
			redirect_to("beminder_sell_buy_seller_dashboard.php");
		}else{
		   displayForm("",$shop);
		} 
	} 	
	if(isset($_POST['submit']) && isset($_SESSION['shopid']) && isset($_POST['chk'])){
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
		
		 $ids=$shop->get_ids();
        chk_for_id($ids,$_SESSION['shopid']);
		
		$final=form_errors($errors);
		
		if($final==""){
            if(!$shop->create()){
                die("Unable To Register ");	
            }else{
				redirect_to("beminder_sell_buy_seller_dashboard.php");
            }	
        }else{
			
            displayForm($final,$shop);
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
         <form action="Beminder_sell_buy_register_shop2.php" method="post">
         	  <label for="landmark">Landmark : </label>
              <input type="text" name="landmark" value="<?php echo $shop->landmark?>">
              
              <label for="address">Address : </label>
              <input type="text" name="address" value="<?php echo $shop->address?>">
              
              <label for="city">City</label>			  
			  <input type="text" name="city" value="<?php echo $shop->city?>">
              
              <label for="state">State</label>
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
              	<option value="MADHYA PRADESH">MADHYA PRADESH</option>
                <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                <option value="KERALA">KERALA</option>
              	<option value="KARNATAKA">KARNATAKA</option>
              	<option value="JHARKHAND">JHARKHAND</option>	
                <option value="JAMMU & KASHMIR">JAMMU & KASHMIR</option>
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
              
              <label for="zip">Zip</label>
              <input type="text" name="zip" value="<?php echo $shop->zip?>">
              
              <label for="shop_phone">Shop Phone(in any)</label>
              <input type="text" name="shop_phone" value="<?php echo $shop->shop_phone?>">
              
              <label for="shop_email">Shop email(if any)</label>
              <input type="text" name="shop_email" value="<?php echo $shop->shop_email?>">
              
              <div style=" text-overflow:clip;padding:1em 1em">
    <input type="checkbox" id="show" name="chk">  I  agree with <a href="">Seller Terms & Conditions</a>    </div>
              
              <input type="submit" name="submit" class="btn btn-primary" value="SAVE">
 
         </form>
        </div>
 	</div>
 </div>
 <?php
}
?>
</body>
</html>
