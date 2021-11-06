   <?php 

    $t_result = $testi_obj->testimonialFront();



    ?>

    <section class="ftco-section testimony-section img mt-5" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">

              <?php 

                  foreach ($t_result as $t_row) {

                    include 'testimonial_card.php';
                  }

               ?>

            </div>
          </div>
        </div>
      </div>
    </section>
