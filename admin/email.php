<?php 

    include 'include/header.php';

     
    $all_email = $contact_obj->countAllEmails(); 

 ?>

        
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'include/side_bar_user.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="fas fa-envelope mr-2"></i>Emails</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Liquor Store</li>
                                    <li class="breadcrumb-item active">Emails</li>
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
                                <?php display_message(); ?> 
                                
                                <!-- Left sidebar -->
                                <div class="email-leftbar">
                                    <a href="#custom-modal" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fas fa-feather-alt mr-2"></i>Compose
                                    </a>
    
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="mail-list">
                                                <a href="email.php" class="active pt-0">Inbox <span class="ml-1">(<?php echo $all_email->all_e; ?>)</span></a>
                                                <a href="email.php?source=view_all_read_emails">Read Email</a>
                                                <a href="email.php?source=view_all_no_read_emails">No Read Email<span class="badge badge-danger badge-pill float-right font-14"><?php echo $all_no_read_count->no_read; ?></span></a>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>
                                <!-- End Left sidebar -->


                                    <?php 

                                            if (isset($_GET['source'])) {
                                                    $source = $_GET['source'];

                                                }else{
                                                    $source = '';
                                            }


                                             switch ($source) {

                                                case 'email_read':
                                                    include 'include/emails/email_read.php';
                                                    break;
                                                
                                                case 'view_all_read_emails':
                                                    include 'include/emails/view_all_read_emails.php';
                                                    break;

                                                case 'view_all_no_read_emails':
                                                    include 'include/emails/view_all_no_read_emails.php';
                                                    break;
                                            


                                                default:
                                                   include "include/emails/view_all_emails.php";
                                                    break;
                                            }



                                        ?>



                            </div><!--end col-->
                        </div><!--end row-->

                    </div><!-- container -->


                    <!-- Modal -->
                    <div id="custom-modal" class="modal-demo text-left">
                        <button type="button" class="close" onclick="Custombox.modal.close();">
                            <span>&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="custom-modal-title">Compose Mail</h4>
                        <div class="card mb-0 p-3">
                            <form role="form">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" placeholder="To">
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

                    

        <?php include 'include/footer.php'; ?>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 320,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

            });
            $('[data-plugin="custommodal"]').on('click', function( e ) {
                var modal = new Custombox.modal({
                    content: {
                        target: $(this).attr("href"),
                        effect: $(this).attr("data-animation")
                    }
                });
                modal.open();
            });
        </script>