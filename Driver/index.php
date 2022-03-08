<?php include"config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title>Driver - Sign in</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title text-center">Ceramic Login</h2>
                    <?php if(isset($_SESSION['d_msg'])){echo '<h3>'.$_SESSION['d_msg'].'</h3>'; session_unset($_SESSION['d_msg']); }?>
                    <br>
                    <form method="post" action="controller.php">
                        
                        <div class="col-1">
                            <div class="input-group">
                                <label for="name">Email</label>
                                <input class="input--style-1" id="email" type="email" autocomplete="nope" name="email" required>
                                <small id="result"></small><br>
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="input-group">
                                <label for="Surname">Password</label>
                                <input class="input--style-1" id="password" type="password" name="password" required>
                            </div>
                        </div>
                        
                        <div class="p-t-20 text-center">
                            <button class="btn btn--radius btn--green" name="login" type="submit">Login</button>
                        </div>
                    <p class="text-center mt-4"><b> New user? <a href="sign_up.php"> Create an account</a></b></p> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script>
// check email is valid or not

    function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  const $result = $("#result");
  const email = $("#email").val();
  $result.text("");

  if (validateEmail(email)) {
    // $result.text(email + " is valid email");
    $result.css("color", "green");
  } else {
    $result.text(email + " is not valid valid email ");
    $result.css("color", "red");
  }
  return false;
}

$("#email").on("input", validate);
</script>
</body>

</html>
