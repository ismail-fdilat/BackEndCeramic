<?php 

include('header.php');


if(isset($_POST['submit']))
{ 
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	$shop_name=$_POST['shop_name'];
	$bank_name=$_POST['bank_name'];
	$account_number=$_POST['account_number'];
	$ifsc_swift=$_POST['ifsc_swift'];
	if(empty($name))
	{
		$errmsg="Please Enter Your Name";
	}
	elseif(empty($phone))
	{
		$errmsg="Please Enter Your Phone Number";
	}
	elseif(empty($shop_name))
	{
		$errmsg="Please Enter Your shop name";
	}
	
	else
	{
		if($_FILES['imgfile']['name']=='')
		{
		    
		 
// 			$sqlupdate=$conn->query("update seller set sname='".$name."' ,phone='".$phone."', shop_name='".$shop_name."' where seller_id='".$_SESSION['seller_id']."'");
		    
		    $sql="update seller set sname='$name', phone='$phone',bank_name='$bank_name',account_number='$account_number',ifsc_swift='$ifsc_swift' where seller_id='".$_SESSION['seller_id']."' ";
	      
	        $sqlupdate=mysqli_query($conn,$sql);

			if($sqlupdate)
			{
			    
				 echo '<script>window.location.href="profile.php?sucmsg=Your Profile Successfully Updated"</script>';
            
			
			}
			else
			{
				$errmsg="Something Went Wrong ! Try Again";
			}
			
			
		}
		else
		{
			$newname=uniqid().$_FILES['imgfile']['name'];
			$path='upload/seller/'.$newname;
		
		
// 			$sqlupdate=$conn->query("update seller set sname='".$name."', phone='".$phone."', simg='".$newname."' , ,bank_name='".$bank_name."',account_number='".$account_number."',ifsc_swift='".$ifsc_swift."', shop_name ='".$shop_name."' where seller_id='".$_SESSION['seller_id']."'");
		 $sql="update seller set sname='$name', phone='$phone',bank_name='$bank_name',account_number='$account_number',ifsc_swift='$ifsc_swift', simg='$newname' where seller_id='".$_SESSION['seller_id']."' ";
	     
	        $sqlupdate=mysqli_query($conn,$sql);
	
			move_uploaded_file($_FILES['imgfile']['tmp_name'],$path);
			if($sqlupdate)
			{
				
				 echo '<script>window.location.href="profile.php?sucmsg=Your Profile Successfully Updated"</script>';
			
			
			}
			else
			{
				$errmsg="Something Went Wrong ! Try Again";
			}
		}
	}
	
}



?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="card overflow-hidden">
					<div class="text-center p-3 overlay-box " style="background-image: url(images/big/img1.jpg);">
						<div class="profile-photo">
							<?php if($rowuser['simg'] !='')
            				  {
            					  ?>
                                <img src="upload/seller/<?php echo $rowuser['simg']?>" class="img-responsive img-circle" alt="User Image" style="height:200px; width:200px;">
            					<?php
            				  }
            				  else
            				  {
            					  ?>
            					  <img src="dist/img/user.png" class="img-responsive img-circle" alt="User Image" style="height:200px; width:200px;">
            					  <?php
            				  }
            				  ?>
						</div>
						<h3 class="mt-4 mb-1 text-white"><?php echo $rowuser['sname']?></h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between">
						    <span class="mb-0">E-Mail</span> <strong class="text-muted"><?php echo $rowuser['semail']?></strong>
						</li>
						<li class="list-group-item d-flex justify-content-between">
						    <span class="mb-0">Phone Number</span> <strong class="text-muted"><?php echo $rowuser['phone']?></strong>
						 </li>
						<li class="list-group-item d-flex justify-content-between">
						    <span class="mb-0">City</span> <strong class="text-muted"><?php echo $rowuser['city_name']?></strong>
						 </li>
					</ul>
                    
                </div>
                
			</div>
			
			<div class="col-xl-8 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Settings</a>
                                    </li>
                                    <li class="nav-item"><a href="#password" data-bs-toggle="tab" class="nav-link">Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <?php 
                                                if(isset($errmsg))
                        						{
                        						?>
                                                <label for="inputName" class="col-sm-10 control-label" style="color:red; text-align:left"><i class="fa fa-times"></i> <?php echo $errmsg;?></label>
                                                <?php
                        						}
                        						if(isset($_GET['sucmsg']))
                        						{
                        						?>
                                                <label for="inputName" class="col-sm-10 control-label" style="color:green; text-align:left"><i class="fa fa-check"></i> <?php echo $_GET['sucmsg']; ?></label>
                                                <?php
                        						}
                        						?>
                                                 <form role="form" method="post" action="" enctype="multipart/form-data" id="myform"  autocomplete="off" >
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller Unique ID</label>
                                        <input type="text" class="form-control" name="uid" readonly value="<?php echo $rowuser['seller_uid'] ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter New Seller name" name="name" value="<?php echo $rowuser['sname'] ?>" onkeyup="check_username()" required>
                                    <small class="title-error3"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller date</label>
                                        <input type="" class="form-control" id="seller_date" placeholder="Enter Date" value="<?php echo date("d-M-Y", strtotime($rowuser['sdate'])); ?>" readonly name="seller_date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $rowuser['semail']?>" required name="email" readonly required>
                                        <small id="result"></small><br>
                                        <small class="title-error"></small>
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone no.</label>
                                        <input type="tel" class="form-control" id="phone" value="<?php echo $rowuser['phone'] ?>" placeholder="Enter phone number" name="phone" onkeyup="check_phone()" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                        <small class="title-error1"></small>
                                    </div>
                                     
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter Bank Name" value="<?php echo $rowuser['bank_name']?>" id="bank_name" name="bank_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Account Number (IBAN)</label>
                                        <input type="number" class="form-control" placeholder="Enter Account Number" value="<?php echo $rowuser['account_number']?>" id="account_number" name="account_number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">IFSC or Swift Code</label>
                                        <input type="text" class="form-control"  placeholder="Enter IFSC or Swift Code" id="ifsc_swift" value="<?php echo $rowuser['ifsc_swift']?>" name="ifsc_swift" required>
                                    </div>
                                    <!--<div class="col-md-6 mb-3">-->
                                    <!--    <label class="form-label">Day Add</label>-->
                                    <!--    <input type="datetime-local" class="form-control" id="day_add" placeholder="Enter date" name="day_add"  >-->
                                    <!--</div>-->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php echo $rowuser['city_name'] ?>" required autocomplete="chrome-off">                                   
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" value="<?php echo $rowuser['shop_name'] ?>" name="shop_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Location" value="<?php echo $rowuser['location'] ?>"  name="location" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <div class="input-group mb-3">
											<span class="input-group-text">Upload</span>
                                            <div class="form-file">
                                                <input type="file"  id="seller_img" placeholder="" name="imgfile" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Delivery Availability<span style="color:red;font-size:12px"></span></label>
                                       <input type="text" class="form-control" name="availability" value="<?php echo $rowuser['availability']; ?>" readonly >
    								</div>
                                    <button type="submit" id="profile_update" name="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="password" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Password</h4>
                                                <form id="form2" class="form-horizontal" method="post" action="">
                                                    <div class="mb-3">
                                                        <label class="form-label">Old Password</label>
                                                        <input type="password" class="form-control" id="opass" onkeyup="checkpass(<?php echo $_SESSION['seller_id']?>)" placeholder="Password" name="opass" required>
                                                    <small class="title-error"></small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="npass" onkeyup="checknewpass()" placeholder="Password" name="npass" required>
                                                    <small id="passerror"></small>
                                                    </div>
                                                    
                                                    <button type="button" id="addbtn" onclick="updatepass(<?php echo $_SESSION['seller_id'];?>)" class="btn btn-primary" >Submit</button>
                                                </form>
                                                <h3 id=change_pass></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<?php include('footer.php'); ?>
<script>
    $( document ).ready(function() {
    $('#addbtn').addClass("disabled");
});
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
                       $('.title-error1').text(data.message); 
                       
                   }
                   else
                   {
                       $(".title-error1").css("color", "green");
                       $('.title-error1').text(data.message); 
                   }
                  
                }             
            });

}
</script>
<script>
function checkpass(id)
{ 
	var opass=$("#opass").val();
	var user_id=id;
	var con="checsellerkpass";
	$.ajax({
			type:'POST',
			url:'controller.php',
			 dataType: 'json', 
			data:({opass:opass, admin_id:user_id, con:con, }),
			success:function(data){
				if(data.status === 1)
                   {
                       $(".title-error").css("color", "green");
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
		})
}

function checknewpass(){
    
    var opass=$("#opass").val();
    var npass=$("#npass").val();
    if(opass==npass){ 
        $('#addbtn').addClass("disabled");
         $('#addbtn').prop('disabled', true);
         $('#passerror').text("Old Password Can't Be Use As New Password"); 
          $("#passerror").css("color", "red");
    }
    else if(opass!==npass)
    { 
        $('#addbtn').removeClass("disabled");
         $('#addbtn').prop('disabled', false);
          $('#passerror').text("");
    }
}


</script>
<script>

$("#form2").submit(function(e){
    
    e.preventDefault();
});
        function updatepass(id){
            
      var opass=$("#opass").val();
      var npass=$("#npass").val();
          var con="updatepass";
            $.ajax({
    			type:'POST',
    			url:'controller.php',
    			 dataType: 'json', 
    			data:({opass:opass, npass:npass, con:con, id:id }),
    			success:function(data){
    				if(data.status === 1)
                      {
                          $("#change_pass").css("color", "green");
                          $('#change_pass').text(data.message); 
                      }
                      else if (data.status === 0)
                      {
                          $("#change_pass").css("color", "red");
                          $('#change_pass').text(data.message); 
                      }
    			}
    		})
          
      }


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
    $().ready(function() {
  $('[type="file"]').change(function() {
    var fileInput = $(this);
    if (fileInput.length && fileInput[0].files && fileInput[0].files.length) {
      var url = window.URL || window.webkitURL;
      var image = new Image();
      image.onload = function() {
       $("#profile_update").removeClass("disabled");
       $("#img_error").text("");
      };
      image.onerror = function() {
         $("#profile_update").addClass("disabled");
         $("#img_error").text("Please Upload Valid Image");
          $("#img_error").css("color", "red");
         
      };
      image.src = url.createObjectURL(fileInput[0].files[0]);
    }
  });
});
</script>
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