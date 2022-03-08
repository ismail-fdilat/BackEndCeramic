<?php
include('header.php');

$seller_id = $_SESSION['seller_id'];
$sqlFol1=mysqli_query($conn,"SELECT order_product.*,book_order.*
                                FROM order_product
                                LEFT JOIN book_order
                                ON book_order.booked_id=order_product.booking_id WHERE order_product.seller_id=$seller_id
                                ORDER BY orderid DESC ");
  
$sqlFolfull=mysqli_query($conn,"select * from book_order where seller_id='$seller_id'");
$nSfull=mysqli_num_rows($sqlFolfull);

$sqlFol2=mysqli_query($conn,"select * from users");
$nS2=mysqli_num_rows($sqlFol2);

    
$sqlFol4=mysqli_query($conn,"select * from product where sid=$seller_id");
$nS4=mysqli_num_rows($sqlFol4);

$sqlFolfull23=mysqli_query($conn,"SELECT seller.*, SUM(order_product.sellerearn) as searn 
                                    FROM order_product
                                    LEFT JOIN seller  
                                    ON order_product.seller_id = seller.seller_id 
                                    WHERE order_product.seller_id='$seller_id' and order_product.status='2'
                                    GROUP BY order_product.seller_id");
$sellerearn=mysqli_fetch_assoc($sqlFolfull23);


?>


<style>
.btn-change{
    background-color: #605ca8;
    border-color: #605ca8;
    color:white;
}
.btn-change:hover {
   background-color: #605ca8;
    border-color: #605ca8;
    color:white;
}
    .label-pending
{
background-color: #f39c12;
}
.table_body{
    background:#fff;
    padding:10px;
    margin-top:80px;
}
.bg_dark_tb{
    background: #333;
    color: #fff;
}
.table_body .table>thead>tr>th, .table_body .table>tbody>tr>th, .table_body .table>tfoot>tr>th, .table_body .table>thead>tr>td, .table_body .table>tbody>tr>td, .table_body .table>tfoot>tr>td{
        padding: 16px 10px;
}
</style>

<div class="content-body">
	<div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Dashboard</h2>
		</div>	
		
		<div class="row">
		    <div class="col-xl-4 col-sm-6">
			    <a href="view-product.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Products</span>
    							<h2><?php echo $nS4;?></h2>
    						</div>
    					</div>
    				</div>
			    </a>
			</div>
		    <div class="col-xl-4 col-sm-6">
			    <a href="booked-order.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Orders</span>
    							<h2><?php echo $nSfull;?></h2>
    						</div>
    					</div>
    				</div>
			    </a>
			</div>
		    <div class="col-xl-4 col-sm-6">
			    <a href="booked-order.php">
    				<div class="card">
    					<div class="card-body d-flex align-items-center justify-content-between">
    						<div class="menu">
    							<span class="font-w500 fs-16 d-block mb-2">Total Earning</span>
    							<h2><?php echo number_format((float)$sellerearn['searn'], 2, '.', '');?></h2>
    						</div>
    					</div>
    				</div>
			    </a>
			</div>
			
        </div>
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Lastest Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>seller earning</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($orders=mysqli_fetch_assoc($sqlFol1)){?>
                                      <tr>
                                        <td><?php echo $orders['booked_id']; ?></td>
                                        <td><?php echo $orders['userfname'];?></td>
                                        <td><?php if($orders['shipping_status']== 0){echo 'Pending';}elseif($orders['shipping_status']== 1){echo 'Processing';}elseif($orders['shipping_status']== 2){echo 'Completed';}else{echo 'Cancelled';}?></td>
                                        <td>SAR <?php $total=$orders['total']; echo $total;?></td>
                                        <?php ($minus=$total*0.05); $searning=$total-$minus; $admincom=$minus+1; ?>
                                        <!--<td>SAR <?php //echo $admincom;?></td>-->
                                        <td>SAR <?php echo $searning;?></td>
                                      </tr>
                                   <?php $esearning+=$searning;} ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
    </div>
</div>








    <script src="bootstrap/js/bootstrap.min.js"></script>

<?php
include('footer.php');
?>
