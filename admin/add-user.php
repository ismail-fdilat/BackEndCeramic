<?php
include('header.php');
//include('nav.php');
	
	/*$sqlFol1=mysqli_query($conn, "select * from category where created_by='".$admin_id."'");*/
	
	if(isset($_POST['submit']))
	{
// 		print_r($_POST); die;
        $p=$_POST['password'];
		$first=$_POST['firstname'];
		$last=$_POST['lastname'];
		$firstname=$first." ".$last;
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$address=$_POST['address'];
		$mobile=$_POST['mobile'];
		$city=$_POST['city_id'];
		
		


			$insertuser = "INSERT INTO `users`(`user_fname`,`email`,`password`, `mobile`,`address`,`city`,`created_on`,`type`) VALUES ('".$firstname."','".$email."','".$password."','".$mobile."','".$address."','".$city."','".$server_time."','customer')";
// echo $insertuser; die;
			$insertuser1=mysqli_query($conn, $insertuser);
			
			if($insertuser1)
			{
			    $qry="select * from contact_detail";
			    $edata=mysqli_query($conn, $qry);
			    $erow   = mysqli_fetch_row($edata);
			    $fromemail=$erow['email'];
			    
			    $to      = $email;
                $subject = 'New Registration In Ceramic';
                $message = " Hello , $firstname, \r\n Your Registration In Ceramic is Successfull. \r\n Use This Password- $p  \r\n To Login In Your Account.";
                $headers = "From: $fromemail" . "\r\n" .
                             "Reply-To:  $fromemail" . "\r\n" .
                             'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
				
				
				echo '<script language="javascript">';
			    echo 'alert("Customer Account Created Successfully")';
			    echo '</script>';

			    echo "<script>setTimeout(\"location.href = 'view-users.php';\",00);</script>";

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
 .form-control[type="file"] {
    padding: 11px 20px !important;
    margin-bottom: 10px;
}
</style>


 <div class="content-body"> 
 <div class="container-fluid"> 
 <div class="card" >
  <div class="card-body" >
     
   <form role="form" method="post" enctype="multipart/form-data">
	<div class="content-wrapper">
       <section class="content">
          <div class="row">
		     <div class="col-md-12">
		     	<div class="col-md-2"></div>
				 <div class="col-md-8">
					<div class="box box-primary">
                	  <div class="box-header with-border">
                  		<h3 class="box-title">Add User</h3>
                	  </div><!-- /.box-header -->
                
                  <div class="box-body">
         
				  <?php if(isset($msg1))
							{
							?>
								<p style="color:#e74c3c; font-weight:bold" align="center"><i class="fa fa-times"></i> <?php echo $msg1;?></p>
							<?php
							}
							if(isset($sucmsg))
								{
							?>
								<p style="color:#2ecc71; font-weight:bold" align="center"><i class="fa fa-check"></i> <?php echo $sucmsg;?></p>
							<?php
								}
						  ?>
               

                   <div class="form-group">
                   		<div class="row">
                   			<div class="col-md-6">
                   				<label for="exampleInputEmail1">First Name</label>
                     			<input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" required>
                   			</div>

                   			<div class="col-md-6">
                   				<label for="exampleInputEmail1">Last Name</label>
                      			<input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" required>                   				
                   			</div>
                   		</div>
                   </div>

                     
                    <div class="form-group">
                    	<div class="row">
                   		   	<div class="col-md-6">
                      			<label for="exampleInputEmail1">Email</label>
                      			<input type="text" class="form-control" id="email" placeholder="Enter Email" onkeyup="check_email()" name="email" required>
                    		 <small id="result"></small><br><small class="title-error"></small>
                    		</div>

                    		<div class="col-md-6">
                    			<label for="exampleInputEmail1">Password</label>
                      			<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                    		</div>
                    	</div>
                    </div>

                    <div class="form-group">
                    	<div class="row">
                   		   	<div class="col-md-6">
                      			<label for="exampleInputEmail1">Address</label>
                      			<textarea class="form-control" cols="3" id="address" placeholder="Enter Address" name="address" required=""></textarea>
                    		</div>

                    		<div class="col-md-6">
                    			<label for="exampleInputEmail1">Mobile</label>
                      			<input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
                    		</div>
                    	</div>
                    </div>		

                         <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required autocomplete="chrome-off">
                            <input type="hidden" class="form-control" id="city_id" name="city_id">
                       
                        </div>
                
                    <!--<div class="form-group">-->
                    <!--	<div class="row">-->
                    <!--		<div class="col-md-6">-->
                    <!--			<label for="exampleInputEmail1">Profile Picture</label>-->
                    <!--  			<input type="file" class="form-control" name="profile_pic">-->
                    <!--		</div>-->
                    <!--	</div>-->
                    <!--</div>-->


                  <div class="box-footer">
					 <button type="submit" id="addbtn" class="btn btn-primary" name="submit">Add Customer</button>
                  	</div>
                  </div><!-- /.box-body -->

              </div>
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
 		</section>
    </div>
	 
<?php include('footer.php'); ?>



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
 var con ="check_user_email";
 $.ajax({
                url: 'controller.php',
                data: ({ check_email: str, con:con }),
                dataType: 'json', 
                type: 'post',
                success: function(data) {
                   if(data.status == 1)
                   {
                       $(".title-error").css("color", "green");
                       $('#addbtn').prop('disabled', false);
                       $('.title-error').text(data.message); 
                       
                   }
                   else
                   {
                       $(".title-error").css("color", "red");
                       $('#addbtn').prop('disabled', true);
                       $('.title-error').text(data.message); 
                       document.getElementById('addbtn').disabled = true;
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