<?php 

include '../../init.php';


if (isset($_POST['u_id'])) {

	$u_obj = new User($_SESSION['user_id']);
	$u_obj->deleteUser($_POST['u_id']);
	
}else{
	redirect('users.php');
}











 ?>