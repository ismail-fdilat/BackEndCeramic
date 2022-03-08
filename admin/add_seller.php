<?php include('header.php');?>

<?php
if(isset($_POST['submit'])){


	
$seller_uid=$_POST['uid'];
	$name=$_POST['name'];
	$sellerdate=$_POST['seller_date'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
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


 	$image=rand(10000,99999).$_FILES['seller_img']['name'];




$sqlusers=mysqli_query($conn,"select * from seller where email='$email'");
$userscount1=mysqli_num_rows($sqlusers);

$sqlusers1=mysqli_query($conn,"select * from seller where phone='$phone'");
$userscount2=mysqli_num_rows($sqlusers1);

$sqlusers2=mysqli_query($conn,"select * from seller where sname='$name'");
$userscount3=mysqli_num_rows($sqlusers2);

if($userscount1)
{
    
    $msg="Entered email is already in use.";

		 echo '<script>window.location.href="view-seller.php"</script>';
		 $_SESSION['msg2']="Entered email is already in use.";
    
}
elseif($userscount2)
{
     $msg="Entered phone number is already in use.";

		 echo '<script>window.location.href="view-seller.php"</script>';
		 	 $_SESSION['msg2']="Entered phone number is already in use.";
}
elseif($userscount3)
{
     	 $_SESSION['msg2']="Entered Username is already in use.";

		 echo '<script>window.location.href="view-seller.php"</script>';
}else{

	    move_uploaded_file($_FILES['seller_img']['tmp_name'],"../seller/upload/seller/".$image);
        $insertseller = "INSERT INTO `seller`(`sname`,`seller_uid`,`sdate`,`semail`,`pass`,`phone`,`availability`,`city`,`shop_name`,`location`,`bank_name`,`account_number`,`ifsc_swift`,`simg`) VALUES ('".$name."','".$seller_uid."','".$sellerdate."','".$email."','".$password."','".$phone."','".$availability."','".$city."','".$shopname."','".$location."','".$bankname."','".$accountnumber."','".$ifscswift."','".$image."')";
    
	$insert = mysqli_query($conn,$insertseller);



	if($insert){

		$msg="Seller added successfully.";

		 echo '<script>window.location.href="view-seller.php"</script>';
		 
$_SESSION['msg2']="seller added successfuly";
		}

	
}
	

}

?>

<?php 
$all_city=mysqli_query($conn,"SELECT cities.* 
FROM cities 
LEFT JOIN states ON cities.state_id=states.id
LEFT JOIN countries ON states.country_id=countries.id
WHERE countries.id='191'");
$ry = array();
while ($row = mysqli_fetch_array($all_city,MYSQLI_ASSOC)){
$ry[] = $row;   
} 
$_json = json_encode($ry);

?>



<style>
  .error
  {
    color: red;
  }
  
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button 
    {
    -webkit-appearance: none;
    margin: 0;
     }
     #city{
  width: 300px;
  padding: 7px;
  text-align: left;
}
.autocomplete-suggestions { text-align: left; border: 1px solid #999; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 5px 5px; white-space: nowrap; overflow: hidden; cursor: pointer;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


<div class="content-body">
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        	<h2 class="mb-3 me-auto">Add Seller</h2>
        </div>
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                           
                            <form role="form" method="post" action="" enctype="multipart/form-data" id="myform"  autocomplete="off" >
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller Unique ID</label>
                                        <input type="text" class="form-control" name="uid" readonly value="<?php echo substr(sha1(mt_rand()),17,8)?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter New Seller name" name="name" onkeyup="check_username()" required>
                                    <small class="title-error3"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller date</label>
                                        <input type="datetime-local" class="form-control" id="seller_date" placeholder="Enter Date" name="seller_date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" onkeyup="check_email()"   required>
                                        <small id="result"></small><br>
                                        <small class="title-error"></small>
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone no.</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone" onkeyup="check_phone()" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                        <small class="title-error1"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="confirm password" name="cpassword" onkeyup="checkpass()" required>
                                   <small id='checkpass'></small>
                                    </div>
                                     
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter Bank Name" id="bank_name" name="bank_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Account Number (IBAN)</label>
                                        <input type="number" class="form-control" placeholder="Enter Account Number"  id="account_number" name="account_number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">IFSC or Swift Code</label>
                                        <input type="text" class="form-control"  placeholder="Enter IFSC or Swift Code" id="ifsc_swift" name="ifsc_swift" required>
                                    </div>
                                    <!--<div class="col-md-6 mb-3">-->
                                    <!--    <label class="form-label">Day Add</label>-->
                                    <!--    <input type="datetime-local" class="form-control" id="day_add" placeholder="Enter date" name="day_add"  >-->
                                    <!--</div>-->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required autocomplete="chrome-off">
                                        <input type="hidden" class="form-control" id="city_id" name="city_id">
                                   
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <div class="input-group mb-3">
											<span class="input-group-text">Upload</span>
                                            <div class="form-file">
                                                <input type="file"  id="seller_img" placeholder="" name="seller_img" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Delivery Availability<span style="color:red;font-size:12px"></span></label>
                                         <select id="availability" name="availability" class="default-select form-control wide mb-3" onchange="enableButton()" required>
        											<option selected disabled>Select availability</option>
        											<option value="yes">Yes</option>
        											<option value="no">No</option>
        										</select>
    								</div>
                                    
                                    <!--<input type="submit" id="addbtn" class="btn btn-primary" name="submit" value="Add Seller">-->
                                    <button type="submit" id="addbtn" name="submit" class="btn btn-primary btn-block">Add Seller</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>












<script>
    $(document).ready(function(){
    $('#addbtn').attr('disabled','disabled');
    $('#city').keyup(function(){
        if($("#city_id").val()==0)
            $('#addbtn').attr('disabled', 'disabled');            
        else
            $('#addbtn').removeAttr('disabled');
    })
});
</script>
<script>
   $(document).ready(function () {
    $('#addbtn').attr('disabled', 'disabled');
    $('#availability').change(function () {
        if ($('#availability').val() == 0) {
            $('#addbtn').attr('disabled', 'disabled');
        } else {
            $('#addbtn').removeAttr('disabled');
        }
    });

});
</script>

<script>
$(document).ready(function(){
     $('#myform').validate({ // initialize the plugin
        rules: {
            name: {
                required: true,
               // email: true
            },
            Password: {
            required: true,
            minlength: 5
        },
        phone: {
            required: true,
            minlength: 10,
            maxlength : 12,
        },
         cpassword: {
              required: true,
              minlength: 5,
              equalTo: "#Password"
          }
        },
         messages: {
            name: "Enter your First Name",
            // lastname: "Enter your Last Name",
            // email: {
            //     required: "Enter your Email",
            //     email: "Please enter a valid email address.",
            // }
        },
        submitHandler: function (form) { 
            form.submit();
          // return true; 
        }
    });
});

  


</script>



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
    $result.text(email + " is valid email");
    $result.css("color", "green");
  } else {
    $result.text(email + " is not valid valid email ");
    $result.css("color", "red");
  }
  return false;
}

$("#email").on("input", validate);
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



<?php include('footer.php'); ?>