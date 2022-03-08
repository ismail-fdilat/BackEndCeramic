<?php
include('header.php');
$sqlFol1=mysqli_query($conn, "select * from product where deal_id = '".$_GET['viewid']."' ");

$row= mysqli_num_rows($sqlFol1);



//$nS=mysql_num_rows($sqlFol1);

if(isset($_GET['delid']))
{   
        $sqlFol1=mysqli_query($conn, "select * from product where prod_id = '".$_GET['delid']."' ");

        $row= mysqli_fetch_assoc($sqlFol1);
     	$sqlD="delete from assigned_deals_to_product where deal_id='".$row['deal_id']."' AND product_id='".$_GET['delid']."'";
		mysqli_query($conn,$sqlD);
        
    	$deluser = "update `product` set `offer_price`=0,`startDate`=0,`endDate`=0,`end_date_pstr`=0,`start_date_pstr`=0,`end_time`=0,`start_time`=0,`deal_id`=0 where prod_id='".$_GET['delid']."'"; 
		$deluser1=mysqli_query($conn,$deluser);
	

		echo '<script>window.location.href="view-deal.php?sucmsg=Successfully Deleted"</script>';
}

$dealname = mysqli_query($conn,"select deal_title from deal where deal_id = '".$_GET['viewid']."'");

$fetchDeal = mysqli_fetch_assoc($dealname);
?>
<script>
function deleteconfirm(){
  var a = window.confirm("Are you sure?");
  if(a==true){
    return true;
  } else {
    return false;
  }
}
</script>


<div class="content-body">
            <div class="container-fluid">
				
				<div class="row mb-4">
				    <div class="col-md-6">
					    <h2 class="">All Slider with assigned product (<?php echo ($row); ?>)</h2>
				    </div>
				    
				    <div class="col-md-6 d-flex justify-content-end">
				        <a class="btn btn-primary" href="assign-deals-to-product.php">Add slider with product</a>
				    </div>

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
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Slider Name</th>
                                                <th>Product Name</th>
                                                <th>Original Price</th>
                        						<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                        					while($rowS= mysqli_fetch_assoc($sqlFol1))
                        					{
                        					
                        					//print_r($rowS);
                        						?>
                                              <tr>
                                                <td><?php echo $i;?></td>
                                             <td style="font-weight:bold;"><?php echo $fetchDeal['deal_title']; ?> </td> 
                                             <td style="font-weight:bold;"><?php echo $rowS['prod_title']; ?> </td>
                            				 <td style="font-weight:bold;"><?php echo "AED ".$rowS['prod_price']; ?> </td> 
                            				 <!--<td style="font-weight:bold;"><?php echo "AED ".$rowS['offer_price']; ?> </td> 
                            				 <td style="font-weight:bold;"><?php echo $rowS['startDate'].' '.$rowS['start_time']; ?> </td> 
                            				 <td style="font-weight:bold;"><?php echo $rowS['endDate'].' '.$rowS['end_time']; ?> </td> -->
                        
                                        	 <td>
                                        	<!--<a  href="view-assigned-product-deal.php?viewid=<?php echo $rowS['deal_id']; ?>">View</a>|-->
                                        	<!--|<a  href="edit-prod-offer.php?editid=<?php echo $rowS['prod_id']; ?>">Edit</a>|-->
                                        	<a onclick="return confirm('Are you sure ?')" href="view-assigned-product-deal.php?delid=<?php echo $rowS['prod_id']; ?>">Delete</a>
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









      
    <!--<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">-->
    <!--<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
    <!-- DataTables -->
    <!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>-->
    <!--<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
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
