<?php
include('header.php');

$sqlFol1=mysqli_query($conn, "select * from  banner ");

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
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="">All Banners(<?php echo ($row); ?>)</h2>
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
                                        <th>S.No</th>
                                        <th>Banner Image</th>
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
                                              <td ><img src="upload/banner/<?php echo $rowS['image']; ?>" width="100px" height="100px" ></td>
                    
                                           
                                    

                                        	<td>
                                            <a  href="view-assigned-product-banner.php?viewid=<?php echo $rowS['b_id']; ?>">View</a>|
                                        	<a  href="edit-banner.php?editid=<?php echo $rowS['b_id']; ?>">Edit</a>
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
