<?php
include('header.php');
	
	if(isset($_POST['submit']))
	{
		
		$category_name=$_POST['category_name'];
		$ar_category_name=$_POST['ar_category_name'];
		$uploadicon=$_FILES['image']['name'];
		
		$uploadimg = @getimagesize($_FILES["image"]["tmp_name"]);
        $width = $uploadimg[0];
        $height = $uploadimg[1];
		if(empty($category_name))
		{
			$msg1="Please enter category name.";
		}
		elseif($width < "500" && $height < "150") 
		{
              $msg1="Image dimension should be  100X150";
		}
		else{
		
			$newnameimg=uniqid().$_FILES['image']['name'];
			
			$path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            
            $newnameimg=rand(10000000,99999999).".".$ext;
			
			move_uploaded_file($_FILES['image']['tmp_name'],"upload/category/".$newnameimg);
// 			$insertuser = "INSERT INTO `category`(`created_by`,`cname`, `dateadd`, `cimage`) VALUES ('".$admin_id."','".$category_name."','".$server_time."','".$newnameimg."')";
			$insertuser = "INSERT INTO `dir_categories`(`category_name`,`ar_category_name`, `image`,`publication_status`,`icon_name` ) VALUES ('".$category_name."','".$ar_category_name."','".$newnameimg."','1','".$newnameimg."')";
	    	mysqli_query($conn,$insertuser);
			//print_r($insertuser);die;
			//$lastid=mysqli_insert_id($conn);
			if($insertuser)
			{
			  	echo '<script language="javascript">';
			    echo 'alert("Category Successfully Added")';
			    echo '</script>';

			    echo "<script>setTimeout(\"location.href = 'view-category.php';\",00);</script>";

			
			}
			else{
			
				$msg1="Category not Added";
			}
		}
	}
	
	

?>



    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
	            <h2 class="mb-3 me-auto">Add Category</h2>
                <?php if(isset($msg1)){ ?>
            		<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
            	 <?php } ?>
            	 
            	 <div class="row">
                	 <div class="col-md-12">
                	    <div class="card">
                	     <div class="card-body">
                	         <div class="basic-form">
                	             <form role="form" method="post" enctype="multipart/form-data">
                	                 <div class="form-group">
                                      	<label for="exampleInputEmail1">Category Name</label>
                                      	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="category_name" required>
                                    </div>
                	                 <div class="form-group">
                                      	<label for="exampleInputEmail1">Category Name Ar.</label>
                                      	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="ar_category_name" required>
                                    </div>
                                   
                					<div class="form-group">
                                      <label for="exampleInputEmail1">Category Image <span style="color:red;font-size:12px">(Image should be  100X150)</span></label>
                                      <input type="file" class="form-control" id="exampleInputEmail1" name="image" required>
                                    </div>
                                    <br>
                                    <div class="box-footer">
                						<button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                                  	</div>
            	                 </form>
                	         </div>
                	     </div>
                	 </div>
                	     
                	 </div>
            	     
            	 </div>
            	 
	  	    </div>
            
        </div>
    </div>




	 
	
 <!--  <form role="form" method="post" enctype="multipart/form-data">-->
	<!--  <div class="content-wrapper">-->
 <!--       <section class="content">-->
 <!--         <div class="row">-->
 <!--           <div class="col-md-12">-->
 <!--              <div class="col-md-3"></div>-->
				
	<!--			<div class="col-md-6">-->
	<!--			   <div class="box box-primary">-->
	<!--                <div class="box-header with-border">-->
	<!--                  <h3 class="box-title">Add Product Category</h3>-->
	<!--                </div>-->
                  	
 <!--                 	<div class="box-body">-->

	<!--				<div class="form-group mb-4">-->
 <!--                     	<label for="exampleInputEmail1">Category Name</label>-->
 <!--                     	<input type="text" class="form-control input-default" id="exampleInputEmail1" placeholder="Enter category name" name="category_name" required>-->
 <!--                   </div>-->
                   
	<!--				<div class="form-group">-->
 <!--                     <label for="exampleInputEmail1">Category Image <span style="color:red;font-size:12px">(Image should be  100X150)</span></label>-->
 <!--                     <input type="file"  id="exampleInputEmail1" name="image" required>-->
 <!--                   </div>-->
                    
 <!--                   <div class="box-footer">-->
	<!--					<button type="submit" class="btn btn-primary" name="submit">Add Category</button>-->
 <!--                 	</div>-->
	<!--			</div><!-- /.box-body -->-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</form>-->
				



              		</div>
				</div>
            </div>
		</div>
      </section><!-- /.content -->
    </div>
	 
<?php include('footer.php'); ?>
