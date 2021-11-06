
<h4 class="mt-0 header-title">All Testimonials</h4>

    <div class="mb-4">
        <a href='testimonials.php?source=add_testimonial' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fa fa-plus'></i> Add Testimonial</a>
    </div>
                                        
    <div class="row">

       
        <div class="col-lg-12">
           
                <form action="#" method="POST">
                        
                <?php include 'testimonial_status.php'; ?>

                    <table id="cat-table" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        

                        <thead>
                        <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Text</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>
                           
                            <?php $testimonial_obj->getTestimonialsInAdmin(); ?>
                        
                        </tbody>
                        
                    </table>
                </form>
           


                                                      
        </div>
    </div> 