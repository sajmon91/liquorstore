<?php 

    include 'include/header.php';

    $product_obj = new Product;
    $order_obj = new Order;


                                        
 ?>
    
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-shopping-cart mr-2"></i>Orders</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Orders</li>
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

                                                case 'buy_now_orders':
                                                    include "include/orders/view_all_buy_now_orders.php";
                                                    break;

                                                case 'see_buy_now_order':
                                                    include "include/orders/see_buy_now_order.php";
                                                    break;

                                                case 'buy_now_order_process':
                                                    include "include/orders/buy_now_order_process.php";
                                                    break;

                                                case 'buy_pending':
                                                    include "include/orders/buy_pending.php";
                                                    break;


                                            ///////////////////////////////////////////////////////////

                                                case 'see_order':
                                                    include 'include/orders/see_order.php';
                                                    break;
                                                
                                                case 'order_process':
                                                    include 'include/orders/order_process.php';
                                                    break;

                                                case 'pending_order':
                                                    include 'include/orders/order_pending.php';
                                                    break;

                                                default:
                                                   include "include/orders/view_all_cart_orders.php";
                                                    break;
                                            }



                                        ?>

                                        


                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>