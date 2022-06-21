<?php 

    include 'include/header.php';

    $dasboard_obj = new Dashboard;

    $cart_pending = $dasboard_obj->cartOrderPending();
    $buy_pending = $dasboard_obj->buyOrderPending();

    $total_product = $dasboard_obj->totalProducts();
    $total_categories = $dasboard_obj->totalCategories();
    $total_users = $dasboard_obj->totalUsers();
    $total_revenue = number_format($dasboard_obj->totalRevenue(), 2, ",", ".");
    $cart_revenue = number_format($dasboard_obj->revenue('cart')->c_total, 2, ",", ".");
    $buy_now_revenue = number_format($dasboard_obj->revenue('buy_now')->b_total, 2, ",", ".");

    $cart_report = $dasboard_obj->graphOrderReportLast7();
    $buy_report = $dasboard_obj->graphOrderReportBuyNowLast7();

    $total_report = $dasboard_obj->totalOrdersReport();

    $best_table = $dasboard_obj->bestProduct();

    $popular_p = $dasboard_obj->popularProduct();

    $cate = $dasboard_obj->categorydonut();



 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-desktop mr-2"></i>Dashboard</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
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
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">                                            
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Cart Pending Order</h4>
                                                    <h2 class="mt-0 font-weight-bold"><?php echo $cart_pending->op; ?></h2> 
                                                    <a class="text-warning font-20" href="orders.php?source=pending_order">
                                                        <span class="pull-left">See More</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-cart bg-soft-warning"></i>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                                                                                        
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">                                            
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Buy Now Pending Order</h4>
                                                    <h2 class="mt-0 font-weight-bold"><?php echo $buy_pending->bp; ?></h2> 
                                                    <a class="text-warning font-20" href="orders.php?source=buy_pending">
                                                        <span class="pull-left">See More</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-cart bg-soft-warning"></i>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                                                                                        
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card carousel-bg-img">
                                    <div class="card-body dash-info-carousel mb-0">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                 <div class="carousel-item active">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Total Products</h4>
                                                                <h2 class="mt-1 font-weight-bold"><?php echo $total_product->p; ?></h2> 
                                                                <a class="text-info font-20" href="products.php">
                                                                    <span class="pull-left">See More</span>
                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                                                </a>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="fab fa-product-hunt bg-soft-info"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->

                                               

                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Total Categories</h4>
                                                                <h2 class="mt-1 font-weight-bold"><?php echo $total_categories->c; ?></h2> 
                                                                <a class="text-danger font-20" href="categories.php">
                                                                    <span class="pull-left">See More</span>
                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                                                </a>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="fas fa-list-alt bg-soft-danger"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->

                                                 

                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Total Users</h4>
                                                                <h2 class="mt-1 font-weight-bold"><?php echo $total_users->u; ?></h2> 
                                                                <a class="text-primary font-20" href="users.php">
                                                                    <span class="pull-left">See More</span>
                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                                                </a>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="fas fa-users bg-soft-primary"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->

                                                



                                                 <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Total Revenue</h4>
                                                                <h2 class="mt-1 font-weight-bold">$ <?php echo $total_revenue; ?></h2>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="dripicons-wallet bg-soft-success"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->

                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Cart Revenue</h4>
                                                                <h2 class="mt-1 font-weight-bold">$ <?php echo $cart_revenue; ?></h2>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="fas fa-dollar-sign bg-soft-primary"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->

                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-8 align-self-center">
                                                            <div class="">
                                                                <h4 class="mt-0 header-title">Buy Now Revenue</h4>
                                                                <h2 class="mt-1 font-weight-bold">$ <?php echo $buy_now_revenue; ?></h2>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-4 align-self-center">
                                                            <div class="icon-info text-right mt-5">
                                                                <i class="fas fa-dollar-sign bg-soft-warning"></i>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->                                                  
                                                </div><!--end carousel-item-->



                                               
                                                
                                                
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!--end card-body-->                                                                                                        
                                </div><!--end card-->
                            </div><!--end col-->                            
                        </div><!--end row-->


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-0">Total Orders Reports</h4>
                                    </div>
                                    <div class="card-body track-report">                                        
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="icon-info">
                                                    <i class="dripicons-cart bg-soft-primary"></i>
                                                </div>
                                                <h3><?php echo $total_report['total_order']; ?></h3>
                                                <p class="mb-0 font-13 text-muted">Total Orders</p>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="icon-info">
                                                    <i class="fas fa-shipping-fast bg-soft-warning"></i>
                                                </div>
                                                <h3><?php echo $total_report['order_sent']; ?></h3>
                                                <p class="mb-0 font-13 text-muted">Order Sent</p>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="icon-info">
                                                    <i class="dripicons-checkmark bg-soft-success"></i>
                                                </div>
                                                <h3><?php echo $total_report['order_delivered']; ?></h3>
                                                <p class="mb-0 font-13 text-muted">Delivered</p>
                                            </div>

                                             <div class="col-lg-3">
                                                <div class="icon-info">
                                                    <i class="dripicons-cross bg-soft-pink"></i>
                                                </div>
                                                <h3><?php echo $total_report['order_canceled']; ?></h3>
                                                <p class="mb-0 font-13 text-muted">Canceled</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="mt-0 header-title">Cart Orders - Last 7 Orders Day Total Earing</h4>      
                                        <div>
                                            <canvas id="myChartIndex" height="80"></canvas>
                                        </div>       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="mt-0 header-title">Buy Now Orders - Last 7 Orders Day Total Earing</h4>      
                                        <div>
                                            <canvas id="myChartIndex2" height="80"></canvas>
                                        </div>       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <h4 class="header-title mb-3">Best Selling Product</h4>
                                <table id="best-table-index" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php  

                                            if (!empty($best_table)) {
                                                                
                                                foreach ($best_table  as $bt) {

                                                    
                                                    $p_id = $bt['p_id'];
                                                    $p_name = $bt['name'];
                                                    $quan = $bt['quan'];

                                                    echo "<tr>
                                                            <td>$p_id</td>
                                                            <td>$p_name</td>
                                                            <td>$quan</td>
                                                        </tr>";
                                                }

                                            }
                                            
                                            
                                        ?>
                                    </tbody>
                                </table>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="card carousel-bg-img">
                                    <div class="card-body dash-info-carousel">
                                        <h4 class="mt-0 header-title">Popular Product</h4>
                                        <div id="carousel_2" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                <div class="carousel-item active">
                                                    <div class="media">
                                                        <img src="../images/products_img/<?php echo $popular_p[0]['img']; ?>" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary mb-2 font-14"><?php echo $popular_p[0]['quan']; ?> sold</span>                                                           
                                                            <h4 class="mt-0 font-30"><?php echo $popular_p[0]['name']; ?></h4>
                                                            <p class="text-muted mb-0 font-16">$<?php echo number_format($popular_p[0]['price'], 2, ",", "."); ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../images/products_img/<?php echo $popular_p[1]['img']; ?>" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary mb-2 font-14"><?php echo $popular_p[1]['quan']; ?> sold</span>                                                           
                                                            <h4 class="mt-0 font-30"><?php echo $popular_p[1]['name']; ?></h4>
                                                            <p class="text-muted mb-0 font-16">$<?php echo number_format($popular_p[1]['price'], 2, ",", "."); ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../images/products_img/<?php echo $popular_p[2]['img']; ?>" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary font-14 mb-2"><?php echo $popular_p[2]['quan']; ?> sold</span>                                                           
                                                            <h4 class="mt-0 font-30"><?php echo $popular_p[2]['name']; ?></h4>
                                                            <p class="text-muted mb-0 font-16">$<?php echo number_format($popular_p[2]['price'], 2, ",", "."); ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card--> 

                                
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-gradient2">
                                        <div class="">
                                            <div class="card-icon">
                                                <i class="fas fa-coins"></i>
                                            </div>
                                            <h2 class="font-weight-bold text-white"><?php echo $total_product->p; ?> Products of <?php echo $total_categories->c; ?> Categories</h2>
                                            <p class="text-white mb-0 font-16">Products by Category</p>                                            
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body">
                                        <div class="">
                                            <div id="d1_cate" class="apex-charts"></div>
                                        </div> 
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            

                            </div><!--end col-->
                            
                        </div><!-- end row -->


                        





                        
                    </div><!-- container -->

        <?php include 'include/footer.php'; ?>


        <script>
            var ctx = document.getElementById('myChartIndex').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($cart_report['c_date']); ?>,
                    datasets: [{
                        label: 'Day Total Earning',
                        data: <?php echo json_encode($cart_report['c_total']); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


            var ctx3 = document.getElementById('myChartIndex2').getContext('2d');
            var myChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($buy_report['b_date']); ?>,
                    datasets: [{
                        label: 'Day Total Earning',
                        data: <?php echo json_encode($buy_report['b_total']); ?>,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });



            var options = {
                      chart: {
                          height: 250,
                          type: 'donut',
                      }, 
                      series: <?php echo json_encode($cate['cat_count']); ?>,
                      stroke: {
                        colors: undefined,
                    },
                      legend: {
                          show: true,
                          position: 'bottom',
                          horizontalAlign: 'center',
                          verticalAlign: 'middle',
                          floating: false,
                          fontSize: '14px',
                          offsetX: 0,
                          offsetY: -13
                      },
                      labels: <?php echo json_encode($cate['cat_name']); ?>,
                      colors: ["#00dd9f", "#f8bc60", "#CC59D2" , "#37A6E6", "#f65f4d", "#967AA1"],
                      responsive: [{
                          breakpoint: 600,
                          options: {
                              chart: {
                                  height: 240
                              },
                              legend: {
                                  show: false
                              },
                          }
                      }],
                      
                    }

                    var chart = new ApexCharts(
                      document.querySelector("#d1_cate"),
                      options
                    );

                    chart.render();




        </script>