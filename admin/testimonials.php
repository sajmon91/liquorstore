<?php 

    include 'include/header.php';

   
    $testimonial_obj = new Testimonial;
    
    if (isset($_POST['submit_testi'])) {
        $testimonial_obj->testimonialStatus();
    }


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-quote-left mr-2"></i>Testimonials</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Testimonials</li>
                                </ol>
                            </div>                                      
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->
                <?php include 'include/left_sidebar.php'; ?>
                <!-- end left-sidenav-->

                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid"> 

                         <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">  
                                    <?php display_message(); ?> 

                                        <?php 

                                            if (isset($_GET['source'])) {
                                                    $source = $_GET['source'];

                                                }else{
                                                    $source = '';
                                            }


                                             switch ($source) {
                                                
                                                case 'add_testimonial':
                                                    include 'include/testimonials/add_testimonial.php';
                                                    break;

                                                case 'edit_testimonial':
                                                    include 'include/testimonials/edit_testimonial.php';
                                                    break;
                                            


                                                default:
                                                   include "include/testimonials/view_all_testimonials.php";
                                                    break;
                                            }



                                        ?>

                                        


                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>