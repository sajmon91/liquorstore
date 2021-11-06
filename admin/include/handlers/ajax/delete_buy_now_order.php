<?php 

include '../../init.php';


if (isset($_POST['o_id'])) {

	$o_obj = new Order;
	$o_obj->deleteBuyNowOrder($_POST['o_id']);
	
}else{
	redirect('orders.php?source=buy_now_orders');
}











 ?>