<?php
	include('header.php');
	include('nav.php');

	if(isset($_POST['submit']))
	{
		
		$ptitle=$_POST['ptitle'];
// 		$arabictitle = $_POST['parabictitle'];
         
			$insertuser = "UPDATE  `notification_add` SET `n_message`='$ptitle' WHERE notification_id='".$_GET['editid']."' ";
	    	mysqli_query($conn,$insertuser);
			$lastid=mysqli_insert_id($conn);
			if($insertuser)
			{
			  echo '<script>window.location.href="notification_view.php?sucmsg=Successfully updated"</script>';

			}
			else{
			
				$msg1="Notification not updated";
			}
    }
	
	
	
$sql = mysqli_query($conn,"select * from notification_add where notification_id='".$_GET['editid']."' ");
$row = mysqli_fetch_assoc($sql);
?>

   <form role="form" method="post" action="" enctype="multipart/form-data">
		<div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <div class="row">

            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <!-- /.box -->

				<div class="col-md-6">
				
						<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Notification</h3>
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
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="ptitle" value="<?php echo $row['n_message'];?>" required>
                    </div>
                    
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Category Name(Arabic)</label>-->
                    <!--  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter arabic category name" name="parabictitle" required>-->
                    <!--</div>-->
                    
                   
	
                    
					





                      <div class="box-footer">



					 <button type="submit" class="btn btn-primary" name="submit">submit </button>

                  </div>




                  </div><!-- /.box-body -->



              </div>
			  </div>
			  
			  </form>
				



              </div>
				
				</div>










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