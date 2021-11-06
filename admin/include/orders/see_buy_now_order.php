<?php 

    if (isset($_GET['id']) && !empty($_GET['id'])) {
      
      $o_id = trim($_GET['id']);
    }

    $total = $order_obj->getOrderTotalPrice($o_id, "buy now order");

    $t = number_format($total,2, ",", ".");


 ?>

    <div class="mb-4">
        <a href='orders.php?source=buy_now_orders' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fas fa-arrow-left'></i> All Buy Now Orders</a>
    </div>
                                        
    <div class="row">

       
        <div class="col-lg-12">
           
                <form action="#" method="POST">
                        

                    <table class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        

                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php 
                                 $order_obj->seeOrderProduct($o_id, "buy now order");
                             ?>

                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><b>Total Price:</b></td>
                                 <td><b>$<?php echo $t; ?></b></td>
                             </tr>
                                                   
                        </tbody>
                        
                    </table>
                </form>
           


                                                      
        </div>
    </div> 