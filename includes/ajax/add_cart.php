<?php 

include '../../admin/include/init.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$cart_o = new Cart;

	$p_id = $_POST['p_id'];
	$quantity = $_POST['qua'];

	$_SESSION['cart'][$p_id] = ["qua" => $quantity];

	$to = count($_SESSION['cart']);

	$output = $cart_o->dropdownCart($_SESSION['cart']);


	$data['t'] = $to;
	$data['out'] = $output;


	echo json_encode($data);
}
	
	









 ?>