   <?php 

        if (isset($_POST['btn_add_product'])) {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $product_obj->addProduct($_POST, $_FILES);
            }
        }


    ?>


    <h4 class="mt-0 header-title">Add Product</h4>

            <div class="mb-4">
                <a href='products.php' class='btn btn-soft-primary waves-effect waves-light' role='button'><i class='fa fa-arrow-left'></i> Product List</a>
            </div>
    
    <div class="row">
        <div class="col-lg-12 mb-4">
             
            <form action="#" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="prod_name-input" class="col-form-label text-left">Product Name</label>
                                <input id="prod_name-input" class="form-control" type="text" name="p_name" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label for="prod_desc-input" class="col-form-label text-left">Product Description</label>
                                <textarea class="form-control" name="p_desc" id="prod_desc-input" cols="20" rows="5" placeholder="Enter Product Description"></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="prod_price-input" class="col-form-label text-left">Product Price</label>
                                <input id="prod_price-input" class="form-control" type="text" name="p_price" placeholder="Enter Product Price">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="prod_new_badge-input" class="col-form-label text-left">New Badge</label>
                                <select name="new_badge" id="prod_new_badge-input" class="form-control">
                                    <option value="">Select New Badge</option>
                                    <option value="NEW">NEW</option>
                                </select>
                        </div>

                    </div>

                    <div class="col-md-6">

                         <div class="form-group">
                            <label for="prod_cat" class="col-form-label text-left">Category</label>
                                <select name="p_cat" id="prod_cat" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php $product_obj->getCategoryInProduct(); ?>
                                </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="prod_stock-input" class="col-form-label text-left">Product Stock</label>
                                <input id="prod_stock-input" class="form-control" type="number" min="1" name="p_stock" placeholder="Enter Product Stock">
                        </div>

                        <div class="form-group">
                          <label for="img">Product Image</label>
                          <input type="file" class="form-control" id="img" name="img">
                        </div>

                    </div>
                    
                </div>
                
                 <button type="submit" class="btn btn-soft-success waves-effect waves-light" name="btn_add_product"><i class="fas fa-plus"></i> Add Product</button>


            </form>

         </div>

    </div> 