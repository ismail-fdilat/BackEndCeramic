<?php
include('header.php');

$sqlFol1=mysqli_query($conn, "select * from  deal ");

$row= mysqli_num_rows($sqlFol1);



//$nS=mysql_num_rows($sqlFol1);

if(isset($_GET['delid']))
{
		$sqlD="delete from deal where deal_id='".$_GET['delid']."'";
		mysqli_query($conn,$sqlD);
		$sqla="delete from assigned_deals_to_product where deal_id='".$_GET['delid']."'";
		mysqli_query($conn,$sqla);
        
    	$deluser = "update `product` set `offer_price`=0,`startDate`=0,`endDate`=0,`end_time`=0,`start_time`=0,`end_date_pstr`=0,`start_date_pstr`=0,`deal_id`=0 where deal_id='".$_GET['delid']."'"; 
		$deluser1=mysqli_query($conn,$deluser);	
	
		echo '<script>window.location.href="view-deal.php?sucmsg=Successfully Deleted"</script>';
}




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
					    <h2 class="">All Sliders(<?php echo ($row);  ?>)</h2>
				    </div>
				    
				    <div class="col-md-6 d-flex justify-content-end">
				        <a class="btn btn-primary" href="add-deal.php">Add Slider</a>
				    </div>

                     <?php
                      if(isset($_GET['sucmsg']))
    				  {
    				  ?>
                      <h2 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h2>
                      <?php
    				  }
    				  if(isset($errmsg))
    				  {
    					  ?>
                          <h2 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h2>
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
                                                <th>Slider Image</th>
                                                <th>Slider Name</th>
                                                <th>Actions</th>
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
                                                <td ><img src="upload/deal/<?php echo $rowS['deal_image']; ?>" width="100px" height="100px" ></td>
                    
                                                <td style="font-weight:bold;"><?php echo $rowS['deal_title']; ?> </td>
    
                                            	<td>
                                            	<a  href="view-assigned-product-deal.php?viewid=<?php echo $rowS['deal_id']; ?>">View</a>|
                                            	<a  href="edit-deal.php?editid=<?php echo $rowS['deal_id']; ?>">Edit</a>|
                                            	<a onclick="return confirm('Are you sure ?')" href="view-deal.php?delid=<?php echo $rowS['deal_id']; ?>">Delete</a>
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


  <!--   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">-->
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
