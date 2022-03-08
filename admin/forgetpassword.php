<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>forget password</title>
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
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Forgot Password</h4>

                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block" name="submit">Send</button>
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
 <!--   <script src="../assets/js/deznav-init.js"></script>-->
	<!--<script src="../assets/js/styleSwitcher.js"></script>-->
</body>
  
  
  
  

</html>

<?php

if(isset($_POST['submit'])) 
{
  $email = $_POST['email'];
      $result=mysqli_query($conn,"SELECT * FROM tbl_admin WHERE email='$email'");

      if(mysqli_num_rows($result)>0)
      {
         $row = mysqli_fetch_assoc($result);
         
         //$id=$_POST['id'];
                 $encrypt_email= base64_encode($row['email']);
                 $to = $email;
                 $subject = "bio-vadis ";
                 $message = '<b>Your password reset link.</b>';
                 
                 $message .= '<p>We recieved a password reset request. The link to reset your password is below</p>';
                 $message .= '<p><strong>Email:</strong>'.$email.'</p>';
                 $message .= '<p>Here is your password reset link:</p>'; 
                 $message .= '<p><a href="https://shrinkcom.com/organic_food/admin/resetpassword.php?ainfo='.$encrypt_email.' " target="_blank">Click here to reset your password</a> </p>';
                 $message .= '<p><strong>Thanks you <br> Bio-vadis </strong></p>';
                //echo $message; die;
                 $header = "From:shrinkcomekta@gmail.com \r\n";
                 $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";
                 
                 $retval = mail ($to,$subject,$message,$header,'-fno-reply@ecocradle.in');
                
             ///mail($to, $subject, $message, "From: admin@gmail.com");
            
      }  
      else
      {
        	echo '<div class="alert ">
  <strong>Invalid Email And Password</strong> 
</div>';
      }  
}

?>