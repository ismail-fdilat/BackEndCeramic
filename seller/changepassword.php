<?php
include('config.php');

$pass=md5($_POST['pass']);


	$sqlPass=$conn->query("update seller set spass='".$pass."' , pass='".$_POST['pass']."' where seller_id='".$_SESSION['seller_id']."'");

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