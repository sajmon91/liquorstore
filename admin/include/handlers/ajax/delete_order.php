<?php 

include '../../init.php';


if (isset($_POST['o_id'])) {

	$o_obj = new Order;
	$o_obj->deleteOrder($_POST['o_id']);
	
}else{
	redirect('orders.php');
}











 ?>