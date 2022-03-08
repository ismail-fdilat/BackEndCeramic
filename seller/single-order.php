<?php
include('header.php');

$fetchsingleorder=mysqli_query($conn, "select * from order_product where booking_id='".$_GET['orderid']."' and seller_id='".$_SESSION['seller_id']."' and status=0");

$fetchsingleorder1=mysqli_query($conn, "select * from book_order where booked_id='".$_GET['orderid']."'");
$single=mysqli_fetch_assoc($fetchsingleorder1);
$fetchU=mysqli_query($conn, "select * from users where id='".$single['user_id']."'");
$rowU=mysqli_fetch_assoc($fetchU);

$nS=mysqli_num_rows($fetchU);

$tax=mysqli_query($conn,"select * from product_taxrate");
$fetchtax = mysqli_fetch_assoc($tax);
 
$checkq="select * from seller where seller_id='".$_SESSION['seller_id']."'";
$sql=mysqli_query($conn,$checkq);
$sellercheck=mysqli_fetch_assoc($sql);
	


?>
<script>

function shipping1(srt)
{
	
	var orderid="<?php echo $_GET['booked_id']?>";
	
	
	window.location.href="single-order.php?orderid="+orderid+"&status="+srt;
	
}
</script>




<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Details</h3>
                        <?php if(isset($_GET['sucmsg'])) { ?>
        					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];?></p>	
        				<?php } ?>
                    </div>
                    <div class="card-body">
                		<h3 style="color:#00C700"><?php echo $single['booked_id']?></h3>
				  <p>Date : <?php echo date('d M Y h:i A',strtotime($single['date']));?></p>
				    <?php if($nS>0)
				  {
				  
				  ?>
				   <p>User : <strong ><span  style="color:#1abc9c"><i class="fa fa-user"></i> <?php echo $rowU['user_fname']?> <?php echo $rowU['user_lname']?></span></strong></p>
				   <?php } else
				   { ?>
		        
		        <p>User : <strong ><span  style="color:#1abc9c"><i class="fa fa-user"></i> Guest</span></strong></p>
   
				   <?php } ?>
			    <p> Order Status : <?php if($single['status']=='0') { ?>
			    
                	<strong style="color:#cc2e35">Pending</strong>
                	
                	<?php } elseif($single['status']=='1') { ?>
                	
                	<strong style="color:orange">Complete</strong>
                
                	<?php } ?>
                </p>
            </div>
        </div>
    </div>
        	
        	<div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Billing Details</h3>
                    </div>
                    <div class="card-body">
                        <p><b>User fullname: </b><?php echo $single['userfname'];?> <?php echo $single['userlname'];?></p>
                        <p><b>User Phone:</b> <?php echo $single['userphone'];?> </p>
                        <p><b>User Email:</b> <?php echo $single['useremail'];?> </p> 
                        <p><b>User City: </b><?php echo $single['city'];?> </p>
                        <p><b>User Street Address1:</b> <?php echo $single['streetadd1'];?> </p>
                        <p><b>User Street Address2: </b><?php echo $single['streetadd1'];?> </p>
                        <p><b>Whats app no:</b> <?php echo $single['userwhatsapp_no'];?></p>
                	</div>
        		</div>
    		</div>
    		
    		<div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Description</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example">
                                <thead>
								<tr>
    								<td>Sl No</td>
    								<td>Product Image</td>
    								<td>Product Title</td>
    								<td>Quantity</td>
    								<td>Price</td>
    								<td>Sub Total</td>
    								<td>Payment Method</td>
    								<td>Payment Status</td>
    								<td>Status</td>
							    </tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									$total='';
								$total1='';
								$discount='';
								while($rowsingleorder=mysqli_fetch_assoc($fetchsingleorder))
								{
								    // echo "<pre>"; print_r($rowsingleorder); 
									$fetchproduct=mysqli_query($conn,"select * from product where prod_id='".$rowsingleorder['product_id']."'");
								$rowproduct=mysqli_fetch_assoc($fetchproduct);
									
							
									 $img = mysqli_query($conn,"select * from prod_image where prod_id='".$rowsingleorder['product_id']."' Group BY prod_id");
									?>
									
								<tr>
								   
								<td>
								<?php echo $i;?>
								</td>
								<td>
								  <?php 
								  while($rowimg=mysqli_fetch_assoc($img)){
									
									?>
								<img src="upload/product/<?php echo $rowimg['image']?>" class=" thumbnail" style="width:100px ; height:100px;" >
								<?php } ?>
								</td>
								<td><?php echo $rowproduct['prod_title']?></td>
								<td><?php echo $rowsingleorder['qty']?></td>
								<td>SAR <?php echo $rowsingleorder['price']?></td>
								<td>SAR <?php echo $rowsingleorder['price']*$rowsingleorder['qty']?></td>
								<td><?php echo $rowsingleorder['payment_method']?></td>
                                
                                 <?php if( $rowsingleorder['payment_status']==0) {?><td> Pending </td> <?php }
                                        elseif($rowsingleorder['payment_status']==1){?> <td> Complete </td> <? } ?>
							<?php if($sellercheck['availability']=='no'){ ?>
								<td class="my-5"> Delivery by Admin</td> 
							<?php }elseif($sellercheck['availability']=='yes'){ ?>
							<td>
								    <button type="button" class="btn btn-change" onclick="myFunction('<?php echo $rowsingleorder['orderid']?>')">
								        <i class="fa fa-edit"></i>Change Status
								    </button>
  
            <div id="demo<?php echo $rowsingleorder['orderid']?>" style="display:none">
                <div class="form-group">
        		    <select class="form-control" id="update_status_id<?php echo $rowsingleorder['orderid']?>" onchange="updateStatus('<?php echo $rowsingleorder['orderid']?>')">
                        <option value="0" <?php if($rowsingleorder['status']=='0') echo 'selected' ;?>>Pending</option>
                        <option value="1" <?php if($rowsingleorder['status']=='1') echo 'selected' ;?>>Shipping</option>
                    </select>
                </div>

<script>
function myFunction(id) {
    var x = document.getElementById("demo"+id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>	
<script>
function updateStatus(id) {
var status=document.getElementById("update_status_id"+id).value;
var seller_id='<?php echo $_SESSION['seller_id']?>'
var datastring='status='+status+'&order_id='+id+'&sellerr_id='+seller_id;

$.ajax({

      type: "POST",
    //   url: 'update_status.php',
      url: 'common.php',
      data:datastring,
      success: function(data) {
        if(data==1)
        {   alert("Status changed");
            location.reload();
        }
        else
        {
        alert('status not changed');    
        }
        
      }
    });
   
    
    
}
</script>

</div></td> <?php }?>
                               
								</tr>
								<?php $total1+=$rowsingleorder['price']*$rowsingleorder['qty'];
							            $i++;
								    } ?>
								<tr>
    								<td colspan="7"></td>
    								<td>Order Total</td>
    								<td ><strong>SAR <?php echo $total1;?></strong> </td>
								</tr>
								<tr style="color:#00C700">
    								<td colspan="7"></td>
    								<td>Vat tax </td>
    								<td>SAR <?php echo ($taxprice=$total1 * $fetchtax['tax'])/100; ?></td>
								</tr>
								<tr>
    								<td colspan="7"></td>
    								<td><strong>Total</strong> </td>
    								<td><strong>SAR <?php echo $taxprice+$total1;?></strong> </td>
								</tr>
								</tbody>
							</table>
                        </div>
                	</div>
        		</div>
        	</div>
        </div>
    </div>
</div>




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