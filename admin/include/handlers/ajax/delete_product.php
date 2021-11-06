<?php 

include '../../init.php';



if (isset($_POST['p_id'])) {

	$p_obj = new Product;
	$p_obj->deleteProduct($_POST['p_id']);
	
}else{
	redirect('products.php');
}







 ?>
