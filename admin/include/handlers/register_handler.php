<?php 

function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = trim($inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormEmail($inputText){
	$inputText = strip_tags($inputText);
	$inputText = trim($inputText);
	return $inputText;
}

function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}


if (isset($_POST['register_btn'])) {
	
	$first_name = sanitizeFormString($_POST['first_name']);
	$last_name = sanitizeFormString($_POST['last_name']);
	$email = sanitizeFormEmail($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);

	$wasSuccessful = $account->register($first_name, $last_name, $email, $password);

	if ($wasSuccessful) {
		set_message("<p class='text-center'>You are registered and can log in</p>");
		redirect('login.php');
	}

}






 ?>