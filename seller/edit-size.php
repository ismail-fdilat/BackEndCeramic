<?php
	include('header.php');
	include('nav.php');
	
	$sqlFol1=mysqli_query($conn, "SELECT * from size where size_id='".$_GET['editid']."'");
	$row1=mysqli_fetch_assoc($sqlFol1);
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$size_arabic=$_POST['size_arabic'];
		
			$insertuser = "update `size` set `name`='".$name."' where size_id='".$_GET['editid']."'";
			
			
			
			$insertuser1=mysqli_query($conn,$insertuser);
			
			if($insertuser1)
			{
			
				echo '<script>window.location.href="view-size.php?sucmsg=Size Updated successfully"</script>';

			
			}
			else{
			
			$msg1="Size not Updated";
	  }
	   
	}


?>




   <form role="form" method="post" action="" enctype="multipart/form-data">
<div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <div class="row">

            <!-- left column -->
            <div class="col-md-12">
				 <div class="col-md-6">
					<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Size</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body">
         
						<?php if(isset($msg1))
							{
							?>
								<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
							<?php
							}
							if(isset($sucmsg))
								{
							?>
								<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
							<?php
								}
						  ?>
                <div class="form-group">
                      <label for="exampleInputEmail1">Size Name</label>
                      <input type="text" class="form-control" id="" value="<?php echo $row1['name'];?>" placeholder="Enter category name" name="name" required>
                    </div>

                    

                      <div class="box-footer">



					 <button type="submit" class="btn btn-primary" name="submit">Update Size</button>

                  </div>




                  </div><!-- /.box-body -->



              </div>
			  	 </div>
              <!-- general form elements -->
              <!-- /.box -->

</form>












            </div>



			</div>




            <!-- right column -->
            <!--/.col (right) -->

        </section><!-- /.content -->
      </div>
	 
    <!--  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


<?php
include('footer.php');
?>
