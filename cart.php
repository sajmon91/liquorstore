<?php 

	include 'includes/header.php';

	include 'includes/nav.php';


	$subtotal = 0;
	$delivery = 5;

 ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Cart <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">My Cart</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">

    		<?php if (!empty($cart)) { ?>
    			
    		
    		<div class="row">
    			<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
							    <th>&nbsp;</th>
							    <th>Product</th>
							    <th>Price</th>
							    <th>Quantity</th>
							    <th>Total</th>
							    <th>&nbsp;</th>
						    </tr>
						  </thead>

						  <tbody>

					  	<?php 

					  		

					  		if (is_array($cart) || is_object($cart)) {
					  			
					  			foreach ($cart as $key => $value) {
					  				
					  				$pr = $prod_obj->productSingle($key);
					  				$p_cat = $prod_obj->showProductTitle('categories', 'cat_id', $pr->product_cat, 'cat_name');

					  				$insert_price = (empty($pr->product_new_price)) ? $pr->product_price : $pr->product_new_price;
					  				$p_price = number_format($insert_price,2, ",", ".");
					  				$quan = $value['qua'];

					  				$prod_total = $insert_price * $quan;
					  				$prod_total = number_format($prod_total,2, ",", ".");

					  				$subtotal = $subtotal + ($insert_price * $quan);
					  				$_SESSION['subtotal'] = $subtotal;
					  				


					  				echo "<tr>
									    	<td>
									    		<a href='product-single.php?id=$pr->product_id'>
									    			<div class='img' style='background-image: url(images/products_img/$pr->product_img);'></div>
									    		</a>
									    	</td>
										    <td>
										      	<div class='email'>
										      		<a href='product-single.php?id=$pr->product_id'><span class='text-dark'>$pr->product_name</span></a>
										      		<span>$p_cat</span>
										      	</div>
										    </td>
										     <td>$$p_price</td>
										     <td>$quan</td>
								          	<td>$$prod_total</td>
										    <td>
										      	<a href='includes/delete_cart.php?id=$pr->product_id' class='close cart_remove'>
								            		<span><i class='fa fa-close'></i></span>
								          		</a>
								        	</td>
									    </tr>";
					  				
					  			}
					  		}


					  	 ?>

					  	 

						  </tbody>
						</table>
					</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$<?php echo number_format($subtotal, 2, ",", "."); ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$<?php echo number_format($delivery, 2, ",", "."); ?></span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?php $total = $subtotal + $delivery;
									echo "$" . number_format($total, 2, ",", "."); ?>
							</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>

		<?php }else{ 

				unset($_SESSION['subtotal']);

				echo '<div class="row justify-content-center pb-5">
				          <div class="col-md-7 heading-section text-center ftco-animate">
				            <h2>Cart is empty</h2>
				          </div>
		        		</div>';
    		} 

    		?>


    	</div>
    </section>

   <?php include 'includes/footer.php'; ?>