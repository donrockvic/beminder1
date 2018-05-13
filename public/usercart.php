 <?php include ("../protected/header.php");?>
 <div class="container-fluid"> 
   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-*">
     `	 <?php
		 if(isset($_POST['remove'])){
			$productid=$removeid=trim($_POST['removeid']);
			unset($_SESSION['cart']['books'][$removeid]);
			$_SESSION['cart']['books_no']--;
		   redirect_to("usercart.php");
		 }
		 if(isset($_SESSION['cart']) && count($_SESSION['cart']['books'])>0){
		 ?>
         <div class="container-fluid cart" >
            <h4>Your Cart</h4>
            <div class="alert alert-success" role="alert">
            	 You have to buy all the items indivdually after selecting the quantity and type of service
            </div>
		 <?php
          foreach($_SESSION['cart']['books'] as $saman){
                $onebook1=$books->find_by_id($saman['productid']);
                $onebook2=$sbooks->find_by_id($saman['productid']);
                if($onebook1){
                      show($conditions,$onebook1);
                 }else if($onebook2){
                 show($conditions,$onebook2);
             } 
            echo "<hr/>";		 
          }
         ?>	
        </div>
	   <?php
         }else{
            oops();
         }
         function show($conditions,$oneset){
        ?>
        <div class="row">
            <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-*">
                <img src="../Beminder.in buy and sell books images/booksimg/<?php echo $oneset->image ?>" class="bookImg" alt="<?php  echo $oneset->title?>">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-*">
            <table>
            <tr><td>Title: <?php echo $oneset->title ?></a>
            
            </td></tr>
            <tr><th>Author : <?php echo $oneset->author;?></th></tr>   
            <tr> <th>Publisher : <?php echo $oneset->publisher ?></th> </tr> 
            <tr><th>Price</th></tr>
       		<?php if($oneset->price>0){ ?><tr> <th>New Book : <?php echo $oneset->price?></th> </tr><?php } ?>
         	<?php if($oneset->sprice>0){ ?> <tr> <th>Second Hand :<?php echo $oneset->sprice?> </th> </tr><?php } ?>
  	        <?php if($oneset->rent>0){ ?> <tr> <th>Rent :<?php echo $oneset->rent?> </th> </tr><?php } ?>
    	    <?php if($oneset->erent>0){ ?>   <tr> <th>Ebook Version : <?php echo $oneset->erent?></th><?php } ?> </tr>
            <tr> <th>
         	</table>
       		</div>
       		<div class="col-md-3 col-sm-3 col-xs-*">
            <div class="text-right">
            <form action="usercart.php" method="post">
              <input type="hidden" name="removeid" value="<?php echo $oneset->id?>">
              <button type="submit" name="remove" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>     
           </form>
           </div>
            <form action="../private/beminder_order.php" method="post" id="form1">
            <input type="hidden" name="book_name" value="<?php echo $oneset->title ?>">
            <input type="hidden" name="productid" value="<?php echo $oneset->id ?>">
            <input type="hidden" name="to" value="<?php echo $oneset->uploader ?>">
            
            <label for="quantity">Quantity</label>
            <select name="quantity" id="quantity">
            <?php  for($i=1;$i<200;$i++){?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php }?>
            </select>
            
            <label for="for">For :</label>
            <select name="for" id="for">
              <?php if($oneset->price>0){ ?><option value="new book/<?php echo $oneset->price ?>">NEW ONE</option><?php } ?>
              <?php if($oneset->rent>0){ ?><option value="rent/<?php echo $oneset->rent ?>">RENT</option><?php } ?>
              <?php if($oneset->sprice>0){ ?><option value="second_hand/<?php echo $oneset->sprice ?>">SECOND HAND</option><?php } ?>
              <?php if($oneset->erent>0){ ?><option value="ebook/<?php echo $oneset->erent ?>">EBOOK</option><?php } ?>
            </select>
           
            <input type="submit" name="buy" value="BUY" style="width:50%;font-size:large" class="btn btn-primary">
        </form>              
            </div>
        </div>
		<?php 
          }
         function oops(){
             unset($_SESSION['cart']['books_no']);
        ?>
	   <div class="container-fluid"  > 
       <div class="col-md-3 col-sm-3 col-xs-*"><img src="../Beminder.in buy and sell books images/sad.svg" alt=""></div>
       	  <h1 style="padding-top:3em">OOPS ! NO ITEM SELECTED</h1>
       </div>
		 <?php
         	}
         ?>
     </div>
   </div>
 
</div>
<?php include ("../protected/footer.php");?>