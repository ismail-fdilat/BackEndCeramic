<?php
	include('header.php');
	
	include ('notification/Firebase.php');
	if(isset($_POST['submit']))
	{
		
		$ptitle=$_POST['ptitle'];
// 		$arabictitle = $_POST['parabictitle'];
         $date=date('Y-m-d h:i:s');   
			$insertuser = "INSERT INTO `notification_add`(`n_message`,`create`) VALUES ('".$ptitle."','$date')";
	    	mysqli_query($conn,$insertuser);
			$lastid=mysqli_insert_id($conn);
			if($insertuser)
			{
			    
			     //$sqltoken = "select * from users ";
			     $sqltoken = "select * from token  ";

                    $qrytoken= mysqli_query($conn,$sqltoken);
                    while($usertoken=mysqli_fetch_assoc($qrytoken))
                    {
                   $token=$usertoken['update_token'];
                   $uid=$usertoken['userid'];
                   $date=date('Y-m-d h:i:s');                 
                       $firebase = new Firebase(); 
			           $msg=array("message"=>$ptitle,"status"=>1);
			           	$insertmsg = "INSERT INTO `notification`(`message`,`user_id`,`created_at`)VALUES('$ptitle','$uid','$date')";
                         mysqli_query($conn, $insertmsg);
			       $firebase->send($token,$msg);
                    }
			  
			  echo '<script>window.location.href="notification_view.php?sucmsg=Successfully Added"</script>';

			}
			else{
			
				$msg1="Notification not Added";
			}
    }
	
	
	

?>




<div class="content-body">
    <div class="container-fluid">
		<div class="row">
	        <h2 class="box-title">Add Notification</h2>
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
	    </div>
	    
	    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="ptitle" required>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>