<?php 

    include 'include/header.php';

    
    $report_obj = new Report;

    $order_report = "";
    $buy_order_report = "";


    if (isset($_POST['btn_date_filter'])) {
                                          
      $from = date("d/m/Y", strtotime($_POST['table_report_date1']));
      $to = date("d/m/Y", strtotime($_POST['table_report_date2']));

      $date = "From: ".$from." To: ".$to;
        
      // cart orders
      $cart_report = $report_obj->getCartTotalSale($_POST['table_report_date1'], $_POST['table_report_date2']);
      $cart_sum = "$ " . number_format($cart_report['cart_sum'], 2, ",", ".");
      $cart_invoice = $cart_report['cart_invoice'];

      $order_report = $report_obj->cartOrderReport($cart_report['orders_id']);


      // buy now orders
      $buy_now_total_sale = $report_obj->getbuyNowTotalSale($_POST['table_report_date1'], $_POST['table_report_date2']);
      $buy_invoice = $buy_now_total_sale['buy_invoice'];
      $buy_total = "$ " . number_format($buy_now_total_sale['buy_sum'], 2, ",", ".");

      $buy_order_report = $report_obj->buyOrderReport($buy_now_total_sale['buy_orders_id']);


    }

    


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-table mr-2"></i>Table Report</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Table Report</li>
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
                                        <h4 class="mt-0 header-title">Table Reports</h4>

                                        <h3 class="box-title">
                                          <?php echo isset($date) ? $date : "";

                                          ?>
                                        </h3>
                                        
                                        <div class="row">

                                            <div class="col-lg-12">
                                                
                                                 <form action="#" method="POST">

                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0 mb-lg-2">
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="table_report_date1" id="datepicker1" value="<?php echo date("Y/m/d"); ?>" data-date-format="yyyy/mm/dd">
                                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="table_report_date2" id="datepicker2" value="<?php echo date("Y/m/d"); ?>" data-date-format="yyyy/mm/dd">
                                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="submit" name="btn_date_filter" class="btn btn-soft-info waves-effect waves-light" value="Filter By Date">
                                                        </div>
                                                    </div>

                                                </form> 

                                            </div>
                                            
                                        </div><!--end row-->


                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-3">
                                                        <div class="card card-second mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="far fa-copy font-24 text-secondary"></i>
                                                                </div> 
                                                                <span class="badge badge-info font-24">Cart Invoice</span>
                                                                <h3 class="font-weight-bold"><?php echo isset($cart_invoice) ? $cart_invoice : 0 ; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card card-second mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="fas fa-dollar-sign  font-24 text-secondary"></i>
                                                                </div> 
                                                                <span class="badge badge-info font-24">Cart Total</span>
                                                                <h3 class="font-weight-bold"><?php echo isset($cart_sum) ? $cart_sum : 0 ; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="card card-second mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="far fa-copy  font-24 text-secondary"></i>
                                                                </div> 
                                                                <span class="badge badge-primary font-24">Buy Now Invoice</span>
                                                                <h3 class="font-weight-bold"><?php echo isset($buy_invoice) ? $buy_invoice : 0 ; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="card card-second mb-0">
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <i class="fas fa-dollar-sign  font-24 text-secondary"></i>
                                                                </div> 
                                                                <span class="badge badge-primary font-24">Buy Now Total</span>
                                                                <h3 class="font-weight-bold"><?php echo isset($buy_total) ? $buy_total : 0 ; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                        </div> 

                                        <div class="row mt-3">
                                            <div class="col-lg-6">

                                                <table id="ord-table" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php  

                                                            if (!empty($order_report)) {
                                                                
                                                                foreach ($order_report  as $c_order) {
                                                                    
                                                                    $o_id = $c_order['order_id'];
                                                                    $full_name = $c_order['full_name'];
                                                                    $price = "$ " . number_format($c_order['price'], 2, ",", ".");
                                                                    $c_order_date = date("d/m/Y", strtotime($c_order['date']));

                                                                    echo "<tr>
                                                                            <td>$o_id</td>
                                                                            <td>$full_name</td>
                                                                            <td>$price</td>
                                                                            <td>$c_order_date</td>
                                                                        </tr>";
                                                                }

                                                            }
                                                            
                                                        ?>
                                                    </tbody>
                                                </table>                                
                                            </div>


                                            <div class="col-lg-6">

                                                <table id="ord-table2" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php  
                                                            if (!empty($buy_order_report)) {
                                                                foreach ($buy_order_report  as $b_order) {
                                                                    
                                                                  $b_o_id = $b_order['buy_order_id'];
                                                                  $b_full_name = $b_order['full_name'];
                                                                  $b_price = "$ " . number_format($b_order['price'], 2, ",", ".");
                                                                  $b_order_date = date("d/m/Y", strtotime($b_order['date']));

                                                                    echo "<tr>
                                                                            <td>$b_o_id</td>
                                                                            <td>$b_full_name</td>
                                                                            <td>$b_price</td>
                                                                            <td>$b_order_date</td>
                                                                        </tr>";
                                                                }
                                                            }
                                                            
                                                        ?>
                                                    </tbody>
                                                </table>                                
                                            </div>


                                        </div> <!-- end row mt-3 -->


                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>