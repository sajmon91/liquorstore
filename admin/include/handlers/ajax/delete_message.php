<?php 

include '../../init.php';


if (isset($_POST['e_id'])) {

	$e_obj = new Contact;
	$e_obj->deleteMessage($_POST['e_id']);
	
}else{
	redirect('email.php');
}











 ?>