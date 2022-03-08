 <?php
include('header.php');

// 	$sqlFol1=mysqli_query($conn,"select * from book_order where confirm_status=1  and shipping_status in (0,1) order by id desc");
// 	$sqlFol1=mysqli_query($conn,"SELECT book_order.*
//                                     FROM book_order
//                                     JOIN order_product ON order_product.booking_id=book_order.booked_id
//                                     JOIN seller ON order_product.seller_id=seller.seller_id
//                                     WHERE seller.availability='no'");

$sqlFol1=mysqli_query($conn,"SELECT order_product.*, book_order.*
                                FROM order_product
                                JOIN book_order ON order_product.booking_id=book_order.booked_id
                                JOIN seller on seller.seller_id=order_product.seller_id
                                WHERE order_product.status=0 AND seller.availability='no'
                                GROUP BY book_order.booked_id  ");
                                  
	$nS=mysqli_num_rows($sqlFol1);
	$sqlFol2=mysqli_query($conn,"select * from book_order where confirm_status=1 and payment_status=1 and shipping_status in (0,1) order by id desc");
	$sqlFol6=mysqli_query($conn,"select * from book_order where payment_status=1 order by id desc");
	$mn=mysqli_num_rows($sqlFol6);



if(isset($_GET['delid']))
{
	$sqlD=mysqli_query($conn, "delete from book_order  where id='".$_GET['delid']."' ");
	
	
	if($sqlD)
	{
		
		echo '<script>window.location.href="booked-order.php?sucmsg=Order Deleted Successfully"</script>';
	}
	else
	{
		$errmsg="Product Not Deleted ! Try Again";
	}
}

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
span.btn-sm-td {
    display: flex;
    justify-content: space-between;
}
span.btn-sm-td a.btn.btn-sm {
    margin: 4px 3px;
}
.dataTable tbody tr td:nth-child(9) {
    display: table-cell;
}
.dataTable tbody tr td:nth-child(3) {
    max-width: 90px;
}
</style>



<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Booked Orders (<?php echo $nS; ?>)</h2>
			<?php  while($rowOrder1=mysqli_fetch_assoc($sqlFol2))
			  {$cm=($rowOrder1['total']*0.05); $fc=$cm+1;
			  
				  $c+=$fc;
				  }
			  ?>
			  <h3>Total earning - SAR <?php echo number_format((float)$c, 2, '.', ''); ?></h3>
            
              <?php
			     
              if(isset($_GET['sucmsg']))
			  {
			  ?>
              <center><h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h3></center>
              <?php
			  }
			  if(isset($errmsg))
			  {
				  ?>
                  <center><h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h3></center>
                  <?php
			  }
			  ?>
		</div>	
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                     	<td>Order ID</td>
            							<td>User</td>
            							<td>Total amount</td>
            							<TD>Seller earning</TD>
            							<td>Admin commision</td>
                                  		<td>Payment Status</td>
                                  		<td>Payment Method</td>
                                     	<td>Date</td>
            						 	<td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                   $i=1;
                   while($rowOrder=mysqli_fetch_assoc($sqlFol1))
					  {
						  
						  
						  
					
						  ?>
                        <tr id="row<?php echo $i?>">
                        <td><span><?php echo $i;?> </span></td>
        <td><a href="single-order.php?orderid=<?php echo $rowOrder['booked_id']?>"> <?php echo $rowOrder['booked_id']?></a></td>
                          
	<td><span >Name:- <?php echo $rowOrder['userfname']?> <?php echo $rowOrder['userlname']?></span><br/>	
		
	<span>Phone-<?php echo $rowOrder['userphone']?> </span><br/>
	<span>Email-<?php echo $rowOrder['useremail']?> </span></td>
	<td><span>SAR <?php echo $rowOrder['total']?> </span></td>
	
	<?php  $cm=($rowOrder['total']*0.05); $fc=$cm+1;
	    $earning=$rowOrder['total']-$cm;
	?>
	<td>SAR <?php echo number_format((float)$earning, 2, '.', '');?></td>
	<td><span>SAR <?php echo number_format((float)$fc, 2, '.', '') ; ?> </span></td>
	  <td><?php if($rowOrder['payment_status']=='1')
	{
	?>
	<span class="label label-success" >Paid</span>
	<?php
	}else
	{
	?>
		<span class="label label-danger" >Pending</span>

	<?php
	}
	?>
	 </td>
	 	<td><span > <?php echo $rowOrder['payment_method']?> </span></td>

	<td style="width: 80px"><?php echo date('d M Y h:i A',strtotime($rowOrder['date']))?></td>	
		
<td class="d-flex align-items-center">
        <a class="btn btn-success" href="single-order.php?orderid=<?php echo $rowOrder['booked_id']?>" >View </a> 
        
</td>

                        </tr>
                        <?php 
				
					$i++;	
					  }
					  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
				
    </div>
</div>



    

<?php
include('footer.php');
?>