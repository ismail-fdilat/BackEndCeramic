<?php
include('header.php');
$sqlFol1=mysqli_query($conn, "select * from  todaydeals ");

$row= mysqli_num_rows($sqlFol1);



//$nS=mysql_num_rows($sqlFol1);

if(isset($_GET['delid']))
{
	$sqlD="delete from todaydeals where today_deal_id='".$_GET['delid']."'";
		mysqli_query($conn,$sqlD);

		echo '<script>window.location.href="view-deal.php?sucmsg=Successfully Deleted"</script>';


}




?>
<script>
function deleteconfirm(){
  var a = window.confirm("Are you sure?");
  if(a==true){
    return true;
  } else{
    return false;
  }
}
</script>




<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">All Slider(<?php echo ($row);  ?>)</h2>
			<p>
				<a class="btn btn-primary" href="assign-today-deals-to-product.php">Add Slider To Product</a>
				<a style="margin:5px;" class="btn btn-primary" href="view-assign-today-deals.php?viewid=1">View Assigned Product</a>
			 </p>
			 <?php
                  if(isset($_GET['sucmsg']))
    			  {
    			  ?>
                  <h3 class="box-title" style="color:green;"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg'];  ?> </h3>
                  <?php
    			  }
    			  if(isset($errmsg))
    			  {
    				  ?>
                      <h3 class="box-title" style="color:red"><i class="fa fa-times"></i> <?php echo $errmsg;  ?> </h3>
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
                                        <td><strong>Sl No</strong></td>
                                        <td><strong >Arabic Slider Name</strong></td>
                                        <td><strong >Slider Name</strong></td>
                                        <td><strong>Action</strong></td>
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
                                      <!--<td ><img src="upload/deal/<?php echo $rowS['deal_image']; ?>" width="100px" height="100px" ></td>-->
            
                                   
                                     <td style="font-weight:bold;"><?php echo $rowS['ar_deal_title']; ?> </td> 
                                     <td style="font-weight:bold;"><?php echo $rowS['deal_title']; ?> </td>
                    
                                	<td>
                                <!--	<a  href="view-assign-today-deals.php?viewid=<?php echo $rowS['today_deal_id']; ?>">View</a>| -->
                                	<a  href="edit-today-deal.php?editid=<?php echo $rowS['today_deal_id']; ?>">Edit Slider</a>
                                
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
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
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
