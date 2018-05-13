 <?php
	include_once("../protected/header.php"); 
	if(isset($_POST['addtocart'])){
		$pid=$_POST['productid'];
		$_SESSION['saman'][$pid]['productid']=$_POST['productid'];
		echo '<script>alert("Product is successfully added to cart");
		history.go(-1);</script>';
	}
	//echo $num;
	$path;
	$onecolumn; 
	 if($num == 2){
		 $part1=$books->find_by_author($conditions[1]);
		 $part2=$sbooks->find_by_author($conditions[1]);
		if($part1){
			show($path,$conditions,$part1);
		}else if($part2){
			show($path,$conditions,$part2);
		}else{
			oops($path);
		}
	 } 
	 else{
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
      <h4>Search Result for : <?php echo $conditions[1]; ?></h4>
    </div>
    <div class="row">
      <div class="col-md-2">  </div>
      <div class="col-md-8" style="border: #E8E4E4 solid 3px;padding-top:20px;border-radius:10px">
      
         <div id="carousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
            <?php
			if($count>0){
				foreach($divisions[0] as $oneset){
				?>

                <div class="row">
                	<div class="col-md-3">
                    <a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
                    </div>
                	<div class="col-md-5">
                     <table>
                     	<tr><td><a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
                        
                        </td></tr>
                        <tr><th><small>By : <a href="<?php echo $path?>Beminder.in buy and sell book sellers.php/<?php echo $oneset->uploader;?>"><?php echo $oneset->uploader;?></a></small><hr/></th></tr>
                        <tr><th>Status : <?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></th></tr>
                        <tr><th>Author :  <?php echo $oneset->author;?> </th></tr>
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
                     	<tr> <th>New Book : <span class="price">Rs <?php echo calc($oneset->price,$oneset->discount)?></span>  <small><strike>Rs. <?php echo $oneset->price ?></strike><br/>
                        Save : Rs. <?php echo discount($oneset->price,$oneset->discount) ."(".$oneset->discount?>%)</small> </th> </tr>
                     	<tr> <th>Second Hand : Rs<?php echo $oneset->sprice?> </th> </tr>
                     	<tr> <th>Rent : Rs<?php echo $oneset->rent?> </th> </tr>
                        <tr> <th>Ebook Version : RS <?php echo $oneset->erent?></th> </tr>
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
                    <a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
                    </div>
                	<div class="col-md-6">
                     <table>
                     	<tr><td><a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
                        
                        </td></tr>
                        <tr><th><small>By :<a href="<?php echo $path?>Beminder.in buy and sell book sellers.php/<?php echo $oneset->uploader;?>"><?php echo $oneset->uploader;?></a></small><hr/></th></tr>
                       <tr><th>Status : <?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></th></tr>
                        <tr><th>Author :  <?php echo $oneset->author;?></th></tr>
                        <tr><th>Language : <?php echo $oneset->lasttype; ?></th> </tr>
                        <tr> <th>Payment Mode : Cash On delivery</th></tr>
                        <tr> <th>Publisher : <?php echo $oneset->publisher ?></th> </tr>
                        <tr> <th>ISBN-I : <?php echo $oneset->ISBN1 ?></th>  </tr>
                        <tr> <th>ISBN-II : <?php echo $oneset->ISBN2 ?></th>  </tr>
                        <tr> <th>Added on : <?php echo $oneset->dates ?></th>  </tr>
                     </table>
                    </div>
                	<div class="col-md-3">
                     	<h5>Price Details</h5>
                     <table>
                     	<tr> <th>New Book : <?php echo $oneset->price?></th> </tr>
                     	<tr> <th>Second Hand :<?php echo $oneset->sprice?> </th> </tr>
                     	<tr> <th>Rent :<?php echo $oneset->rent?> </th> </tr>
                        <tr> <th>Ebook Version : <?php echo $oneset->erent?></th> </tr>
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