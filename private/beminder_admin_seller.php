<?php
require_once("includes/initialize.php");?>
<html>
<head>
	<title>Admin seller</title>
    <link rel="shortcut icon" href="../Beminder.in buy and sell books images/beminder logo.png" />
</head>

 <body>
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
 if($num == 2){
	$allsellers=$seller->find_all();  
	sellershow($allsellers,$path);
	echo "<hr/>";
	$shops=$shop->find_by_text_id($conditions[1]);
	shopshow($shops,$path);
 }else {
	$allsellers=$seller->find_all();  
	sellershow($allsellers,$path);
 } 

  ?>
  
<?php function sellershow($allsellers,$path){?>
  <div>
 	<a href="<?php echo $path ?>beminder_sell_buy_admin_dashboard.php">Home</a>
 </div>
 <br/><br/>
   <table border="1">
   	<tr>
   		<th>ID</th>
   		<th>Email</th>
   		<th>Shopname</th>
   	</tr>
 
  <?php
  foreach($allsellers as $aseller){
 ?>
	<tr>
		<th><a href="<?php echo $path?>beminder_admin_seller.php/<?php echo $aseller->id ?>"><?php echo $aseller->id ?></a></th>
		<th><?php echo $aseller->email ?></th>
		<th><?php echo $aseller->shopname ?></th>
    </th>
	</tr>
 <?php 
  }
  ?>
    </table>
<?php } ?>

<?php function shopshow($shops,$path){?>
 
   <table border="1">
   	<tr>
   		<th>ID</th>
   		<th>Landmark</th>
   		<th>Address</th>
        <th>city</th>
        <th>state</th>
        <th>zip</th>
        <th>shop phone</th>
        <th>shop email</th>
   	</tr>
    <?php 
	if($shops){
	?>
   <tr>
   		<th><?php echo $shops->id ?></th>
   		<th><?php echo $shops->landmark ?></th>
   		<th><?php echo $shops->address ?></th>
        <th><?php echo $shops->city ?></th>
        <th><?php echo $shops->state ?></th>
        <th><?php echo $shops->zip ?></th>
        <th><?php echo $shops->shop_phone ?></th>
        <th><?php echo $shops->shop_email ?></th>
   	</tr>
    <?php }else{echo "shop is not registered";} ?>
    </table>
<?php } ?>
 </body></html>
 
    
