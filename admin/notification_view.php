<?php
include('header.php');


$sqlFol1=mysqli_query($conn, "select * from notification_add order by notification_id desc");

$row= mysqli_num_rows($sqlFol1);



if(isset($_GET['delid']))
{
	$sqlD="delete from notification_add where notification_id ='".$_GET['delid']."'";
 	mysqli_query($conn, $sqlD);
        echo '<script>window.location.href="notification_view.php?sucmsg= Successfully Deleted"</script>';

}



?>
<style>
    span.d-block.td-respon {
    display: block;
    height: 100px;
    overflow: auto;
    white-space: break-spaces;
    margin-bottom: 10px;
    
    
}
table#example1 td:nth-child(2) {
    width: 61%;
}
</style>






<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center justify-content-between text-head">
			<h3 class="">All notification(<?php echo ($row); ?>)</h3>
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
	        <p class="mb-0"><a class="btn btn-primary" href="add_notification.php">Add Notification</a></p>
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
                                        <th>Message</th>
                                        <th>Date</th>
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
                                        <td style="font-weight:bold;"><span class="d-block td-respon"> <?php echo $rowS['n_message']?> </span></td>
                						  <td style="font-weight:bold;"><?php echo $rowS['create']?> </td>
                                       
                						<!--<td>-->
                						<!--<a  href="notification_edit.php?editid=<?php //echo $rowS['notification_id']?>" style="color:blue"><i class="fa fa-edit"></i> Edit</a> &nbsp;|&nbsp;-->
                						<!--<a onclick="return confirm('Are you sure ?')" href="notification_view.php?delid=<?php //echo $rowS['notification_id']?>" style="color:red"><i class="fa fa-trash-o"></i> Delete</a></td>-->
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



<?php include('footer.php'); ?>