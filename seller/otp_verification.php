<?php 
include('config.php');

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $otp=$_POST['otp'];

    $sql="select * from seller where semail='$email' and otp='$otp'";
 
  $result=mysqli_query($conn , $sql);
  if(mysqli_num_rows($result)>0)
  {
     $update="UPDATE seller SET email_verification='1' , otp_verification='1' WHERE (semail='$email' AND otp='$otp')"; 
        $update = $conn->query($update);
            if($update==true){
                 $update="UPDATE seller SET otp=null WHERE semail='$email'"; 
                 $update = $conn->query($update);
                echo '<script>window.location.href="index.php"</script>';
                $_SESSION['msg1']="OTP verification successful. After admin approval you can login.";
            }else{
                
                echo '<script>window.location.href="index.php"</script>';
                $_SESSION['msg1']="Something went wrong";
            }
    
  }else{
      
        echo '<script>window.location.href="otp_verification.php"</script>';
 $_SESSION['msg']="email not found";
  }
    
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>otp verification</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="upload/logo/5b31fee123fcadokan-sadara-logo.webp" rel="icon" type="image/x-icon">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
      <center></center>
        <a href="#"><b>OTP verification</b></a><br>
<small class="text-danger"> <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; session_unset($_SESSION['msg']);}?></small>

      </div><!-- /.login-logo -->
 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group has-feedback">
              <label>Email</label>
            <input type="text" class="form-control" placeholder="enter email" name="email" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
           <div class="form-group has-feedback">
              <label>OTP</label>
            <input type="text" class="form-control" placeholder="enter otp" name="otp" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
          <input type="submit" value="submit" name="submit">
          <!--<button type="submit"> VERIFY</button>  -->
</form>
  </body>
</html>