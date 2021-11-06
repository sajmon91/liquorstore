<?php 

include '../admin/include/init.php';

	if (isset($_GET['id'])) {
		unset($_SESSION['cart'][$_GET['id']]);
		redirect('../cart.php');
	}





 ?>