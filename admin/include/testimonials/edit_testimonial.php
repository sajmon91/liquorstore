<?php 

    if (isset($_GET['t_id'])) {
        $testimonial = $testimonial_obj->getTestimonialData($_GET['t_id']);
    }else{
        redirect("testimonials.php");
    }


    if ($testimonial->testi_status) {
         $st = "<span>Active</span>";
    }else{
         $st = "<span>Inactive</span>";
    }


    if (isset($_POST['btn_edit_testi'])) {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $testimonial_obj->editTestimonial($_GET['t_id'], $_POST, $_FILES);
        }
    }


?>


    <h4 class="mt-0 header-title">Edit Testimonial</h4>

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
                                <input id="t_name-input" class="form-control" type="text" name="t_name" placeholder="Enter User Name" value="<?php echo $testimonial->testi_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="position-input" class="col-form-label text-left">Position</label>
                                <input id="position-input" class="form-control" type="text" name="position" placeholder="Enter User Position" value="<?php echo $testimonial->testi_position; ?>">
                        </div>

                        <div class="form-group">
                            <label for="t_text-input" class="col-form-label text-left">Testimonial Text</label>
                                <textarea class="form-control" name="t_text" id="t_text-input" cols="20" rows="5" placeholder="Enter Testimonial"><?php echo $testimonial->testi_text; ?></textarea>
                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="status-input" class="col-form-label text-left">Status</label>
                                    <select name="t_status" id="status-input" class="form-control">
                                        <option value="<?php echo $testimonial->testi_status; ?>"><?php echo $st; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                        </div>

                        <div class="form-group">
                          <label for="user_img">User Image</label><br>
                          <img src='../images/testimonials_img/<?php echo $testimonial->testi_img; ?>' alt="img" height="200px">
                          <input type="file" class="form-control" id="user_img" name="user_img">
                        </div>

                    </div>
                    
                </div>
                
                 <button type="submit" class="btn btn-soft-success waves-effect waves-light" name="btn_edit_testi"><i class="fas fa-edit"></i> Edit Testimonial</button>


            </form>

         </div>

    </div> 