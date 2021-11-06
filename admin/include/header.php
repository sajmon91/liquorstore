<?php 

    include 'include/init.php'; 

    if (!isAdmin()) {
        redirect('../index.php');
    }

    $user_obj = new User($_SESSION['user_id']); 
    $contact_obj = new Contact;   
    $all_no_read_count = $contact_obj->countAllNoReadEmails(); 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Liquor Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo.png">

         <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

         <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">


        <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
        <link href="assets/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <?php include 'top_bar.php'; ?>