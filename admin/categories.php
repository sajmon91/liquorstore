<?php 

    include 'include/header.php';

    $cat_obj = new Category;

    if (isset($_POST['btn_cat'])) {
        
        $category = trim($_POST['category']);

        if (empty($category)) {
            set_message( '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            This field should not be empty
                        </div>');
        }else{
            $cat_obj->insertCategory($category);
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
                            <h4 class="page-title mb-2"><i class="fas fa-list-alt mr-2"></i>Categories</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Categories</li>
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
                                        <h4 class="mt-0 header-title">Category Form</h4>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                 <?php display_message(); ?>
                                                <form action="#" method="POST">
                                                    <div class="form-group row">
                                                        <label for="cat-input" class="col-sm-3 col-form-label text-left">Add Category</label>
                                                        <div class="col-sm-9">
                                                            <input id="cat-input" class="form-control" type="text" name="category">
                                                        </div>
                                                    </div>
                                                     <button type="submit" class="btn btn-soft-success waves-effect waves-light" name="btn_cat"><i class="fas fa-plus"></i> Add Category</button>
                                                </form>

                                                <?php 
                                                    if (isset($_GET['edit'])) {
                                                        include 'include/update_categories.php';
                                                    }

                                                    if (isset($_GET['delete'])) {
                                                        $cat_obj->deleteCategory($_GET['delete']);
                                                    }

                                                ?>

                                                
                                             </div>


                                            <div class="col-lg-8">
                                              
                                                    <table id="cat-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Products</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                    
                                                        <tbody>

                                                            <?php $cat_obj->showAllCategories(); ?>
                                                        
                                                        </tbody>
                                                    </table>
                                              


                                                                                          
                                            </div>
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>