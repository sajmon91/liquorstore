<?php 

    include 'admin/include/init.php';
    $year =  date("Y") - 1905;

    if (isset($_SESSION['user_id'])) {
      $user_obj = new User($_SESSION['user_id']); 
      $order_obj = new Order;
    }

    $prod_obj = new Product;
    $cat_obj = new Category;
    $testi_obj = new Testimonial;

    if (isset($_SESSION['products_page'])) {
       if (basename($_SERVER['PHP_SELF']) != $_SESSION['products_page']) {
           unset($_SESSION['sort']);
           unset($_SESSION['filter']);
       }
    }

    if (isset($_SESSION['products_category_page'])) {
       if (basename($_SERVER['PHP_SELF']) != $_SESSION['products_category_page']) {
           unset($_SESSION['sort2']);
           unset($_SESSION['filter2']);
       }
    }
    
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Liquor Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="images/logo.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex align-items-center">
            <p class="mb-0 phone pl-md-2">
              <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +123 456 789</a> 
              <a href="#"><span class="fa fa-paper-plane mr-1"></span> stefan.sajmon@gmail.com</a>
            </p>
          </div>
          <div class="col-md-6 d-flex justify-content-md-end">
            <div class="social-media mr-4">
              <p class="mb-0 d-flex">
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
              </p>
            </div>
            <div class="reg">
              <p class="mb-0">
                <?php 
                    if (isLoggedIn() && !isAdmin()) {
                      echo '<a href="my_orders.php" class="mr-2">My Orders</a>';
                    }elseif (isAdmin()) {
                      echo '<a href="admin/index.php" class="mr-2">Admin</a>';
                    }else{
                 ?>

                <a href="register.php" class="mr-2">Sign Up</a> 
                <a href="login.php">Log In</a>

              <?php } 

                  if (isLoggedIn()) {
                    echo '<a href="admin/include/handlers/logout_handler.php" class="mr-2">Log out</a>';
                  }
              ?>

              </p>
            </div>
          </div>
        </div>
      </div>
    </div>