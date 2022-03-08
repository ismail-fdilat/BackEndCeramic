<?php
include('header.php');

$fetchsingleorder=mysqli_query($conn, "SELECT seller.*, order_product.* FROM seller LEFT JOIN order_product ON order_product.`seller_id`=seller.`seller_id`
                                       where order_product.`booking_id`='".$_GET['orderid']."' and order_product.`status`=0");
                                      
                    
$fetchsingleorder1=mysqli_query($conn, "select * from book_order where booked_id='".$_GET['orderid']."'");
$single=mysqli_fetch_assoc($fetchsingleorder1);
$fetchU=mysqli_query($conn, "select * from users where id='".$single['user_id']."'");
$rowU=mysqli_fetch_assoc($fetchU);

$nS=mysqli_num_rows($fetchU);

$tax=mysqli_query($conn,"select * from product_taxrate");
$fetchtax = mysqli_fetch_assoc($tax);
 


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
</style>





<div class="content-body">
    <div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-end">
                        <h2 class="mb-0 me-auto">Order Details</h2>
            			<?php if(isset($_GET['sucmsg'])) { ?>
            				<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];?></p>	
            			<?php } ?>
                    </div>
                    <div class="card-body">
                        <h3 style="color:#00C700"><?php echo $single['booked_id']?></h3>
        				  <p>Date : <?php echo date('d M Y h:i A',strtotime($single['date']));?></p>
        				 <?php if($nS>0) { ?>
        				        <p>User : <strong ><span  style="color:#1abc9c"><i class="fa fa-user"></i> <?php echo $rowU['user_fname']?> <?php echo $rowU['user_lname']?></span></strong></p>
        				   <?php } else { ?>
    		                    <p>User : <strong ><span  style="color:#1abc9c"><i class="fa fa-user"></i> Guest</span></strong></p>
        				   <?php } ?>
        				   
							<p>
							    Payment Status : <?php if($single['payment_status']==0) { ?>
										                <strong style="color:#cc2e35">Pending</strong>
									             <?php }
								                    	elseif($single['payment_status']==1) { ?>
									                	<strong style="color:green">Complete</strong>
										         <?php }?>
                            </p>
                			<p>
                			    Order Status : <?php if($single['status']=='0') { ?>
                                            	    <strong style="color:#cc2e35">Pending</strong>
                                            	<?php }elseif($single['status']=='1'){ ?>
                                            	    <strong style="color:orange">Complete</strong>
                                            	<?php } ?>
                            </p>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-end">
                        <h2 class="mb-0 me-auto">Billing Details</h2>
                    </div>
                    <div class="card-body">
                        <h5><b>User fullname: </b><?php echo $single['userfname'];?> <?php echo $single['userlname'];?></h5>
                        <h5><b>User Phone:</b> <?php echo $single['userphone'];?> </h5>
                        <h5><b>User Email:</b> <?php echo $single['useremail'];?> </h5>
                        <h5><b>User City: </b><?php echo $single['city'];?> </h5>
                        <h5><b>User Street Address1:</b> <?php echo $single['streetadd1'];?> </h5>
                        <h5><b>User Street Address2: </b><?php echo $single['streetadd1'];?> </h5>
                        <h5><b>Whats app no:</b> <?php echo $single['userwhatsapp_no'];?></h5>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-end">
                        <h2 class="mb-0 me-auto">Description</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
							<tr>
							<td>Sl No</td>
							<td>Product Image</td>
							<td>Product Title</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Sub Total</td>
							<td>Stauts</td>
							</tr>
							<?php 
							$i=1;
								$total='';
							$total1='';
							$discount='';
							while($rowsingleorder=mysqli_fetch_assoc($fetchsingleorder))
							{
							    
							    
								$fetchproduct=mysqli_query($conn,"select * from product where prod_id='".$rowsingleorder['product_id']."'");
							$rowproduct=mysqli_fetch_assoc($fetchproduct);
								
						
								 $img = mysqli_query($conn,"select * from prod_image where prod_id='".$rowsingleorder['product_id']."' Group BY prod_id");
								?>
								
							<tr>
							<td>
							<?php echo $i;?>
							</td>
							<td>
							    <?php while($rowimg=mysqli_fetch_assoc($img)){ ?>
							            <img src="<?php echo $base_url.$rowimg['image']?>" class=" thumbnail" style="width:100px ; height:100px;" >
						    	<?php } ?>
							</td>
							<td> <?php echo $rowproduct['prod_title']?></td>
							<td><?php echo $rowsingleorder['qty']?></td>
							<td>SAR <?php echo $rowsingleorder['price']?></td>
							<td>SAR <?php echo $rowsingleorder['price']*$rowsingleorder['qty']?></td>
							
							<?php if( $rowsingleorder['availability']=='no'){?><td> Delivery by admin </td> <?php } else{ ?> <td> Delivery by seller</td> <?php }?>
							
							</tr>
							<?php $total1+=$rowsingleorder['price']*$rowsingleorder['qty'];
						            $i++;
						    	} ?>
							<tr>
							<td colspan="5"></td>
							<td>Order Total</td>
							<td ><strong>SAR <?php echo $total1;?></strong> </td>
							</tr>
						
							<tr style="color:#00C700">
    							<td colspan="5"></td>
    							<td>Vat tax </td>
    							<td>SAR <?php echo $taxprice=(($total1 * $fetchtax['tax'])/100);?></td>
							</tr>
							<tr>
							<td colspan="5"></td>
							<td><strong>Total</strong> </td>
							<td><strong>SAR <?php echo $total1+$taxprice ?></strong> </td>
						
							</tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>





 

  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>

<?php
include('footer.php');
?>