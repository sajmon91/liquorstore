<?php 

	include 'includes/header.php';

	include 'includes/nav.php';

	$account = new Account;

	include 'admin/include/handlers/login_handler.php';


 ?>

 <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Log In <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Log In</h2>
          </div>
        </div>
      </div>
    </section>

   <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
          	<?php echo display_message(); ?>
			<form action="#" method="POST" class="billing-form">
							
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
		                <div class="form-group">
		                	<label for="email">Email</label>
		                	<?php echo $account->getError(Constants::$emailEmpty); ?>
		                	<?php echo $account->getError(Constants::$wrongEmail); ?>
		                  	<input type="email" name="email" class="form-control" value="<?php getInputValue('email'); ?>">
		                </div>
	              	</div>
	              	<div class="col-md-6">
		                <div class="form-group">
		                	<label for="password">Password</label>
		                	<?php echo $account->getError(Constants::$passwordEmpty); ?>
		                	<?php echo $account->getError(Constants::$wrongPassword); ?>
		                  	<input type="password" name="password" class="form-control">
		                </div>
                	</div>
	                <div class="w-100"></div>
	                <div class="col-md-12">
	                	<div class="form-group">
	                		<input type="submit" name="login_btn" value="Log In" class="btn btn-primary">
	                	</div>
	                </div>

	                <div class="col-md-6">
	                	<div class="form-group">
	                		<p>Don't have an account? Sign Up <a href="register.php">here</a></p>
	                		<p>login as admin use: email - stefan.sajmon@gmail.com and password - 123456 </p>
	                	</div>
	                </div>
	                
	                
			            
	            </div>
	          </form><!-- END -->


	         
          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>



    <?php include 'includes/footer.php'; ?>