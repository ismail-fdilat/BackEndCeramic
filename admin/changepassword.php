<?php
include('config.php');

$pass=md5($_POST['pass']);
//$pass=$_POST['pass'];

	$sqlPass=$conn->query("update tbl_admin set password='".$pass."' where id='".$_SESSION['admin_id']."'");

if($sqlPass)
			{
				?>
              	<label for="inputName" class="col-sm-2 control-label"></label>
                <label for="inputName" class="col-sm-10 control-label" style="color:green; text-align:left"><i class="fa fa-check"></i> Your Password Successfully Updated</label>
                <?php
				
				
			}
			else
			{
				?>
				  	<label for="inputName" class="col-sm-2 control-label"></label>
                	<label for="inputName" class="col-sm-10 control-label" style="color:red; text-align:left"><i class="fa fa-times"></i> Something Went Wrong ! Try Again</label>
                <?php
			}


?>  