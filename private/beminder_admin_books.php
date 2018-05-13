  <?php require_once("includes/initialize.php");?>
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
 <?php
  $num=0; 
 $path="";
 $conditions="";
 if(isset($_SERVER['PATH_INFO'])){
	$tr=$_SERVER['PATH_INFO'];
 	$conditions=explode('/', $tr);
 	$num=count($conditions);
	 for($i=1;$i<$num;$i++){
		$path=$path."../";
	 }  
}
 if($num == 3){
	$allbooks=$books->find_by_subtype($conditions[2]);
	booksshow($allbooks,$path);
 }else if($num == 2){
	 $allbooks=$books->find_by_type($conditions[1]);
	 booksshow($allbooks,$path);
 }else {
	 $allbooks=$books->find_all();
	 booksshow($allbooks,$path);
 } 
 
 
 
 ?>
 
 <?php
 
 function booksshow($allbooks,$path){?>
 <div>
 	<a href="beminder_sell_buy_admin_dashboard.php">Home</a>
 </div>
 <br/><br/>
	 <table border="1">
 <tr>
 	<th>Image</th>
    <th>Id</th>
 	<th>Name</th>
 	<th>Author</th>
 	<th>Publisher</th>
 	<th>Price:New/Second/Rent/Ebook</th>
    <th>Discount</th>
    <th>Type</th>
    <th>Subtype</th>
    <th>Last type</th>
 	<th>ISBN</th>
    <th>DELETE</th>
    <th>UPDATE</th>
    <th>Add Ebook</th>
 </tr>
  <?php
 foreach($allbooks as $onebook){
 ?>
 <tr>
    <th><img src="<?php echo $path; ?>../Beminder.in buy and sell books images/booksImg/<?php echo $onebook->image; ?>"  width="100px" height="120px" alt=""></th>
    <th><?php echo $onebook->id; ?></th>
 	<th><?php echo $onebook->title; ?></th>
 	<th><?php echo $onebook->author; ?></th>
    <th><?php echo $onebook->publisher; ?></th>
    <th>Price:<?php echo $onebook->price; ?> / <?php echo $onebook->sprice; ?> / <?php echo $onebook->rent; ?> / <?php echo $onebook->erent; ?></th>
    <th><?php echo $onebook->discount; ?></th>
    <th><a href="<?php echo $path; ?>beminder_admin_books.php/<?php echo $onebook->type ?>"><?php echo books::$types[$onebook->type]; ?></a></th>
    <th><a href="<?php echo $path; ?>beminder_admin_books.php/<?php echo $onebook->type ?>/<?php echo $onebook->subtype ?>"><?php echo books::$subtypes[$onebook->subtype]; ?></a></th>
    <th><?php echo $onebook->lasttype; ?></th>
 	<th><?php echo $onebook->ISBN1; ?></th>
    <th>
    <form action="beminder_admin_books.php" method="post">
    	<input type="hidden" name="id" value="<?php echo $onebook->id; ?>">
    	<input type="submit" value="delete" name="delete">
    </form>
    </th>
    <th>
    <form action="beminder_admin_books_add_update.php" method="post">
    	<input type="hidden" name="id" value="<?php echo $onebook->id; ?>">
    	<input type="submit" value="Update" name="update">
    </form>
    </th>
    <th>
    <form action="uploadebook.php" method="get">
    	<input type="hidden" name="bid" value="<?php echo $onebook->id; ?>">
    	<input type="submit" value="Add ebook" name="submit">
    </form>
    </th>
 </tr>
 <?php	 
 }
 ?>
 </table> 
 <?php
 }
 ?>
 <?php
 if(isset($_POST['id']) && $_POST['delete']="delete"){
 ?>
 <script type="text/javascript">
if(confirm("Are you sure?")) {
	<?php $books->delete($_POST['id']); ?>
	alert("deleted");
	history.go(-1);
} 
 </script>
 <?php
 }
 ?>
