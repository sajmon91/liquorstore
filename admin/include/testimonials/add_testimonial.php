   <?php 

        if (isset($_POST['btn_add_testi'])) {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $testimonial_obj->addTestimonial($_POST, $_FILES);
            }
        }


    ?>


    <h4 class="mt-0 header-title">Add Testimonial</h4>

            <div class="mb-4">
                <a href='testimonials.php' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fa fa-arrow-left'></i> All Testimonials</a>
            </div>
    
    <div class="row">
        <div class="col-lg-12 mb-4">
             
            <form action="#" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="t_name-input" class="col-form-label text-left">Name</label>
                                <input id="t_name-input" class="form-control" type="text" name="t_name" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                            <label for="position-input" class="col-form-label text-left">Position</label>
                                <input id="position-input" class="form-control" type="text" name="position" placeholder="Enter User Position">
                        </div>

                        <div class="form-group">
                            <label for="t_text-input" class="col-form-label text-left">Testimonial Text</label>
                                <textarea class="form-control" name="t_text" id="t_text-input" cols="20" rows="5" placeholder="Enter Testimonial"></textarea>
                        </div>

                       

                        

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                          <label for="user_img">User Image</label>
                          <input type="file" class="form-control" id="user_img" name="user_img">
                        </div>

                    </div>
                    
                </div>
                
                 <button type="submit" class="btn btn-soft-success waves-effect waves-light" name="btn_add_testi"><i class="fas fa-plus"></i> Add Testimonial</button>


            </form>

         </div>

    </div> 