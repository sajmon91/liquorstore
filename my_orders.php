<?php 
	include 'includes/header.php'; 

	include 'includes/nav.php';

	if (!isLoggedIn()) {
		redirect("index.php");
	}

	$result = $order_obj->myOrdersFront($_SESSION['user_id']);

	$user_info = $user_obj->getUserInfo();
	$user_meta = $user_obj->getUsermetaInfo();
	
?>


	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>My Orders <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">My Orders</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container-fluid">
    		<div class="row justify-content-center">

		        <div class="col-xl-4 ftco-animate">
					<h3>My Info</h3>

					<div class="row">
						<div class="col-xl-4">
							<img width="200px" src="images/profile_img/<?php echo $user_info->profile_img; ?>" alt="profile">
						</div>

						<div class="col-xl-8">
							<p>
					            <strong>First Name :</strong> <?php echo  isset($user_info->first_name) ? $user_info->first_name : ""; ?> <br>
					            <strong>Last Name : </strong> <?php echo  isset($user_info->last_name) ? $user_info->last_name : ""; ?><br>
					            <strong>Address : </strong> <?php echo  isset($user_meta->address) ? $user_meta->address : ""; ?><br>
					            <strong>City : </strong> <?php echo  isset($user_meta->city) ? $user_meta->city : ""; ?><br>
					            <strong>Phone : </strong> <?php echo  isset($user_meta->phone) ? $user_meta->phone : ""; ?><br>
					            <strong>Email : <?php echo  isset($user_info->email) ? $user_info->email : ""; ?></strong> 
					          </p>
						</div>

						<a class="btn btn-primary ml-3 mt-2 mb-2" href="edit_my_info.php">Edit My Info</a>

					</div>
		        </div>
			      
		    


	          <div class="col-xl-8 ftco-animate pr-2">
	          	<?php echo display_message(); ?>
	          	<div class="table-wrap">
					<table class="table">
					  <thead class="thead-primary">
					    <tr>
						    
						    <th>Order Date</th>
						    <th>Status</th>
						    <th>Total Price</th>
						    <th>&nbsp;</th>
					    </tr>
					  </thead>

					  <tbody>

				  	<?php 

				  		foreach ($result as $row) {

				  			$date = date("d-m-Y H:i:s", strtotime($row->time_stamp));
				  			$total_price = number_format($row->total_price,2, ",", ".");

				  			echo "<tr>
				  						<td>$date</td>
				  						<td>$row->order_status</td>
				  						<td>$$total_price</td>
				  						<td><a href='see_my_order.php?o_id=$row->order_id'>See Order</a></td>
				  				</tr>";
				  			
				  		}

				  	 ?>

				  	 

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

    

   