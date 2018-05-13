<html>
<head>
	<title>  ADD OR UPDATE THE BOOk </title>
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
	if(isset($_POST['submit']) && $_POST['submit']="update"){
		$tmp_file = $_FILES['file_upload']['tmp_name'];
		$target_file = basename($_FILES['file_upload']['name']);
		$upload_dir = "../Beminder.in buy and sell books images/booksimg";
		if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
			$message = "File uploaded successfully.";
		} else {
			$error = $_FILES['file_upload']['error'];
		   $errors['image'] = $upload_errors[$error];
		}
		if(strlen($_POST['id'])>0)
		{$sbooks->id=$_POST['id'];}
		$sbooks->title=$_POST['title'];
		$sbooks->author=$_POST['author'];
		$sbooks->publisher=$_POST['publisher'];
		$sbooks->dess=$_POST['desc'];
		$sbooks->image=basename($_FILES['file_upload']['name']);
		$sbooks->amount=$_POST['amount'];
		$sbooks->price=$_POST['price'];
		$sbooks->rent=$_POST['rent'];
		$sbooks->sprice=$_POST['sprice'];
		$sbooks->erent=$_POST['erent'];
		$sbooks->discount=$_POST['discount'];
		$sbooks->ISBN1=$_POST['ISBN1'];
		$sbooks->ISBN2=$_POST['ISBN2'];
		$sbooks->type=$_POST['type'];
		$sbooks->subtype=$_POST['subtype'];
		$sbooks->lasttype=$_POST['lasttype'];
		$sbooks->dates=date('Y:m:d');	
		$sbooks->uploader=$_SESSION['shopname'];
		$books->skeys=$_POST['title']." ".$_POST['author']." ".$_POST['publisher']." ".sbooks::$types[$_POST['type']]." ".sbooks::$subtypes[$_POST['subtype']]." ".$_POST['lasttype']." ".$_POST['ISBN1']." ".$_POST['ISBN2'];
		
        $required_fields=array('title','author','publisher','desc','discount','type','subtype','ISBN1');
        validate_presences($required_fields) ; 
        $required_fields1=array('author');
        validate_text($required_fields1);
 
		
		if(!isset($sbooks->id)){
			//check ISBN uniqness
			$ISBNS=$sbooks->get_ISBN();
			chk_for_ISBN($ISBNS,$sbooks->ISBN1);
			//check title number uniqness
			$title_all=$sbooks->get_titles();
			chk_for_title($title_all,$sbooks->title);
		}
		
		$final=form_errors($errors);
		if($final==""){
            if(!$sbooks->save()){
                die("Unable To Register the book");	
            }else{
                echo "<script type=\"text/javascript\"> alert(\"your book-id is sucessfully inserted\");
				history.go(-2); </script>";
				
            }	
        }else{
            displayForm($final,$sbooks);
        }
		
		
	}else{
		if(isset($_POST['id'])){
		   $sbooks=$sbooks->find_by_id($_POST['id']);
		  displayForm("",$sbooks);
		}else{
			displayForm("",$sbooks); 
		}
	}
	
    function displayForm($message,$books){  
?>
 <div class="container-fluid" style="padding-top:0em;">
	<div class="row col-md-1 col-md-offset-1">
    	<a href="../public/index.php"><img src="../Beminder.in buy and sell books images/beminder logo.png" width="100%" height="100%" class="img-responsive" alt=""></a>
    </div>
</div>  
<div class="container-fluid" style="padding-top:0em;">
  <div class="row col-md-offset-3 col-md-6 loginBox">
    <div class="col-md-12">
    <div class="login" >ADD / UPDATE YOUR BOOK</div>
    	 <div class="alert alert-success" role="alert">
         	<p>You have to select the image file every time you add or update</p>
            <p> You have to manage the type every time</p>
         </div>
         <?php if (strlen($message) > 0 ){echo '<div class="alert alert-danger" role="alert">'.$message.'</div>'; }?>
        <form id="form1" enctype="multipart/form-data" name="form1" method="post" action="beminder_seller_books_add_update.php">
            
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input type="hidden" name="id" id="id"  value="<?php echo $books->id; ?>" >
            
            <label for="title">Title : </label>
            <input type="text" name="title" id="title"  value="<?php echo $books->title; ?>">
            
            <label for="author">Author : </label>
            <input type="text" name="author" id="author" value="<?php echo $books->author; ?>" >
            
            <label for="publisher">Publisher : </label>
            <input type="text" name="publisher" id="publisher" value="<?php echo $books->publisher; ?>">
            
            <label for="desc">Description : </label>
            <textarea id="desc" name="desc" ><?php echo $books->dess; ?> </textarea>
            
            <label for="file_upload">Select Cover Image:</label>
            <input type="file" name="file_upload" id="file-upload" value="<?php echo $books->image; ?>">
            
            <label for="amount">Number of books : </label>
            <input type="text" name="amount" id="amount" value="<?php echo $books->amount; ?>" >
            
            <label for="price">Price : </label>
            <input type="text" name="price" id="price" value="<?php echo $books->price; ?>" >
          	  
            <label for="rent">Rent : </label>
            <input type="text" name="rent" id="price" value="<?php echo $books->rent; ?> ">
            
            <label for="sprice">Second-hand Price : </label>
            <input type="text" name="sprice" id="price" value="<?php echo $books->sprice; ?> ">
            
            <label for="erent">Eook Coast : </label>
            <input type="text" name="erent" id="price" value="<?php echo $books->erent; ?> ">
            
            <label for="price">Discount : </label>
            <input type="text" name="discount" id="discount" value="<?php echo $books->discount ?>" >
            
            <label for="ISBN1">ISBN : </label>
            <input type="text" name="ISBN1" id="ISBN1"  value="<?php echo $books->ISBN1 ?> ">
            
            <label for="ISBN2">ISBN : </label>
            <input type="text" name="ISBN2" id="ISBN2"  value="<?php echo $books->ISBN2 ?> ">
            
            <label for="type">Type : </label>
            <select name="type" id="type" size="1">
            <?php 
			 foreach(books::$types as $keys=>$value){ ?>
            <option value="<?php echo $keys; ?>" <?php echo selected($keys,$books->type); ?>> <?php echo $value; ?> </option>
            <?php } ?>
            </select>
 
            <label for="subtype">Sub-Type : </label>
            <select name="subtype" id="subtype">
            <?php    
			foreach(books::$subtypes as $keys=>$value){ ?>
            <option value="<?php echo $keys; ?>" <?php echo selected($keys,$books->subtype); ?>> <?php echo $value; ?> </option>
            <?php } ?>
            </select>
            <!----------- -->
            
            <label for="lasttype">Last-Type : </label>
            <select type="text" name="lasttype" >
            	<option value="">___</option>
            	<option value="English" <?php echo selected("English",$books->subtype); ?>>English</option>
            	<option value="Hindi" <?php echo selected("Hindi",$books->subtype); ?>>Hindi</option>
            </select>
                                    
            <input type="submit" name="submit" class="btn btn-primary" id="submit" value="add/update">
            <input type="reset" class="btn btn-primary">
            
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
}?>
</body>
</html>

 