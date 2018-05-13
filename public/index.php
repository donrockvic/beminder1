<?php require_once("../protected/header.php");?>
 <style>
.discount{
  position: absolute; 
   top: 30px; 
   left:0px; 
    z-index: 1000;
    background-color:coral;
    width: 5em;
    color:white;
}
</style>
  <!-- -->
<div id="carousel1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1" data-slide-to="1"></li>
    <li data-target="#carousel1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../Beminder.in buy and sell books images/Carousel_Placeholder.png" alt="First slide image" class="center-block">  
    </div>
    <div class="item">
     <img src="../Beminder.in buy and sell books images/Carousel_Placeholder1.png" alt="Second slide image" class="center-block">  
    </div>
    <div class="item">
      <img src="../Beminder.in buy and sell books images/Carousel_Placeholder2.png" alt="Third slide image" class="center-block">
    </div>
  </div>
  <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
  <hr/>
<div class="container">
 <div class="row" >
   <div class="col-md-11 col-xs-*">
    <h4>Recommended Books</h4> 
    <?php 
	$part1=$books->find_all();
    $part2=$sbooks->find_all();
	$allbooks = array_merge($part1, $part2);
	shuffle($allbooks);
	$subset = array_slice($allbooks, 0,7);
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"> 
              <center>';
		echo '<a href="'.$path.'book.php/'.$bookscl->type.'/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="bookImg" alt=""></center><p class="discount">'.$bookscl->discount.'% OFF</p><center><p>'.$bookscl->title.'</a><br/><small>Author : '.$bookscl->author.'</small></p>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span><strike><small> Rs.'.$bookscl->price.'</small></strike></p>'; ?>
        <?php
		echo '</center></div>';		
	}
	
	?>
   </div>
   <?php
   echo '<div class="col-md-1 col-xs-* text-left"><a type="button" class="btn btn-primary" href="'.$path.'books.php">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';
   ?>
 </div>
 <hr/>
 <div class="row" >
    <div class="col-md-11 col-xs-*" style="margin-top:1em;">
    <?php 
	$Enggbook1 = $books->find_by_type('lt'); 
	$Enggbook2 = $sbooks->find_by_type('lt'); 
	$Enggbooks = array_merge($Enggbook1, $Enggbook2);
	$subset = array_slice($Enggbooks, 0,7);
	echo '<h4><a href="'.$path.'booksRow.php/lt">Literature Books</a></h4>';
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"><center>';
		echo '<a href="'.$path.'book.php/lt/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="bookImg" alt=""><p>'.$bookscl->title.' / '.$bookscl->author.'</p></a>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span> <strike><small> Rs.'.$bookscl->price.'</small></strike><br/><small>Save : Rs.'.discount($bookscl->price,$bookscl->discount).'('.$bookscl->discount.'%)</small></p>';?> 
        <?php
		echo '</center></div>';	
	}
	
	?>
    </div><?php echo '<div class="col-md-1 col-xs-* text-left"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/lt">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';?>
 </div>
 <hr/>
 <div class="row" >
    <div class="col-md-11 col-xs-*" style="margin-top:1em;">
    <?php 
	$Enggbook1 = $books->find_by_type('gh'); 
	$Enggbook2 = $sbooks->find_by_type('gh'); 
	$Enggbooks = array_merge($Enggbook1, $Enggbook2);
	$subset = array_slice($Enggbooks, 0,7);
	echo '<h4><a href="'.$path.'booksRow.php/gh">General Intrest / Self Help</a></h4>';
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"><center>';
		echo '<a href="'.$path.'book.php/gh/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="bookImg" alt=""><p>'.$bookscl->title.' / '.$bookscl->author.'</p></a>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span> <strike><small> Rs.'.$bookscl->price.'</small></strike><br/><small>Save : Rs.'.discount($bookscl->price,$bookscl->discount).'('.$bookscl->discount.'%)</small></p>';?> 
        <?php
		echo '</center></div>';	
	}
	
	?>
    </div>
    <?php
	echo '<div class="col-md-1 col-xs-* text-left"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/gh">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';
	?>
 </div> 
 <hr/>
 <div class="row" >
    <div class="col-md-11 col-xs-*" style="margin-top:1em;">
    <?php 
	$Enggbook1 = $books->find_by_type('e'); 
	$Enggbook2 = $sbooks->find_by_type('e'); 
	$Enggbooks = array_merge($Enggbook1, $Enggbook2); 
	$subset = array_slice($Enggbooks, 0,7);
	echo '<h4><a href="'.$path.'booksRow.php/e">Engineering Books</a></h4>';
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"><center>';
		echo '<a href="'.$path.'book.php/e/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="img-responsive bookImg" alt=""><p>'.$bookscl->title.' / '.$bookscl->author.'</p></a>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span> <strike><small> Rs.'.$bookscl->price.'</small></strike><br/><small>Save : Rs.'.discount($bookscl->price,$bookscl->discount).'('.$bookscl->discount.'%)</small></p>';?> 
        <?php
		echo '</center></div>';	
	}
	?>
    </div>
    <?php
	echo '<div class="col-md-1  col-xs-*text-left"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/e">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';
	?>
 </div>
 <hr/>
 <div class="row" >
    <div class="col-md-11 col-xs-*" style="margin-top:1em;">
    <?php 
	$Enggbook1 = $books->find_by_type('m'); 
	$Enggbook2 = $sbooks->find_by_type('m'); 
	$Enggbooks = array_merge($Enggbook1, $Enggbook2); 
	$subset = array_slice($Enggbooks, 0,7);
	echo '<h4><a href="'.$path.'booksRow.php/m">Medical Books</a></h4>';
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"><center>';
		echo '<a href="'.$path.'book.php/m/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="img-responsive bookImg" alt=""><p>'.$bookscl->title.' / '.$bookscl->author.'</p></a>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span> <strike><small> Rs.'.$bookscl->price.'</small></strike><br/><small>Save : Rs.'.discount($bookscl->price,$bookscl->discount).'('.$bookscl->discount.'%)</small></p>';?> 
        <?php
		echo '</center></div>';	
	}
	?>
    </div>
    <?php
	echo '<div class="col-md-1 col-xs-* text-left"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/m">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';
	?>
 </div>
 <hr/>
 <div class="row" >
    <div class="col-md-11 col-xs-*" style="margin-top:1em;">
    <?php 
	$Enggbook1 = $books->find_by_type('cm'); 
	$Enggbook2 = $sbooks->find_by_type('cm'); 
	$Enggbooks = array_merge($Enggbook1, $Enggbook2); 
	$subset = array_slice($Enggbooks, 0,7);
	echo '<h4><a href="'.$path.'booksRow.php/cm">Competative Exams Books</a></h4>';
	foreach($subset as $bookscl){ 
		echo '<div class="bookBox"><center>';
		echo '<a href="'.$path.'book.php/cm/'.$bookscl->subtype.'/'.$bookscl->title.'"><img src="'.$path.'../Beminder.in buy and sell books images/booksimg/'.$bookscl->image.'" class="img-responsive bookImg" alt=""><p>'.$bookscl->title.' / '.$bookscl->author.'</p></a>'.'<p>Rs.<span class="price">'.calc($bookscl->price,$bookscl->discount).'</span> <strike><small> Rs.'.$bookscl->price.'</small></strike><br/><small>Save : Rs.'.discount($bookscl->price,$bookscl->discount).'('.$bookscl->discount.'%)</small></p>';?> 
        <?php
		echo '</center></div>';	
	}
	?>
    </div>
    <?php
	echo '<div class="col-md-1 col-xs-* text-left"><a type="button" class="btn btn-primary" href="'.$path.'booksRow.php/cm">MORE<small><span class="glyphicon glyphicon-chevron-right"></span></small> </a></div>';
	?>
 </div>
</div>
 
<?php require_once("../protected/footer.php"); ?>