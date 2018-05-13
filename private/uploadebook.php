<html>
<head>
	<title> ADD OR UPDATE THE BOOk </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.4.css">
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
    <link rel="stylesheet" href="../css/form.css" type="text/css">
    <script src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
	
<?php
    global $errors;
 	require_once ("includes/initialize.php");
	$upload_errors = array(
		UPLOAD_ERR_OK 		=> "No errors.",
		UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
	  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
	  UPLOAD_ERR_PARTIAL 	=> "Partial upload.",
	  UPLOAD_ERR_NO_FILE 	=> "No file selected.",
	  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
	  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	);
	if(isset($_POST['submit'])){
		$tmp_file = $_FILES['file_upload']['tmp_name'];
		$target_file = basename($_FILES['file_upload']['name']);
		$upload_dir = "../ebooks";
		if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
			$message = "File uploaded successfully.";
		} else {
			$error = $_FILES['file_upload']['error'];
		   $errors['image'] = $upload_errors[$error];
		}
		 $ebook->book_id=$_POST['id'];
		 $ebook->name=basename($_FILES['file_upload']['name']);
 
		
		$final=form_errors($errors);		
		if($final==""){
            if(!$ebook->save()){
                die("Unable To Register the book");	
            }else{
                echo "<script type=\"text/javascript\"> alert(\"your ebook is sucessfully inserted\");
				history.go(-2); </script>";		
            }	
        }else{
            displayForm($final,$books);
        }
	}else if(isset($_GET['submit'])){
		 $id=$_GET['bid'];
		 displayForm($id,"");
	}
	
    function displayForm($id,$message){  
?>
 
<div class="container-fluid" style="margin-top:2em;padding-top:0em;">
  <div class="row col-md-offset-3 col-md-6 loginBox">
    <div class="col-md-12">
    <div class="login" >Upload e- BOOK</div>
    	 <div class="alert alert-success" role="alert">
         	<p>You have to select the   file every time you add  </p>
            <p>Size of ebook must be less than 70 MB</p>
         </div>
         <?php if(strlen($message)>0){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
        <form  enctype="multipart/form-data" name="form1" method="post" action="uploadebook.php">
            
            <input type="hidden" name="MAX_FILE_SIZE" value="73400320" />
            
            <label for="id">ID :</label>
            <input type="text" name="id" id="id"  value="<?php echo $id; ?>" >
 
 			<label for="file_upload">Upload ebook: <br><small>(Choose secreat name of pdf)</small></label>
            <input type="file" name="file_upload" id="file-upload">
            	                        
            <input type="submit" name="submit" class="btn btn-primary" id="submit" value="add/update">
         
          </form>
         </div>
    <div class="col-md-3"></div>
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

 