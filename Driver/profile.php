<?php include"config.php";
if(!isset($_SESSION['data'])){
    $_SESSION['d_msg'] = 'Session Expired';
    header("Location:index.php");
}

?>
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
    <title>Driver - Sign up</title>

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
                    <?php if(isset($_SESSION['d_msg'])){echo ' <h3 class="title text-center">'.$_SESSION['d_msg'].'</h3>'; session_unset($_SESSION['d_msg']);}?>
                   
                    <h2 class="title text-center">My Profile</h2>
                     <?php if(isset($_SESSION['driver_username'])){echo '<div style="text-align:center;"><h4> Welcome '.$_SESSION['driver_username'].'</h4></div><br><br>';}?>
                    <form id="commentForm">
                        <fieldset>
                            <div class="row row-space">
                                <div class="col-2 input-group">
                                    <label for="name">Name</label>
                                    <input class="input--style-1" id="name" value="<?php echo $_SESSION['data']['name'];?>" type="text" name="name" readonly required>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="Surname">Surname</label>
                                    <input class="input--style-1" id="Surname" value="<?php echo $_SESSION['data']['surname'];?>" type="text" name="surname" readonly required>
                                </div>
                            
                                <div class="col-2 input-group">
                                    <label for="contact">Contact Number</label>
                                    <input class="input--style-1" id="contact" value="<?php echo $_SESSION['data']['phone'];?>" type="text" name="contact" readonly required>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="email">Email</label>
                                    <input class="input--style-1" type="email" id="email" value="<?php echo $_SESSION['data']['email'];?>" name="email" readonly required>
                                </div>

                                <div class="col-2 input-group">
                                    <label for="">City</label>
                                    <input class="input--style-1" type="text" value="<?php echo $_SESSION['data']['city'];?>" name="city" readonly>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="">Company Name</label>
                                    <input class="input--style-1" type="text" value="<?php echo $_SESSION['data']['company'];?>" name="company" readonly required>
                                </div>
 
                                <div class="col-2 input-group">
                                    <label for="dob">Date of Birth</label>
                                    <input class="input--style-1" type="date" value="<?php echo $_SESSION['data']['dob'];?>" id="dob" name="dob" readonly required>
                                </div>
                                
                                <div class="col-2">
                                    <label for="">Document</label>
                                    <div class="input-group fileUpload">
                                       <img src="images/<?php echo $_SESSION['data']['image'];?>" style="height:100px;" >
                                    </div>
                                </div>
                                
                                 <div class="col-2 p-t-20 text-center">
                                    <a href="edit_profile.php" class="edit-btn btn btn--radius btn--blue col-12"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </div>
                                
                                 <div class="col-2 p-t-20 text-center">
                                    <!--<button class="btn btn--radius btn--danger col-12" type="submit">Logout</button>-->
                                     <a href="logout.php" class="btn btn--radius btn--danger col-12"> Logout</a>
                                </div>
                                
                            </div>
                            
                            
                        </fieldset>
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
    <script src="js/jquery.validate.min.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <script type="text/javascript">
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
          fileChosen.textContent = this.files[0].name
        })
        
        $(document).ready(function() {
		    $("#commentForm").validate({
		        rules: {
                    contact: {
                      required: true,
                      minlength: 12,
                      maxlength: 12
                    },
                    dob: {
                      required: true,
                      date: true
                    },
                    email: {
                      required: true,
                      email: true
                    }
                }
		    });
        });
    </script>
    
    

</body>

</html>
