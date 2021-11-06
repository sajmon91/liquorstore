 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Liquor <span>store</span></a>
	      
	      <?php 
				$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : "";

				$cart_obj = new Cart;

			 ?>

	      <div class="order-lg-last btn-group">
		        <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          	<span class="flaticon-shopping-bag"></span>
		          	<div class="d-flex justify-content-center align-items-center"><small id ="cart_badge"><?php if (is_countable($cart)) {
							echo count($cart);
						}else{
							echo $cart = 0;
						} ?></small>
					</div>
		        </a>
	          	<div class="dropdown-menu dropdown-menu-right cart-drop">

	          		<?php 


	          		if (is_array($cart) || is_object($cart)) {

	          			
	          				foreach ($cart_obj->dropdownCart($cart) as $cart_p) {
		          				echo $cart_p;
		          			}
	          			
	          		}

	          		if (empty($cart)) {
	          			echo '<p class="dropdown-item text-center btn-link d-block w-100">
						    	Cart is empty
						    </p>';
	          		}
	          					
	          	
	          			

	          		?>
	          		
					   


					   
					</div>
        	</div>


	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	         	<li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
	          	<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>