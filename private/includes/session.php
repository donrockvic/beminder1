<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally 
// inadvisable to store DB-related objects in sessions

class Session {
	
	private $logged_in=false;
	private $logged_admin_in=false;
	public $id;
	public $aid;
	public $shopid;
	public $message;
	
	function __construct() {
		session_start();
		$this->check_message();
		$this->check_login();
    if($this->logged_in) {
      // actions to take right away if user is logged in
    } else {
      // actions to take right away if user is not logged in
    }
	}
	
  public function is_logged_in() {
    return $this->logged_in;
  }
   public function is_admin_logged_in() {
    return $this->logged_admin_in;
  }

public function login($user) {
    // database should find user based on username/password
    if($user){
		//print_r($user);
      $this->id = $_SESSION['id']=$user->id;
	  $_SESSION['fullname']=$user->fullname;
	  $_SESSION['email']=$user->email;
	  $_SESSION['phone']=$user->phone;
	  $_SESSION['landmark']=$user->landmark;
	  $_SESSION['address']=$user->addr;
	  $_SESSION['zip']=$user->zip;
      $this->logged_in = true;
    }
  }
  
  public function adminlogin($user) {
    // database should find user based on username/password
    if($user){
      $this->aid = $_SESSION['aid']=$user->id;
	  $_SESSION['fullname']=$user->fullname;
	  $_SESSION['email']=$user->email;
      $this->logged_admin_in = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['id']);
    unset($this->id);
	unset($_SESSION['aid']);
    unset($this->aid);
	unset($_SESSION['shopid']);
    unset($this->shopid);
    $this->logged_in = false;
  }

	public function message($msg="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	  } else {
	    // then this is "get message"
			return $this->message;
	  }
	}

	private function check_login() {
    if(isset($_SESSION['id'])) {
      $this->user_id = $_SESSION['id'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }
  
	private function check_message() {
		// Is there a message stored in the session?
		if(isset($_SESSION['message'])) {
			// Add it as an attribute and erase the stored version
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
	}
	
}

$session = new Session();
$message = $session->message();

?>