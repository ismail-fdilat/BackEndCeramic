 <?php
include('header.php');
   
    $seller_id = $_SESSION['seller_id'];
    $seller_query="SELECT order_product.*, book_order.* ,seller.* FROM order_product JOIN book_order on book_order.booked_id=order_product.booking_id JOIN seller on order_product.seller_id=seller.seller_id WHERE order_product.seller_id=$seller_id AND order_product.status=0 GROUP BY order_product.booking_id";
	$sqlFol1=mysqli_query($conn,$seller_query);
	$nS=mysqli_num_rows($sqlFol1);


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
.dataTable tbody tr td:nth-child(1) {
    max-width: 30px;
}
.dataTable tbody tr td:nth-last-child {
    width: max-content;
    display: block;
}
</style>



<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <h2 class="mb-3">Booked Orders (<?php echo $nS;  ?>)</h2>
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php if(isset($_GET['sucmsg'])) { ?>
                            <h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h3>
                          <?php } if(isset($errmsg)) { ?>
                            <h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h3>
                          <?php } ?>
                    </div>
                    
                    <div class="card-body">
                		<div class="table-responsive">
                		    <table id="example" style="min-width: 845px">
                                <thead>
                                    <tr style="font-weight:bold">
                               		    <th style="width: 46px;">#</th>
                         			 	<th>Order ID</th>
							            <th>User</th>
							            <th>Amount</th>
                  				        <th>Payment Status</th>
                      			        <th>Payment Method</th>
                         				<th>Date</th>
            						 	<th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   <?php 
                                   $i=1;
                                   while($rowOrder=mysqli_fetch_assoc($sqlFol1))
                					  {
                						  ?>
                                        <tr id="row<?php echo $i?>">
                                        <td><span  ><?php echo $i;?> </span></td>
                        <td><a href="single-order.php?orderid=<?php echo $rowOrder['booked_id']?>"> <?php echo $rowOrder['booked_id']?></a></td>
                                          
                	<td>
                	    <span >Name:- <?php echo $rowOrder['userfname']?> <?php echo $rowOrder['userlname']?></span><br>	
                    	<span>Phone-<?php echo $rowOrder['userphone']?> </span><br>
                    	<span>Email-<?php echo $rowOrder['useremail']?> </span>
                	</td>
                	
                	<td><span>SAR <?php echo $rowOrder['total']?> </span></td>
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
                
                	    <td><?php echo date('d M Y h:i A',strtotime($rowOrder['date']))?></td>	
               
                
                <script>
                function myFunction<?php echo $rowOrder['id']?>() {
                    var x = document.getElementById("demo<?php echo $rowOrder['id']?>");
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
                var datastring='status='+status+'&order_id='+id;
                $.ajax({
                
                      type: "POST",
                      url: 'common.php',
                      data:datastring,
                      success: function(data) {
                       if(data==1 && status==2)
                          {
                              window.location.href='complete-order.php';
                          }
                          else if(data==1 && status==3)
                          {
                              window.location.href='cancel-order.php';
                          }
                      }
                    });
                   
                    
                    
                }
                </script>
               
                   
                
                  </div>
                 
                </td>	
                <td>
                        <a class="btn btn-success btn-sm" href="single-order.php?orderid=<?php echo $rowOrder['booked_id']?>" ><i class="fa fa-eye"></i> View </a>
                </td>
                
                                        </tr>
                                        <?php $i++;	} ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>              
                </div>
            </div>  
        </div>
    </div>
</div>






        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script> 
    <script>
      $(function () {
       
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>   
    
    
    

<?php
include('footer.php');
?>