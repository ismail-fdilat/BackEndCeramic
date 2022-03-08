<?php
include('header.php');

	
$sqlFol1=mysqli_query($conn, "select * from dir_categories");
	
if(isset($_POST['submit']))
{
		
		$category_id=$_POST['category_id'];	
		$sub_category_name=$_POST['sub_category_name'];
		$ar_sub_category_name=$_POST['ar_sub_category_name'];
		//$subid=$_GET['subcatid'];
	
		if(empty($category_id))
		{
			$msg1="Please select category .";
		}
		elseif(preg_match('/^\s*$/',$sub_category_name))
		{
			$msg1="Please enter subcategory name.";
		}
		else{

		if(!empty($_FILES['img']['name']))
		{
		   	$uploadimg = @getimagesize($_FILES["img"]["tmp_name"]);
            $width = $uploadimg[0];
            $height = $uploadimg[1];	
		    
		    if($width > "100" && $height > "150")
              {
		
		         $newname=uniqid().$_FILES['img']['name'];
				 move_uploaded_file($_FILES['img']['tmp_name'],'upload/category/'.$newname);
				
			      $insertuser = "update `dir_sub_categories` set `category_id`='".$category_id."',`sub_category_name`='".$sub_category_name."',`sub_image`='".$newname."',last_updated='".$server_time."',`ar_sub_category_name`='".$ar_sub_category_name."' where sub_category_id='".$_GET['subcatid']."'";
               $insertuser1=mysqli_query($conn,$insertuser);

               if($insertuser1)
				{
			   		echo '<script language="javascript">';
			    	echo 'alert("Sub Category Updated Successfully")';
			    	echo '</script>';

			    	echo "<script>setTimeout(\"location.href = 'view-subcategory.php';\",00);</script>";
				
				}else{

					$msg1="Sub Category not Added";
				
				}
                  
              }
              else
              {
                  $msg1="Image dimension should be 500X150";
              }
              
		}
		else
		{
	       $insertuser = "update `dir_sub_categories` set `category_id`='".$category_id."',`sub_category_name`='".$sub_category_name."',`last_updated`='".$server_time."',`ar_sub_category_name`='".$ar_sub_category_name."'  where sub_category_id='".$_GET['subcatid']."' ";
            $insertuser1=mysqli_query($conn,$insertuser);
     	
			if($insertuser1)
			{
			   //echo '<script>window.location.href="view-subcategory.php?sucmsg=Sub Category Added successfully"</script>';
				echo '<script language="javascript">';
			    echo 'alert("Sub Category Updated Successfully")';
			    echo '</script>';

			    echo "<script>setTimeout(\"location.href = 'view-subcategory.php';\",00);</script>";

			}
			else{
				$msg1="Sub Category not Added";
		  	}
		 } 	
	   }
	}
	
//get brand details
$sqlFol11=mysqli_query($conn, "select * from dir_sub_categories where sub_category_id='".$_GET['subcatid']."'");
$row1=mysqli_fetch_assoc($sqlFol11);	

//get category 
$sqlFol12=mysqli_query($conn, "select * from dir_categories where category_id='".$row1['cid']."'");
$row2=mysqli_fetch_assoc($sqlFol12);

$sql=mysqli_query($conn, "select * from dir_categories");
$categorysql=mysqli_fetch_assoc($sql);	
	

?>


<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Edit Product Sub Category</h2>
	        <?php if(isset($msg1))
				{
				?>
					<p style="color:#e74c3c; font-weight:bold" align="center"><i 1class="fa fa-times"></i> <?php echo $msg1;?></p>
				<?php
				}
				if(isset($sucmsg))
					{
				?>
					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
				<?php
					}
		    ?>
	    </div>
	    
	    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Choose Category</label>
        		                    <select class="nice-select default-select form-control wide mb-3" id="category_id" name="category_id">
        		                 	    <?php while($rowS= mysqli_fetch_assoc($sqlFol1)) { ?>
                                            <option value="<?php echo $rowS['category_id']; ?>"<?php if($row1['category_id'] == $rowS['category_id']) echo 'selected="selected"'; ?>><?php echo $rowS['category_name'].' - '.$rowS['ar_category_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sub Category Name</label>
        							<input type="text" class="form-control input-default" id="sub_category_name" placeholder="Enter subcategory name" name="sub_category_name" value="<?php echo $row1['sub_category_name'];?> " required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sub Category Name Ar.</label>
        							<input type="text" class="form-control input-default" id="sub_category_name" placeholder="Enter subcategory name" name="ar_sub_category_name" value="<?php echo $row1['ar_sub_category_name'];?> " required>
                                </div>
            
                
            					<div class="col-md-12 mb-3">
                                  	<img class="mb-3" src="upload/category/<?php echo $row1['sub_image']; ?>" width="100px" height="100px" >
            					    
            					    <div class="input-group mb-3">
            						    <label class="form-label w-100">Sub category Image <span style="color:red;font-size:12px">(Image should be  500X150)</span> </label>
										<span class="input-group-text">Upload</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="img">
                                        </div>
                                    </div>
            					   
                                  	
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add Sub Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include('footer.php'); ?>
