

					<div class="col-sm-6 col-md-6 col-lg-3 d-flex">
						<div class="product ftco-animate">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/products_img/<?php echo $row->product_img; ?>);">
								<div class="desc">
									<p class="meta-prod d-flex">
										<button type="button" id="<?php echo $row->product_id; ?>" class="d-flex align-items-center justify-content-center add_to_cart">
											<span class="flaticon-shopping-bag"></span>
										</button>
										<a href="product-single.php?id=<?php echo $row->product_id; ?>" class="d-flex align-items-center justify-content-center">
											<span class="flaticon-visibility"></span>
										</a>
									</p>
								</div>
							</div>
							<div class="text text-center">
								<?php echo (!empty($row->best_seler_badge)) ? '<span class="seller">Best Seller</span>' : ''; ?>
								
								<?php echo (!empty($row->product_discount)) ? "<span class='sale'>$row->product_discount %</span>" : ''; ?>
								
								<?php echo (!empty($row->new_badge)) ? '<span class="new">New Arrival</span>' : ''; ?>
								
								<?php $p_cat = $prod_obj->showProductTitle('categories', 'cat_id', $row->product_cat, 'cat_name'); ?>
							<a href="products-category.php?c_id=<?php echo $row->product_cat; ?>"><span class="category"><?php echo $p_cat; ?></span></a>
								<h2><?php echo $row->product_name; ?></h2>
								<p class="mb-0">
									<?php 
									$p_price = number_format($row->product_price,2, ",", ".");
									$p_new_price =(!empty($row->product_new_price)) ? number_format($row->product_new_price,2, ",", ".") : '';

										echo (!empty($row->product_new_price)) ? "<span class='price price-sale'>$$p_price</span> <span class='price'>$$p_new_price</span>" : "<span class='price'>$$p_price</span>";
									 ?>
									
								</p>
							</div>
						</div>
					</div>


					