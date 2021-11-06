<?php 

    if (isset($_GET['cat_id'])) {
        $c_id = trim($_GET['cat_id']);
        $p_cat = $product_obj->showProductTitle('categories', 'cat_id', $c_id, 'cat_name');
    }else{
        redirect('products.php');
    }

 ?>
<h4 class="mt-0 header-title">All Products - <?php echo $p_cat; ?></h4>

    <div class="mb-4">
        <a href='products.php?source=add_product' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fa fa-plus'></i> Add Product</a>
        <a href='products.php' class='btn btn-soft-info waves-effect waves-light' role='button'><i class='fa fa-arrow-left'></i> All Products</a>
        <span class="total_prod float-right"></span>
    </div>
                                        
    <div class="row">

       
        <div class="col-lg-12">
           
                <form action="#" method="POST">
                        
                    <?php   include 'discount.php'; ?>

                    <table id="cat-table" class="table table-bordered dt-responsive nowrap product-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        

                        <thead>
                        <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>
                             <?php $product_obj->getProductsInOtherPage($c_id, 'product_cat'); ?> 
                            
                        
                        </tbody>
                        
                    </table>
                </form>
           


                                                      
        </div>
    </div> 