            <div class="modal fade" id="staticBackdrop7" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                      Buy this product
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form method="post">
                      <div class="row d-flex justify-content-center">
                        <div class="col-sm">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control" name="fname" id="fname" required />

                          <label for="lname">Last Name</label>
                          <input type="text" class="form-control" name="lname" id="lname" required/>

                          <label for="address">Street Address</label>
                          <input type="text" class="form-control" name="address" id="address" required/>

                          <label for="city">Town / City</label>
                          <input type="text" class="form-control" name="city" id="city" required/>

                          <label for="phone">Phone</label>
                          <input type="number" min="0" class="form-control" name="phone" id="phone" required />

                          <label for="quan">Quantity</label>
                          <input type="number" value="1" min="1" max="<?php echo $product->product_stock; ?>" class="form-control" name="quan" id="quan" required/>

                          <p style="color: #000;"><?php echo $product->product_stock; ?> piece available</p>

                          <button type="submit" name="buy_now_btn" class="btn btn-primary py-3 px-5 mt-2 btn-block">
                            Place an order
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>