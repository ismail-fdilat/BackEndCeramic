<?php
include('header.php');


/*$sql1 = "SELECT * FROM category WHERE created_by = '".$_SESSION['admin_id']."'";
$result1 = $conn->query($sql1);
$c=$result1->num_rows;*/

// $sqlcat=mysqli_query($conn, "select * from dir_categories where cate_status='1'");
// $sql="select * from dir_categories where  publication_status='1'";    
$sqlcat=mysqli_query($conn, "select * from dir_categories");
// print_r($sql);die;
$row= mysqli_num_rows($sqlcat);
//print_r($row);die("hello");


if(isset($_GET['delcid']))
{
  // $sqlD="delete from dir_categories where category_id ='".$_GET['delcid']."' AND created_by='".$admin_id."'";
  //$sqlD="update category set dstatus='0' where cid='".$_GET['delcid']."' AND created_by='".$admin_id."'";
    $sqlD="delete from dir_categories where category_id ='".$_GET['delcid']."'";
  mysqli_query($conn, $sqlD);
  
 

  echo '<script>window.location.href="view-category.php?sucmsg=Category Successfully Deleted"</script>';
}


?>




<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">All Category(<?php echo ($row);  ?>)</h2>
			<p><a class="btn btn-primary" href="add-category.php">Add Category</a></p>
                        
              <?php if(isset($_GET['sucmsg'])){?>
                
                <h3 class="box-title" style="color:green;"><i class="fa fa-check"></i><?php echo $_GET['sucmsg']; ?></h3> 

              <?php } ?> 
		</div>	
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <td>S.No</td>
                                        <td>Product Category</td>
                                        <td>Product Category Ar.</td>
                                        <td>Category Image</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
				                        while($row12= mysqli_fetch_assoc($sqlcat)) { 
				                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td style="font-weight:bold;"><?php echo $row12['category_name']?> </td>
                                        <td style="font-weight:bold;"><?php echo $row12['ar_category_name']?> </td>
                                        <td style="font-weight:bold;"><center><img src="upload/category/<?php echo $row12['image']?>" class="img-responsive" style="height:100px; width:100px" /></center> </td>
                                        <td>
                                            <a class="btn btn-primary" href="edit-category.php?editcid=<?php echo $row12['category_id'];?>"><i class="fa fa-edit"></i> Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure ?')" href="view-category.php?delcid=<?php echo $row12['category_id'];?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
						            </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
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
