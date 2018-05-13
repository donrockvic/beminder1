<?php

//define the core paths
//define them as abosolute path to make sure that require_once works as expected

//Directories_seperator is a php pre-defined constant
//(\ for windows ,/ for Unix)
defined ('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//C:\wamp\www\bce
defined('SITE_ROOT') ? null :
define('SITE_ROOT',DS.'wamp'.DS.'www'.DS.'beminder');

defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'private'.DS.'includes');

//load config file first
require_once(LIB_PATH.DS."config.php");

//load basic function next so that everything aftert that can use them
require_once(LIB_PATH.DS."functions.php");
require_once(LIB_PATH.DS."validate.php");
//load core objects
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."sql.php");

//load database related classes
require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."admin.php");
require_once(LIB_PATH.DS."books.php");
require_once(LIB_PATH.DS."database.php"); 
//seller
require_once(LIB_PATH.DS."sbooks.php");
require_once(LIB_PATH.DS."ebook.php");
require_once(LIB_PATH.DS."userebook.php");
require_once(LIB_PATH.DS."seller.php");
require_once(LIB_PATH.DS."shop.php");
require_once(LIB_PATH.DS."orders.php");
//
require_once(LIB_PATH.DS."comments.php");
require_once(LIB_PATH.DS."feedback.php");

 ?>
