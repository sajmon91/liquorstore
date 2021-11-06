<?php 

	include 'includes/header.php';

	include 'includes/nav.php';

	$delivery = 5;

	if (!isset($_SESSION['email']) || empty($_SESSION['email']) || empty($cart)) {
		
		set_message("<p class='text-center text-danger'>You need to bee login to make an order</p>");
		redirect('login.php');
	}

	$u_id = $_SESSION['user_id'];
	$u_first_name = $_SESSION['first_name'];
	$u_last_name = $_SESSION['last_name'];
	$u_email = $_SESSION['email'];

	$usermeta = $cart_obj->getAllFromUsersmeta($u_id);

	if (isset($_POST['order_btn']) && !empty($cart)) {
		
		$address = trim($_POST['address']);
		$city = trim($_POST['city']);
		$phone = trim($_POST['phone']);

		$data = [
			'address' => $address,
			'city' => $city,
			'phone' => $phone
		];

		$cart_obj->checkoutOrder($u_id, $cart, $data);
	}

 ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Checkout</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="#" method="POST" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">First Name</label>
	                  <input type="text" class="form-control" value="<?php echo $u_first_name; ?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" value="<?php echo $u_last_name; ?>">
	                </div>
                </div>
                <div class="w-100"></div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input name="address" type="text" class="form-control" value="<?php echo (!empty($usermeta->address)) ? $usermeta->address : ''; ?>" placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <label for="towncity">Town / City</label>
	                  <input name="city" type="text" class="form-control" value="<?php echo (!empty($usermeta->city)) ? $usermeta->city : ''; ?>">
	                </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input name="phone" type="text" class="form-control" value="<?php echo (!empty($usermeta->phone)) ? $usermeta->phone : ''; ?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" value="<?php echo $u_email; ?>">
	                </div>
                </div>
               
               
	            </div>
	         



	         

	          <div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span><?php echo (isset($_SESSION['subtotal'])) ? '$' . number_format($_SESSION['subtotal'], 2, ",", ".") : ''; ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$<?php echo number_format($delivery, 2, ",", "."); ?></span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?php $total = (isset($_SESSION['subtotal'])) ? $_SESSION['subtotal'] : 0 + $delivery;
									echo "$" . number_format($total, 2, ",", "."); ?>
							</span>
    					</p>
    				</div>
    				<button name="order_btn" type="submit" class="text-center btn btn-primary py-3 px-4">Place an order</button>
    			</div>
    		</div>

    		 </form><!-- END -->

          </div> <!-- .col-md-8 -->
        </div>
    	</div>
    </section>

   <?php include 'includes/footer.php'; ?>