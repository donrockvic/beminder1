<?php 
 require_once("../private/includes/initialize.php");
 ob_start();
 $num=0; 
 $path="";
 $conditions="";
 if(isset($_SERVER['PATH_INFO'])){
	$tr=$_SERVER['PATH_INFO'];
 	$conditions=explode('/', $tr);
 	$num=count($conditions);
	 for($i=1;$i<$num;$i++){
		$path=$path."../";
	 }  
}
?>
<!doctype html>
<html>
<head>

<!-- Beminder.in buy and sell books online : meta tags -->
<meta name="description" content="Beminder.in :Buy and sell book online, A online place from where you can get all types of books.">
<meta name="keywords" content="Beminder, Beminder.in, beminder, Sell and buy books online at best prices, Engineering books, medical books,competition books">
<meta name="author" content="Beminder">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLO" >
<!-- Beminder.in buy and sell books online : title-->
<title>Beminder.in | Buy and Sell books online</title>

<!-- Beminder.in buy and sell books online : page Icon -->
<link rel="shortcut icon" href="<?php echo $path ?>../Beminder.in buy and sell books images/beminder logo.png" />

<!-- Beminder.in buy and selk books online : css style sheet -->
<!-- <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="<?php echo $path ?>../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $path ?>../css/Beminder.in buy and sell books nav.css">
<link rel="stylesheet" href="<?php echo $path ?>../css/form.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo $path ?>../css/display.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path ?>../css/Beminder.in buy and sell icon.css">
<!-- Beminder.in buy and sell books online : Javascript files  -->
<script src="<?php echo $path ?>../js/jquery-1.11.2.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-top:145px">

<!-- Beminder.in Buy and sell books online : navbar -->
<nav class="navbar navbar-fixed-top">
   <div class="container social text-left" >
   	<a href="#" hidden="true">Track Order  |</a>
    Follow us at :   
    <a href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/facebook2.png" alt="facebook"></a>
    <a href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/twitter.png" alt="twitter"></a>
    <a href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/google-plus.png" alt="google+"></a> 
    <a href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/instagram19.png" alt="instagram"></a>
    <a href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/youtube30.png" alt="youtuve"></a>
   </div>
  <div class="container" > 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="col-md-1  col-xs-*">
        <a class="" href=""><img src="<?php echo $path ?>../Beminder.in buy and sell books images/beminder logo.png" id="logo"  alt="Beminder Logo"></a>
    </div>
    <div class="col-md-11 col-xs-*">
    <form action="<?php echo $path ?>../public/search.php" method="get" class="navbar-form">
    	 <input type="text" placeholder="Search by name, author, publication ..." name="q"> 
   		  <input style="margin-top:7px;" class="btn btn-primary" type="submit" value="Search"> 
   </form>
    </div>      
  </div>
  <!-- /.container-fluid --> 
<div class="container">
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="navbar  col-xs-*" id="menu">
  <ul class="nav navbar-nav myNav">
    <li class="link"><a href="<?php echo $path ?>../public/index.php"  style="color:#FFF;" >HOME</a></li>
    <li><a style="color:#FFF;" href="<?php echo $path ?>../public/AboutUs.php">ABOUT US</a></li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" style="color:#FFF;" data-toggle="dropdown" role="button" aria-expanded="false">BOOKS <span class="caret"></span></a>
      <ul class="dropdown-menu myDropdown" role="menu">
        <li>
        	<a href="<?php echo $path ?>booksRow.php/e" ><strong>Engineering</strong> </a>
        	<ul class="list-unstyled myNested"  role="menu">
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/civil">Civil Engineering</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/cse">Computer Science & Engineering</a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/ece">Electronics & Communication Engineering</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/ee">Electrical Engineering</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/eee">Electonics and Electrical Engineering</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/e/me">Mechanical Engineering</a></li>
                <li><a href="<?php echo $path ?>booksRow.php/e">More..</a> </li>
        	</ul>
        </li> 
        <li>
        	<a href="<?php echo $path ?>booksRow.php/em" ><strong>Econimics & Management </strong></a>
            <ul class="list-unstyled myNested"  role="menu">
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/mkt">Marketing</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/hr">Human Resource</a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/mng">Management</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/fr">Finance</a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/cm">Commerce</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/em/em">Economics</a></li>
                <li><a href="<?php echo $path ?>booksRow.php/em">More..</a> </li>
        	</ul>
        </li>
	    <li class="side1">
        	<a href="<?php echo $path ?>booksRow.php/m" ><strong>Medical</strong> </a>
            <ul class="list-unstyled myNested"  role="menu">
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/m/bot">Botany </a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/m/zoo">Zoology </a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/m/phy">Physichology </a></li>
                <li><a href="<?php echo $path ?>booksRow.php/m">More..</a> </li>
        	</ul>
        </li>
        <li class="side1">
        	<a href="<?php echo $path ?>booksRow.php/gh" ><strong>General interest/Self help</strong> </a>
             <ul class="list-unstyled myNested"  role="menu">
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/bio"> Biographics </a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/hm"> Humour </a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/sp">Spiritual  </a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/rp">Religion & philosophy  </a></li> 
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/hs"> Historical </a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/ps">Political  </a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/gg">Geographical </a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/md">Media  </a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/gh/mst">Music sports & travel </a></li>
                <li><a href="<?php echo $path ?>booksRow.php/gh/">More..</a> </li>
        	</ul>
       </li>
        <li class="side2">
        	<a href="<?php echo $path ?>booksRow.php/lt" ><strong>Literature</strong> </a>
            <ul class="list-unstyled myNested"  role="menu">
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/lt/fr">Friction </a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/lt/nfr">Non-friction </a></li> 
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/lt/nv">Novel </a></li>
        		<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/lt/py">Poetry </a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/lt/play"> Play</a></li>  
                <li><a href="<?php echo $path ?>booksRow.php/gh/">More..</a> </li>
        	</ul>
        </li>
        <li class="side2">
        	<a href="<?php echo $path ?>booksRow.php/cm" ><strong>Competative Exam</strong> </a>
            <ul class="list-unstyled myNested" role="menu">
            	<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/gate">GATE</a></li>
            	<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/psus">PSUs</a></li>
            	<li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/es">ESE</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/medical">Medical</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/cat">CAT</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/upsc">UPSC</a></li>
                <li><a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/cm/mains">IIT(MAINS+ADVANCE)</a></li>
            	<li><a href="<?php echo $path ?>booksRow.php/cm">More..</a></li>
            </ul> 
        </li>
      </ul>
    </li>
    
    <li><a style="color:#FFF;" href="<?php echo $path ?>../public/beminder_sell.php">SELL YOUR BOOK</a></li>
    <li><a style="color:#FFF;" href="<?php echo $path ?>../public/contactus.php">CONTACT US</a></li>
    <li><a style="color:#FFF;" href="<?php echo $path ?>../public/career.php">CAREER</a></li>
    <li><a style="color:#FFF;" href="<?php echo $path ?>../public/usercart.php"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/cart.svg"  alt="CART" width="40" height="20" > <?php if(isset($_SESSION['cart']['books_no'])){ echo $_SESSION['cart']['books_no']." : Items";}else{ echo "0 : Items"; } ?> </a></li>	    <li>
    	<?php if($session->is_logged_in()){	?>
	 
   	 <a href="#" class="dropdown-toggle" style="color:#FFF;" data-toggle="dropdown" role="button" aria-expanded="false">
         <?php echo "HELLO ! ".$_SESSION['fullname']." "; ?><span class="caret"></span>
     </a>  
   	 <ul class="dropdown-menu myDropdown1" role="menu">
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>../public/Beminder.in buy and sell books userprofile.php">Your Profile</a></li>
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>../public/beminder_user_order.php">Your Orders</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>../public/usercart.php">Your Cart</a></li>
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>../private/Beminder_sell_buy_register_shop1.php">Sell Your Book</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>../private/logout.php">Logout</a></li>
   	</ul>
    	
	<?php }else{ ?>
 		<a href="#" class="dropdown-toggle" style="color:#FFF;" data-toggle="dropdown" role="button" aria-expanded="false">LOGIN <span class="caret"></span></a> 
        <ul class="dropdown-menu myDropdown1" role="menu">
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path ?>../private/login.php">
        <center><button class="btn btn-primary" style="padding-left:3em; padding-right:3em;">Login</button></center></a></li>
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path ?>../private/UserRegister.php"><small>New Customer ?</small> Sign in</a></li>
     	<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $path;?>usercart.php">Your Cart</a></li>
   	</ul>
	<?php } ?>
    </li>
  </ul>
</div>
   		  
  </div>
</nav>

 

