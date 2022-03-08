<?php
	include('header.php');
	
	include('resize.class.php');
$sqlFol1=mysqli_query($conn, "select * from dir_categories");
$sqlsize=mysqli_query($conn, "select * from size");
//insert product
	if(isset($_POST['submit']))
	{
	$sizes=($_POST['size']);
    $quan=($_POST['quantity']);

        if(!empty($_FILES['thumbnailimage']['name']))
  		{
		   
		  //  	$uploadimg = getimagesize($_FILES["thumbnailimage"]["tmp_name"]);
                
                  $path = "upload/product/";
                  $thumbimage = $path.time('his').basename($_FILES['thumbnailimage']['name']);
                  move_uploaded_file($_FILES['thumbnailimage']['tmp_name'],$thumbimage);
                  
                   $length=$_POST['length'];
                   $width=$_POST['width'];
                 
                  
            		$insertproduct = "update  `product` set
            		`prod_cate_id`='".$_POST['category_id']."',
            		`prod_subcate_id`='".$_POST['sub_category_id']."',
            		`prod_title`='".$_POST['prod_title']."',
            		`prod_title_ar`='".$_POST['prod_title_ar']."',
            		`prod_desc`='".$_POST['prod_desc']."',
            		`prod_desc_ar`='".$_POST['prod_desc_ar']."',
            		`prod_price`='".$_POST['prod_price']."',
            		`discount`='".$_POST['discount']."',
            		`sale_price`='".$_POST['sale_price']."',
            		`quantity`='".$_POST['quantity']."' ,
            		`length`='".$_POST['length']."',
                	`width`='".$_POST['width']."',
                	`thickness`='".$_POST['thickness']."',
                	`surface_shape`='".$_POST['surface_shape']."',
            		`color`='".$_POST['color']."',
            		`delivery_time`='".$_POST['delivery_time']."',
                	`manufacture_country`='".$_POST['manufacture_country']."',
                	`manufacture_country_ar`='".$_POST['manufacture_country_ar']."',
                	 `thumbnail_image`='$thumbimage' where prod_id='".$_GET['productid']."'";

        				$countSize = mysqli_query($conn,"select * from prod_size where prod_id = '".$_GET['productid']."'");
        			
        				if(mysqli_num_rows($countSize)>0)
                {
        					 $insert = mysqli_query($conn,"update prod_size set quantity = '".$_POST['quantity']."', size = '".$_POST['size']."' where prod_id = ".$_GET['productid']." ");
        				   
                    
                }
        				else
                {
        					
        					 $insert = mysqli_query($conn,"INSERT INTO prod_size (size,quantity,prod_id) VALUES('".$_POST['size']."','".$_POST['quantity']."','".$_GET['productid']."')");
        				}

			$insertproduct1=mysqli_query($conn, $insertproduct);


  //   $updatequan = mysqli_query($conn,"UPDATE product set quantity='$totalquan' WHERE prod_id='".$_GET['productid']."'");	
  // File upload configuration
    $targetDir = "upload/product/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        foreach($_FILES['files']['name'] as $key=>$val)
        {
		    	$uploadimg1 = getimagesize($_FILES["files"]["tmp_name"][$key]);
               
           // File upload path
            $_FILES['files']['name'][$key];
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $date=date('Y-m-d H:i:s');
            // Check whether file type is valid
           
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath))
                {
                    // Image db insert sql
                  $insert = mysqli_query($conn,"INSERT INTO prod_image (image, uploaded_on,prod_id) VALUES('$fileName','$date','".$_GET['productid']."')");
                }
                else
                {
                   echo  $errorUpload .= $_FILES['files']['name'][$key];
                }
	   	  
	   	 
		}
		if($insertproduct1){
			echo '<script>window.location.href="view-product.php?sucmsg=Product Updated successfully"</script>';
		}
		else{
			
			 $msg1="Product not updated";
		}		
 			
            
            
		}
		else
		{
        $length=$_POST['length'];
        $width=$_POST['width'];
        $packet_area=$_POST['res'];
		     
		     $insertproduct = "update  `product` set 
    		     	`prod_cate_id`='".$_POST['category_id']."',
            		`prod_subcate_id`='".$_POST['sub_category_id']."',
            		`prod_title`='".$_POST['prod_title']."',
            		`prod_title_ar`='".$_POST['prod_title_ar']."',
            		`prod_desc`='".$_POST['prod_desc']."',
            		`prod_desc_ar`='".$_POST['prod_desc_ar']."',
            		`prod_price`='".$_POST['prod_price']."',
            		`discount`='".$_POST['discount']."',
            		`sale_price`='".$_POST['sale_price']."',
            		`quantity`='".$_POST['quantity']."' ,
            		`length`='".$_POST['length']."',
                	`width`='".$_POST['width']."',
                	`thickness`='".$_POST['thickness']."',
                	`surface_shape`='".$_POST['surface_shape']."',
            		`color`='".$_POST['color']."',
            		`delivery_time`='".$_POST['delivery_time']."',
                	`manufacture_country`='".$_POST['manufacture_country']."',
                	`manufacture_country_ar`='".$_POST['manufacture_country_ar']."' where prod_id='".$_GET['productid']."'";
        		
        
			
			
				$countSize = mysqli_query($conn,"select * from prod_size where prod_id = '".$_GET['productid']."' ");
				if(mysqli_num_rows($countSize)>0){
				   
					  $insert = mysqli_query($conn,"update prod_size set quantity = '".$_POST['quantity']."',size = '".$_POST['size']."' where prod_id ='".$_GET['productid']."' ");
			 
				}
				else{
					
					 $insert = mysqli_query($conn,"INSERT INTO prod_size (size,quantity,prod_id) VALUES('".$_POST['size']."','".$_POST['quantity']."','".$_GET['productid']."')");
				}
           
		
// 		$ab = implode(",", $ab);
// 		mysqli_query($conn,"delete from prod_size where prod_id = ".$_GET['productid']." and size NOT IN (".$ab.") ");
		
 	
			
			
		  //$quandata = mysqli_query($conn,"SELECT SUM(quantity) as quantity from prod_size Where prod_id='".$_GET['productid']."'");
    //     $data=mysqli_fetch_assoc($quandata);
    //     $totalquan=$data['quantity'];
       

        //   $updatequan = mysqli_query($conn,"UPDATE product set quantity='$totalquan' WHERE prod_id='".$_GET['productid']."'");	
  // File upload configuration
    $targetDir = "upload/product/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	if(!empty($_FILES['files']['name'][0])){
	
		foreach($_FILES['files']['name'] as $key=>$val)
        {
					//	var_dump($_FILES['files']); 
		    	$uploadimg1 = getimagesize($_FILES["files"]["tmp_name"][$key]);
			
           // File upload path
        
             $fileName = time('his').basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir.$fileName;
            $date=date('Y-m-d H:i:s');
            // Check whether file type is valid
             move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetFilePath);
               
        $insert = mysqli_query($conn,"INSERT INTO `prod_image` (`image`,`uploaded_on`,`prod_id`) VALUES('$fileName','$date','".$_GET['productid']."')");
      
		}
		
	}
	else
  {
		$insertproduct1=mysqli_query($conn,$insertproduct);
	}
        
		if(!isset($msg1)){
			echo '<script>window.location.href="view-product.php?sucmsg=Product Updated successfully"</script>';
		}
		else{
			
			 $msg1="Product not updated";
		}
		
		}
	  
	}
 
// 	if(isset($_POST['uploadproduct'])){
	
// 		foreach($_POST['productimage'] as $imgid){
			
// 			mysqli_query($conn,"update prod_image set prod_id = '".$_GET['productid']."' where id = '$imgid'");
			
// 		}
// 	}
	
// 	if(isset($_POST['uploadthumbnail'])){
		
		
		
			
// 			$thumbimagesql = mysqli_query($conn,"select image from prod_image where id = '".$_POST['thumbimage']."' ");
// 			$fetchThumb = mysqli_fetch_assoc($thumbimagesql);
// 			mysqli_query($conn,"update product set thumbnail_image = '".$fetchThumb['image']."' where prod_id = '".$_GET['productid']."'");
			
// 			mysqli_query($conn,"delete from prod_image where id = '".$_POST['thumbimage']."' ");
			
		
// 	}
	
	//get product size
	
	
	
//get brand details
$sqlFol11=mysqli_query($conn, "select * from product where prod_id='".$_GET['productid']."'");

$row1=mysqli_fetch_assoc($sqlFol11);	

	$countSize1 = mysqli_query($conn,"select * from prod_size where prod_id = '".$_GET['productid']."'");
    $row2=mysqli_fetch_assoc($countSize1);


//get sub category
$sqlFol13=mysqli_query($conn, "select * from dir_sub_categories where category_id='".$row1['prod_cate_id']."'");


//get sub sub category
// $sqlFol14=mysqli_query($conn, "select * from sub_subcategory where sub_subcate_id='".$row1['prod_subsubcate_id']."'");

// $row4=mysqli_fetch_assoc($sqlFol14);	
//get brand
// $sqlFol15=mysqli_query($conn, "select * from brand where brand_id='".$row1['brand_id']."'");

// $row5=mysqli_fetch_assoc($sqlFol15);
?>		
<style>

    
     #errmsg
{
color: red;
}
  #errmsg1
{
color: red;
}

.has-error_phone .form-control {
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}




/* =========================== checkbox style ==========================*/

/* The container */
.checkbox_container {
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkbox_checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;    
  border: 2px solid #333;
}

/* On mouse-over, add a grey background color */
/*.checkbox_container:hover input ~ .checkbox_checkmark {*/
/*  background-color: #ccc;*/
/*}*/

/* When the checkbox is checked, add a blue background */
/*.checkbox_container input:checked ~ .checkbox_checkmark {*/
/*  background-color: #2196F3;*/
/*}*/

/* Create the checkmark/indicator (hidden when not checked) */
.checkbox_checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.checkbox_container input:checked ~ .checkbox_checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkbox_container .checkbox_checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid #333;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/*=========================== form control =============================*/

.form_control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.form_control:focus {
  border-color: #000;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(0, 0, 0, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(0, 0, 0, .6);
}
/*====================== row col ==================*/
/*.m_row{}*/
/*col_md_4*/
.m_row:before,
.m_row:after{
  display: table;
  content: " ";
}

.m_row:after{
  clear: both;
}
.col_md_4{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  float: left;
}
.col_md_12{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  float: left;
}
@media (min-width: 992px) {
    
  .col_md_4 {
    width: 33.33333333%;
  }
    .col_md_12 {
    width: 100%;
  }
}

img.multiple-select {
    width: 100px;
}



  .input_hide{
    display:none;
  }

  .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}


input#gallery-photo-add {
    display: inline-block;
    vertical-align: top;
}
span.upload-btn-wrapper button.btn {
    color: #fff;
    background: #af8d3c;
}
.upload-btn-wrapper input[type=file] {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>






<div class="content-body">
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">Edit Products</h2>
		</div>
		
		<div class="card">
		    <div class="card-body">
		        <form role="form" method="post" action="" enctype="multipart/form-data">
              <?php if(isset($msg1)) { ?>
                <p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1; ?>
              <?php } if(isset($msg)) { ?>
                <p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $msg;?></p>
              <?php } ?>
              
            <label for="exampleInputEmail1">Product Category</label>
            <select onchange="subcategoryget(this.value),brandget(this.value),sizeget(this.value)" class="default-select form-control wide prod_cat" id="exampleInputEmail1 " placeholder="Enter Product Title" name="category_id" required>
              <?php   while($rowS= mysqli_fetch_assoc($sqlFol1)) { ?>
                <option <?php if($row1['prod_cate_id'] == $rowS['category_id']){ echo "selected"; } ?> value="<?php echo $rowS['category_id']; ?>"><?php echo $rowS['category_name']; ?></option>
              <?php } ?>
            </select>
              <?php if($row1['prod_subcate_id'] != ''){ ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Product Sub Category</label>
                <select class="form-control" id="subcategory" placeholder="Enter Product Title" name="sub_category_id"  onchange="subcategoryget1(this.value),sizeget1(this.value)" required>
				<?php while($row3=mysqli_fetch_assoc($sqlFol13)){ ?>
                     <option <?php if($row1['prod_subcate_id'] == $row3['sub_category_id']){ echo "selected"; }?> value="<?php echo $row3['sub_category_id']; ?>"><?php echo $row3['sub_category_name']; ?></option>
				<?php } ?>

                </select>
              </div>
              
              
              <div class="form-group">
                <label for="exampleInputEmail1">Product Title (En)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Title in english" name="prod_title" value="<?php echo $row1['prod_title'];?>" required>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Product Title (Ar)</label>
                <input type="text" class="form-control" placeholder="Enter Product Title in arabic" name="prod_title_ar" value="<?php echo $row1['prod_title_ar'];?>" required>
              </div>
              
               <div class="form-group">
                <label for="exampleInputEmail1">Product Description (En)</label>
                <textarea class="form-control" id="pdetails1" placeholder="Product Description in english" name="prod_desc" required value=""><?php echo $row1['prod_desc'];?></textarea>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Product Description (Ar)</label>
                <textarea class="form-control" id="pdetails1" placeholder="Product Description in arabic" name="prod_desc_ar" required value=""><?php echo $row1['prod_desc_ar'];?></textarea>
              </div>
              
              
                <div class="form-group">
                <label for="exampleInputEmail1">Product Price (per square meter)</label>
                <span id="errmsg"></span>
                <input type="number" min="0"  step="any" class="form-control" id="price" placeholder="Enter Price for per sq. m." name="prod_price" required value="<?php echo $row1['prod_price']; ?>" onkeyup="saleprice_calculate();">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Discount (%)</label>
                  <input type="number" step="any" min="0" max="100" class="form-control" id="discount" placeholder="Enter Product Discount" name="discount"  required value="<?php echo $row1['discount']; ?>" onkeyup="discount_sub();">
              </div>
              
               <div class="form-group">
                <label for="exampleInputEmail1">Sale Price</label>
                <!--<input type="hidden" id="new_saleprice">-->
            <input type="number" min="0"  step="any" class="form-control" id="saleprice" placeholder="Enter Product sale price" name="sale_price"  required value="<?php echo $row1['sale_price']; ?>" readonly >
             <span id="msgprice" style="color:red;font-size:15px;"></span>
              </div>
              
                <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Stock (In square meter) </label>
                <input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="ex-400" value="<?php echo $row1['quantity']; ?>">
                
           </div> 
           
            <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Length (In meters)</label>
                <input type="number"  step="any" min="0" class="form-control" name="length" value="<?php echo $row1['length']; ?>" required>
               
              </div>
                <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Width (In meters)</label>
                <input type="number"  step="any" min="0" class="form-control" name="width" value="<?php echo $row1['width']; ?>" required>
               
              </div>

              <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Thickness(In meters)</label>
                <input type="number"  step="any" min="0" class="form-control" name="thickness" value="<?php echo $row1['thickness']; ?>" required>
               
              </div>
              <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Surface Shape</label>
                <input type="text" class="form-control" name="surface_shape" value="<?php echo $row1['surface_shape']; ?>" required>
               
              </div>
              
               <div class="form-group" id="subcat_div">
                <label for="color">Color</label>
                <input type="color" class="form-control" name="color" value="<?php echo $row1['color'];?>" >
               
              </div>
              
              <div class="form-group" id="subcat_div">
                <label for="color">The size</label>
               <input type="text" class="form-control" placeholder="please enter size" value="<?php echo $row2['size'] ; ?>" name="size"  >
               
              </div>
            
              
            <div class="form-group" id="subcat_div">
                <label for="color">Possible Delivery Time</label>
                <input type="text" class="form-control" placeholder="ex-10 days" value="<?php echo $row1['delivery_time']?>" name="delivery_time"  >
              </div>
			  
<!-- 
                <div class="form-group">
                <label for="exampleInputEmail1">Brand</label>
                <select class="form-control" id="brand" placeholder="Enter Product Title" name="brand_id"   required>
				<?php $fetchsubcat=mysqli_query($conn,"select * from assign_brand where subcategory_id = '".$row1['prod_subcate_id']."' ");
				$rowSize= mysqli_fetch_assoc($fetchsubcat);
				$brand_ids=$rowSize['brand_id'];
				$ids=explode(',', $brand_ids);							
				foreach ($ids as $key => $id) {
					  	 $sqlFol4=mysqli_query($conn, "select * from  brand where brand_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);
					  
						  ?>

					<option value="<?php echo $ro4['brand_id']?>" <?php if($ro4['brand_id'] == $row1['brand_id']){ echo "selected";  } ?> ><?php echo $ro4['brand_title']?></option>
				<?php } ?>
                    
                </select>
              </div>
               
			<?php }else{ ?>
				 <div class="form-group">
                <label for="exampleInputEmail1">Brand</label>
                <select class="form-control" id="brand" placeholder="Enter Product Title" name="brand_id"   required>
				<?php $fetchsubcat=mysqli_query($conn,"select * from assign_brand where category_id = '".$row1['prod_cate_id']."' ");
				$rowSize= mysqli_fetch_assoc($fetchsubcat);
				$brand_ids=$rowSize['brand_id'];
				$ids=explode(',', $brand_ids);							
				foreach ($ids as $key => $id) {
					  	 $sqlFol4=mysqli_query($conn, "select * from  brand where brand_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);
					  
						  ?>

					<option value="<?php echo $ro4['brand_id']?>"><?php echo $ro4['brand_title']?></option>
				<?php } ?>
                    
                </select>
              </div>
		<?php	} ?>

 -->               

              
 
              <div class="form-group" id="subcat_div">
                <label for="exampleInputEmail1">Surface Shape</label>
                <input type="text" class="form-control" name="surface_shape"  value="<?php echo $row1['surface_shape'];?>"  >
               
              </div>
              

              <div class="form-group">
                <label for="exampleInputEmail1">Manufacture Country (En)</label>
                <input type="text" class="form-control" name="manufacture_country" value="<?php echo $row1['manufacture_country']; ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" >
              </div> 
              
              <div class="form-group">
                <label for="exampleInputEmail1">Manufacture Country (Ar)</label>
                <input type="text" class="form-control" name="manufacture_country_ar" value="<?php echo $row1['manufacture_country_ar']; ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" >
              </div>
             
           
           <div class="form-group m_row">
              
                <label for="exampleInputEmail1">Product Image 
                  <!-- <span style="color:red;font-size:12px">(Image should be 400X400)</span> -->
                </label><br>
                <input type="file" name="files[]"  multiple id="gallery-photo-add"> 


              </div>
			 
			   <div class="form-group m_row">
			     <label for="exampleInputEmail1" style="display:block;">Product Images</label>
			     <div class="row mb-5">
             <?php 
			 $getimage = mysqli_query($conn,"select * from prod_image where prod_id = '".$_GET['productid']."'");
			 while($rimg = mysqli_fetch_assoc($getimage)){ ?>
                <div class="col-md-2">

                    <img src="upload/product/<?= $rimg['image'];?>"width="100px" height="100px" id="img<?php echo $rimg['id'];?>"> 
                    
                    </br>
                    
                    <a href="delete_img_product.php?d_id=<?php echo $rimg['id'];?>&p_id=<?php echo $_GET['productid'];?>" class="btn-danger" style="color: #fff; padding:5px;"><i class="fas fa-trash"></i></a>
                </div>
			 <?php } ?>
              </div>
 
               <div class="gallery"></div>

              <div class="form-group m_row mb-3">
                <label for="exampleInputEmail1">Thumbnail Image
                </label>
                <input type="file" name="thumbnailimage" id="thumb-nail-image" accept="image/jpg,image/png,image/jpeg,image/gif">
              </div>
              <div class="thumb-nail-images"></div>
              <img src="<?= $row1['thumbnail_image'];?>"width="100px" height="100px" >

              <div class="box-footer mt-4">
                <button type="submit" class="btn btn-success" name="submit">Update</button>
              </div>
            
		        </form>
	        </div>
        </div>
    </div>
</div>





  <script>
function subcategoryget(str){
	//alert('hi');
	$.post("ajax_subcategory.php", {cate_id:str}, function(result){
 
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

function brandget(str){
  //alert('hi');
  $.post("ajax_brand.php", {cate_id:str}, function(result){
        $("#brand").html(result);
    });
}

function sizeget(str){
  //alert('hi');
  $.post("ajax_size.php", {cate_id:str}, function(result){
        $("#size").html(result);
    });
}
function sizeget1(str){
  //alert('hi');
  var cat=$(".prod_cat").val();

  $.post("ajax_size1.php", {cate_id:str,cat:cat}, function(result){
        $("#size").html(result);
    });
}
</script>

<script>
function subcategoryget1(str){
	//alert(str);
   var cat=$(".prod_cat").val();

	$.post("ajax_subcategory1.php", {cate_id:str,cat:cat}, function(result){
        $("#brand").html(result);
    });
}


</script>

<script>
function brand(str){
	//alert(str);
	$.post("ajax_brand.php", {cate_id:str}, function(result){
        $("#brandid").html(result);
    });
}
</script>
  
  
  
  <script>
  $( function() {
     $('#datepicker').datepicker( {
            yearRange: '1950:2019',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',

            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
    });
  } );
  </script>
    <script>
        
function image_change(id,menuId) {

    var name = document.getElementById("s_image"+id).files[0].name;
// console.log(name);
  var form_data = new FormData();

  var ext = name.split('.').pop().toLowerCase();
  // console.log(ext);
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }

  var oFReader = new FileReader();

  oFReader.readAsDataURL(document.getElementById("s_image"+id).files[0]);
  var f = document.getElementById("s_image"+id).files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("s_image"+id, document.getElementById('s_image'+id).files[0]);
   form_data.append("id",id);
   form_data.append("pid",menuId);
   $.ajax({
    url:"productImage.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
    // $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
		$('#img'+id).attr("src",data);
     //$('#uploaded_image').html(data);

    }
   });
  }

}
</script>

     <script>
     
   /*   function discountCal()
     {
         var price = document.getElementById('price').value;
         //var sell_price =document.getElementById('saleprice').value;
         var discount = document.getElementById('discount').value;
        
         if(price > 0)
         {
            if(discount == '')
            {
                discount=0;
            }

            
            var saleprice = price*(1-(discount/100));
            document.getElementById('saleprice').value = saleprice.toFixed(2);
            
         }
         
         
     }*/
       
     function salepriceCal()
     {
         var price = document.getElementById('price').value;
         //var sell_price =document.getElementById('saleprice').value;
         var discoount = document.getElementById('discount').value;
         
         if(price > 0 )
         {
            if(discoount == '')
            {
                discoount=0;
            }
            
            var new_sprice = parseFloat(price)*(100-parseFloat(discoount))/100;
            document.getElementById('saleprice').value = new_sprice.toFixed(2);
            
         }
         
         
     }
     
    
    function discount_sub() {
        salepriceCal()
        
    }

    function saleprice_calculate()
    {
       salepriceCal()
    }

     </script>
     <script >
       $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="multiple-select">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
    $('#gallery-photo-add-1').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });

    $('#thumb-nail-image').on('change', function() {
        imagesPreview(this, 'div.thumb-nail-images');
    });
});
     </script>
<?php
include('footer.php');
?>
