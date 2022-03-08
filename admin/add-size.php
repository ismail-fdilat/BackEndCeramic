<?php
	include('header.php');
	include('nav.php');
	$sqlFol1=mysqli_query($conn, "select * from dir_categories");
	
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$cateid=$_POST['category_id'];
		$subcateid=$_POST['sub_category_id'];
		
		
			 $insertsize = "INSERT INTO `size`(`name`) VALUES ('".$name."')";
			$insert=mysqli_query($conn,$insertsize);
			
			if($insert)
			{
			
				echo '<script>window.location.href="view-size.php?sucmsg=Size Added successfully"</script>';

			
			}
			else{
			
			$msg1="Size not Added";
		  }
	   }
	
	
	
	


?>
   
<script>
function subcategoryget(str){
	//alert('hi');
	$.post("ajax_subcategory.php", {cate_id: str}, function(result){
       if(result != 0){
         $("#subcat_div").show();
         $("#subcategory").prop('required',true);
        $("#subcategory").html(result);


      }else{
        $("#subcategory").prop('required',false);
         $("#subcat_div").hide();
      }
    });
}
</script>

<script>
function subcategoryget1(str){
	//alert(str);
	$.post("ajax_subcategory1.php", {cate_id: str}, function(result){
        $("#subsubcategory1").html(result);
    });
}
</script>

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
                  <h3 class="box-title">Add Size</h3>
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
              
       <!--     <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select onchange="subcategoryget(this.value)" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Title" name="category_id" required>
                  <option value="">Select Category</option>
                  <?php    while($rowS= mysqli_fetch_assoc($sqlFol1)) 

					  {
						  ?>
                             <option value="<?php echo $rowS['category_id']; ?>"><?php echo $rowS['category_name']; ?></option>
                  <?php
					  }
					  ?>
                </select>
              </div>
              
              <div class="form-group" id="subcat_div"> 
                <label for="exampleInputEmail1">Product Sub Category</label>
                <select class="form-control" id="subcategory" placeholder="Enter Product Title" name="sub_category_id"  onchange="subcategoryget1(this.value)" >
                </select>
              </div> -->
            <!--   <div class="form-group">
                <label for="exampleInputEmail1">Product Sub Sub Category</label>
                <select class="form-control" id="subsubcategory1"  name="sub_sub_category_id" required>
                </select>
              </div> -->
              
              <div class="form-group">
                      <label for="exampleInputEmail1">Size Name</label>
                      <input type="text" class="form-control" id="" placeholder="Enter category name" name="name" required>
                    </div>

                   






                      <div class="box-footer">



					 <button type="submit" class="btn btn-primary" name="submit">Add Size</button>

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
