<?php 

	include 'includes/header.php';

	include 'includes/nav.php';


	if (isset($_GET['id'])) {
		$p_id = htmlspecialchars($_GET['id']);
		$product = $prod_obj->productSingle($p_id);
	}else{
		redirect('index.php');
	}

	$results = $prod_obj->similarProducts($product->product_cat, 4);

	include 'includes/buy_now_modal.php';

	if (isset($_POST['buy_now_btn'])) {
		
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$address = trim($_POST['address']);
		$city = trim($_POST['city']);
		$phone = trim($_POST['phone']);
		$quan = trim($_POST['quan']);

		$price = $product->product_price;
    	$new_price = $product->product_new_price;
    	$insert_price = (empty($new_price)) ? $price : $new_price;

		$data = [
			'fullname' => $fname . " " . $lname,
			'address' => $address,
			'city' => $city,
			'phone' => $phone,
			'quan' => $quan,
			'price' => $insert_price
		];

		
		$cart_obj->buyNowOrder($p_id, $data);


		
	}

 ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="products.php">Products <i class="fa fa-chevron-right"></i></a></span> <span>Product <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Product</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/products_img/<?php echo $product->product_img; ?>" class="image-popup prod-img-bg"><img src="images/products_img/<?php echo $product->product_img; ?>" class="img-fluid" alt="<?php echo $product->product_name; ?>"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $product->product_name; ?></h3>

    				<?php 
    					$p_price = number_format($product->product_price,2, ",", ".");
						$p_new_price = (!empty($product->product_new_price)) ? number_format($product->product_new_price,2, ",", ".") : '';
    				?>
    				<p class="price"><span>$<?php echo (!empty($p_new_price)) ? $p_new_price : $p_price; ?></span></p>


    				<p><?php echo $product->product_desc; ?></p>
					<div class="row mt-4">
						<div class="col-md-12">
			          		<p class="stock_error" style="color: red;"></p>
			          	</div>
						<div class="input-group col-md-6 d-flex mb-3">
			             	
			             	<input type="number" id="quantity<?php echo $product->product_id; ?>" name="quantity" class="quantity form-control input-number" value="1" min="1" max="<?php echo $product->product_stock; ?>">
			             	
			          	</div>
	          			<div class="w-100"></div>
			          	<div class="col-md-12">
			          		<p style="color: #000;"><?php echo $product->product_stock; ?> piece available</p>
			          	</div>
          			</div>
			      	<p>
			      		<a href="#" id="<?php echo $product->product_id; ?>" class="add_cart btn btn-primary py-3 px-5 mr-2 mt-2">Add to Cart</a>
			      		<a href="#" data-toggle="modal" data-target="#staticBackdrop7" class="btn btn-primary py-3 px-5 mt-2">Buy now</a>
			      	</p>
    			</div>
    		</div>
	
    	</div>
    </section>


  
			<div class="container">
				<div class="row justify-content-center pb-5">
		          <div class="col-md-7 heading-section text-center ftco-animate">
		            <h2>Similar Products</h2>
		          </div>
        		</div>
				<div class="row">

					<?php 
						foreach ($results as $row) {
							
							include 'includes/product_card.php';
						}
					?>


				</div>
			</div>

			
	

    <?php include 'includes/footer.php'; ?>

    <script>
				$(document).ready(function(){


					     $('.add_cart').on('click', function(e){
								e.preventDefault();

								var id = $(this).attr("id");
								var qua = $('#quantity'+ id).val();

								var stock = <?php echo $product->product_stock; ?>

								if (qua <= stock) {
									$.ajax({
										url: "includes/ajax/add_cart.php",
										method: "POST",
										dataType:"JSON",
										data: {
											p_id: id,
											qua: qua
										},success: function(data){
											$('.order-lg-last').addClass('show');
											$('.cart-drop').addClass('show');
											$('.cart-drop').html(data.out);
											$('#cart_badge').text(data.t);
										}

									});
								}else{
									$('.stock_error').text(`Max you can buy is ${stock}`);
								}
								
							});




					});
			</script>