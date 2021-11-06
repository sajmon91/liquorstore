					
		<?php 
			$cat_result = $cat_obj->getAllCategory();
		?>
					<div class="col-md-3 col-lg-2">
						<div class="sidebar-box ftco-animate">
			              <div class="categories">
			                <h3>Product Types</h3>
			                <ul class="p-0">

			                <?php 

			                	foreach ($cat_result as $cat_row) {
			                		
			                		echo "<li><a href='products-category.php?c_id=$cat_row->cat_id'>$cat_row->cat_name <span class='fa fa-chevron-right'></span></a></li>";
			                	}

			                ?>
			                	
			                </ul>
			              </div>
			            </div>

			            <div class="mb-4">
			                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
			                <form action="#" method="POST">
			                	<span class="font-weight-normal small text-muted mr-2">Min:</span>
			                	<input type="number" min="1" value="1" name="min" class="form-control">
			                	<span class="font-weight-normal small text-muted ml-2">Max:</span>
			                	<input type="number" min="1"  name="max" class="form-control">
			                	<button type="submit" name="btn_filter" class="btn btn-primary mt-2">Filter</button>
			                </form>
			              </div>
		             
					</div>