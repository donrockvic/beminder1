<?php
$errors = array();

function fieldname_as_text($fieldname) {
  $fieldname = str_replace("_", " ", $fieldname);
  $fieldname = ucfirst($fieldname);
  return $fieldname;
}

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
	return isset($value) && $value !== "";
}

function validate_presences($required_fields) {
  global $errors;
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)){
  		$errors[$field] = fieldname_as_text($field) . " can't be blank";
  	}
  }
}

function validate_mail($email) {
  global $errors;
 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
  		$errors["email"] = "Invalid Email Address format";
  	}
}

function validate_no($number) {
  global $errors;
 if (!preg_match("/^[0-9]*$/",$number)) {
  		$errors["no"] = "Invalid  number format";
  	}
}

function validate_id($number) {
  global $errors;
 if (!preg_match("/^[0-9]*$/",$number)) {
  		$errors["id"] = "Invalid Id format";
  	}
}

function validate_text($fields) {
  global $errors;
 foreach($fields as $field) {
    $value = trim($_POST[$field]);
  	if (!preg_match("/^[a-zA-Z ]*$/",$field)) {
  		$errors[$field] = "Invalid ".fieldname_as_text($field);
  	}
  }
}

// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

function chk_for_email($email,$emailnew){
	global $errors;
	while($row=mysqli_fetch_assoc($email)){
		if($row["email"]==$emailnew){
			$errors["email"] = "This email id is already registered";
			break;
		}	
	}
}

function chk_for_id($ids,$idnew){
	global $errors;
	while($row=mysqli_fetch_assoc($ids)){
		if($row["id"]==$idnew){
			$errors["id"] = "This shop is already registered";
			break;
		}	
	}
}


function chk_for_ISBN($ISBNS,$newISBN){
	global $errors;
	while($row=mysqli_fetch_assoc($ISBNS)){
		if($row["ISBN1"]==$newISBN){
			$errors["ISBN1"] = "This ISBN id is already registered";
			break;
		}	
	}
}

function chk_for_title($title,$titlenew){
	global $errors;
	while($row=mysqli_fetch_assoc($title)){
		if($row["title"]==$titlenew){
			$errors["title"] = "This title id is already registered";
			break;
		}	
	}
}

 

 

function chk_for_phone($phoneall,$phone){
	global $errors;
	while($row=mysqli_fetch_assoc($phoneall)){
		if($row["phone"]==$phone){
			$errors["phone"] = "This Phone number has already registered";
			break;
		}	
	}
}
function pass_chk($pass,$cpass){
	global $errors;
	if($pass!=$cpass){
		$errors["pass"]="please enter your both password correctly";
	}
}
	
?>

 