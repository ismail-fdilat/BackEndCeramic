<?php
include('config.php');

if (isset($_POST['submit'])) {
    $user=$_POST['email'];
    $pass=$_POST['password'];
    //$usertype=$_POST['usertype'];

    if (empty($user)) {
        $msg1="Please enter your email";
    } elseif (empty($pass)) {
        $msg1="Please Enter Password";
    } else {
        $statement =mysqli_query($conn, "select * from tbl_admin where email ='".$user."' and password ='".md5($pass)."'");
    
        $num_admin = mysqli_num_rows($statement);
        $row_admin = mysqli_fetch_assoc($statement);
        
        if ($num_admin>0) {
            $_SESSION['admin_id']=$row_admin['id'];
            $_SESSION['admin_firstname']=$row_admin['firstname'];
            $_SESSION['admin_lastname']=$row_admin['lastname'];
            $_SESSION['admin_email']=$row_admin['email'];
            $_SESSION['admin_phone']=$row_admin['phone'];
            
            echo '<script>'."window.location.href = 'dashboard.php'".'</script>';
        } else {
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
    
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    
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
                                    <h4 class="text-center mb-4">Admin Login</h4>
                                    <?php if (isset($msg1)) { ?>
                            		    <p class="text-danger" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
                            		<?php } ?>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
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


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../assets/vendor/global/global.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/deznav-init.js"></script>
	<script src="../assets/js/styleSwitcher.js"></script>
</body>
  
  
  
  
</html>
