 <?php include ("includes/initialize.php");?>
 <!-- Beminder.in buy and sell books online : title-->
<title>Beminder.in | Buy and Sell books online</title>

<!-- Beminder.in buy and sell books online : page Icon -->
<link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />

<!-- Beminder.in buy and selk books online : css style sheet -->
 <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
 <link rel="stylesheet" type="text/css" href="../css/form.css">
 <link rel="stylesheet" type="text/css" href="../css/Beminder.in buy and sell books table2.css">
 <?php
 	if(isset($_POST['assign'])){
	  $userebook->enroll_id=$_POST['enroll_id'];
	  $userebook->ebook_id=$_POST['ebook_id'];
	  $userebook->email_id=$_POST['email_id'];
	  
	  if(!$userebook->create()){
			  echo '<script>alert("Some error occured");</script>';
	  }else{
			echo '<script>alert("Ebook is added to the user");history.go(-2);</script>';  
	  }
	}
 ?>
 <div class="container" style="margin-top:2em">
 <?php
 $ebooks=$ebook->find_all();
 ?>
 <table border="1">
 <tr><th>ID</th><th>BOOK ID</th><th>NAME</th></tr>
 <?php
 foreach($ebooks as $one){
	 echo '<tr><th>'.$one->id.'</th><th>'.$one->book_id.'</th><th>'.$one->name.'</th></tr>';
 }
 ?>
 </table>
 </div>
 <hr>
 <div class="container">
 	<div class="row" style="margin-top:1em">
    	<div class="col-md-5 col-md-offset-2 col-xs-*">
        	ADD EBOOK TO USER : 
        	<form action="beminder.in add ebook to user.php" method="post">
            	<label for="enroll_id">Enroll Id : <br> <small>(Use unique enroll id)</small></label>
                <input type="text" name="enroll_id">
                
                <label for="ebook_id">Book Id</label>
                <input type="text" name="ebook_id">
                
                <label for="email_id">Email Id</label>
                <input type="text" name="email_id">
                
                <input type="submit" name="assign" class="btn btn-primary">
            </form>
        </div>
    </div>
 </div>