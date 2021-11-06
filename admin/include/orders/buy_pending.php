
<h4 class="mt-0 header-title">All Buy Now Pending Orders</h4>

    
                                        
    <div class="row">

       
        <div class="col-lg-12">
           
                <form action="#" method="POST">

                    <table id="ord-table" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>View</th>
                            <th>Print - Large/Small</th>
                            <th>Process</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $order_obj->getBuyNowOrdersPendingInAdmin(); ?>
                            
                        
                        </tbody>
                        
                    </table>
                </form>
           


                                                      
        </div>
    </div> 

