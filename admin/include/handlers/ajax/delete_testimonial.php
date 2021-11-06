<?php 

include '../../init.php';


if (isset($_POST['t_id'])) {

	$t_obj = new Testimonial;
	$t_obj->deleteTestimonial($_POST['t_id']);
	
}else{
	redirect('testimonials.php');
}







 ?>