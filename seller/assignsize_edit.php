<?php
	include('header.php');
	include('nav.php');
	$sqlFol1=mysqli_query($conn, "select * from dir_categories");
  $sqlFol2=mysqli_query($conn, "select * from size");
	
	if(isset($_POST['submit']))
	{
		$size=$_POST['sizes'];
     $sizesarr=implode(',', $size);

		
		$cateid=$_POST['category_id'];
		$subcateid=$_POST['sub_category_id'];
		
    $selectsize = "SELECT *  from assign_size WHERE category_id='$cateid' AND subcategory_id='$subcateid' where id !='".$_GET['editid']."'"; 
      $SELECT=mysqli_query($conn,$selectsize);
         $num=mysqli_num_rows($SELECT); 
     if($num > 0){
        $msg1="Already Assigned Plzzz Delete And Try Again";
     }else{
		
			 $insertsize = "update `assign_size` set `category_id`='$cateid',`subcategory_id`='$subcateid',`size_id`='$sizesarr' where id='".$_GET['editid']."' ";
			
			$insert=mysqli_query($conn,$insertsize);
			
			if($insert)
			{
			
				echo '<script>window.location.href="view-assignsize.php?sucmsg=Size Assigned successfully"</script>';

			
			}
			else{
			
			$msg1="Size not Added";
		  }
	   }
	
	}
	
$br = mysqli_query($conn,"select * from assign_size where id='".$_GET['editid']."' ");
$ro = mysqli_fetch_assoc($br);


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
              
           <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select onchange="subcategoryget(this.value)" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Title" name="category_id" required>
                  <option value="">Select Category</option>
                  <?php    while($rowS= mysqli_fetch_assoc($sqlFol1)) 

					  {
						  ?>
                             <option value="<?php echo $rowS['category_id']; ?>"<?php if($rowS['category_id']==$ro['category_id']){echo "selected";}?>><?php echo $rowS['category_name']; ?></option>
                  <?php
					  }
					  ?>
                </select>
              </div>
               <?php   $fetchsubcat1=mysqli_query($conn,"select * from dir_sub_categories where category_id= '".$ro['category_id']."'");
			  if(mysqli_num_rows($fetchsubcat1) > 0){  ?>
              <div class="form-group" id="subcat_div"> 
                <label for="exampleInputEmail1">Product Sub Category</label>
                <select class="form-control" id="subcategory" placeholder="Enter Product Title" name="sub_category_id" >
               <?php    
                 while($row1=mysqli_fetch_assoc($fetchsubcat1)){
              
                 ?>
                 <option value="<?php echo $row1['sub_category_id'];?>"<?php if($row1['sub_category_id']==$ro['subcategory_id']){echo "selected";}?>><?php echo $row1['sub_category_name'];?></option>
				 <?php } ?>  
                </select>
              </div>
			  <?php }
			  else{ ?>
				   <div class="form-group" id="subcat_div" style="display:none"> 
                <label for="exampleInputEmail1"  >Product Sub Category</label>
                <select class="form-control" id="subcategory" placeholder="Enter Product Title" name="sub_category_id" >
                
                </select>
              </div>
			  <?php } ?>
            <!--   <div class="form-group">
                <label for="exampleInputEmail1">Product Sub Sub Category</label>
                <select class="form-control" id="subsubcategory1"  name="sub_sub_category_id" required>
                </select>
              </div> -->
              
                <!--  <div class="form-group">-->
                <!--<label for="exampleInputEmail1">Sizes</label>-->
                <!--<select class="form-control"  placeholder="Enter Product Title" name="sizes[]" required multiple>-->
                <!--  <option value="">Select sizes</option>-->
                  <?php   /* while($rowSsize= mysqli_fetch_assoc($sqlFol2)) 

            { */
              ?>
                             <!--<option value="<?php echo $rowSsize['size_id']; ?>"style="color:#000;"><?php echo $rowSsize['name']; ?></option>-->
                  <?php
             // }
            ?>
              <!--  </select>-->
              <!--</div>-->
              
               <div class="">
                <div class="selectBox" id="select_on_click">
                    <label>Size</label>
                    <select class="form-control">
                        <option hidden="" value="">~~SELECT~~</option>
                    </select>
                </div>
                <div id="checkboxes_brand" style="display:none;">
                     <?php 

               $sqlFol2=mysqli_query($conn, "select * from size");
                while($rowSbrand=mysqli_fetch_array($sqlFol2)){ ?>
            
                    <label style="display:block;"  for="one<?php echo $rowSbrand[0];?>">
                        <input type="checkbox" id="one<?php echo $rowSbrand[0];?>" name="sizes[]" class="theClass" value="<?php echo $rowSbrand[0];?>" <?php if(strpos($ro['size_id'],$rowSbrand[0]) !== false){ echo "checked";}?> ><?php echo $rowSbrand[1];?>
                    </label>
                    <?php } ?>
                    <!--<label style="display:block;">-->
                    <!--    <input type="checkbox"  class="theClass">care-->
                    <!--</label>-->
                    <!--<label style="display:block;">-->
                    <!--    <input type="checkbox" class="theClass" >service   cate e-->
                    <!--</label>-->
                </div>
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
    
    <script>
$(document).ready(function(){
  $("#select_on_click").click(function(){
    $("#checkboxes_brand").toggle();
  });
});
</script>


<?php
include('footer.php');
?>