<?php
include('header.php');

if(isset($_GET['status'])) {
   $id=htmlspecialchars($_GET['id']);
   $status=htmlspecialchars($_GET['status']);
   $update_status=mysqli_query($conn, "UPDATE users SET status='".$status."' WHERE uid='".$id."' ");
   if ($update_status) {
     echo '<script>window.location.href="view-users.php?sucmsg=User Status Updated"</script>';
   }
}
if(isset($_GET['deluid'])) {
   $id=htmlspecialchars($_GET['deluid']);

   $update_status=mysqli_query($conn, "DELETE FROM users WHERE uid='".$id."' ");
   if ($update_status) {
     echo '<script>window.location.href="view-users.php?sucmsg=User Successfully Deleted"</script>';
   }
}
$sqlcat=mysqli_query($conn, "SELECT seller.*, SUM(order_product.sellerearn) as searn FROM order_product LEFT JOIN seller ON order_product.seller_id = seller.seller_id GROUP BY order_product.seller_id  ORDER BY searn DESC");
$row= mysqli_num_rows($sqlcat);

?>




<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Total Earning</h2>
		</div>	
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Seller name</th>
                                        <th>Email</th>
                                        <th>Total earning</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                    <?php
                    $i=1;
					          while($row12= mysqli_fetch_assoc($sqlcat))
					          { 
						        ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        <td style="font-weight:bold;"><?php echo $row12['sname']?></td>
                        <td style="font-weight:bold;"><?php echo $row12['semail']?></td>
                        <td style="font-weight:bold;"><?php echo number_format((float)$row12['searn'], 2, '.', '') ?></td>
					</tr>
                      <?php $i++; } ?>
                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
				
    </div>
</div>




   
<?php include('footer.php'); ?>
