<?php
include('config.php');

if(isset($_POST['submit']))
{
	$user=$_POST['userid'];
	$pass=$_POST['password'];
	//$usertype=$_POST['usertype'];

if(empty($user))
	{
		$msg1="Please enter your email";
	}

	elseif(empty($pass))
	{
		$msg1="Please Enter Password";
	}

	else
	{
     $sql="select * from seller where semail ='".$user."' and pass ='".md5($pass)."'";
		$statement =mysqli_query($conn,$sql);
	
		//print_r("select * from tbl_admin where email ='".$user."' and password ='".md5($pass)."'"); die;
		$num_admin = mysqli_num_rows($statement);
        $row_admin = mysqli_fetch_assoc($statement);
        
		if($num_admin>0)
		{
			if($row_admin['status']==1)
			{
			   $_SESSION['seller_id']=$row_admin['seller_id'];
    			$_SESSION['sname']=$row_admin['sname'];
    	
    			$_SESSION['semail']=$row_admin['semail'];
    			$_SESSION['phone']=$row_admin['phone'];
    			
    			echo '<script>'."window.location.href = 'dashboard.php'".'</script>';  
			}
			else
			{
			      echo '<script>window.location.href="index.php?error=failed"</script>';
			}
			
			
		}
		else
		{
			$msg1="Username and password do not exist";
		}
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="upload/logo/5b31fee123fcadokan-sadara-logo.webp" rel="icon" type="image/x-icon">
    
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .authincation {
            background: #03111b;
        }
        .authincation-content {
            background: #2C394B !important;
        }
        .auth-form h4 {
            color: #fff;
            font-size: 24px;
        }
    </style>
  </head>
  
  <body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.php"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Seller Login</h4>
                                    <?php if(isset($msg1))
                        				{
                        					?>
                        				<p class="text-danger" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
                        				<?php
                                        }
                                        if($_GET['succ']=='success')
                                    echo '<p class="text-success" align="center"><i class="fa fa-times"></i>Your registration is successfully done.You can login after  admin approvel.</p>';
                                      if($_GET['error']=='failed')
                                    echo '<p class="text-danger" align="center"><i class="fa fa-times"></i>You are not approved from admin.</p>';
                                       ?>
                                       <?php if(isset($_SESSION['msg1'])){echo '<p class="text-success" align="center">'.$_SESSION['msg1'].'</p>'; session_unset($_SESSION['msg']); } ?>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Email" name="userid">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <a href="forgetpassword.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                                            <a href="createseller.php">create account  as seller </a>
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
      
      
    
    
    <script src="../assets/vendor/global/global.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/deznav-init.js"></script>
	<script src="../assets/js/styleSwitcher.js"></script>

    
    
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
