  <?php require_once("../protected/header.php");?>
  
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-10 col-md-offset-1">
         <h3>Our Contact :</h3>
        	<p><strong>Address :</strong> Bhopal, Madhya Pradesh </p>
            <p><strong>Email :</strong>contact@beminder.in</p>
			<p><strong>Email 2 :</strong>support@beminder.in</p>
            <p><strong>Phone :</strong>(+91) - 8109448210</p>
            
        </div>
  	</div>
  </div>
 <?php
  	if(isset($_POST['feedback'])){
		$report->name=$_POST['name'];
		$report->email=$_POST['email'];
		$report->feedback=$_POST['feedback'];
		$required_fields=array('name','email','feedback');
        validate_presences($required_fields) ; 
		$final=form_errors($errors);		
		if($final==""){
			if(!$report->save()){
				showform($report,"Unable to send feedback");	
			}else{
				showform($report,"Your feedback had been sent to the Beminder, Thanks");	
			}
		}else{
			 displayForm($report,$final);
		}
	}else{	
		showform($report,"Fill the fom to send feedback");
	}
  ?>
 <?php function showform($report,$msg){?>
 <div class="container-fluid">
 	<div class="row">
 		<div class="col-md-offset-1 col-md-10" id="feedback" style="margin-bottom:1em">
        <fieldset><legend>FEEDBACK FORM</legend>
        <?php echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';?>
        <form action="contactus.php" method="post">
                <label for="name">Your Name</label>
            	<input type="text" name="name" >
                <label for="email">Email</label>
                <input type="text" name="email">
                <label for="feedback">Feedback/Report</label>
                <textarea name="feedback" id="feedback" cols="20" rows="5"></textarea>
                
         	 <input type="submit" name="submit" value="SEND FEEDBACK" class="btn btn-primary">
            </form>
        </fieldset>
        	
        </div>
 	</div>
 </div>
 <?php }require_once("../protected/footer.php");?>