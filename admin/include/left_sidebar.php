<div class="left-sidenav">
                    
                    <ul class="metismenu left-sidenav-menu" id="side-nav">

                        <li class="menu-title">Main</li>

                        <li>
                            <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboards</span></a>
                        </li>

                          <li>
                            <a href="javascript: void(0);"><i class="fas fa-shopping-cart"></i><span>Orders</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="orders.php"><span>Cart Order</span></a></li>
                                <li><a href="orders.php?source=buy_now_orders"><span>Buy Now Order</span></a></li> 
                            </ul>
                        </li>


                         
                         <li>
                            <a href="categories.php"><i class="fas fa-list-alt"></i><span>Categories</span></a>
                        </li>
                        

                        <li>
                            <a href="javascript: void(0);"><i class="fab fa-product-hunt"></i><span>Products</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="products.php"><span>Products List</span></a></li>
                                <li><a href="products.php?source=add_product"><span>Add Product</span></a></li> 
                            </ul>
                        </li>
            

                         <li>
                            <a href="users.php"><i class="fas fa-users"></i><span>Users</span></a>
                        </li>

                        <li>
                            <a href="email.php"><i class="fas fa-envelope"></i><span>Email</span>
                                <span class="badge badge-danger badge-pill float-right font-14"><?php echo $all_no_read_count->no_read; ?></span>
                            </a>
                        </li>

                        <li>
                            <a href="testimonials.php"><i class="fas fa-quote-left"></i><span>Testimonials</span></a>
                        </li>

                        <li class="menu-title">Sales Report</li>

                        <li>
                            <a href="table_report.php"><i class="fas fa-table"></i><span>Table Report</span></a>
                        </li>

                        <li>
                            <a href="graph_report.php"><i class="fas fa-chart-bar"></i><span>Graph Report</span></a>
                        </li>

                    </ul>
                </div>