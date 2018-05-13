<?php include ("includes/initialize.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Beminder.in buy and sell books online : page Icon -->
<link rel="shortcut icon" href=" ../Beminder.in buy and sell books images/beminder logo.png" />

<!-- Beminder.in buy and selk books online : css style sheet -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
<link rel="stylesheet" type="text/css" href="../css/display.css">
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/Beminder.in buy and sell books menu.css">
<title>Seller Dashboard</title>
</head> 

<body>
<?php 
if(isset($_SESSION['shopid'])){
		show(); 
}else{
	//unset($_SESSION['shopid']);
	redirect_to("../public");
}
?>
<?php function show(){?>
<div class="container-fluid" style="margin-top:2em">
	<div class="row col-md-4 col-md-offset-1"><a href="../public/index.php"><img class="img img-responsive" src="../Beminder.in buy and sell books images/beminder logo.png" alt=""   width="20%"></a></div>
	<div class="row">
		<div class="col-md-5 col-md-offset-3 loginBox" style="margin-top:2em">
       <h3> Hi ! <?php echo $_SESSION['shopname'] ?>,    your Options:</h3>
          <br/>
        	<ol>
        		<li><a type="button" class="btn btn-primary menu" href="beminder_seller_books_add_update.php">Upload a book</a></li>
        		<li><a type="button" class="btn btn-primary menu" href="beminder_seller_books.php">Show all book</a></li>
                <li><a type="button" class="btn btn-primary menu" href="beminder_seller_books.php">Add Ebooks</a></li>
        		<li><a type="button" class="btn btn-primary menu" href="beminder_seller_orders.php">show orders</a></li>
        		<li><a type="button" class="btn btn-primary menu" href="Beminder.in buy and sell books updateshop.php">Change Your Shop Details</a></li>
          		<li><a type="button" class="btn btn-primary menu" href="logout.php">Logout</a></li>
        	</ol>
        </div>
	</div>
</div>

<?php } ?>
</body>
</html>