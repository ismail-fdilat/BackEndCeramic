<?php include('config.php');


        $all_city=mysqli_query($conn,"SELECT cities.* 
                                        FROM cities 
                                        LEFT JOIN states ON cities.state_id=states.id
                                        LEFT JOIN countries ON states.country_id=countries.id
                                        WHERE countries.id='191'");
        $ry = array();
        while ($row = mysqli_fetch_array($all_city,MYSQLI_ASSOC))
        {
            $ry[] = $row;   
        } 
        
        $_json = json_encode($ry);

?>

<?php 
if(isset($_POST['submit']))
{
$name=$_POST['name'];
 
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  //to protect password 
  $pass=(md5($_POST['password']));
 
  $seller_uid=$_POST['uid'];
   $phone=$_POST['phone'];
// 	$paypal=$_POST['paypal'];
//	$dayadd=$_POST['day_add'];
	$city=$_POST['city_id'];
	$shopname=$_POST['shop_name'];
	$location=$_POST['location'];
	$availability=$_POST['availability'];
    $bankname=$_POST['bank_name'];
    $accountnumber=$_POST['account_number'];
    $ifscswift=$_POST['ifsc_swift'];
    $seller_date=$_POST['seller_date'];
 
 
 	$sql="select semail from seller where semail='{$email}'";
  $result=mysqli_query($conn , $sql);
  if(mysqli_num_rows($result)>0)
  {
    $msg1="email name already exits";
  }
  else
  
  { 
     $image=uniqid().$_FILES['seller_img']['name'];
    
     move_uploaded_file($_FILES['seller_img']['tmp_name'],"../seller/upload/seller/".$image);
  
      
$otp=rand(1000,9999);
$to="$email";
$subject='otp-verification';
// $headers.="use this otp to verify yourself as a seller";
$message="your verification otp is:$otp";
 $headers="cc:adarshprakash80@gmail.com";
// var_dump($to,$subject,$message); die;
if(mail($to, $subject, $message,$headers))
{
      

    $sql1="insert into seller (sname,seller_uid ,semail , phone , pass ,availability,city,shop_name,location,bank_name,account_number,ifsc_swift,simg,otp,sdate) values('$name' ,'$seller_uid','$email' ,'$phone' ,'$pass','$availability','$city','$shopname','$location','$bankname','$accountnumber','$ifscswift','$image','$otp','$seller_date')";
   
    if(mysqli_query($conn , $sql1))
    {
      
        echo '<script>window.location.href="otp_verification.php"</script>';
        $_SESSION['msg']="Register successful. Enter otp sent on your mail to verify your email.";
    }
}else{
     echo '<script>window.location.href="createseller.php"</script>';
      $_SESSION['msg']="Something went wrong.";
}
      
    
  }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register as new seller</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="upload/logo/5b31fee123fcadokan-sadara-logo.webp" rel="icon" type="image/x-icon">
    
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    
    <link href="../assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

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
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
  </head>
    <body class="">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content my-4">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
    									<div class="text-center mb-3">
    										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
    									</div>
                                        <h4 class="text-center mb-4">Seller Registration</h4>
                                        <?php if(isset($msg1)){ ?>
                                        <p class="text-danger" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
                                        <?php } ?>
                                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                             <div class="mb-3">
                                                <label class="mb-1"><strong>Seller unique id</strong></label>
                                                <input type="text" class="form-control" name="uid" value="<?php echo substr(sha1(mt_rand()),17,8)?>" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Seller Name</strong></label>
                                                <input type="text" class="form-control" id="name" name="name"  onkeyup="check_username()" required>
                                                <small class="title-error3"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" class="form-control" id="email" name="email" onkeyup="check_email()" required>
                                            <small class="title-error"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Phone Number</strong></label>
                                                <input type="text" class="form-control" id="phone" name="phone" onkeyup="check_phone()" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                            <small class="title-error1"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" class="form-control" id="password"  name="password"  required>
                                            </div>
                                              <div class="mb-3">
                                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                                <input type="password" class="form-control" id="confirm_password" onkeyup="checkpass()" name="cpassword" required>
                                            <small id="checkpass"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Seller Date</strong></label>
                                                <input type="datetime-local" class="form-control" id="seller_date" placeholder="Enter Date" name="seller_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Account Number (IBAN)</strong></label>
                                                <input type="number" class="form-control" placeholder="Enter Account Number"  id="account_number" name="account_number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>IFSC or Swift Code</strong></label>
                                                <input type="text" class="form-control"  placeholder="Enter IFSC or Swift Code" id="ifsc_swift" name="ifsc_swift" required>
                                            </div>
                                            <!--<div class="mb-3">-->
                                            <!--    <label class="mb-1"><strong>Day Add</strong></label>-->
                                            <!--    <input type="datetime-local" class="form-control" id="day_add" placeholder="Enter date" name="day_add"  >-->
                                            <!--</div>-->
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>City</strong></label>
                                                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
                                        <input type="hidden" class="form-control" id="city_id" name="city_id">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Shop Name</strong></label>
                                                <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name" required>
                                          
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Location</strong></label>
                                                <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" required>
                                            </div>
                                            <div class="input-group mb-3">
    											<span class="input-group-text">Commercial registration Image</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control" id="seller_img" placeholder="Seller image" name="seller_img" required>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <select id="availability" name="availability" class="default-select form-control wide mb-3" onchange="enableButton()" required>
        											<option selected disabled>Select availability</option>
        											<option value="yes">Yes</option>
        											<option value="no">No</option>
        										</select>
        									</div>
                                            
                                            <div class="text-center">
                                                <button type="submit" id="addbtn" name="submit" class="btn btn-primary btn-block">Sign In</button>
                                                <a href="index.php">Already have an Account?</a>
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
      
      
      
      
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../assets/vendor/global/global.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/deznav-init.js"></script>
    <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../assets/js/styleSwitcher.js"></script>
	
	<script>
    $(document).ready(function(){
    $('#addbtn').attr('disabled',true);
    $('#city').keyup(function(){
        if($("#city_id").val().length !=0)
            $('#addbtn').attr('disabled', false);            
        else
            $('#addbtn').attr('disabled',true);
    })
});
</script>
    <script>
    function check_username(){
        var str = $('#name').val();
        $.ajax({
                url: 'check_email.php',
                data: ({ name: str }),
                dataType: 'json', 
                type: 'post',
                success: function(data) {
                   if(data.status == 1)
                   {
                       $(".title-error3").css("color", "red");
                       $('#addbtn').prop('disabled', true);
                       $('.title-error3').text(data.message); 
                       document.getElementById('addbtn').disabled = true;
                   }
                   else
                   {
                       $(".title-error3").css("color", "green");
                       $('#addbtn').prop('disabled', false);
                       $('.title-error3').text(data.message); 
                       
                   }
                  
                }             
            });
    }
</script>
<script>
//check email already exist or not
function check_email(){
 var str = $('#email').val();

 $.ajax({
                url: 'check_email.php',
                data: ({ email: str }),
                dataType: 'json', 
                type: 'post',
                success: function(data) {
                   if(data.status == 1)
                   {
                       $(".title-error").css("color", "red");
                       $('#addbtn').prop('disabled', true);
                       $('.title-error').text(data.message); 
                       document.getElementById('addbtn').disabled = true;
                   }
                   else
                   {
                       $(".title-error").css("color", "green");
                       $('#addbtn').prop('disabled', false);
                       $('.title-error').text(data.message); 
                       
                   }
                  
                }             
            });

}
</script>
<script>


//check phone no. already exist or not
function check_phone(){
 var str = $('#phone').val();

 $.ajax({
                url: 'check_email.php',
                data: ({ phone: str }),
                dataType: 'json', 
                type: 'post',
                success: function(data) {
                   if(data.status == 1)
                   {
                       $(".title-error1").css("color", "red");
                       $('#addbtn').prop('disabled', true);
                       $('.title-error1').text(data.message); 
                       document.getElementById('addbtn').disabled = false;
                   }
                   else
                   {
                       $(".title-error1").css("color", "green");
                       $('#addbtn').prop('disabled', false);
                       $('.title-error1').text(data.message); 
                   }
                  
                }             
            });

}
</script>
<script>
    
    function checkpass(){
        var pass= document.getElementById("password").value;
        var cpass=document.getElementById("confirm_password").value;
    
if(pass==cpass){
    document.getElementById('checkpass').style.color = 'green';
    document.getElementById('checkpass').innerHTML = 'Password matched';
    document.getElementById('addbtn').disabled = false;
}else{
     document.getElementById('checkpass').style.color = 'red';
    document.getElementById('checkpass').innerHTML = 'Password does not matched';
    document.getElementById('addbtn').disabled = true;
}
    }
    
</script>

 <script>

const city_n=<?php echo $_json?>;

const variable = autocomplete(document.getElementById("city"), city_n);
         console.log(variable);

$(function () {
    var minlength = 3;

    $("#city").keyup(function () {
        
        var this_var = $("#city").val();
        
        

        if (this_var.length >= minlength ) {
            var searchArray = function(arr, regex) {
              var matches=[], i;
              for (i=0; i<arr.length; i++) {
                if (arr[i]['city_name'].match(regex)) matches.push(arr[i]);
              }
              console.log(matches);
              return matches;
            };
            const value_arr = searchArray(city_n, this_var);
            
        }
    });
});

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i]['city_name'].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          b.classList.add('cursor-pointer');
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i]['city_name'].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i]['city_name'].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i]['id'] + "'>";
          b.innerHTML += "<input type='hidden' value='" + arr[i]['city_name'] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              
              /*insert the value for the autocomplete text field:*/
              document.getElementById("city_id").value = this.getElementsByTagName("input")[0].value;
              inp.value = this.getElementsByTagName("input")[1].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
 </script>

<script>
   $(document).ready(function () {
    $('#addbtn').attr('disabled', 'disabled');
    $('#availability').change(function () {
        if ($('.dropdown').val() == 0) {
            $('#addbtn').attr('disabled', 'disabled');
        } else {
            $('#addbtn').removeAttr('disabled');
        }
    });

});
</script>
  </body>
</html>
