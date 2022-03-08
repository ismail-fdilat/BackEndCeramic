<?php include"config.php";
if(!isset($_SESSION['data'])){
    $_SESSION['d_msg'] = 'Session Expired';
    header("Location:index.php");
}

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
    <title>Driver - Edit Profile</title>

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
                    <h2 class="title text-center">Edit Profile</h2>
                    <form method="POST" action="controller.php" enctype="multipart/form-data">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="name">Name</label>
                                    <input class="input--style-1" id="name" value="<?php echo $_SESSION['data']['name']?>" type="text" name="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="Surname">Surname</label>
                                    <input class="input--style-1" name="surname" id="Surname" value="<?php echo $_SESSION['data']['surname'];?>"  type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                                </div>
                            </div>
                        
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="contact">Contact Number</label>
                                    <input class="input--style-1" value="<?php echo $_SESSION['data']['phone'];?>" onkeyup="check_phone()" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required id="contact" type="tel" name="phone">
                                 <small class="title-error1"></small>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="email">Email</label>
                                    <input class="input--style-1" value="<?php echo $_SESSION['data']['email'];?>" readonly type="email" name="email">
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">Company Name</label>
                                    <input class="input--style-1" value="<?php echo $_SESSION['data']['company'];?>"  type="text" name="company">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">City</label>
                                     <input class="input--style-1" type="text" value="<?php echo $_SESSION['data']['city'];?>" id="city" name="city" autocomplete="chrome-off" required>
                                     <input type="hidden" class="form-control" id="city_id" value="<?php echo $_SESSION['data']['city_id'];?>" name="city_id">
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">Date of Birth</label>
                                    <input class="input--style-1" value="<?php echo $_SESSION['data']['dob'];?>"  type="date" name="dob">
                                </div>
                            </div>
                            
                            <div class="col-3 input-group">
                                <label for="opassword">Old Password</label>
                                <input class="input--style-1" type="Password" id="opass" onkeyup="checkpass('<?php echo $_SESSION['driver_id']?>'),checkpass1()" name="opass" >
                                <small class="title-error2"></small>
                            </div>
                            <div class="col-3 input-group">
                                <label for="npass">New Password</label>
                                <input class="input--style-1" type="Password" id="npass" name="npass" onkeyup="checkpass1()" >
                                <samll id="checkpass1"></samll>
                            </div>
                            
                            <div class="col-3 input-group">
                                <label for="cpass">Confirm Password</label>
                                <input class="input--style-1" type="Password" id="cpass" onkeyup="match_pass()" name="cpass" >
                                    <small id='checkpass'></small>
                            </div>
                            
                            <div class="col-12">
                                <label for="">Document</label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="file" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <input type="hidden" name="driver_id" value="<?php echo $_SESSION['driver_id'];?>" >
                                        <div id="imagePreview" style="background-image: url('images/<?php echo $_SESSION['data']['image'];?>')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 p-t-20 text-center">
                                <button class="btn btn--radius btn--green col-12" id="addbtn" name="update" type="submit">Update</button>
                            </div>
                            
                           
                            
                            
                        </div>

                        
                        
                    </form>
                     <div class="col-2 p-t-20 col-12 text-center">
                                <a href="logout.php" class="btn btn--radius btn--danger col-12"> Logout</a>
                            </div>
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
        function checkpass(id){
            var str = $('#opass').val();

 $.ajax({
                url: 'controller.php',
                data: ({ check_pass: str,driver_id:id }),
                dataType: 'json', 
                type: 'post',
                success: function(data) {
                   if(data.status == 1)
                   {
                       $(".title-error2").css("color", "green");
                       $('#addbtn').prop('disabled', true);
                       $('.title-error2').text(data.message); 
                       document.getElementById('addbtn').disabled = false;
                       document.getElementById('addbtn').classList.remove('disabled');
                   }
                   else
                   {
                       $(".title-error2").css("color", "red");
                       $('#addbtn').prop('disabled', false);
                       $('.title-error2').text(data.message); 
                       document.getElementById('addbtn').classList.add('disabled');
                   }
                  
                }             
            });

        }
    </script>
    
    <script>
        
function checkpass1()
{
    var opass= document.getElementById("opass").value;
    var npass=document.getElementById("npass").value;

    if(opass==npass){ 
        document.getElementById('checkpass1').style.color = 'red';
        document.getElementById('checkpass1').innerHTML = "Old Password Can't Be use as New Password";
         document.getElementById('addbtn').disabled = true;
         document.getElementById('addbtn').classList.add('disabled');
         
    }else{
        //  document.getElementById('checkpass').style.color = 'green';
         document.getElementById('checkpass1').innerHTML = '';
        document.getElementById('addbtn').disabled = false;
        document.getElementById('addbtn').classList.remove('disabled');
        }
}
        
    </script>
   

<script>
function match_pass(){
    
    var npass= document.getElementById("npass").value;
        var cpass=document.getElementById("cpass").value;
        // var opass=document.getElementById("opass").value;
if(cpass == npass){
    document.getElementById('checkpass').style.color = 'green';
    document.getElementById('checkpass').innerHTML = 'Confirm Password Matched';
    document.getElementById('addbtn').disabled = false;
    document.getElementById('addbtn').classList.remove('disabled');
}else {
    document.getElementById('checkpass').style.color = 'red';
    document.getElementById('checkpass').innerHTML = 'Confirm Password Not Matched';
    document.getElementById('addbtn').disabled = true;
    document.getElementById('addbtn').classList.add('disabled');
    }
}    
    
</script>

    <script type="text/javascript">
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
          fileChosen.textContent = this.files[0].name
        })
    </script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
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
</body>

</html>
