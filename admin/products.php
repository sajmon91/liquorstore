<?php 

    include 'include/header.php';

    $product_obj = new Product;

    if (isset($_POST['submit_discount'])) {
        $product_obj->productDiscount();
    }


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fab fa-product-hunt mr-2"></i>Products</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Products</li>
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
                                                case 'add_product':
                                                    include 'include/products/add_product.php';
                                                    break;
                                                
                                                case 'edit_product':
                                                    include 'include/products/edit_product.php';
                                                    break;

                                                case 'product_category':
                                                    include 'include/products/view_all_products_category.php';
                                                    break;


                                                default:
                                                   include "include/products/view_all_products.php";
                                                    break;
                                            }



                                        ?>

                                        


                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>