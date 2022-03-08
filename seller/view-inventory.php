<?php
include('header.php');
include('nav.php');

	//$sqlFol1=mysqli_query($conn, "select * from product left join prod_image on prod_image.prod_id=product.prod_id Group By prod_image.prod_id");
	
$sid=$rowuser['seller_id'];
	$sqlFol1=mysqli_query($conn, "select * from product where sid='".$sid."' ");
	
	$row = mysqli_num_rows($sqlFol1);

if(isset($_GET['delid']))
{
	$sqlD="delete from product where prod_id='".$_GET['delid']."'";
  $conn->exec($sqlD);
		echo '<script>window.location.href="view-product.php?sucmsg=Product Successfully Deleted"</script>';

}




?>

<style>
/* Outer */
.popup {
	width:100%;
	height:100%;
	display:none;
	position:fixed;
	z-index: 999;
	top:0px;
	left:0px;
	background:#ffffff17;
}

/* Inner */
.popup-inner {
	max-width:700px;
	width:90%;
	padding:40px;
	position:absolute;
	top:50%;
	left:50%;
	-webkit-transform:translate(-50%, -50%);
	transform:translate(-50%, -50%);
	box-shadow:0px 2px 6px rgba(0,0,0,1);
	border-radius:3px;
	background:#fff;
}

/* Close Button */
.popup-close {
	width:30px;
	height:30px;
	padding-top:4px;
	display:inline-block;
	position:absolute;
	top:0px;
	right:0px;
	transition:ease 0.25s all;
	-webkit-transform:translate(50%, -50%);
	transform:translate(50%, -50%);
	border-radius:1000px;
	background:rgba(0,0,0,0.8);
	font-family:Arial, Sans-Serif;
	font-size:20px;
	text-align:center;
	line-height:100%;
	color:#fff;
}

.popup-close:hover {
	-webkit-transform:translate(50%, -50%) rotate(180deg);
	transform:translate(50%, -50%) rotate(180deg);
	background:rgba(0,0,0,1);
	text-decoration:none;
}
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="">All Products (<?php echo $row;  ?>)</h3>
				


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
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped" style="text-align:center">
                    <thead>
                      <tr>
                        <td style="width:80px;"><strong>#</strong></td>
                        <td><strong>Product </strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Size Name</strong></td>
                        <td><strong>Individual Qty(Size)</strong></td>
			<!--<td><strong>Product Total Quantity</strong></td>-->
			<td><strong>Product Sold Quantity</strong></td>
                        <td><strong>Product Available Quantity</strong></td>
			<!--<td><strong>Action</strong></td>-->
			</tr>
											</thead>
											<tbody>
										<?php
										$i=1;
										while($rowS=mysqli_fetch_assoc($sqlFol1))
										{
										//get category 
        $sqlFol12=mysqli_query($conn, "select * from category where cid='".$rowS['prod_cate_id']."'");
        $row2=mysqli_fetch_assoc($sqlFol12);
        //get sub category
        $sqlFol13=mysqli_query($conn, "select * from subcategory where subid='".$rowS['prod_subcate_id']."'");
        $row3=mysqli_fetch_assoc($sqlFol13);
        //get sub sub category
        // $sqlFol14=mysqli_query($conn, "select * from sub_subcategory where sub_subcate_id='".$rowS['prod_subsub_cate_id']."'");
        // $row4=mysqli_fetch_assoc($sqlFol14);
        
        
        $sqlFol15=mysqli_query($conn, "select * from prod_size  Join size on size.size_id=prod_size.size where prod_id='".$rowS['prod_id']."'");
        $sqlFol16=mysqli_query($conn, "select * from prod_size  Join size on size.size_id=prod_size.size where prod_id='".$rowS['prod_id']."'");
	    $sqlFol17=mysqli_query($conn, "select * from prod_size  Join size on size.size_id=prod_size.size where prod_id='".$rowS['prod_id']."'");								
	    $sqlFol18=mysqli_query($conn, "select * from prod_size  Join size on size.size_id=prod_size.size where prod_id='".$rowS['prod_id']."'");			

$sqlFolimage=mysqli_query($conn, "select * from prod_image where prod_id='".$rowS['prod_id']."' order by id asc limit 1");

$rowimg=mysqli_fetch_assoc($sqlFolimage);
		?>
                      <tr>
                      <td><?php echo $i;?>.</td>
											
		<td style="font-weight:bold;">
		<img src="upload/product/<?php echo $rowimg['image']?>" style="height:100px; width:100px" class="img-responsive thumbnail center-block" >
											<?php echo $rowS['prod_title']?> </td>
											<td style="color:#0072C3"><?php echo " SAR ".$rowS['prod_price']?></td>
										
											<td style="font-weight:bold;color:#95a5a6;white-space: nowrap;"><?php
											if(mysqli_num_rows($sqlFol15)>0){while($row5=mysqli_fetch_assoc($sqlFol15)){?><?php echo $row5['name'];?><br><?php }}else{ echo "NULL";}?></td>
											<td style="font-weight:bold;color:#95a5a6"><?php
											if(mysqli_num_rows($sqlFol16)>0){while($row56=mysqli_fetch_assoc($sqlFol16)){?><?php echo $row56['quantity'];?><br><?php }}else{ echo "NULL";}?></td>
										
										
											<!--<td style="font-weight:bold;color:#95a5a6"><?php echo $rowS['quantity']?></td>-->
											
											<!--<td style="font-weight:bold;color:#95a5a6"><?php echo $rowS['new_quantity']?></td>-->
											
												<td style="font-weight:bold;color:#95a5a6"><?php
											if(mysqli_num_rows($sqlFol17)>0){while($row57=mysqli_fetch_assoc($sqlFol17)){?><?php echo $row57['sold_qty']; ?><br><?php }}else{ echo "NULL";}?></td>
											
												<td style="font-weight:bold;color:#95a5a6"><?php
											if(mysqli_num_rows($sqlFol18)>0){while($row58=mysqli_fetch_assoc($sqlFol18)){?><?php  $a = $row58['quantity']-$row58['sold_qty']; ?><?php echo $a;?><br><?php }}else{ echo "NULL";}?></td>
											
											<!--<td style="font-weight:bold;color:#00C700">-->
											<?php 
											//$qty=$rowS['quantity']-$rowS['new_quantity'];echo $qty;?>
											<!--<br/>-->
											<!--</td>-->
											<td>
										
   <!--<a class="btn btn-success btn-sm"  data-popup-open="popup-<?php echo $rowS['prod_id']?>" style="color: #fff;"><i class="fa fa-edit" ></i> Update Quantity</a>                         </tr>-->
<div class="popup" data-popup="popup-<?php echo $rowS['prod_id']?>">
	<div class="popup-inner">
	<form id="update_qty_form<?php echo $rowS['prod_id'];?>">
		<div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="quantity" value="<?php echo $rowS['quantity'];?>" required="">
     <input type="hidden" class="form-control" id="exampleInputEmail1"  name="product_id" value="<?php echo $rowS['prod_id'];?>" required="">
          
               
              </div>
              <br/>
               <input type="submit" name="submit" value="update" class="btn btn-success btn-sm">
              </form>
	
   	
		<a class="popup-close" data-popup-close="popup-<?php echo $rowS['prod_id']?>" href="#">x</a>
	</div>
</div>
                      <?php
											$i++;
											}
											?>

                    </tbody>
                    <tfoot>
                     <tr>
                        <td style="width:80px;"><strong>#</strong></td>
                        <td><strong>Product </strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Size Name</strong></td>
                        <td><strong>Individual Qty(Size)</strong></td>
			<!--<td><strong>Product Total Quantity</strong></td>-->
			<td><strong>Product Sold Quantity</strong></td>
                        <td><strong>Product Available Quantity</strong></td>
			<!--<td><strong>Action</strong></td>-->
			</tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
 <script>
            $(function() {
	//----- OPEN
	$('[data-popup-open]').on('click', function(e) {
		var targeted_popup_class = jQuery(this).attr('data-popup-open');
		$('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

		e.preventDefault();
	});

	//----- CLOSE
	$('[data-popup-close]').on('click', function(e) {
		var targeted_popup_class = jQuery(this).attr('data-popup-close');
		$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

		e.preventDefault();
	});
});
            </script>
             <?php 
				$sqlFol1=mysqli_query($conn, "select * from product");
				$i=1;
				while($rowS=mysqli_fetch_assoc($sqlFol1))
				{
				
				?>
             <script>
						$("#update_qty_form<?php echo $rowS['prod_id'];?>").submit(function(e) {
						var datastring= $("#update_qty_form<?php echo $rowS['prod_id'];?>").serialize();
						e.preventDefault();
						
						console.log(datastring);
						$.ajax({

      type: "POST",
      url: '../seller-center/ajax_update_qty.php',
      data:datastring,
      success: function(data) {
   
  window.location.href="view-inventory.php?sucmsg=Product Updated successfully";
  
      $("#show-msg").html(data);

      }
    });
						
						
						

});
						</script>
						<?php } ?>