<?php 

    if (isset($_GET['id']) && !empty($_GET['id'])) {
      
      $o_id = trim($_GET['id']);
    }else{
        redirect("orders.php?source=buy_now_orders");
    }


    if (isset($_POST['buy_now_status_btn'])) {
        $order_obj->buyNowOrderProcess($_POST);
    }


 ?>

    <div class="mb-4">
        <a href='orders.php?source=buy_now_orders' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fas fa-arrow-left'></i> All Buy Now Orders</a>
    </div>
                                        
    <div class="row">

       
        <div class="col-lg-12">
           
                    <table class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        

                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php 
                                 $order_obj->seeBuyNowOrderProcess($o_id);
                             ?>

                            
                                                   
                        </tbody>
                        
                    </table>
               
           
                <form method="post" action="">

                    <div class="form-group col-6">
                        <label for="status">Order Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Chose Status</option>
                           
                            <option value="Order sent">Order sent</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Canceled">Canceled</option>
                        </select>
                    </div>      
                            
                    <div class="form-group col-6">
                        <label>Message:</label>
                        <textarea name="message" id="message" class="form-control" cols="10" rows="5"></textarea>
                    </div>

                    <input type="hidden" name="buy_now_order_id" value="<?php echo $o_id; ?>">
                    <input type="submit" name="buy_now_status_btn" class="btn btn-primary btn-lg" value="Update Status">

                </form>


                                                      
        </div>
    </div> 