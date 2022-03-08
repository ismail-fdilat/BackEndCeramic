<?php 

include"config.php";

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .cursor-pointer{
            cursor:pointer;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title text-center">Ceramic Registration</h2>
                    <form id="commentForm" action="controller.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="row row-space">
                                <div class="col-2 input-group">
                                    <label for="name">Name</label>
                                    <input class="input--style-1" id="name" type="text" name="name" autocomplete="chrome-off" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="Surname">Surname</label>
                                    <input class="input--style-1" id="Surname" type="text" name="surname" autocomplete="chrome-off"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                </div>
                            
                                <div class="col-2 input-group">
                                    <label for="contact">Contact Number</label>
                                    <input class="input--style-1" id="phone" type="text" name="contact" autocomplete="chrome-off" onkeyup="check_phone()" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                               <small class="title-error1"></small>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="email">Email</label>
                                    <input class="input--style-1" type="email" id="email" autocomplete="chrome-off" onkeyup="check_email()"  name="email" required>
                                     <small id="result"></small><br>
                                     <small class="title-error"></small>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="input--style-1" id="password" autocomplete="chrome-off"  name="password" required>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="">Confirm Password</label>
                                    <input class="input--style-1" type="Password" name="confirm_password" autocomplete="chrome-off"  id="confirm_password" onkeyup="checkpass()" required>
                                <small id='checkpass'></small>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="">City</label>
                                    <input class="input--style-1" type="text" id="city" name="city" autocomplete="chrome-off" required>
                                     <input type="hidden" class="form-control" id="city_id" name="city_id">
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="">Company Name</label>
                                    <input class="input--style-1" type="text" name="company" autocomplete="chrome-off" required>
                                </div>
                                
                                <div class="col-2 input-group">
                                    <label for="dob">Date of Birth</label>
                                    <input class="input--style-1" type="date" id="dob" autocomplete="chrome-off"  name="dob" required>
                                </div>
                                
                                <div class="col-2">
                                    <label for="">Document</label>
                                    <div class="input-group fileUpload">
                                        <input type="file" id="actual-btn" name="file" hidden/>
                                        <label style="display: inline;" for="actual-btn">Any Document</label>
                                        <span id="file-chosen">No file chosen</span>
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="p-t-20 text-center">
                                
                                <!--<input class="submit btn btn--radius btn--green" id="addbtn" name="submit" type="submit" value="Submit">-->
                                <button type="submit" id="addbtn" name="submit" class="submit btn btn--radius btn--green">Submit</button>

                            </div>
                            <p class="text-center mt-4"><b> Already have an account?  <a href="index.php"> Login </a></b></p>
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
    <!--<script src="js/jquery.validate.min.js"></script>-->

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
//check email already exist or not
function check_email(){
 var str = $('#email').val();

 $.ajax({
                url: 'controller.php',
                data: ({ check_email: str }),
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
                url: 'controller.php',
                data: ({ check_phone: str }),
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
    $(document).ready(function(){
    $('#addbtn').attr('disabled',true);
    $('#city').keyup(function(){ 
        if($("#city_id").val().length !=0){
            $('#addbtn').attr('disabled', false);}            
        else{
            $('#addbtn').attr('disabled',true);}
    })
});
</script>
</body>

</html>
