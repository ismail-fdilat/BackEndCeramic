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
	

		echo '<script>window.location.href="view-banner.php?sucmsg=Successfully Deleted"</script>';
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
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h3 class="">All Banner with assigned product(<?php echo ($row);  ?>)</h3>
		        <p><a class="btn btn-primary" href="assign-banner-to-product.php">Add banner with product</a></p>

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
                                        <td>S.No</td>
                                        <td>Banner Name</td>
                                        <td>Product Name</td>
                                        <td>Original Price</td>
                						<td>Action</td>
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
                         <td style="font-weight:bold;">Banner</td> 
                         <td style="font-weight:bold;"><?php echo $rowS['prod_title']; ?> </td>
        				 <td style="font-weight:bold;"><?php echo "AED ".$rowS['sale_price']; ?> </td> 
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



<?php
include('footer.php');
?>
