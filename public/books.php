 <?php
	include_once("../protected/header.php"); 
	//echo $num;
	//$path;
	//echo "one row";
	//print_r($conditions);
	$allbook1=$books->find_all();
	$allbook2=$sbooks->find_all();
	$sellers=$seller->find_all();
	$allbooks=array_merge($allbook1,$allbook2);
	show($path,$allbooks,$sellers);
	function show($path,$allbooks,$sellers){
 
?>
<div class="container-fluid">
    <ol class="breadcrumb"><li class="breadcrumb-item active">Books</li></ol>
	<div class="row">
    	
    	<div class="col-md-2" style="border:#B8ADAD solid 1px; ">
        <h4>Filters  </h4><hr/>
        <h5>Categories :</h5>
        <?php
		foreach( books::$types as $keys=>$sections){
			echo '<a href="'.$path.'booksRow.php/'.$keys.'"><h6>'.$sections.'</h6></a>';
		}
		?><hr/>
        <h5>Sellers :</h5>
        <?php
		foreach($sellers as $seller){
			echo '<a href="'.$path.'Beminder.in buy and sell book sellers.php/'.$seller->shopname.'"><h6>'.$seller->shopname.'</h6></a>';	
		}
		?>
        <hr/>
        </div>
        <div class="col-md-8" style="border:#B8ADAD solid 1px; ">
        <?php
		foreach( books::$types as $keys=>$sections){
			echo '<a href="'.$path.'booksRow.php/'.$keys.'"><h4>'.$sections.'</h4></a>';
			echo '<div class="row">';
			$i=0;
			foreach($allbooks as $oneset){
			 if($oneset->type==$keys && $i < 5){
		?>
        	 <div class="bookBox"><center>
             	<a href="<?php echo $path?>book.php/<?php echo $oneset->type ?>/<?php echo $oneset->subtype ?>/<?php echo $oneset->title ?> "><img src="<?php echo $path?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image ?>" class="bookImg" alt=""><br/><?php echo $oneset->title ." / ".$oneset->author?></a>
                <p>Rs.<span class="price"><?php echo calc($oneset->price,$oneset->discount) ?></span> <strike><small> Rs.<?php echo $oneset->price ?></small></strike><br/><small>Save : Rs.<?php echo discount($oneset->price,$oneset->discount).'('.$oneset->discount ?>%)</small></p><p>Status : <small><?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></small>	 </p>
            </center> </div>
        <?php	
			$i++; 
			 }				
			}
			echo '</div>';
			echo '<div class="row col-md-12 text-right"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/'.$keys.'">More<small><span class="glyphicon glyphicon-chevron-right"></span></small></a></div>';
			echo "<hr/>";
		}
		?>  
   		</div>
        <div class="col-md-2"></div>
    </div>
</div> 
<?php
	}
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