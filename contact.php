<?php 

	include 'includes/header.php';

	include 'includes/nav.php';

	if (isset($_POST['btn_contact'])) {
		
		$contact_obj = new Contact;

		if ($contact_obj->contactUs($_POST)) {
			set_message("<p class='text-center'>You message has been sent</p>");
		}else{
			set_message("<p class='text-center text-danger'>Something wrong</p>");
		}
		
	}



 ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact Us <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Contact Us</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper px-md-4">
							<div class="row mb-5">
								<div class="col-md-4">
									<div class="dbox w-100 text-center">
						        		<div class="icon d-flex align-items-center justify-content-center">
						        			<span class="fa fa-map-marker"></span>
						        		</div>
						        		<div class="text">
							            <p><span>Address:</span> Cara Lazara 345, Kruševac, Serbia</p>
							          </div>
						          </div>
								</div>
								<div class="col-md-4">
									<div class="dbox w-100 text-center">
						        		<div class="icon d-flex align-items-center justify-content-center">
						        			<span class="fa fa-phone"></span>
						        		</div>
						        		<div class="text">
							            <p><span>Phone:</span> <a href="tel://1234567920">+123 456 789</a></p>
							          </div>
						          </div>
								</div>
								<div class="col-md-4">
									<div class="dbox w-100 text-center">
						        		<div class="icon d-flex align-items-center justify-content-center">
						        			<span class="fa fa-paper-plane"></span>
						        		</div>
						        		<div class="text">
							            <p><span>Email:</span> <a href="mailto:stefan.sajmon@gmail.com">stefan.sajmon@gmail.com</a></p>
							          </div>
						          </div>
								</div>
							</div>

							<div class="row justify-content-center">
								<div class="com-md-12">
									<?php echo display_message(); ?>
								</div>
							</div>


							<div class="row no-gutters">
								<div class="col-md-7">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Contact Us</h3>
										<form method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="message">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" required></textarea>
													</div>
												</div>

												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="score">Calculate</label>
														<input type="number" class="form-control" name="score" id="score" placeholder="5 + 3" required>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Send Message" name="btn_contact" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-5 order-md-first d-flex align-items-stretch">
									<div id="map" class="map">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1444.9942963584788!2d21.293706658260035!3d43.58595393761548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDM1JzA5LjQiTiAyMcKwMTcnNDEuMyJF!5e0!3m2!1sen!2srs!4v1621765117708!5m2!1sen!2srs" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

   <?php include 'includes/footer.php'; ?>