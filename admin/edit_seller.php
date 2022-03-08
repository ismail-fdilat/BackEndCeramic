<?php 
include('header.php');

// include('nav.php');

;?>

<?php
 
 if($_GET['seller_id'])
 {
    $sid = $_GET['seller_id'];
    $edit_sql = "SELECT * FROM seller where seller_id=$sid";

    $sellers = mysqli_query($conn,$edit_sql);
    $sellerdata = mysqli_fetch_assoc($sellers); 
    if(empty($sellerdata))
    {
        echo '<script>window.location.href="view-seller.php"</script>';
    }
 }

if(isset($_POST['submit'])){

	
	$name=$_POST['name'];
	$sellerdate=$_POST['seller_date'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$cpassword=md5($_POST['cpassword']);
	$phone=$_POST['phone'];
	$paypal=$_POST['paypal'];
	$dayadd=$_POST['day_add'];
	$city=$_POST['city'];
	$shopname=$_POST['shop_name'];
	$location=$_POST['location'];
	$availability=$_POST['availability'];
  $bankname=$_POST['bank_name'];
  $accountnumber=$_POST['account_number'];
  $ifscswift=$_POST['ifsc_swift'];

  if($_FILES['seller_img']['name'])
  {
     $image=uniqid().$_FILES['seller_img']['name'];
     
     move_uploaded_file($_FILES['seller_img']['tmp_name'],"../seller/upload/seller/".$image);
  }
  else{
    $image = $_POST['old_pimg'];
  }
	
 

   $insertseller = "UPDATE `seller` set `sname`='".$name."',`sdate`='".$sellerdate."',`semail`='".$email."',`pass`='".$password."',`phone`='".$phone."',`availability`='".$availability."',`date_add`='".$dayadd."',`city`='".$city."',`shop_name`='".$shopname."',`location`='".$location."',`bank_name`='".$bankname."',`account_number`='".$accountnumber."',`ifsc_swift`='".$ifscswift."',`simg`='".$image."'   WHERE seller_id=$sid";

   
	$insert = mysqli_query($conn,$insertseller);



	if($insert){

		$msg="Seller added successfully.";

		 echo '<script>window.location.href="view-seller.php?msg=Seller Edit Successfully"</script>';

		}

	

	

}

?>





<style>
  .error
  {
    color: red;
  }
</style>

<script src="dist/js/jquery.validation.js"></script>


<div class="content-body">
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
        	<h2 class="mb-3 me-auto">View Seller</h2>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form role="form" method="post" action="" enctype="multipart/form-data" id="myform">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter New Seller name" name="name" value="<?=$sellerdata['sname']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required readonly value="<?=$sellerdata['semail']?>">
                                    
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phone" placeholder="Enter Conatct Number" name="phone" required value="<?=$sellerdata['phone']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seller date</label>
                                        <!--<input type="datetime-local" class="form-control" id="seller_date" placeholder="Enter Date" name="seller_date" required value=" <?=date('m/d/Y H:i A', strtotime($sellerdata['sdate']))?>" readonly>-->
                                        <input type="text" calss="form-control" name="add_date" class="form-control" readonly value="<?php echo date('m/d/Y H:i A', strtotime($sellerdata['sdate']));?>" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter Bank Name" id="bank_name" name="bank_name" required value="<?=$sellerdata['bank_name']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Account Number (IBAN)</label>
                                        <input type="number" class="form-control" placeholder="Enter Account Number"  id="account_number" name="account_number" required value="<?=$sellerdata['account_number']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">IFSC or Swift Code</label>
                                        <input type="text" class="form-control"  placeholder="Enter IFSC or Swift Code" id="ifsc_swift" name="ifsc_swift" required value="<?=$sellerdata['ifsc_swift']?>" readonly> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Day Add</label>
                                        <input type="datetime-local" class="form-control" id="day_add" placeholder="Enter date" name="day_add" required value="<?=date('Y-m-d\TH:i:s', strtotime($sellerdata['day_add']))?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required value="<?=$sellerdata['city']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name" required value="<?=$sellerdata['shop_name']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" required value="<?=$sellerdata['location']?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <img src="../seller/upload/seller/<?=$sellerdata['simg']?>" style="height:150px; width=150px;">
                                        <div class="input-group mb-3">
											<!--<span class="input-group-text">Upload</span>-->
                                            <!--<div class="form-file">-->
                                                <!--<input type="file" id="seller_img" class="form-file-input form-control" name="seller_img" accept="jpg|jpeg|png">-->
                                                <!--<input type="hidden"  name="old_pimg" value="<?php //echo $sellerdata['pimg']?>">-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Delivery Availability<span style="color:red;font-size:12px"></span></label>
                                        <input type="text" class="form-control" name="availability" value="<?php echo $sellerdata['availability'];?>" readonly >
             <!--                           <select class="default-select form-control wide">-->
    									<!--	<option value="">Select</option>-->
             <!--                               <option value="yes" <?php //echo $sellerdata['availability']=='yes'?'selected':'disabled'?>>YES</option>-->
             <!--                               <option value="no" <?php //echo $sellerdata['availability']=='no'?'selected':'disabled'?>>NO</option>   -->
    									<!--</select>-->
    								</div>
                                    
                                    
                                    <!--<input type="submit" class="btn btn-primary" name="submit" value="Add Seller">-->
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>














<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
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



<?php

include('footer.php');



?>