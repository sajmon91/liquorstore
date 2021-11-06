<?php 
	
	include 'includes/header.php';

	include 'includes/nav.php';

	

	if (isset($_GET['c_id'])) {
		$cat_id = trim($_GET['c_id']);
		$cat = $cat_obj->getCategory($cat_id);
	}else{
		redirect('index.php');
	}

	$page = !empty($_GET['page']) ? $_GET['page'] : 1;

	$item_total_count = $prod_obj->countAllProducts('category', $cat_id);
	$items_per_page = 12;

	$paginate_obj = new Paginate($page, $items_per_page, $item_total_count->p);


	$results = $prod_obj->categoryProductsFront($cat_id, $items_per_page, $paginate_obj->offset());

	if (isset($_POST['sort'])) {
		$_SESSION['sort2'] = $_POST['sort'];
		$_SESSION['products_category_page'] = basename($_SERVER['PHP_SELF']);
		unset($_SESSION['filter2']);
	}

	if (isset($_SESSION['sort2'])) {
		$results = $prod_obj->categoryProductsFront($cat_id, $items_per_page, $paginate_obj->offset(), $_SESSION['sort2']);
	}

	if (isset($_POST['btn_filter'])) {
		$_SESSION['filter2'] = $_POST;
		$_SESSION['products_category_page'] = basename($_SERVER['PHP_SELF']);
	}

	if (isset($_SESSION['filter2'])) {
		$item_total_count = $prod_obj->countAllFilterProducts($_SESSION['filter2'], 'category', $cat_id);
		$paginate_obj = new Paginate($page, $items_per_page, $item_total_count->p);
		$results = $prod_obj->filterProductsCategoryPageFront($_SESSION['filter2'], $items_per_page, $paginate_obj->offset(), $cat_id);
	}



 ?>
    
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Products - <?php echo $cat->cat_name; ?></h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row">

					<?php include 'includes/product_type.php'; ?>

					

					<div class="col-md-9 col-lg-10">

						<?php include 'includes/sort_by.php'; ?>
						
						<div class="row">

							<?php 

							// echo $item_total_count->p;

								foreach ($results as $row) {
									
									include 'includes/product_card.php';
								}


							?>

						</div>

						<div class="row mt-5">
				          <div class="col text-center">
				            <div class="block-27">
				              <ul>

				                <?php 

				              		if ($paginate_obj->page_total() > 1) {

				              			if ($paginate_obj->has_previous()) {
				              				echo "<li><a href='products-category.php?c_id=$cat_id&page={$paginate_obj->previouse()}'>&lt;</a></li>";
				              			}


				              			for ($i=1; $i <= $paginate_obj->page_total(); $i++) { 

				              				if ($i == $paginate_obj->current_page) {
				              					echo "<li class='active'><span>{$i}</span></li>";
				              				}else{
				              					echo "<li><a href='products-category.php?c_id=$cat_id&page={$i}'>{$i}</a></li>";
				              				}
				              			}



				              			if ($paginate_obj->has_next()) {
				              				echo "<li><a href='products-category.php?c_id=$cat_id&page={$paginate_obj->next()}'>&gt;</a></li>";
				              			}
				              			


				              		}


				              	 ?>

				              </ul>
				            </div>
				          </div>
				        </div>

					</div>

					
				</div>
			</div>
		</section>

   <?php include 'includes/footer.php'; ?>