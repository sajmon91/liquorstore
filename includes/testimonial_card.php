              
              <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                  <div class="text">
                    <p class="mb-4"><?php echo $t_row->testi_text; ?></p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/testimonials_img/<?php echo $t_row->testi_img; ?>)"></div>
                    	<div class="pl-3">
		                    <p class="name"><?php echo $t_row->testi_name; ?></p>
		                    <span class="position"><?php echo $t_row->testi_position; ?></span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>