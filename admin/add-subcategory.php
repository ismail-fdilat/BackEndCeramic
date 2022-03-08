<?php
include('header.php');

	
	// $sqlFol1=mysqli_query($conn, "select * from category where created_by='".$admin_id."'");
$sqlFol1=mysqli_query($conn, "select * from  dir_categories");
	
	if(isset($_POST['submit']))
	{
		
		$cid=$_POST['cid'];
		$sub_category_name=$_POST['sub_category_name'];
		$ar_sub_category_name=$_POST['ar_sub_category_name'];

		if(empty($cid))
		{
			$msg1="Please select category .";
		}
		elseif(preg_match('/^\s*$/',$sub_category_name))
		{
			$msg1="Please enter subcategory name.";
		}
		else
		{
		    
		    $uploadimg = @getimagesize($_FILES["img"]["tmp_name"]);
                $width = $uploadimg[0];
                $height = $uploadimg[1];
		
		if($width < "100" && $height < "100") 
		{
              $msg1="Image dimension should be greater then 500X150";
		}
		else
		{
		     	$newname=uniqid().$_FILES['img']['name'];
				move_uploaded_file($_FILES['img']['tmp_name'],'upload/category/'.$newname);
				
			// $insertuser = "INSERT INTO `subcategory`(`created_by`,`cid`,`subname`,`subimage`, `dateadd`) VALUES ('".$admin_id."','".$cid."','".$sub_category_name."','".$newname."','".$server_time."')";
			$insertuser = "INSERT INTO `dir_sub_categories`(`category_id`,`sub_category_name`,`ar_sub_category_name`,`sub_image`, `date_added`) VALUES ('".$cid."','".$ar_sub_category_name."','".$sub_category_name."','".$newname."','".$server_time."')";
			$insertuser1=mysqli_query($conn, $insertuser);
			
			if($insertuser1)
			{
				//echo '<script>window.location.href="view-subcategory.php?sucmsg=Sub Category Added successfully"</script>';
				
				echo '<script language="javascript">';
			    echo 'alert("Sub Category Added successfully")';
			    echo '</script>';

			    echo "<script>setTimeout(\"location.href = 'view-subcategory.php';\",00);</script>";

			}
			else
			{
			$msg1="Sub Category not Added";
		    }
		}   
	   }
	}
	
	
	

?>




<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Add Product Sub Category</h2>
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
	    </div>
	    
	    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Choose Category</label>
                                 	<select required class="default-select form-control wide" id="cid" name="cid">
                                   		<option value="">Select category </option>
                                   
                                   		<?php while($row123= mysqli_fetch_assoc($sqlFol1)) { ?>
            
                                     	<option value="<?php echo $row123['category_id']; ?>"><?php echo $row123['category_name'].'  -  '.$row123['ar_category_name']; ?></option>
            
                                     	<?php } ?>
                                 	</select>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sub Category Name</label>
                                    <input type="text" class="form-control input-default" id="sub_category_name" placeholder="Enter sub category name" name="sub_category_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sub Category Name ar.</label>
                                    <input type="text" class="form-control input-default" id="sub_category_name" placeholder="Enter sub category name Ar." name="ar_sub_category_name" required>
                                </div>
            
                                 
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sub category Image <span style="color:red;font-size:12px">(Image should be  500X150)</span> </label>
                                    <input type="file" class="form-control input-default"  name="img" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="submit">Add Sub Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


	 
<?php
include('footer.php');
?>

