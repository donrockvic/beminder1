 <?php
	include_once("../protected/header.php");
	ob_start();
	//echo $num;
	//$path;
	$onerow="";
	 if($num == 2){
		 //echo "one row";
		 //print_r($conditions);
		 $part2=$sbooks->find_by_type($conditions[1]);
		 $part1=$books->find_by_type($conditions[1]);
		 $onerow=array_merge($part1, $part2); 
		 show($path,$conditions,$onerow);
	 }else if($num == 0){
		 redirect_to("books.php");
	 }else{
		oops($path);
	 }
	 function show($path,$conditions,$onerow){
?>
<div class="container-fluid">
	<div class="row col-md-12">
     <ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo $path;?>books.php">Books</a></li> 
         <li class="breadcrumb-item active"><?php echo books::$types[$conditions[1]]; ?></li></ol>
    </div>
	<div class="row">
    	<div class="col-md-2" style="border:#B8ADAD solid 1px; ">
        <h4>Filters  </h4><hr/>
        <h5>Categories :</h5>
        <?php
		foreach( books::${$conditions[1]} as $keys=>$sections){
			echo '<a href="'.$path.'Beminder.in buy and sell books booksColumn.php/'.$conditions[1].'/'.$keys.'"><h6>'.$sections.'</h6></a>';
		}
		?>
       <hr/>
        </div>
        <div class="col-md-8" style="border:#B8ADAD solid 1px; ">
        <?php
		foreach( books::${$conditions[1]} as $keys=>$sections){
			echo '<a href="'.$path.'Beminder.in buy and sell books booksColumn.php/'.$conditions[1].'/'.$keys.'"><h4>'.$sections.'</h4></a>';
			echo '<div class="row">';
			$i=0;
			shuffle($onerow);
			foreach($onerow as $oneset){
			 if($oneset->subtype==$keys && $i<5){ 
		?>
        	 <div class="bookBox"><center>
             	<a href="<?php echo $path?>book.php/<?php echo $oneset->type ?>/<?php echo $oneset->subtype ?>/<?php echo $oneset->title ?> "><img src="<?php echo $path?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image ?>" class="bookImg" alt=""><br/><?php echo $oneset->title ." / ".$oneset->author?></a>
                <p>Rs.<span class="price"><?php echo calc($oneset->price,$oneset->discount) ?></span> <strike><small> Rs.<?php echo $oneset->price ?></small></strike><br/><small>Save : Rs.<?php echo discount($oneset->price,$oneset->discount).'('.$oneset->discount ?>%)</small></p>
                
         <p>Status : <small><?php if($oneset->amount>0){echo '<span class=" alert-success">IN STOCK</span>';}else{ echo '<span class=" alert-danger">OUT OF STOCK</span>';} ?></small>	 </p>
         
            </center></div>
        <?php
			 $i++;	 
			 }				
			}
			echo '</div>';
			echo '<div class="row col-md-12 text-right"><a type="button" class="btn btn-primary" href="'.$path.'Beminder.in buy and sell books booksColumn.php/e/'.$keys.'">More<small><span class="glyphicon glyphicon-chevron-right"></span></small></a></div>';
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