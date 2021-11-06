
<?php 

    if (isset($_GET['id']) && !empty($_GET['id'])) {
      
      $e_id = trim($_GET['id']);
      $single = $contact_obj->singleEmail($e_id);

      $contact_obj->updateIsRead($e_id);

    }else{
        redirect("email.php");
    }


 ?>


<!-- Right Sidebar -->
    <div class="email-rightbar">
        
        <div class="card mt-3">
            <div class="card-body">

                <div class="media mb-3">
                    <div class="media-body align-self-center">
                        <h4 class="font-20 m-0"><?php echo $single->name; ?></h4>
                        <small class="text-muted font-14"><?php echo $single->email; ?></small><br>
                        <small><?php echo date("d-M-Y H:i:s", strtotime($single->date)); ?></small>
                    </div>
                </div>
 
                <p class="email-msg"><?php echo $single->msg; ?></p>
                
                <hr/>

                

                <a href="#custom-modal-2" class="btn btn-primary waves-effect"  data-animation="fadein" data-plugin="custommodal"
                data-overlaySpeed="200" data-overlayColor="#36404a"><i class="mdi mdi-reply"></i> Reply</a>
            </div>

        </div>


    </div> <!-- end Col -->


                <!-- Modal -->
                    <div id="custom-modal-2" class="modal-demo text-left">
                        <button type="button" class="close" onclick="Custombox.modal.close();">
                            <span>&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="custom-modal-title">Compose Mail</h4>
                        <div class="card mb-0 p-3">
                            <form role="form">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" placeholder="To" value="<?php echo $single->email?>">
                                </div><!--end form-group-->
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" placeholder="From">
                                        </div>
                                    </div>
                                </div><!--end form-group-->
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div><!--end form-group-->
                                <div class="form-group mb-3">
                                    <div class="summernote">
                                        

                                    </div>
                                </div><!--end form-group-->

                                <div class="btn-toolbar form-group mb-0">
                                    <div class="pull-right">
                                        <button class="btn btn-info waves-effect waves-light"><span>Send</span> <i
                                                class="far fa-paper-plane ml-3"></i></button>
                                    </div>
                                </div><!--end form-group-->
                            </form><!--end form-->
                        </div><!--end card-->
                    </div><!--end custom-modal-->