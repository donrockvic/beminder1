 <?php require_once("../private/includes/initialize.php");?>
 <?php require_once("../protected/header.php");?>
 <?php
    $path;	 
 	if(isset($_GET['q'])){ 
	  if(strlen($_GET['q'])>0){
		$books=$books->search($_GET['q']);
		$sbooks=$sbooks->search($_GET['q']);
		$result=array_merge($books,$sbooks);
		$count=count($result);
		if($count>0){
			 echo "<h4 style=\"padding-left:1em\"> Showing  <a href=\"\">".$count." </a>Search Result of <a href=\"\">".$_GET['q']."</a> </h4>";
			 show($path,$result);
		}else{
			echo "<h3>Sorry No result Found .</h3>";	
		}
	  }else{
		echo "<h3>No result Foun</h3>d";  
	  }	
	}else{
		echo "<h3>Sorry No result Found .</h3>";	
	}
	function show($path,$onecolumn){
	 $total=count($onecolumn);
	 $no_of_div=ceil($total/10);
	 //echo $no_of_div;
	 $divisions = array_chunk($onecolumn,10);
	 $count= count($divisions);
?>
<link rel="stylesheet" href="<?php echo $path?>../css/Beminder.in buy and sell books table2.css">
<link rel="stylesheet" type="text/css" href="../css/Beminder.in Buy and sell books search_page.css">
<div class="container-fluid">
 
    <div class="row">
      <div class="col-md-2">
      <div hidden="true">Beminder.in buy and sell books Place for options</div>
     </div>
      <div class="col-md-8 result" >
      
         <div id="carousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
            <?php
			if($count>0){
				foreach($divisions[0] as $oneset){
			?>
            <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-*">
            <a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-*">
             <table>
                <tr><td><a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
                
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
            <div class="col-md-4 col-sm-4 col-xs-*">
            <h5>Price Details</h5>
         	<table>
            <tr> <th><?php if($oneset->price >0){?>New Book : <span class="price">Rs <?php echo calc($oneset->price,$oneset->discount)?></span>  <small><strike>Rs. <?php echo $oneset->price ?></strike><br/>
            Save : Rs. <?php echo discount($oneset->price,$oneset->discount) ."(".$oneset->discount?>%)</small><?php } ?> </th> </tr>
            <tr> <th><?php if($oneset->sprice >0){?>Second Hand : Rs<?php echo $oneset->sprice?><?php } ?> </th> </tr>
            <tr> <th><?php if($oneset->rent >0){?>Rent : Rs<?php echo $oneset->rent?><?php } ?> </th> </tr>
            <tr> <th><?php if($oneset->erent >0){?>Ebook Version : RS <?php echo $oneset->erent?><?php } ?></th> </tr>
            
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
		<div class="col-md-3 col-sm-3 col-xs-*">
		<a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><img src="<?php echo $path ?>../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image;?>" class="bookImg" alt="Product Image"></a>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-*">
		 <table>
			<tr><td><a href="<?php echo $path?>book.php/<?php echo $oneset->type."/".$oneset->subtype."/".$oneset->title ?>"><?php echo $oneset->title ?></a>
			
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
		<div class="col-md-4 col-sm-4 col-xs-*">
			<h5>Price Details</h5>
		 <table>
			<tr> <th><?php if($oneset->price >0){?>New Book : Rs <span class="price"><?php echo $oneset->price?></span> <small><strike>Rs. <?php echo $oneset->price ?></strike><br/>
			Save : Rs. <?php echo discount($oneset->price,$oneset->discount) ."(".$oneset->discount?>%)</small><?php } ?></th> </tr>
			<tr> <th><?php if($oneset->sprice >0){?>Second Hand : Rs <?php echo $oneset->sprice?><?php } ?> </th> </tr>
			<tr> <th><?php if($oneset->rent >0){?>Rent :Rs <?php echo $oneset->rent?><?php } ?> </th> </tr>
			<tr> <th><?php if($oneset->erent >0){?>Ebook Version : Rs <?php echo $oneset->erent?><?php } ?></th> </tr>
		   
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
<div class="col-md-2 col-sm-* col-xs-*" hidden="true">
Beminder.in buy and sell books plave for  ADVERTISE
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