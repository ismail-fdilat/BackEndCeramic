
<?php
	include('header.php');
	include('resize.class.php');
	
    $seller_id = $_GET['addid'];
    $sqlFol1=mysqli_query($conn, "select * from dir_categories");


$seller_sql=mysqli_query($conn, "SELECT * from seller WHERE seller_id=".$seller_id."");

$seller_data=mysqli_fetch_assoc($seller_sql);
$city=$seller_data['city'];
// $sqlsize=mysqli_query($conn, "select * from size");

//insert product
	if(isset($_POST['submit']))
	{
   
   $sizes=($_POST['size']);
   $quan=($_POST['quantity']);
   $sid=$rowuser['seller_id'];
   $discount=$_POST['discount'];
	
		if(isset($_POST['chk']) && $_POST['chk']==1)
		{
			$cbox=$_POST['chk'];
		}
		else{
			$cbox=0;
		}

    if(isset($_POST['discount'])){

      $discount=$_POST['discount'];
    
    }else{

      $discount=0;
    }
	
		
			if(empty($quan)){
     $msg1='Please Enter Quantity';
  }

  else{
      
          $uploadimg = @getimagesize($_FILES["thumbnailimage"]["tmp_name"]);
          $width = $uploadimg[0];
          $height = $uploadimg[1];
          
           $uploadimg12 = @getimagesize($_FILES["files"]["tmp_name"][0]);
           $width12 = $uploadimg12[0];
          $height12 = $uploadimg12[1];
      
    
          
          $path = "upload/product/";
          $thumbnailimage = $path.time('his').basename($_FILES['thumbnailimage']['name']);
          move_uploaded_file($_FILES['thumbnailimage']['tmp_name'],$thumbnailimage);
          
    
           

          
          $length=$_POST['length'];
          $width=$_POST['width'];
          $packet_area=$_POST['res'];

  $insertproduct ="INSERT INTO `product`( `prod_title`,`prod_title_ar`,  `prod_price`, `discount`,  `prod_desc`,`prod_desc_ar`,`prod_cate_id`, `prod_subcate_id`, `color`, `quantity`,`live_on_site`,`sale_price`,`thumbnail_image`,`created_on` , `sid`,`length`,`width`,`thickness`,`surface_shape`,`delivery_time`,`manufacture_country`,`manufacture_country_ar`,`city`) 
  VALUES ('".$_POST['prod_title']."','".$_POST['prod_title_ar']."','".$_POST['prod_price']."','".$discount."','".$_POST['prod_desc']."','".$_POST['prod_desc_ar']."','".$_POST['category_id']."','".$_POST['sub_category_id']."','".$_POST['color']."','".$_POST['quantity']."','1','".$_POST['sale_price']."','$thumbnailimage','".date('Y-m-d')."' ,'".$sid."','".$_POST['length']."','".$_POST['width']."','".$_POST['thickness']."','".$_POST['surface_shape']."','".$_POST['delivery_time']."','".$_POST['manufacture_country']."','".$_POST['manufacture_country_ar']."','$city')";
			
		 $insertproduct1=mysqli_query($conn, $insertproduct);  


 $last_id = mysqli_insert_id($conn);
 $insert = mysqli_query($conn,"INSERT INTO prod_size (size,quantity,prod_id) VALUES('$sizes','$quan','$last_id')");
 


        

    // File upload configuration
   
    $targetDir = "upload/product/";
    $allowTypes = array('jpg','png','jpeg','gif');
  
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

    

   
        foreach($_FILES['files']['name'] as $key=>$val){
         
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $date=date('Y-m-d H:i:s');
            // Check whether file type is valid
           
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                   
                  $insert = mysqli_query($conn,"INSERT INTO prod_image (image, uploaded_on,prod_id) VALUES('$fileName','$date','$last_id')");

       if($insert)
      {
        
        echo '<script>window.location.href="view-product.php?sucmsg=Product Added successfully"</script>';
      }
      else
      {
        $msg1="Product not Added";
      }
  }else{
     echo  $errorUpload .= $_FILES['files']['name'][$key];
  }
		}
					
      
	}
	
	}
	
	?>
<style>
img.multiple-select {
    width: 100px;
    height: 100px;
    object-fit: contain;
    padding: 10px;
    border: 2px solid #fff;
    margin: 5px;
}
    
    
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
.text-right {
    text-align: right;
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
</style>	
<script>
function subcategoryget(str){
	
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

function brandget(str){
  //alert('hi');
  $.post("ajax_brand.php", {cate_id: str}, function(result){
        $("#brand").html(result);
		$.post("ajax_brand_available.php", {brand:'set',cate_id: str}, function(result1){
			if(result1.trim() == 0){
				$("#brandlabel").html("Brand (No assignment available for category and subcategory)");
			}
			else{
				$("#brandlabel").html("Brand ");
			}
			
		}); 
    });
}

function sizeget(str){
  //alert('hi');
  $.post("ajax_size.php", {cate_id: str}, function(result){
        $("#size").html(result);
		
		$.post("ajax_brand_available.php", {size:'set',cate_id: str}, function(result1){
			if(result1.trim() == 0){
				$("#sizelabel").html("Size : (No assignment available for category and subcategory)");
			}
			else{
				$("#sizelabel").html("Sizes : ");
			}
			
		}); 
		
    });
}
function sizeget1(str){
  //alert('hi');
  var cat=$(".prod_cat").val();

  $.post("ajax_size1.php", {cate_id:str,cat:cat}, function(result){
        $("#size").html(result);
		
		$.post("ajax_brand_available.php", {size1:'set',cate_id: str,cat:cat}, function(result1){
			if(result1.trim() == 0){
				$("#sizelabel").html("Sizes : (No assignment available for category and subcategory)");
			}
			else{
				$("#sizelabel").html("Sizes : ");
			}
			
		}); 
		
    });
}
</script>

<script>
function subcategoryget1(str){
	//alert(str);
   var cat=$(".prod_cat").val();

	$.post("ajax_subcategory1.php", {cate_id:str,cat:cat}, function(result){
        $("#brand").html(result);
		
		$.post("ajax_brand_available.php", {brand1:'set',cate_id: str,cat:cat}, function(result1){
			if(result1.trim() == 0){
				$("#brandlabel").html("Brand (No assignment available for category and subcategory)");
			}
			else{
				$("#brandlabel").html("Brand ");
			}
			
		}); 
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



<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                        <?php if(isset($msg1)) { ?>
                            <p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1; }
				        if(isset($msg)) { ?>
                            <p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $msg;?></p>
                        <?php } ?>
                    </div>
                    
                    <div class="card-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Product Category</label>
                            <select onchange="subcategoryget(this.value),brandget(this.value)" class="default-select form-control wide prod_cat" id="exampleInputEmail1" placeholder="Enter Product Title" name="category_id" required>
                              <option value="">Select Category</option>
                              <?php    while($rowS= mysqli_fetch_assoc($sqlFol1)) { ?>
                                <option value="<?php echo $rowS['category_id']; ?>" ><?php echo $rowS['category_name']; ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        
                        <div class="mb-3" id="subcat_div">
                            <label class="form-label">Product Sub Category</label>
                            <select class="form-control wide" id="subcategory" placeholder="Enter Product Title" name="sub_category_id"   >
                                <option>Select Category First</option>
                            </select>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Product Title (En)</label>
                                <input type="text" class="form-control input-default" id="exampleInputEmail1" value="<?php if(isset($_POST['prod_title'])){ echo $_POST['prod_title'];  } ?>" placeholder="Enter Product Title in english" name="prod_title" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Product Title (Ar)</label>
                                <input type="text" class="form-control input-default" id="exampleInputEmail1" value="<?php if(isset($_POST['prod_title'])){ echo $_POST['prod_title'];  } ?>" placeholder="Enter Product Title in english" name="prod_title_ar" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Product Description (En)</label>
                                <textarea class="form-control" id="pdetails1" placeholder="product description in English" name="prod_desc" required><?php if(isset($_POST['prod_desc'])){ echo $_POST['prod_desc'];  } ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Description (Ar)</label>
                                <textarea class="form-control"  placeholder="Product description in arabic" name="prod_desc_ar" required><?php if(isset($_POST['prod_desc_ar'])){ echo $_POST['prod_desc_ar'];  } ?></textarea>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Product Price (per square meter)</label>
                            <input type="number" min="0"  step="any" class="form-control input-default" id="price" placeholder="Enter Price for per sq. m." name="prod_price" required value="<?php if(isset($_POST['prod_price'])){ echo $_POST['prod_price'];  } ?>" onkeyup="saleprice_calculate();">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Discount (%)</label>
                            <input type="number" step="any" min="0" max="100" value="0"  class="form-control input-default" id="discount" placeholder="Enter Product Discount" name="discount"  required value="<?php if(isset($_POST['discount'])){ echo $_POST['discount'];  } ?>" onkeyup="discount_sub();">
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label">Sale Price</label>
                            <input type="number" step="any" class="form-control input-default" id="saleprice" placeholder="Enter Product sale price" name="sale_price"  required value="<?php if(isset($_POST['sale_price'])){ echo $_POST['sale_price'];  } ?>" readonly >
                            <span id="msgprice" style="color:red;font-size:15px;"></span>
                        </div>
                        
                         <div class="mb-3">
                            <label class="form-label">Quantity (in sqr. m.)</label>
                            <input type="number"  step="any" min="0" class="form-control input-default" name="quantity" id="quantity" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Length (In meters)</label>
                            <input type="number"  step="any" min="0" class="form-control input-default" name="length"  required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Width (In meters)</label>
                            <input type="number"  step="any" min="0" class="form-control input-default" name="width"  required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Thickness (In meters)</label>
                            <input type="number"  step="any" min="0" class="form-control input-default" name="thickness" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Surface Shape</label>
                            <input type="text" class="form-control input-default" name="surface_shape"  required>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Size</label>
                            <input type="text" class="form-control input-default" name="size"  required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input type="color" class="form-control input-default" name="color">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Possible Delivery Time</label>
                            <input type="text" class="form-control" placeholder="ex-10 days" name="delivery_time">
                        </div>
                        
                        <div id="show_"></div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Manufacture Country (En)</label>
                                <input type="text" class="form-control input-default" name="manufacture_country" value="<?php if(isset($_POST['manufacture_country'])){ echo $_POST['manufacture_country'];  } ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Description (Ar)</label>
                                <input type="text" class="form-control input-default" name="manufacture_country_ar" value="<?php if(isset($_POST['manufacture_country_ar'])){ echo $_POST['manufacture_country_ar'];  } ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
							<span class="input-group-text">Thumbnail Images</span>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control" name="thumbnailimage" id="thumb-nail-image" required accept="image/jpg,image/png,image/jpeg,image/gif">
                            </div>
                        </div>
                        
                        <div class="thumb-nail-images mb-3"></div>
                        
                        <div class="input-group mb-3">
							<span class="input-group-text">Product Images</span>
                            <div class="form-file">
                                <input type="file" name="files[]" class="form-file-input form-control" multiple id="gallery-photo-add" accept="image/jpg,image/png,image/jpeg,image/gif">
                            </div>
                        </div>
                        
                        <div class="gallery mb-3"></div>
                        
                        <div class="form-check custom-checkbox mb-3">
                            <label for="recom" class="form-label">Mark as Recomended</label>
                            <input type="checkbox" name="recomended" id="recom" class="form-check-input" value=1>
                        </div> 
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="finalsubmit" name="submit">Add</button>
                            
                        </div>
                    </div>
                    </form>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</div>




                





  <script>
 /* $( function() {
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
  } );*/

 $(document).ready(function () {

//   //called when key is pressed in textbox
  $("#price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html(" Numbers Only ").show().fadeOut("slow");
              return false;
    }
  }); 
   $("#qty").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html(" Numbers Only ").show().fadeOut("slow");
              return false;
    }
  }); 
     
 });
  </script>	  


     <script>
       
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


     
      <script>
    $( document ).ready(function() {
        var number = document.getElementById('quantity');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
    });
 
   
    </script>
<?php include 'footer.php'; ?>
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
                    const file = this.files[0];
                    const  fileType = file['type'];
                    const validImageTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/vector', 'image/png'];
                    if (!validImageTypes.includes(fileType)) {
                        $('#gallery-photo-add').val(null);
                        alert("not an image file");
                        setTimeout(function(){
                            if($('.gallery').children().length > 0) {
                                $('.gallery').empty();
                            }
                        }, 1000);
                    }
            });
            
            $('#thumb-nail-image').on('change', function() {
                $(".thumb-nail-images").html('');
                imagesPreview(this, 'div.thumb-nail-images');
                const file = this.files[0];
                const  fileType = file['type'];
                const validImageTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/svg', 'image/png'];
                if (!validImageTypes.includes(fileType)) {
                    $('#thumb-nail-image').val(null);
                    alert("not an image file");
                    
                    setTimeout(function(){
                        if($('.thumb-nail-images').children().length > 0) {
                            $('.thumb-nail-images').empty();
                        }
                    }, 1000);
                    
                }
            });
            
            
        });
        
        
     </script>
     
    
         
           
     
