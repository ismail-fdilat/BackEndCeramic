<?php
	include('header.php');
	

	if(isset($_POST['submit']))
	{
		$atitle=$_POST['deal_title_arabic'];
		$ptitle=$_POST['deal_name'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$start = explode(' ',$startdate);
		$end = explode(' ',$enddate);
	   $startstr = strtotime($start[0]);
     $endstr = strtotime($end[0]);
	
	$uploadimg = @getimagesize($_FILES["img"]["tmp_name"]);
        $width = $uploadimg[0];
        $height = $uploadimg[1];
        if($width != "450" && $height != "250") 
		{
              $msg1="Image dimension should be  450X250";
		}
		else
		{
		$newname=uniqid().$_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'],'upload/deal/'.$newname);
		
		
			 $insertuser = "INSERT INTO `deal`(`deal_title`,`ar_deal_title`,`deal_image`,`start_date`,`end_date`,`start_time`,`end_time`,`start_date_str`,`end_date_str`)VALUES ('".$ptitle."','".$atitle."','".$newname."','".$start[0]."','".$end[0]."','".$start[1]."','".$end[1]."','".$startstr."','".$endstr."')"; 
			$insertuser1=mysqli_query($conn,$insertuser);
			
			if($insertuser1)
			{
				echo '<script>window.location.href="view-deal.php?sucmsg=Slider Added successfully"</script>';
			}
			else{
			
			$msg1="Slider not Added";
		  }
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





    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
	            <h2 class="mb-3 me-auto">Add Slider</h2>
                <?php if(isset($msg1)) { ?>
					<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
				<?php } if(isset($sucmsg)) { ?>
					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
				<?php } ?>
        	 
            	 <div class="row">
                	 <div class="col-md-12">
                	    <div class="card">
                	     <div class="card-body">
                	         <div class="basic-form">
                	             <form role="form" method="post" action="" enctype="multipart/form-data">
                	                 <div class="form-group mb-3">
                                      	<label for="exampleInputEmail1">Category Name</label>
                                      	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="category_name" required>
                                    </div>
                                   
                                    <div class="input-group mb-3">
											<span class="input-group-text">Upload</span>
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="image">
                                            </div>
                                        </div>
                                    
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





<script>
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
		</script>	 
    <!--  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
	<!--<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>   
     
   
<?php include 'footer.php'; ?>