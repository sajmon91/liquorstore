<?php 

    include 'include/header.php';

    
    $report_obj = new Report;

   


    if (isset($_POST['btn_graph_date_filter'])) {
                                          
      $from = date("d/m/Y", strtotime($_POST['graph_report_date1']));
      $to = date("d/m/Y", strtotime($_POST['graph_report_date2']));

      $date = "From: ".$from." To: ".$to;

      // cart orders
      $gr_cart = $report_obj->graphOrderReport($_POST['graph_report_date1'], $_POST['graph_report_date2']);

      // buy now orders
      $gr_buy = $report_obj->graphOrderReportBuyNow($_POST['graph_report_date1'], $_POST['graph_report_date2']);

      // best selling product
      $best_s = $report_obj->bestSellingProductc($_POST['graph_report_date1'], $_POST['graph_report_date2']);


    }

    


                                        
 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-chart-bar mr-2"></i>Graph Report</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Graph Report</li>
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
                                        <h4 class="mt-0 header-title">Graph Reports</h4>

                                        <h3 class="box-title">
                                          <?php echo isset($date) ? $date : "";

                                          // var_dump($best_s);
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
                                                                        <input type="text" class="form-control" name="graph_report_date1" id="datepicker1" value="<?php echo date("Y/m/d"); ?>" data-date-format="yyyy/mm/dd">
                                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="graph_report_date2" id="datepicker2" value="<?php echo date("Y/m/d"); ?>" data-date-format="yyyy/mm/dd">
                                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="submit" name="btn_graph_date_filter" class="btn btn-soft-info waves-effect waves-light" value="Filter By Date">
                                                        </div>
                                                    </div>

                                                </form> 

                                            </div>
                                            
                                        </div><!--end row-->


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">        
                                                        <h4 class="mt-0 header-title">Cart Orders - Day Total Earing</h4>      
                                                        <div>
                                                            <canvas id="myChart" height="80"></canvas>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">        
                                                        <h4 class="mt-0 header-title">Buy Now Orders - Day Total Earing</h4>      
                                                        <div>
                                                            <canvas id="myChart2" height="80"></canvas>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">        
                                                        <h4 class="mt-0 header-title">Best Selling Product</h4>      
                                                        <div>
                                                            <canvas id="myChart3" height="80"></canvas>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->

                                       


                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->

                    

        <?php include 'include/footer.php'; ?>

        <script>
             
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($gr_cart['c_date']); ?>,
                    datasets: [{
                        label: 'Day Total Earning',
                        data: <?php echo json_encode($gr_cart['c_total']); ?>,
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


            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($gr_buy['b_date']); ?>,
                    datasets: [{
                        label: 'Day Total Earning',
                        data: <?php echo json_encode($gr_buy['b_total']); ?>,
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
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



            var ctx3 = document.getElementById('myChart3').getContext('2d');
            var myChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($best_s['name']); ?>,
                    datasets: [{
                        label: 'Best Selling Products',
                        data: <?php echo json_encode($best_s['quan']); ?>,
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

 
        


        </script>