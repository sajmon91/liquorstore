<?php 
	include 'includes/header.php'; 

	include 'includes/nav.php';

	if (!isLoggedIn() || !isset($_GET['o_id'])) {
		redirect("index.php");
	}

	$result = $order_obj->seeMyOrder($_SESSION['user_id'], $_GET['o_id']);

	
?>


	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0">
          		<span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> 
          		<span><a href="my_orders.php">My Orders <i class="fa fa-chevron-right"></i></a></span>
          		<span>My Order <i class="fa fa-chevron-right"></i></span>
          	</p>
            <h2 class="mb-0 bread">My Order</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<span class="mb-2 d-block"><a href="my_orders.php"><i class="fa fa-chevron-left"></i>My Orders</a></span>
    		<div class="row justify-content-center">
	          <div class="col-xl-12 ftco-animate">
	          	<?php echo display_message(); ?>
	          	<div class="table-wrap">
					<table class="table">
					  <thead class="thead-primary">
					    <tr>
						    <th>&nbsp;</th>
						    <th>Product</th>
						    <th>Price</th>
						    <th>Quantity</th>
						    <th>Total</th>
					    </tr>
					  </thead>

					  <tbody>

				  	<?php 

				  	$total_order = get_object_vars($result['total_price']);



				  		foreach ($result['product_info'] as $row) {

				  			$product_price = number_format($row->product_price,2, ",", ".");
				  			$tot = number_format($row->product_price * $row->product_quantity, 2, ",", ".");

				  			echo "<tr>
				  						<td><div class='img' style='background-image: url(images/products_img/$row->product_img);'></div></td>
				  						<td>$row->product_name</td>
				  						<td>$$product_price</td>
				  						<td>$row->product_quantity</td>
				  						<td>$$tot</td>
				  				</tr>";
				  			
				  		}

				  	 ?>

				  	 	<tr>
			              <td></td>
			              <td></td>
			              <td></td>
			              <td><strong>Order Total Price:</strong></td>
			              <td>$<?php echo number_format($total_order['total_price'], 2, ",", "."); ?></td>
			            </tr>

				  	 

					  </tbody>
					</table>
				</div>
	          </div> <!-- .col-xl-12 -->
        	</div>


    	</div><!-- .container -->
    </section>

<?php	
	include 'includes/footer.php';
?>

    

   