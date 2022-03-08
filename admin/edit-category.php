<?php
include('header.php');

	$sqlFol1=mysqli_query($conn,"select * from dir_categories where category_id ='".$_GET['editcid']."'");
	$rowcat=mysqli_fetch_assoc($sqlFol1);
	
  if(isset($_POST['submit']))
	{
	   $category_name=$_POST['category_name'];
	   $ar_category_name=$_POST['ar_category_name'];
	  
	   $uploadimg=$_FILES['image']['name'];

    if(empty($category_name))
	  {  
		  $msg1="Please enter category name.";
	  }
	  else{
    	
  		if(!empty($_FILES['image']['name']))
  		{
		    	$uploadimg = @getimagesize($_FILES["image"]["tmp_name"]);
          $width = $uploadimg[0];
          $height = $uploadimg[1];	
		    
          if($width > "100" && $height > "150")
          {
	           $newnameimg=uniqid().$_FILES['image']['name'];
        
		         move_uploaded_file($_FILES['image']['tmp_name'],"upload/category/".$newnameimg);
		   
              $insertuser =$conn->query("update `dir_categories` set `category_name`='".$category_name."',`image`='".$newnameimg."',`last_updated`='".$server_time."', `ar_category_name`='".$ar_category_name."' where category_id='".$_GET['editcid']."'") ;
             //$insertuser =$conn->query("update category set `cate_title`='".$category_name."',`cate_image`='".$newnameimg."',`last_update`='".$server_time."' where `cate_id`='".$_GET['editcid']."'") ;
		      }
		      else
		      {
		          $msg1="Image dimension should be 100X150";
		      }
	    }
		  else
      {
			     $insertuser =$conn->query("update `dir_categories` set `category_name`='".$category_name."',`last_updated`='".$server_time."',`ar_category_name`='".$ar_category_name."' where category_id='".$_GET['editcid']."'") ;
        //$insertuser =$conn->query("update category set `cate_title`='".$category_name."',`last_update`='".$server_time."' where `cate_id`='".$_GET['editcid']."'") ;
		  }
			
      if($insertuser)
			{
          echo '<script language="javascript">';
          echo 'alert("Category updated successfully")';
          echo '</script>';

          echo "<script>setTimeout(\"location.href = 'view-category.php';\",00);</script>";
			}
			else{
				  $msg1="Category not updated";
			}
	 }
}
?>




<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Update Product Category</h2>
			<?php if(isset($msg1)){ ?>
                <p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
            <?php } ?>
		</div>	
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="basic-form">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="cate_name">Category Name</label>
                                        <input type="text" class="form-control input-default" id="cate_name" placeholder="Enter category name" name="category_name" required value="<?php echo $rowcat['category_name']?>">
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="cate_name">Category Name Ar.</label>
                                        <input type="text" class="form-control input-default" id="ar_category_name" placeholder="Enter category name" name="ar_category_name" required value="<?php echo $rowcat['ar_category_name']?>">
                                    </div>
                                    
                      
                                    <div class="col-md-12 mb-3">
                                        <img src="upload/category/<?php echo $rowcat['image']?>" class="img-responsive" style="height:100px; width:100px" />
                                        
                                        <div class="input-group mb-3">
                                            <div class="form-file">
                                                <input type="file"  id="exampleInputEmail1" placeholder="" name="image" >
                                            </div>
                                            <label class="input-group-text">Category Image <span style="color:red;font-size:12px">(Image should be  100X150)</span> </label>
											
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3" name="submit">Update Category</button>
                            </form>
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
