<?php
 include('header.php');
// include('nav.php');


    $sqlseller=mysqli_query($conn,"select seller_id from seller");
    $sellercount=mysqli_num_rows($sqlseller);
    
    $sqlproduct=mysqli_query($conn,"select prod_id from product");
    $productcount=mysqli_num_rows($sqlproduct);
    
    $sqlcategory=mysqli_query($conn,"select category_id from dir_categories");
    $categorycount=mysqli_num_rows($sqlcategory);
    
    $sqlusers=mysqli_query($conn,"select id from users");
    $userscount=mysqli_num_rows($sqlusers);
    
    $sqlpayment=mysqli_query($conn,"select SUM(amount) as total_amount from payment");
    $totalpayment=mysqli_fetch_assoc($sqlpayment);
    
    $sqlFol1=mysqli_query($conn,"select id from book_order where shipping_status in (0,1) order by id desc");
    $totalorders=mysqli_num_rows($sqlFol1);

	$sqlFol2=mysqli_query($conn,"SELECT SUM(admincom) as admincom FROM order_product where payment_status='1'");
    $c=mysqli_fetch_assoc($sqlFol2);
					
					
?>

<div class="content-body">
            <!-- row -->
	<div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Dashboard</h2>
		</div>	
		
		<div class="row">
			<div class="col-xl-4 col-sm-6">
			    <a href="view-seller.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Seller</span>
    							<h2><?php echo $sellercount;?></h2>
    						</div>
    					</div>
    				</div>
			    </a>
			</div>
			<div class="col-xl-4 col-sm-6">
			    <a href="view-product.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Products</span>
    							<h2><?php echo $productcount;?></h2>
    						</div>
    					</div>
    				</div>
    			</a>
			</div>
			<div class="col-xl-4 col-sm-6">
			    <a href="view-category.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Category</span>
    							<h2><?php echo $categorycount;?></h2>
    						</div>
    					</div>
    				</div>
    			</a>
			</div>
			<div class="col-xl-4 col-sm-6">
			    <a href="view-users.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Customers</span>
    							<h2><?php echo $userscount;?></h2>
    						</div>
    					</div>
    				</div>
    			</a>
			</div>
			<div class="col-xl-4 col-sm-6">
			    <a href="all_seller_earnings.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Total Earning</span>
    							<h2>SAR <?php echo number_format((float) $c['admincom'], 2, '.', ''); ?></h2>
    						</div>
    					</div>
    				</div>
    			</a>
			</div>
			<div class="col-xl-4 col-sm-6">
			    <a href="all_orders.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Total Orders</span>
    							<h2><?php echo $totalorders;?></h2>
    						</div>
    					</div>
    				</div>
    			</a>
			</div>
		</div>
			

		
    </div>
</div>



<!--<div class="content-wrapper">
      <section class="content-header">  
        <h1>Dashboard</h1>
      </section>

        
        <section class="content">
          
          <div class="row">

              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php //echo $sellercount;?></h3>
                    <p>Seller(s)</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  
                  <a href="view-seller.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                 
                    <h3><?php echo $productcount;?></h3>
                    <p>Products</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                
                  <a href="view-product.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo $categorycount;?></h3>
                    <p>Category</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                
                  <a href="view-category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo $userscount;?></h3>
                    <p>Customers</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                
                  <a href="view-users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

               <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>SAR <?php //echo number_format((float) $c['admincom'], 2, '.', ''); ?></h3>
                    <p>Total Earning</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  
                  <a href="all_seller_earnings.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo $totalorders;?></h3>
                    <p>Total Orders</p>
                  </div>
                  
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                    <ion-icon name="logo-euro"></ion-icon>
                  </div>
                  
                  <a href="booked-order.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

          </div>
        </section>
    </div>-->
    <!--<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!--<script src="bootstrap/js/bootstrap.min.js"></script>-->

<?php include('footer.php');?>
