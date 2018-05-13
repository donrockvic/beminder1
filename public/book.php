
<?php
	include_once("../protected/header.php");
	//echo $num;
	//$path;
 
	if(!isset($_SESSION['cart']['books_no'])){$_SESSION['cart']['books_no']=0;} 
	if(isset($_POST['addtocart'])){
		$pid=$_POST['productid'];
		if(!isset($_SESSION['cart']['books'][$pid])){
			$_SESSION['cart']['books_no']++;
			$_SESSION['cart']['books'][$pid]['productid']=$_POST['productid'];
			echo '<script>alert("Product is successfully added to cart");
			history.go(-1);</script>';
		}else{
			echo '<script>alert("Product is already added to cart");
			history.go(-1);</script>';	
		}
		
	}
?>
<link rel="stylesheet" href="<?php echo $path?>../css/Beminder.in buy and sell books table.css">
<div class="container-fluid">
<div class="row col-md-12">
 <?php 
 $onebook;
	if($num == 4){
		 //echo "one book";
		 //print_r($conditions);
		 $onebook1=$books->find_by_title($conditions[3]);
		 $onebook2=$sbooks->find_by_title($conditions[3]);
		 if($onebook1){
		 	show($path,$conditions,$onebook1,$books,$sbooks,$comment);
		 }else if($onebook2){
			 show($path,$conditions,$onebook2,$books,$sbooks,$comment);
		 }else{
			oops($path); 
		 }
	 }else if($num == 3){
		redirect_to($path."Beminder.in buy and sell books booksColumn.php/".$conditions[1]."/".$conditions[2]);
	 }else if($num == 2){
		 redirect_to($path."booksRow.php/".$conditions[1]);
	 }else if($num == 0){
		 redirect_to("books.php");
	 }else{
		oops($path);
	 }
	 
  ?>
</div>
<div class="row"></div>
</div> 
<script>
$(document).ready(function(e) {
    $('.carousel').carousel({
  		interval: 2000*60
	})
});
</script>
<?php
ob_end_flush();
include_once("../protected/footer.php");
function oops($path){?>
   <div class="container-fluid"  > 
   <div class="col-md-3"><img src="<?php echo $path; ?>../Beminder.in buy and sell books images/sad.svg" alt=""></div>
   <h1 style="padding-top:3em">OOPS ! NO BOOK MATCHED</h1>
   </div>
<?php
}
function show($path,$conditions,$onebook,$books,$sbooks,$comment){
?>
<div class="row col-md-12">
     <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="<?php echo $path;?>books.php">Books</a></li> 
     <li class="breadcrumb-item"><a href="<?php echo $path;?>booksRow.php/<?php echo $conditions[1];?>"><?php echo books::$types[$conditions[1]]; ?></a></li> 
    <li class="breadcrumb-item"> <a href="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/<?php echo $conditions[1]."/".$conditions[2] ?>"><?php echo books::$subtypes[$conditions[2]]; ?></a></li>  <li class="breadcrumb-item active"><?php echo $onebook->title  ?></li></ol>
</div>
<div class="row">
 <div class="col-md-4"><center><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $onebook->image ?>" class="bookfinal"   alt=""></center></div>
 <div class="col-md-5">
 	<h3><?php echo $onebook->title ?></h3>
    By : <a href="<?php echo $path ?>Beminder.in buy and sell book sellers.php/<?php echo $onebook->uploader;?>"><?php echo $onebook->uploader;?></a>
    <hr/>
    	Status : <?php if($onebook->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?>
        <br/><br/>
    <ul>
    Price(Inclusive of all taxes)
     <li>New One:<span class="price">Rs <?php echo calc($onebook->price,$onebook->discount);?></span> <small><strike>Rs <?php echo $onebook->price ?></strike></small>
     	<br/><small>Save : Rs <?php echo $onebook->discount?>(<?php echo $onebook->discount?>%)</small> 
     </li>
     <?php if($onebook->sprice >0){?> <li>Second Hand:<span><?php echo $onebook->sprice;?></span></li><?php } ?>
     <?php if($onebook->rent >0){?><li>Rent:<span><?php echo $onebook->rent;?></span></li><?php } ?>
     <?php if($onebook->erent >0){?><li>E-book price:<span><?php echo $onebook->erent;?></span></li><?php } ?>
  </ul>
 </div>
 <div class="col-md-3">
 	<form action="<?php echo $path?>../private/beminder_order.php" method="post" id="form1">
    
     	<input type="hidden" name="productid" value="<?php echo $onebook->id ?>">
        <input type="hidden" name="book_name" value="<?php echo $onebook->title ?>">
 		<input type="hidden" name="to" value="<?php echo $onebook->uploader ?>">
        
        <label for="quantity">Quantity</label>
    	<select name="quantity" id="quantity">
		<?php  for($i=1;$i<200;$i++){?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php }?>
        </select>
        <?php $paisa=calc($onebook->price,$onebook->discount); ?>
        <label for="for">For :</label>
        <select name="for" id="for">
        <?php if($onebook->price >0){?><option value="new book/<?php echo $paisa; ?>">NEW ONE</option><?php } ?>
        <?php if($onebook->rent >0){?><option value="rent/<?php echo $onebook->rent ?>">RENT</option><?php } ?>
        <?php if($onebook->sprice >0){?><option value="second_hand/<?php echo $onebook->sprice ?>">SECOND HAND</option><?php } ?>
     <?php if($onebook->erent >0){?><option value="ebook/<?php echo $onebook->erent ?>">EBOOK</option><?php } ?>
        </select>
       
    	<input type="submit" name="buy" value="BUY" style="width:95%;font-size:large" class="btn btn-primary">
    </form>
    <form action="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/<?php echo $conditions[1]."/".$conditions[2]."/".$onebook->title ?>" method="post" id="form2">
        <input type="hidden" name="productid" value="<?php echo $onebook->id?>">
        <input type="submit" style="width:95%" name="addtocart" class="btn btn-primary" value="Add to Cart">
    </form>
 </div>
</div>
<div class="row">
	<div class="div col-md-5 col-md-offset-4">
    	<h4>Other Details : </h4>
    	<table class="details">
        	<tr><th>Author </th><th> <?php echo $onebook->author ?></th></tr>
            <tr><th>Description</th><th><?php echo $onebook->dess ?></th></tr>
            <tr><th>Publisher</th><th><?php echo $onebook->publisher ?></th></tr>
            <tr><th>ISBN I</th><th><?php echo $onebook->ISBN1?></th></tr>
            <tr><th>ISBN II</th><th><?php echo $onebook->ISBN2 ?></th></tr>
            <tr><th>Added On</th><th><?php echo $onebook->dates ?></th></tr>
        </table>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
    <h4>Other Books of same Category</h4>
    <hr>
    <?php 
	     $part1=$books->find_by_subtype($conditions[2]);
		 $part2=$sbooks->find_by_subtype($conditions[2]);
		 $onecolumn=array_merge($part1,$part2);
		 $total=count($onecolumn);
		 $no_of_div=ceil($total/7);
		 //echo $no_of_div;
 		 $divisions = array_chunk($onecolumn,7);
		 $count= count($divisions);
    ?>
    <div id="carousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
            <?php
			if($count>0){
				foreach($divisions[0] as $oneset){
			?>
                <div class="bookBox"><center>
                	<a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>""><img src="<?php echo $path?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image?>" class="bookImg" alt=""><br/>
                	<?php echo $oneset->title; ?>/<?php echo $oneset->author?></a>
                    <p>Rs.<span class="price"><?php echo calc($oneset->price,$oneset->discount) ?></span> <strike><small> Rs.<?php echo $oneset->price ?></small></strike><br/><small>Save : Rs.<?php echo discount($oneset->price,$oneset->discount).'('.$oneset->discount ?>%)</small></p>
                     <p>Status : <small><?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></small> </p>
               </center> </div>
            <?php
				}
			}
			?> 
              </div>
            <?php 
			if($count>1){ 
				for($i=1;$i<$count;$i++){
					
			?>
              <div class="item"> 
			    <?php 
                foreach($divisions[$i] as $oneset){ 
                ?>
                <div class="bookBox"><center>
                	<a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>""><img src="<?php echo $path?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image?>" class="bookImg" alt=""><br/>
                	<?php echo $oneset->title; ?>/<?php echo $oneset->author?></a>
                    <p>Rs.<span class="price"><?php echo calc($oneset->price,$oneset->discount) ?></span> <strike><small> Rs.<?php echo $oneset->price ?></small></strike><br/><small>Save : Rs.<?php echo discount($oneset->price,$oneset->discount).'('.$oneset->discount ?>%)</small></p>
                    <p>Status : <?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></p>
               </center> </div>
                <?php
                }
                ?> 
              </div>
           <?php	
				}
			}
		   ?>
        </div>
       </div>
         <nav aria-label="...">
        <ul class="pager">
        <li><a class="left" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span>Previous</a></li>
        <li><a class="right" href="#carousel1" role="button" data-slide="next">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></li>
        </ul>
        </nav>   
    </div>
</div>
<div class="row">
<hr/>
	<div class="col-md-8 col-md-offset-2">
    <h5>Add Comment:</h5>
    	<form action="<?php echo $path ?>../private/Beminder.in user_comment.php" method="post">
        	<input type="hidden" name="pid" value="<?php echo $onebook->id ?>">
            <textarea name="comment" id="comment"  rows="3" placeholder="Add Comment...."></textarea><br/><br/><br/><br/>
            <input type="submit" class="btn btn-primary" value="Post">
        </form>
    </div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <h4>Other cusomers view :</h4>
    
     <?php 
	 $allcomments=$comment->find_by_text_pid($onebook->id);
	 foreach($allcomments as $one){
		echo '<div class="row">
				<p><a href="">'.$one->name.'</a></p>
				<p style="padding:1em 2em;border:1px solid #EEE;border-radius:7px ">'. $one->comment.'</p>
			  </div><hr/>';
	 }
	 ?>
    </div>
</div>
<?php	
	//print_r($onebook); 
 }
?>
