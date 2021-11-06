<?php 

    include 'include/header.php';

    

    if (isset($_GET['u_id']) || empty($_GET['u_id'])) {

        $user_info_obj = new User($_GET['u_id']);

        $user_info = $user_info_obj->getUserInfo();
        $usermeta_info = $user_info_obj->getUsermetaInfo();


        $first_name = isset($user_info->first_name) ? $user_info->first_name : "";
        $last_name = isset($user_info->last_name) ? $user_info->last_name : "";
        $email = isset($user_info->email) ? $user_info->email : "";

        $address = isset($usermeta_info->address) ? $usermeta_info->address : "";
        $city = isset($usermeta_info->city) ? $usermeta_info->city : "";
        $phone = isset($usermeta_info->phone) ? $usermeta_info->phone : "";
        

        
    }else{
        redirect('users.php');
    }

    


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-user mr-2"></i>User Info</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">User Info</li>
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
                                        <h4 class="mt-0 header-title">User Data</h4>

                                        <div class="mb-4">
                                            <a href='users.php' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fa fa-users'></i> All Users</a>

                                            <a href='orders.php' class='btn btn-soft-success waves-effect waves-light' role='button'><i class='fas fa-shopping-cart'></i> Cart Orders</a>
                                            
                                        </div>
                                        
                                        <div class="row">

                                            
                                            <div class="col-lg-12">

                                                
                                                <p>
                                                    <strong>Full Name : </strong><?php echo $first_name . " " . $last_name; ?> <br>
                                                    <strong>Address : </strong><?php echo $address;?> <br>
                                                    <strong>City : </strong><?php echo $city; ?> <br>
                                                    <strong>Phone : </strong><?php echo $phone; ?> <br>
                                                    <strong>Email : </strong><?php echo $email; ?> 
                                                  </p>
                                         
                                            </div>
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>