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

		// $subcateid1=$_POST['sub_sub_category_id'];

	
		if(!empty($_FILES['img']['name']))
		{
		   $uploadimg = @getimagesize($_FILES["img"]["tmp_name"]);
                $width = $uploadimg[0];
                $height = $uploadimg[1];	
		    if($width == "450" && $height == "250")
           {
           
		
		    $newname=uniqid().$_FILES['img']['name'];
				move_uploaded_file($_FILES['img']['tmp_name'],'upload/deal/'.$newname);
				
			$insertuser = "update `deal` set `deal_title`='".$ptitle."',`ar_deal_title`='".$atitle."',`deal_image`='".$newname."',`start_date`='".$start[0]."',`end_date`='".$end[0]."',`start_time`='".$start[1]."',`end_time`='".$end[1]."',`start_date_str`='".$startstr."',`end_date_str`='".$endstr."' where deal_id='".$_GET['editid']."'";
           }
           else
           {
               $msg1="Image dimension should be 450X250";
           }
		}
			else
			{
		       $insertuser = "update `deal` set `deal_title`='".$ptitle."',`ar_deal_title`='".$atitle."',`start_date`='".$start[0]."',`end_date`='".$end[0]."',`start_time`='".$start[1]."',`end_time`='".$end[1]."',`start_date_str`='".$startstr."',`end_date_str`='".$endstr."' where deal_id='".$_GET['editid']."'"; 
		     }
			
			
			$insertuser1=mysqli_query($conn,$insertuser);
			
			if($insertuser1)
			{
			   
			    $update =mysqli_query($conn,"update product set startDate = '".$start[0]."',start_time='".$start[1]."',endDate ='".$end[0]."',end_time='".$end[1]."',`start_date_pstr`='".$startstr."',`end_date_pstr`='".$endstr."' where deal_id = '".$_GET['editid']."'");
				echo '<script>window.location.href="view-deal.php?sucmsg=Slider Updated successfully"</script>';

			
			}
			else
      {
			
			// $msg1="deal not Updated";
        $msg1="Image dimension should be 450X250";
	  }
	   
	}
	
	
//get brand details
$sqlFol11=mysqli_query($conn, "select * from deal where deal_id='".$_GET['editid']."'");

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




<div class="content-body">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-header">
                <h2 class="">Edit Slider</h2>
            	<?php if(isset($msg1)) { ?>
					<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
				<?php } if(isset($sucmsg)) { ?>
					<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
				<?php } ?>
            </div>
            
            <div class="card-body">
                <form role="form" method="post" action="" enctype="multipart/form-data">
                    <?php echo $rowS['deal_image']; ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Name</label>
                        <input type="text" class="form-control" id="" placeholder="Enter category name" name="deal_name" value="<?php echo $row1['deal_title'];?>" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <img src="upload/deal/<?php echo $row1['deal_image']; ?>" width="100px" height="100px"><br>
    					<span class="input-group-text">Upload</span>
                        <div class="form-file">
                            <input type="file" class="form-file-input form-control" name="img">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Update Slider</button>
                </form>
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
   
