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

<?php
 require_once("includes/initialize.php"); 
  
if($session->is_logged_in() && isset($_SESSION['email'])){
	$seller->email=$_SESSION['email'];
	$emails=$seller->get_emails();
	chk_for_email($emails,$seller->email);
	$final=form_errors($errors);
	if($final==""){
		showbox($seller,"ad");
	}else{
		$data=$seller->authenticate($_SESSION['email']);
		$_SESSION['shopid']=$data->id;
		$_SESSION['shopname']=$data->shopname;
		redirect_to("Beminder_sell_buy_register_shop2.php");
	}
}else{
	display_steps();
}
if(isset($_POST['next']) && strlen(trim($_POST['shopname']))>0){
	$id=$seller->id='beminder'.rand(1000,8000);
	$seller->email=$_SESSION['email'];
	$seller->shopname=$_POST['shopname'];
	//echo "zzsdddddddddddddddddddddddddddddddd";
	if($seller->create()){
		$_SESSION['shopid']=$id;
		$_SESSION['shopname']=$_POST['shopname'];
		redirect_to("Beminder_sell_buy_register_shop2.php");
	}else{
	   echo("Unable to add your shop");	
	}
 
} 
?>


<?php
function showbox($seller, $message){
?>

<div class="container-fluid">
	<div class="row" style="padding:2em 0em;">
		<div class="col-md-5 col-md-offset-2 loginBox">
            <?php echo $message; ?>
        	<p>Hi <?php echo $_SESSION['fullname'] ?></p>
            <p>Welcome to our seller section. You have to enter your some of the shops details to sell your book from our site.</p>
            <p>Thanks.</p>
           
        	<form action="Beminder_sell_buy_register_shop1.php" method="post">
            	<label for="shopname">Enter Your Shop Name </label>
                <input type="text" name="shopname" value="<?php echo $seller->shopname?>">
                
                <input type="submit" name="next" class="btn btn-primary" value="NEXT">
            </form>
        </div>
        <div class="col-md-3">
        	<img src="../Beminder.in buy and sell books images/beminder_buy_sell_welcome.png" alt="">
        </div>
	</div>
</div>

<?php	
}
?>
<?php
function display_steps(){
?>
 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 col-md-offset-3 loginBox">
        	<h4>Steps to become a Seller</h4>
            <ul>
            	<li>Get Yourself <a href="UserRegister.php"> Registered </a> on our site</li>
            	<li>Get <a href="login.php">login</a> on our site</li>
            	<li>Then register Your Shop</li>
            	<li>Upload your books</li>
                <li>enjoy selling your books ..</li>
            </ul>
        </div>
	</div>
</div>
 
<?php
}
?>
</body>
</html>