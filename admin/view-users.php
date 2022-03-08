<?php
include('header.php');

if(isset($_GET['status'])) {
   $id=htmlspecialchars($_GET['id']);
   $status=htmlspecialchars($_GET['status']);
   $update_status=mysqli_query($conn, "UPDATE users SET status='".$status."' WHERE uid='".$id."' ");
   if ($update_status) {
     echo '<script>window.location.href="view-users.php?sucmsg=User Status Updated"</script>';
   }
}
if(isset($_GET['deluid'])) {
   $id=htmlspecialchars($_GET['deluid']);

   $update_status=mysqli_query($conn, "DELETE FROM users WHERE uid='".$id."' ");
   if ($update_status) {
     echo '<script>window.location.href="view-users.php?sucmsg=User Successfully Deleted"</script>';
   }
}
$sqlcat=mysqli_query($conn, "select * from users order by id desc");
$row= mysqli_num_rows($sqlcat);

?>



<div class="content-body">
    <div class="container-fluid">
		<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
			<h2 class="mb-3 me-auto">All Users(<?php echo ($row);  ?>)</h2>
			<p><a class="btn btn-primary" href="add-user.php">Add User</a></p>
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
                                        <th>S.No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Active/Deactive</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    <?php
                                    $i=1;
        					          while($row12= mysqli_fetch_assoc($sqlcat))
        					          { 
        						        ?>
                                      <tr id="divid<?php echo $row12['id'];?>">
                                        <td><?php echo $i;?></td>
                                        <td style="font-weight:bold;"><?php echo $row12['user_fname']?></td>
                                        <td style="font-weight:bold;"><?php echo $row12['email']?></td>
                                        <td>
                                        <!--  <?php 
                
                                            if($row12['status']==1){  ?>
                
                                                 <a href="view-users.php?id=<?php echo $row12['uid'];?>&status=0" style="color:red">Deactive</a>
                      
                                           <?php }
                                            else{ ?>
                
                                                 <a href="view-users.php?id=<?php echo $row12['uid'];?>&status=1" style="color:green">active</a>
                
                                            <?php }
                
                
                                          ?>-->
                                          
                                            <label class="switch">
                                              <input type="checkbox" <?php echo $row12['status']==1?'checked':'' ?> id="togBtn<?php echo $row12['id']; ?>" onchange="change_status(<?php echo $row12['id']?>)" >
                                              <span class="slider round"></span>
                                            </label>
                                            

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



<script>
var switchStatus = false;
function change_status(id) {
   
       if ($("#togBtn"+id).is(':checked')) {
        status = 1;
        }else
        {
           status = 0; 
        }
    //   alert(status)
        $.ajax({
            url: "controller.php",
            type: 'POST',
            data: {user_status:status,user_id:id},
            success: function(data) {
                if(data==1){
             $("#divid"+id).reload(" #divid"+id);
                //location.reload();
            }
                if(data==0){
                    alert("something went wrong");
                }
            }
        });
    
}
</script>


   
<?php include('footer.php'); ?>
