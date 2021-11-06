<?php 

    include 'include/header.php';

    if (isset($_POST['update_profile'])) {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $user_obj->editProfile($user_obj->getUserID(), $_POST, $_FILES);
        }                              
    }


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-user mr-2"></i>Profile</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Profile</li>
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
                                        <h4 class="mt-0 header-title">Info</h4>
                                        
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mt-0 header-title">User Info</h4>
                                                        <form action="#" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="f_name">First Name</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                                    </div>
                                                                    <input type="text" id="f_name" name="f_name" class="form-control" placeholder="First Name" value="<?php echo $user_obj->getFirstName(); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="l_name">Last Name</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                                    </div>
                                                                    <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Last Name" value="<?php echo $user_obj->getLastName(); ?>">
                                                                </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label for="u_email">Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                                                    </div>
                                                                    <input type="text" id="u_email" name="u_email" class="form-control" placeholder="Email" value="<?php echo $user_obj->getEmail(); ?>">
                                                                </div>
                                                            </div>

                                                            <button type="submit" name="update_profile" class="btn btn-soft-success waves-effect waves-light">Update</button>
 
                                                       
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label for="img">User Image</label><br>
                                                  <img src='../images/profile_img/<?php echo $user_obj->getProfileImg(); ?>' alt="img" width="300px">
                                                  <input type="file" class="form-control" id="user_img" name="user_img">
                                                </div>
                                            </div>

                                             </form><!--end form-->
                                            
                                            

                                        </div>    
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>