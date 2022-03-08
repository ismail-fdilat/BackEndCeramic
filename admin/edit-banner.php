<?php
	include('header.php');

	if(isset($_POST['submit']))
	{
	
	 

		// $subcateid1=$_POST['sub_sub_category_id'];

	
		if(!empty($_FILES['img']['name']))
		{
		   $uploadimg = @getimagesize($_FILES["img"]["tmp_name"]);
                $width = $uploadimg[0];
                $height = $uploadimg[1];	
		    if($width == "450" && $height == "250")
           {
           
		
		    $newname=uniqid().$_FILES['img']['name'];
				move_uploaded_file($_FILES['img']['tmp_name'],'upload/banner/'.$newname);
				
			$insertuser = "update `banner` set `image`='".$newname."' where b_id='".$_GET['editid']."'";
           }
           else
           {
               $msg1="Image dimension should be 450X250";
           }
		}
	
			
			
			$insertuser1=mysqli_query($conn,$insertuser);
			
			if($insertuser1)
			{
			   
			   
				echo '<script>window.location.href="view-banner.php?sucmsg=Banner Updated successfully"</script>';

			
			}
			else
             {
			
			// $msg1="deal not Updated";
                $msg1="Image dimension should be 450X250";
	         }
	   
	}
	
	
//get brand details
$sqlFol11=mysqli_query($conn, "select * from banner where b_id='".$_GET['editid']."'");

$row1=mysqli_fetch_assoc($sqlFol11);	

//get category 
$sqlFol12=mysqli_query($conn, "select * from dir_categories where category_id='".$row1['category_id']."'");

$row2=mysqli_fetch_assoc($sqlFol12);
//get sub category
$sqlFol13=mysqli_query($conn, "select * from dir_sub_categories where sub_category_id='".$row1['sub_category_id']."'");

$row3=mysqli_fetch_assoc($sqlFol13);
//get sub sub category
// $sqlFol14=mysqli_query($conn, "select * from sub_subcategory where sub_subcate_id='".$row1['sub_sub_category_id']."'");

// $row4=mysqli_fetch_assoc($sqlFol14);

?>


<script>
function subcategoryget(str){
	//alert('hi');
	$.post("ajax_subcategory.php", {cate_id: str}, function(result){
        $("#subcategory").html(result);
    });
}
</script>

<script>
function subcategoryget1(str){
	alert(str);
	$.post("ajax_subcategory1.php", {cate_id: str}, function(result){
        $("#subsubcategory1").html(result);
    });
}
</script>

   
<!--<link rel="stylesheet" href="foundation/css/foundation.min.css">-->
<!--<script src="foundation/js/jquery.js"></script> -->
<!--<script src="dist/js/foundation-datepicker.js"></script>-->
<!--<link rel="stylesheet" href="dist/css/foundation-datepicker.min.css">-->
   
   
<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="mb-3 me-auto">Edit Banner</h2>
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
                        <div class="basic-form">
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <img src="upload/banner/<?php echo $row1['image']; ?>" width="100px" height="100px" >
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group mb-3">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="img" >
                                            </div>
                                            <label class="input-group-text">Banner Image <span style="color:red;font-size:12px">(Image should be  450X250)</span></label>
											
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3" name="submit">Update Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
   

	 <!--<script>
			$(function () {


				$('#dpt').fdatepicker({
					format: 'dd-mm-yyyy hh:ii',
					disableDblClickSelection: true,
					language: 'en',
					pickTime: true
				});
				
				$('#dpt1').fdatepicker({
					format: 'dd-mm-yyyy hh:ii',
					disableDblClickSelection: true,
					language: 'en',
					pickTime: true
				});

				
			});
		</script>-->
   <!--  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
	<!--<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
    
    <?php include 'footer.php'; ?>