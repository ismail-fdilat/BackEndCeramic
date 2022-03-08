<?php
include('header.php');

// $sqlsubcat=mysqli_query($conn, "select t1.*,t2.* from subcategory t1 left join category t2 on(t1.cid= t2.cid) WHERE t1.created_by = t2.created_by order by t1.cid desc");//AND 
//t1.dstatus=t2.dstatus 
 $sqlsubcat=mysqli_query($conn, "select * from dir_sub_categories
                                left join dir_categories
                                on(dir_sub_categories.category_id= dir_categories.category_id)
                                order by dir_sub_categories.category_id desc");//AND ;


//t1.dstatus=t2.dstatus 

$row= mysqli_num_rows($sqlsubcat);



if(isset($_GET['delsubcatid']))
{
  
  $sqlD="delete from  dir_sub_categories where sub_category_id ='".$_GET['delsubcatid']."' ";

  //$sqlD="delete from subcategory where subid ='".$_GET['delsubcatid']."' AND created_by='".$admin_id."' ";
  mysqli_query($conn, $sqlD);
  
  echo '<script>window.location.href="view-subcategory.php?sucmsg=Category Successfully Deleted"</script>';
}

?>
<style>
    
.dataTable tbody tr td:nth-child(6) {
    width: max-content;
    display: block;
}
</style>


<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">All Sub Category(<?php echo ($row); ?>)</h2>
			<p><a class="btn btn-primary" href="add-subcategory.php">Add Sub Category</a></p>
		</div>	
		<?php if(isset($_GET['sucmsg'])){?>
            <h3 class="box-title mb-3 text-center" style="color:green;"><i class="fa fa-check"></i><?php echo $_GET['sucmsg']; ?></h3> 
        <?php } ?> 
		
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Subcategory Image</th>
                                        <th>Category</th>
                                        <th>Category Ar.</th>
                                        <th>Sub Category</th>
                                        <th>Sub Category Ar.</th>
                                        <!--<th>Sub Category ID</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php
                                    
                                    $i=1;
                          					while($rows11= mysqli_fetch_assoc($sqlsubcat))
                          					{
                						        
                                    ?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><img src="upload/category/<?php echo $rows11['sub_image']; ?>" width="100px" height="100px"></td>
                                       
                                        <?php 
                                        $t=$rows11['category_id'];
                                        // print_r($t);die;
                
                                       
                                       $sqlcat=mysqli_query($conn, "select category_name, ar_category_name from  dir_categories where category_id='".$rows11['category_id']."'");
                
                
                                    $row= mysqli_num_rows($sqlcat);
                
                
                                       while($row11= mysqli_fetch_assoc($sqlcat)){ ?>
                                        <td style="font-weight:bold;">
                                        <?php echo $row11['category_name']; ?> 
                                        
                                      </td>
                                        <td style="font-weight:bold;">
                                        <?php echo $row11['ar_category_name']; ?> 
                                        
                                      </td>
                                      
                                      <?php }?>

                                        <td style="font-weight:bold;"><?php echo $rows11['sub_category_name']; ?> </td>
                                        <td style="font-weight:bold;"><?php echo $rows11['ar_sub_category_name']; ?> </td>
                                        <!--<td style="font-weight:bold;"><?php // echo $rows11['sub_category_id']; ?> </td>-->
                					     <td>
                                          <a class="btn btn-primary" href="edit-subcategory.php?subcatid=<?php echo $rows11['sub_category_id']; ?>">EDIT</a>
                                          &nbsp;|&nbsp;
                                          <a class="btn btn-danger" onclick="return confirm('Are you sure ?')" href="view-subcategory.php?delsubcatid=<?php echo $rows11['sub_category_id'];?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                      </tr>
                                    <?php
                					             $i++;
                					             }
                					          ?>
                
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
