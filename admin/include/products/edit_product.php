   <?php 

        if (isset($_GET['id'])) {
           
            $product = $product_obj->getProductData($_GET['id']);

        }else{
            redirect('products.php');
        }

        if ($product->status) {
            $st = "<span>Active</span>";
        }else{
            $st = "<span>Inactive</span>";
        }

        if (isset($_POST['btn_edit_product'])) {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $product_obj->editProduct($_GET['id'], $_POST, $_FILES);
            }
        }
    ?>


    <h4 class="mt-0 header-title">Edit Product</h4>


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
                                <input id="prod_name-input" class="form-control" type="text" name="p_name" placeholder="Enter Product Name" value="<?php echo $product->product_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="prod_desc-input" class="col-form-label text-left">Product Description</label>
                                <textarea class="form-control" name="p_desc" id="prod_desc-input" cols="20" rows="5" placeholder="Enter Product Description"><?php echo $product->product_desc; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="prod_price-input" class="col-form-label text-left">Product Price</label>
                                    <input id="prod_price-input" class="form-control" type="text" name="p_price" placeholder="Enter Product Price" value="<?php echo $product->product_price; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="discount-input" class="col-form-label text-left">Product Discount</label>
                                    <select name="discount" id="discount-input" class="form-control">
                                        <option value="<?php echo $product->product_discount ? $product->product_discount : ''; ?>"><?php echo $product->product_discount ? $product->product_discount : 'Select Discount'; ?></option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                        <option value="60">60</option>
                                        <option value="65">65</option>
                                        <option value="70">70</option>
                                        <option value="remove">Remove discount</option>
                                    </select>
                            </div>
                        </div>
                        


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="prod_new_badge-input" class="col-form-label text-left">New Badge</label>
                                    <select name="new_badge" id="prod_new_badge-input" class="form-control">
                                        <option value="<?php echo $product->new_badge; ?>"><?php echo $product->new_badge ? $product->new_badge : 'Select New Badge'; ?></option>
                                        <option value="">Remove Badge</option>
                                        <option value="NEW">NEW</option>
                                    </select>
                            </div>

                             <div class="form-group col-md-6">
                                <label for="best-input" class="col-form-label text-left">Best Seller Badge</label>
                                    <select name="best" id="best-input" class="form-control">
                                        <option value="<?php echo $product->best_seler_badge; ?>"><?php echo $product->best_seler_badge ? $product->best_seler_badge : 'Select Best Seller Badge'; ?></option>
                                        <option value="">Remove Badge</option>
                                        <option value="BEST SELLER">BEST SELLER</option>
                                    </select>
                            </div>

                        </div>
                    

                    </div>


                    <div class="col-md-6">

                         <div class="form-group">
                            <label for="prod_cat" class="col-form-label text-left">Category</label>
                                <select name="p_cat" id="prod_cat" class="form-control">
                                    <?php $product_obj->getCategoryInEditProduct($product->product_cat); ?>
                                </select>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="prod_stock-input" class="col-form-label text-left">Product Stock</label>
                                    <input id="prod_stock-input" class="form-control" type="number" min="1" name="p_stock" placeholder="Enter Product Stock" value="<?php echo $product->product_stock; ?>">
                            </div>

                             <div class="form-group col-md-6">
                                <label for="status-input" class="col-form-label text-left">Product Status</label>
                                    <select name="status" id="status-input" class="form-control">
                                        <option value="<?php echo $product->status; ?>"><?php echo $st; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                            </div>


                        </div>
                        

                        <div class="form-group">
                          <label for="img">Product Image</label><br>
                          <img src='../images/products_img/<?php echo $product->product_img; ?>' alt="img" width="300px">
                          <input type="file" class="form-control" id="img" name="img">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-soft-success waves-effect waves-light" name="btn_edit_product"><i class="fas fa-edit"></i> Edit Product</button>
                    
                </div>
                
                


            </form>

         </div>

    </div> 