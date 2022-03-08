<?php
    include('config.php');
    require "auth.php";
    
    
      $full_name = $_SERVER['PHP_SELF'];
      $name_array = explode('/',$full_name);
      $count = count($name_array);
      $page_name = $name_array[$count-1];
    
      $admin_id=$_SESSION['admin_id'];
    
    if(isset($_SESSION['admin_id']))
    {
        $_SESSION['admin_id'];
        
        $connupdate=mysqli_query($conn,"update tbl_admin set loginstatus=1 where id='".$_SESSION['admin_id']."'");
        
        $sqluser=mysqli_query($conn,"select * from tbl_admin where id='".$_SESSION['admin_id']."'");
        $rowuser=mysqli_fetch_assoc($sqluser);
    }
        $logoget=mysqli_query($conn,"select * from logo ");
        $logo=mysqli_fetch_assoc($logoget);
?>

<div class="deznav">
        <div class="deznav-scroll">
			<ul class="metismenu" id="menu">
                <!--<li><a class="has-arrow ai-icon" href="dashboard.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Dashboard</span>
					</a>
                    <ul aria-expanded="false">
						<li><a href="index.html">Dashboard Light</a></li>
						<li><a href="index-2.html">Dashboard Dark</a></li>
						<li><a href="order-page-list.html">Orders</a></li>
						<li><a href="order-details-page.html">Order Details</a></li>
						<li><a href="customer-page-list.html">Customers</a></li>
						<li><a href="analytics.html">Analytics</a></li>
						<li><a href="review.html">Review</a></li>	
					</ul>

                </li>-->
                <li>
                    <a class="ai-icon" href="dashboard.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Dashboard</span>
					</a>
                </li>
                <li>
                    <a class="ai-icon" href="view-seller.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Seller</span>
					</a>
                </li>
                <li>
                    <a class="ai-icon" href="tax.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Tax</span>
					</a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Slider</span>
					</a>
                    <ul aria-expanded="false">
						<li><a href="view-deal.php">Managed Slider</a></li>
						<li><a href="assign-deals-to-product.php">Assigned Slider to Product</a></li>
						<!--<li><a href="view-today-deal.php">Manage Today Slider</a></li>-->
						<li><a href="view-banner.php">Manage Banners</a></li>
						<li><a href="assign-banner-to-product.php">Assigned Banners to Product</a></li>
					</ul>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Category</span>
					</a>
                    <ul aria-expanded="false">
						<li><a href="view-category.php">Manage Category</a></li>
						<li><a href="view-subcategory.php">Manage Sub-Category</a></li>
					</ul>
                </li>
                <li>
                    <a class="ai-icon" href="view-product.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Products</span>
					</a>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Orders</span>
					</a>
                    <ul aria-expanded="false">
						<li><a href="all_orders.php">All Orders</a></li>
						<li><a href="booked-order.php">Manage Order Delivery</a></li>
						<li><a href="shipping-order.php">Shipping Orders</a></li>
						<li><a href="complete-order.php">Complete Orders</a></li>
					</ul>
                </li>
                <li>
                    <a class="ai-icon" href="view-users.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Users</span>
					</a>
                </li>
                
                 <li>
                     <a class="ai-icon" href="notification_view.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Notifications</span>
					</a>
                    
                </li>
                
                <li>
                     <a class="ai-icon" href="drivers.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Drivers</span>
					</a>
                    
                </li>
              
            <li>
                     <a class="ai-icon" href="contact_us_queries.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Contact Us Queries</span>
					</a>
                    
                </li>
                
                 <li>
                     <a class="ai-icon" href="all_seller_earnings.php" aria-expanded="false">
						<i class="flaticon-025-dashboard"></i>
						<span class="nav-text">Seller's Earnings</span>
					</a>
                    
                </li>
                
                
            </ul>
			
		</div>
    </div>