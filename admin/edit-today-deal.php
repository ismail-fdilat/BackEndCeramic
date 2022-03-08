<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/ Firefox /
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<?php
	include('header.php');
	include('nav.php');
	

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
	
		// $subcateid1=$_POST['sub_sub_category_id'];

	
// 		if(!empty($_FILES['img']['name']))
// 		{
		
		
// 		$newname=uniqid().$_FILES['img']['name'];
// 				move_uploaded_file($_FILES['img']['tmp_name'],'upload/deal/'.$newname);
				
// 			$insertuser = "update `todaydeals` set `deal_title`='".$ptitle."',`ar_deal_title`='".$atitle."',`deal_image`='".$newname."',`start_date`='".$start[0]."',`end_date`='".$end[0]."',`start_time`='".$start[1]."',`end_time`='".$end[1]."' where today_deal_id='".$_GET['editid']."'";
				
// 				}
// 				else
// 				{
		
		//	$insertuser = "update `todaydeals` set `deal_title`='".$ptitle."',`ar_deal_title`='".$atitle."',`start_date`='".$start[0]."',`end_date`='".$end[0]."',`start_time`='".$start[1]."',`end_time`='".$end[1]."' where today_deal_id='".$_GET['editid']."'"; 
		//	}
			
		
			    $insertuser = "update `todaydeals` set `deal_title`='".$ptitle."',`ar_deal_title`='".$atitle."',`start_date`='".$start[0]."',`end_date`='".$start[0]."',`start_time`='".$start[1]."',`end_time`='".$enddate."',`start_date_str`='".$startstr."',`end_date_str`='".$endstr."' where today_deal_id='".$_GET['editid']."'"; 
    			$insertuser1=mysqli_query($conn,$insertuser);
    			
    			if($insertuser1)
    			{
    			   $update =mysqli_query($conn,"update product set startDate = '".$start[0]."',start_time='".$start[1]."',endDate ='".$start[0]."',end_time='".$enddate."',`start_date_pstr`='".$startstr."',`end_date_pstr`='".$endstr."' where deal_id = '".$_GET['editid']."'");
    				echo '<script>window.location.href="view-today-deal.php?sucmsg=Today Deal Updated successfully"</script>';
    
    			
    			}
    			else
    			{
    			
    			 $msg1=" Today slider not Updated";
    	        }
        	
	   
	}
	
	
//get brand details
$sqlFol11=mysqli_query($conn, "select * from todaydeals where today_deal_id='".$_GET['editid']."'");

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

   
<link rel="stylesheet" href="foundation/css/foundation.min.css">
<script src="foundation/js/jquery.js"></script> 
<script src="dist/js/foundation-datepicker.js"></script>
<link rel="stylesheet" href="dist/css/foundation-datepicker.min.css">
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
                  <h3 class="box-title">Edit Slider</h3>
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
               <!--<div class="form-group">-->
               <!-- <label for="exampleInputEmail1">Product Category</label>-->
               <!-- <select onchange="subcategoryget(this.value)" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Title" name="category_id" required>-->
               <!--   <option value="<?php echo $row2['category_id']; ?>"><?php echo $row2['category_name']; ?></option>-->
                  <?php //   while($rowS= mysqli_fetch_assoc($sqlFol1))  { ?>
                             <!--<option value="<?php echo $rowS['category_id']; ?>"><?php echo $rowS['category_name']; ?></option>-->
                  <?php
					 // }?>
       <!--         </select>-->
       <!--       </div>-->
              
              <!--<div class="form-group">-->
              <!--  <label for="exampleInputEmail1">Product Sub Category</label>-->
              <!--  <select class="form-control" id="subcategory" placeholder="Enter Product Title" name="sub_category_id"  onchange="subcategoryget1(this.value)" >-->
              <!--                    <option value="<?php echo $row3['sub_category_id']; ?>"><?php echo $row3['sub_category_name']; ?></option>-->

              <!--  </select>-->
              <!--</div>-->
<!--  <div class="form-group">
                <label for="exampleInputEmail1">Product Sub Sub Category</label>
                <select class="form-control" id="subsubcategory1"  name="sub_sub_category_id" required>
                   <option value="<?php echo $row4['sub_subcate_id']; ?>"><?php echo $row4['sub_subcate_title']; ?></option>

                </select>
              </div> -->
              <?php echo $rowS['deal_image']; ?>
              <div class="form-group">
                      <label for="exampleInputEmail1">Today Slider Name</label>
                      <input type="text" class="form-control" id="" placeholder="Enter category name" name="deal_name" value="<?php echo $row1['deal_title'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Arabic Today Slider Name</label>
                      <input type="text" class="form-control" id="" placeholder="Enter category name" name="deal_title_arabic" value="<?php echo $row1['ar_deal_title'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Start Date</label>
                   
					  <input  type="text" class="span2" name="startdate" value="<?php echo $row1['start_date'].' '.$row1['start_time'];?>" id="dpt" onkeyup="check()" required>
                    </div><div class="form-group">
                      <label for="exampleInputEmail1">End Date</label>
                     
					  <!--<input type="text" class="span2" name="enddate" value="<?php echo $row1['end_date'].' '.$row1['end_time'];?>" id="dpt1" required>-->
                   <input type="time" class="span2" name="enddate" value="<?php echo $row1['end_time'];?>" id="enddate" onkeyup="check()" required>
                  <span id="msgshown" style="color:red;"></span>
                    </div>

<!--<div class="form-group">-->
<!--<img src="upload/deal/<?php echo $row1['deal_image']; ?>" width="100px" height="100px" >-->
<!--                      <label for="exampleInputEmail1">Today Deal Image</label>-->
<!--                      <input type="file" class="form-control"  name="img" >-->
<!--                    </div>-->





                      <div class="box-footer">



					 <button type="submit" class="btn btn-primary" id="fsubmit" name="submit">Update Today Slider</button>

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
	 <script>
	/* $("#dpt").on('blur',function(){
	     console.log($("#startdate").val());
	 });*/
	
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
		
		<script>
		    
		 function check()
		 {
		     var startdate = $('#dpt').val();
		     var filterdate = startdate.slice(11);
		     var enddate = $('#enddate').val();
		  
		    if(filterdate >= enddate)
		    {
		        
		        $('#msgshown').html('Start time and end time not be same');
		        $('#fsubmit').attr("disabled", "disabled");
		    }
		    else
		    {
		        $('#fsubmit').removeAttr("disabled", "disabled");
		        $('#msgshown').html('');
		        
		    }
		 }
		     
		 
		    
		    
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
     
   
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    
  </body>
</html>
