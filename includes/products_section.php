<?php 
	
	$results = $prod_obj->productsFront(8);

 ?>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
		          <div class="col-md-7 heading-section text-center ftco-animate">
		          	<span class="subheading">Our Delightful offerings</span>
		            <h2>Tastefully Yours</h2>
		          </div>
        		</div>
				<div class="row">

					<?php 

						foreach ($results as $row) {
							
							include 'product_card.php';
						}


					 ?>


					

				</div>
				<div class="row justify-content-center">
					<div class="col-md-4">
						<a href="products.php" class="btn btn-primary d-block">View All Products <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</section>