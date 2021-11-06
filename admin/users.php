<?php 

    include 'include/header.php';

    


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-users mr-2"></i>Users</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Users</li>
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
                                        <h4 class="mt-0 header-title">All Users</h4>
                                        
                                        <div class="row">
                                            
                                            <div class="col-lg-12">
                                                <div style="overflow-x: auto;">
                                                    <table id="cat-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Profile Image</th>
                                                            <th>Fist Name</th>
                                                            <th>Last Name</th>
                                                            <th>Role</th>
                                                            <th>Info</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                    
                                                        <tbody>
                                                            <?php $user_obj->getAllUsers(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                         
                                            </div>
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>