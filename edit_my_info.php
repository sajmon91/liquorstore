<?php 

	include 'includes/header.php';

	include 'includes/nav.php';


	if (!isLoggedIn()) {
		redirect("index.php");
	}

	$user_info = $user_obj->getUserInfo();
	$user_meta = $user_obj->getUsermetaInfo();

	if (isset($_POST['edit_info_btn'])) {

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           	$user_obj->editProfileFront($_SESSION['user_id'], $_POST, $_FILES);
        }
	}

 ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="my_orders.php">My Orders <i class="fa fa-chevron-right"></i></a></span> <span>Edit My Info <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Edit My Info</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<form action="#" method="POST" enctype="multipart/form-data" class="billing-form">

    		<div class="row justify-content-center">

    			<div class="col-xl-2">
    				<div class="form-group">
    					<img width="150px" src="images/profile_img/<?php echo $user_info->profile_img; ?>" alt="profile">
    					<input type="file" class="form-control" id="my_img" name="my_img">
    				</div>
    				
    			</div>

	          	<div class="col-xl-10 ftco-animate">
					
					<h3 class="mb-4 billing-heading">My Info</h3>
		          	<div class="row align-items-end">
			          	<div class="col-md-6">
			                <div class="form-group">
			                	<label for="fname">First Name</label>
			                  	<input type="text" id="fname" name="fname" class="form-control" value="<?php echo  isset($user_info->first_name) ? $user_info->first_name : ""; ?>">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                	<label for="lname">Last Name</label>
			                  	<input type="text" id="lname" name="lname"  class="form-control" value="<?php echo  isset($user_info->last_name) ? $user_info->last_name : ""; ?>">
			                </div>
		                </div>
		                <div class="w-100"></div>
				            
				        <div class="w-100"></div>
				        <div class="col-md-6">
				            <div class="form-group">
			                	<label for="address">Street Address</label>
			                  	<input name="address" id="address"  type="text" class="form-control" value="<?php echo  isset($user_meta->address) ? $user_meta->address : ""; ?>" placeholder="House number and street name">
			                </div>
				        </div>
				        <div class="col-md-6">
				            <div class="form-group">
			                  	<label for="city">Town / City</label>
			                  	<input name="city" id="city" type="text" class="form-control" value="<?php echo  isset($user_meta->city) ? $user_meta->city : ""; ?>">
			                </div>
				        </div>
				            
				        <div class="w-100"></div>
				        <div class="col-md-6">
			                <div class="form-group">
			                	<label for="phone">Phone</label>
			                  	<input name="phone" id="phone" type="text" class="form-control" value="<?php echo  isset($user_meta->phone) ? $user_meta->phone : ""; ?>">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                	<label for="email">Email Address</label>
			                  	<input type="text" id="email" name="email" class="form-control" value="<?php echo  isset($user_info->email) ? $user_info->email : ""; ?>">
			                </div>
		                </div>
		            </div>
		         



		         

			        <div class="row justify-content-end">
		    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
		    				<button name="edit_info_btn" type="submit" class="text-center btn btn-primary py-3 px-4">Edit</button>
		    			</div>
		    		</div>

	    		 	</form><!-- END -->

	          	</div> <!-- .col-md-8 -->
        	</div>
    	</div>
    </section>

   <?php include 'includes/footer.php'; ?>