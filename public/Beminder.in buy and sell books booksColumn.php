 <?php
	include_once("../protected/header.php"); 
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
	//echo $num;
	$path;
	$onecolumn;
	 if($num == 3){
		 //echo "one column";
		 //print_r($conditions);
		 $part1=$books->find_by_subtype($conditions[2]);
		 $part2=$sbooks->find_by_subtype($conditions[2]);
		 $onecolumn=array_merge($part1,$part2);
		 show($path,$conditions,$onecolumn);
	 }else if($num == 2){
		 redirect_to($path."booksRow.php/".$conditions[1]);
	 }else if($num == 0){
		 redirect_to("books.php");
	 }else{
		oops($path);
	 }
	 function show($path,$conditions,$onecolumn){
		 $total=count($onecolumn);
		 $no_of_div=ceil($total/10);
		 //echo $no_of_div;
 		 $divisions = array_chunk($onecolumn,10);
		 $count= count($divisions);
?>
<link rel="stylesheet" href="<?php echo $path?>../css/Beminder.in buy and sell books table2.css">
<div class="container-fluid">
	<div class="row col-md-12">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo $path;?>books.php">Books</a></li>
         <li class="breadcrumb-item"><a href="<?php echo $path;?>booksRow.php/<?php echo $conditions[1];?>"><?php echo books::$types[$conditions[1]]; ?></a></li>
         <li class="breadcrumb-item active"><?php echo books::$subtypes[$conditions[2]]; ?></li></ol>
    </div>
    <div class="row">
      <div class="col-md-2" > <div hidden="true"> option </div></div>
      <div class="col-md-8" style="border:#B8ADAD solid 1px;padding-top:10px">
      
         <div id="carousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
            <?php
			if($count>0){
				foreach($divisions[0] as $oneset){
				?>

                <div class="row">
                	<div class="col-md-3">
                    <a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
                    </div>
                	<div class="col-md-5">
                     <table>
                     	<tr><td><a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
                        
                        </td></tr>
                        <tr><th><small>By : <a href="<?php echo $path?>Beminder.in buy and sell book sellers.php/<?php echo $oneset->uploader;?>"><?php echo $oneset->uploader;?></a></small><hr/></th></tr>
                        <tr><th>Status : <small><?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></small> </th></tr>
                        <tr><th>Author : <a href="<?php echo $path?>Beminder.in buy and sell book author.php/<?php echo $oneset->author;?>"><?php echo $oneset->author;?></a></th></tr>
                        <tr><th>Language : <?php echo $oneset->lasttype; ?></th> </tr>
                        <tr> <th>Payment Mode : Cash On delivery</th></tr>
                        <tr> <th>Publisher : <?php echo $oneset->publisher ?></th> </tr>
                        <tr> <th>ISBN-I : <?php echo $oneset->ISBN1 ?></th>  </tr>
                        <tr> <th>ISBN-II : <?php echo $oneset->ISBN2 ?></th>  </tr>
                        <tr> <th>Added on : <?php echo $oneset->dates ?></th>  </tr>
                     </table>
                    </div>
                	<div class="col-md-4">
                     	<h5>Price Details</h5>
                     <table>
                     	<tr> <th><?php if($oneset->price >0){?>New Book : <span class="price">Rs <?php echo calc($oneset->price,$oneset->discount)?></span>  <small><strike>Rs. <?php echo $oneset->price ?></strike><br/>
                        Save : Rs. <?php echo discount($oneset->price,$oneset->discount) ."(".$oneset->discount?>%)</small><?php } ?> </th> </tr>
                     	<tr> <th><?php if($oneset->sprice >0){?>Second Hand : Rs<?php echo $oneset->sprice?><?php } ?> </th> </tr>
                     	<tr> <th><?php if($oneset->rent >0){?>Rent : Rs<?php echo $oneset->rent?><?php } ?> </th> </tr>
                        <tr> <th><?php if($oneset->erent >0){?>Ebook Version : RS <?php echo $oneset->erent?><?php } ?></th> </tr>
                        <tr> <th>
                        <br/>
                        <a  href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>" type="button" ><button class="btn btn-primary" style="width:95%; font-size:large">Buy</button></a>
                        </th> </tr>
                        <tr><th>
                        	<form action="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/<?php echo $conditions[1]."/".$conditions[2]?>" method="post">
                            	<input type="hidden" name="productid" value="<?php echo $oneset->id?>">
                                <input type="submit" style="width:95%" name="addtocart" class="btn btn-primary" value="Add to Cart">
                            </form>
                        </th></tr>
                     </table>
                    </div>   
                </div>
               
                <?php
				echo "<hr/>";		
				}
			} else{
				oops($path);	
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
            	 <div class="row">
                	<div class="col-md-3">
                    <a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
                    </div>
                	<div class="col-md-5">
                     <table>
                     	<tr><td><a href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
                        
                        </td></tr>
                        <tr><th><small>By : <a href="<?php echo $path?>Beminder.in buy and sell book sellers.php/<?php echo $oneset->uploader;?>"><?php echo $oneset->uploader;?></a></small><hr/></th></tr>
                       <tr><th>Status : <small><?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></small> </th></tr>
                        <tr><th>Author : <a href="<?php echo $path?>Beminder.in buy and sell book author.php/<?php echo $oneset->author;?>"><?php echo $oneset->author;?></a></th></tr>
                        <tr><th>Language : <?php echo $oneset->lasttype; ?></th> </tr>
                        <tr> <th>Payment Mode : Cash On delivery</th></tr>
                        <tr> <th>Publisher : <?php echo $oneset->publisher ?></th> </tr>
                        <tr> <th>ISBN-I : <?php echo $oneset->ISBN1 ?></th>  </tr>
                        <tr> <th>ISBN-II : <?php echo $oneset->ISBN2 ?></th>  </tr>
                        <tr> <th>Added on : <?php echo $oneset->dates ?></th>  </tr>
                     </table>
                    </div>
                	<div class="col-md-4">
                     	<h5>Price Details</h5>
                     <table>
                     	<tr> <th><?php if($oneset->price >0){?>New Book : Rs <span class="price"><?php echo $oneset->price?></span> <small><strike>Rs. <?php echo $oneset->price ?></strike><br/>
                        Save : Rs. <?php echo discount($oneset->price,$oneset->discount) ."(".$oneset->discount?>%)</small><?php } ?></th> </tr>
                     	<tr> <th><?php if($oneset->sprice >0){?>Second Hand : Rs <?php echo $oneset->sprice?><?php } ?> </th> </tr>
                     	<tr> <th><?php if($oneset->rent >0){?>Rent :Rs <?php echo $oneset->rent?><?php } ?> </th> </tr>
                        <tr> <th><?php if($oneset->erent >0){?>Ebook Version : Rs <?php echo $oneset->erent?><?php } ?></th> </tr>
                        <tr> <th>
                        <br/>
                        <a  href="<?php echo $path?>book.php/<?php echo $conditions[1]."/".$conditions[2]."/".$oneset->title ?>" type="button" ><button class="btn btn-primary" style="width:95%; font-size:large">Buy</button></a>
                        </th> </tr>
                        <tr><th>
                        	<form action="<?php echo $path ?>Beminder.in buy and sell books booksColumn.php/<?php echo $conditions[1]."/".$conditions[2]?>" method="post">
                            	<input type="hidden" name="productid" value="<?php echo $oneset->id?>">
                                <input type="submit" style="width:95%" name="addtocart" class="btn btn-primary" value="Add to Cart">
                            </form>
                        </th></tr>
                     </table>
                    </div>   
                </div>
                <hr/> 
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
      <div class="col-md-2">
      	<div hidden="true">advertise</div>
      </div>
    </div>
</div> 
<?php
	 }
?>
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
?>