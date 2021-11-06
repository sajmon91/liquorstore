<?php 

function sanitizeFormEmail($inputText){
	$inputText = strip_tags($inputText);
	$inputText = trim($inputText);
	return $inputText;
}

function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}


if (isset($_POST['login_btn'])) {
	
	$email = sanitizeFormEmail($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);

	$account->login($email, $password);

	

}






 ?>