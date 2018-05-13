 <?php include ("includes/initialize.php");?>
 <?php
 $session->logout();
 redirect_to($_SERVER['HTTP_REFERER']);
 ?>