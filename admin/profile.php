<?php 
include('header.php');

if(isset($_POST['submit']))
{
    
	$name=$_POST['name'];
	$last_name=$_POST['lastname'];
	$phone_number=$_POST['phone'];
	$whatsapp_number=$_POST['whatsapp_number'];
	
	if(empty($name))
	{
		$errmsg="Please Enter Your Name";
	}
	elseif(empty($last_name))
	{
		$errmsg="Please Enter Your lastname";
	}

	elseif(empty($phone_number))
	{
		$errmsg="Please Enter Your Phone Number";
	}
	elseif(empty($whatsapp_number))
	{
		$errmsg="Please Enter Your whatsapp number";
	}
	
	else
	{
		if($_FILES['img']['name']=='')
		{
		
			$update="update tbl_admin set name='$name' , lastname='$last_name' , phone='$phone_number' , whatsapp_number='$whatsapp_number' where id=".$_SESSION['admin_id']." ";
		  
		    $sqlupdate=mysqli_query($conn, $update);	
			if($sqlupdate)
			{
					echo '<script language="javascript">';
			        echo 'alert("Your Profile Successfully Updated")';
			        echo '</script>';

			        echo "<script>setTimeout(\"location.href = 'profile.php';\",00);</script>";
			}
			else
			{
				$errmsg="Something Went Wrong ! Try Again";
			}
			
			
		}
		else
		{
			$newname=uniqid().$_FILES['img']['name'];
			$path='upload/admin/'.$newname;
			
		
		
			$update="update tbl_admin set name='$name' , lastname='$last_name' , phone='$phone_number' , img='$newname' , whatsapp_number='$whatsapp_number' where id=".$_SESSION['admin_id']." ";
		    $sqlupdate=mysqli_query($conn, $update);	
	
			move_uploaded_file($_FILES['img']['tmp_name'],$path);
			if($sqlupdate)
			{
				
					echo '<script language="javascript">';
			        echo 'alert("Your Profile Successfully Updated")';
			        echo '</script>';

			        echo "<script>setTimeout(\"location.href = 'profile.php';\",00);</script>";
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
							<?php if($rowuser['img'] !='')
            				  {
            					  ?>
                                <img src="upload/admin/<?php echo $rowuser['img']?>" class="img-fluid rounded-circle" alt="User Image" style="height:100px; width:100px;object-fit: cover;">
            					<?php
            				  }
            				  else
            				  {
            					  ?>
            					  <img src="dist/img/user.png" class="img-fluid rounded-circle" alt="User Image" style="height:100px; width:100px;object-fit: cover;">
            					  <?php
            				  }
            				  ?>
						</div>
						<h3 class="mt-4 mb-1 text-white"><?php echo $rowuser['name']?></h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">E-Mail</span> <strong class="text-muted"><?php echo $rowuser['email']?></strong></li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Phone Number</span> <strong class="text-muted"><?php echo $rowuser['phone']?></strong></li>
						<!--<a class="btn btn-primary mb-1 me-1"><?php echo $rowuser['email']?></a>
					    <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal"><?php echo $rowuser['phone']?></a>-->
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
                                                <?php if(isset($errmsg)) { ?>
                                                    <p class="col-sm-10 control-label" style="color:red; text-align:left"><?php echo $errmsg;?></p>
                                                <?php } ?>
                                                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="inputName" value="<?php echo $rowuser['name']?>" name="name" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="inputName" value="<?php echo $rowuser['lastname']?>" name="lastname" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="inputName" value="<?php echo $rowuser['email']?>" name="email" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="tel" class="form-control" id="inputEmail" value="<?php echo $rowuser['phone']?>" name="phone" maxlength=12 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">WhatsApp Number</label>
                                                        <input type="tel" class="form-control" id="inputName" value="<?php echo $rowuser['whatsapp_number']?>" name="whatsapp_number" maxlength=12 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                                    </div>
                                                    
                                                    <div class="input-group mb-3">
            											<span class="input-group-text">Image Upload</span>
                                                        <div class="form-file">
                                                            <input type="file" name="img" accept="image/*" class="form-file-input form-control">
                                                        </div>
                                                    
                                                    </div>
                                                    <button type="submit" id="update_profile" class="btn btn-primary" name="submit">Submit</button>
                                                     <small id="img_error"></small>
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
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="opass" placeholder="Old Password" onkeyup="checkpass(<?php echo $_SESSION['admin_id']?>)" name="o_pass">
                                                   <small class="title-error"></small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="npass" onkeyup="checknewpass()" placeholder="New Password" name="n_pass">
                                                    <small class="title-error1"></small>
                                                      <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>" >
                                                    </div>
                                                
                                                    <button type="btn" id="addbtn" class="btn btn-primary" onclick="updatepass(<?php echo $_SESSION['admin_id'];?>)">Submit</button>
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
function checkpass(id)
{ 
	var opass=$("#opass").val();
	var user_id=id;
	var con="checkpass";
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
                       $('.title-error').text(data.message); 
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
         $('.title-error1').text("Old Password Can't Be Use As New Password"); 
          $(".title-error1").css("color", "red");
    }
    else if(opass!==npass)
    {
        $('#addbtn').removeClass("disabled");
         $('#addbtn').prop('disabled', false);
          $('.title-error1').text("");
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
    $().ready(function() {
  $('[type="file"]').change(function() {
    var fileInput = $(this);
    if (fileInput.length && fileInput[0].files && fileInput[0].files.length) {
      var url = window.URL || window.webkitURL;
      var image = new Image();
      image.onload = function() {
       $("#update_profile").removeClass("disabled");
       $("#img_error").text("");
      };
      image.onerror = function() {
         $("#update_profile").addClass("disabled");
         $("#img_error").text("Please Upload Valid Image");
          $("#img_error").css("color", "red");
         
      };
      image.src = url.createObjectURL(fileInput[0].files[0]);
    }
  });
});
</script>