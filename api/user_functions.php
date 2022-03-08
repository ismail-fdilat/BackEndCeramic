<?php 
date_default_timezone_set("Asia/Calcutta");
error_reporting(0);

require_once 'Firebase.php';
require_once 'Pdf.php';
require_once 'PaymentOrder.php';
// ini_set('display_errors', '');
    //user registration api
function base_url()
{
      return $base_url="https://shrinkcom.com/ceremic-copy/";
}




function paypal_payment()
{
	// if (!count(debug_backtrace()))
// {
	$amount = $_REQUEST['amount'];
	$userid = $_REQUEST['userid'];
    $getdata = PaymentOrder::createOrder(true,$amount);
    
    // $response['payment_url']=$getdata[1]->href;
    // $response['rel']=$getdata[1]->rel;
    // $response['method']=$getdata[1]->method;

    // $response_array= array("status"=>'payment url',"response" => $response,"message" =>'Payment');       
    // echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);


//     echo '<html>
// <head>
// 	<title>Paypal Payment</title>
// 	<meta charset="utf-8" />
	
// 	<style>
// 	blockquote {
// 		margin-bottom: 2px;
// 	}
// 	</style>
// 	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
// 	<script>
// 		function payment_function()
// 		{
// 			window.location.href = "'.$getdata[1]->href.'";
// 		}
// 		payment_function();
// 	</script>
// </head>
// <body>
// 	<div class="container">
// 		<div id="welcome">
// 			<h1>Please wait your order is being proceed and you will be redirect to the paypal website</h1>
// 			<p>If you are not automatically redirected to paypal within 5 seconds...</p>
// 			<a href="'.$getdata[1]->href.'">click here</a>
// 		</div>
		
// 	</div>
// </body>
// </html>';

echo '<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Payment</title>
    <style>
        h2.text-center.backgroundImage {
    background: #32aba6;
    padding: 5px;
    color: #fff;
}

@media(max-width: 340px){
    .w-25 {
    width: 100%!important;
}
}
    </style>

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script>
		function payment_function()
		{
			window.location.href = "'.$getdata[1]->href.'";
		}
		payment_function();
	</script>
  </head>

  <body>
      <div class="container-fluid">
          <h2 class="text-center backgroundImage">Payment</h2>
          <p class="text-start mt-2">Please wait your order is being proceed and you will be redirect to the paypal website</p>
          <p class="text-start mt-4">If you are not automatically redirected to paypal within 5 seconds...</p>
          <a href="'.$getdata[1]->href.'" class="btn btn-primary d-block m-auto w-25">Click here</a>
      </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
   
  </body>
</html>';


    // print_r($getdata[1]);
// }
}

function paypal_success()
{
	
    //$response_array= array("status"=>1,"response" =>'success',"message" =>'Payment successfully');       
    //echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);

    echo '<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we`ll be in touch shortly!</p>
      </div>
    </body>
</html>';


}

function paypal_cancel()
{

   // $response_array= array("status"=>0,"response" => 'failed',"message" =>'Payment Failed');       
    //echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);

    echo '<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #ff0000;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #ff0000;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✗</i>
      </div>
        <h1>Failed</h1> 
        <p>We received your purchase request;<br/> we`ll be in touch shortly!</p>
      </div>
    </body>
</html>';

}

function pdf(){



//    $time=time();
//   $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
//   $pdf->SetAutoPageBreak(true);
//   $pdf->SetAuthor('NursingFunction');
//   $pdf->SetDisplayMode('real', 'default');
//   $pdf->AddPage();
//   $message='<!DOCTYPE html>
// <html>
// <head>
//     <title>Receipt</title>
// <style type="text/css">
//     body {
//     font-family: system-ui;
//     font-size: 10px !important; 
//     line-height: 25px;
   
// }
// table {
//   font-family: arial, sans-serif;
//   width: 80% !important;
//   border-top:none !important;
// }


// h3 {
//     font-size: 20px !important;
//     text-decoration: underline !important;
// }
// span {
//     font-size: 10px !important; 
//     font-weight: 500;
// }
// </style>    
// </head>
// <body >

// <table >
//   <tr style="border:none !important;">
//     <th colspan="2" width="30%;margin-top:20px;">
//       <img src="https://shrinkcom.com/ceramic-api/admin/upload/logo/image002.jpg" class="logo" width="100"></th>
//   </tr>
//   <tr>
//     <td colspan="2"><h3 style="text-align:center">E-Receipt</h3></td>
    
//   </tr>
//   <tr>
//     <td width="30%">Job ID</td>
//     <td width="70%">:  xxxxxxxxxxxxxxxxxxxxxx</td>
//   </tr>
 
// <tr>
//     <td width="30%">Job Date & Time</td>
//     <td width="70%">:  dd/mm/yyyy xx:xxPM </td>
//   </tr>
//   <tr>
//     <td width="30%">Service description</td>
//     <td width="70%">:   "Service Name" ("Sub Service")</td>
//   </tr>
//   <tr><td colspan="2"></td></tr>
//   <tr>
//     <td width="30%">Service Fee</td>
//     <td width="70%">: RM X,XXX,XXX.XX</td>
//   </tr>
//   <tr>
//     <td width="30%">Service Tax</td>
//     <td width="70%">: RM X,XXX,XXX.XX</td>
//   </tr>
//   <tr>
//     <td width="30%">Total Price </td>
//     <td width="70%">: RM X,XXX,XXX.XX</td>
//   </tr>

  
// </table>

// </body>
// </html>';         
             
             
// $pdf->WriteHTML($message);
//  $pdf->Output(__DIR__."/pdf/invoice_".$time.".pdf", 'F');
}

    function register($conn)
	{

	   	$response=array();
		$user_fname=$_POST['user_fname'];
		$user_lname=$_POST['user_lname'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$phone=$_POST['phone'];
        $random = $_POST['random_id'];
		$city = $_POST['city'];
    // 	$gender=$_POST['gender'];


        $query = "select * from users where email='$email'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count == 0){
            //insert if valid email 
            $insert="INSERT INTO `users`(`user_fname`,`user_lname`,`email`,`password`,`mobile`,`login_date`,`city`) VALUES ('$user_fname','$user_lname','$email','$password','$phone','$login_date','$city')";
            $insert = $conn->query($insert);
            if($insert===TRUE)
            {
                $lastid = mysqli_insert_id($conn);
                // mysqli_query($conn,"insert into token (`update_token`,`userid`,`randomid`) values ('',$lastid,'$random')");
            //get user data
            
            $query_user = "select * from users where email='$email'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();

            $username=$user['user_fname'];
            
            $to=$email;
            $subject='Thanking you for register on Ceramic-Api';
            $message='<h1 color="blue"> Welcome</h1><h2 color="blue">Dear '.$username.' </h2>
            <h4>You are almost there</h4>
             <p>Thank you for being a part of the Ceramic-Api community!
             <p>Sincerely,</p>
              <p>The Ceramic-Api Team</p>';
    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "from:<shrinkcom.software@gmail.com>\r\n";
            

            $mail=mail($to,$subject,$message,$headers);
            
            $status=1;
            $response=$user;
            $message="Register Successfully , Thankyou for joining us!!";
            }
            else{
            $status=2;
            $message="Can't Register, Please Try again latter!!";
            }
        }else{
            
            $status=0;
            $message="Email Already Exist, Please try with another Email!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);

	}
	
    //user login api
    function login($conn)
	{	

	    $response=array();
	    $email=$_POST['email'];
		$password=md5($_POST['password']);
		//check login credentials exist or not
	    $query = "select * from users where email='$email' and password='$password'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            
            //get user data after matched credentials
            $query_user = "select users.*,cities.city_name from users Left join  cities ON users.city=cities.id  where email='$email' and password='$password' "; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $status=1;
            $response=$user;
            $message="Login Successfully!!";
$response_array= array("status"=>$status,"response" => $response,"message" =>$message);
        }else{
            //manage status if credentials not matches with database
           
            $status=0;
            $message="Invalid Username and Password!!";
            $response_array= array("status"=>$status,"message" =>$message);
            }
        
                
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
	


	//user Profile api
    function profile($conn)
	{  	$response=array();	
	    $userId=$_POST['userId'];
		//check user  exist or not
	    $query = "select * from users where id='$userId'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            //get user data if user is exist
            $query_user = "select * from users where id=$userId"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $base_url=base_url();
            $user['baseurl']=$base_url.'api/images/userprofile/';
            $status=1;
            $response=$user;
            $message="User Data Loaded Successfully";

        }else{
            $status=0;
            $message="User Not Exist!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
	
	//user Profile Image update api
    function updateprofileimage($conn)
	{  	$response=array();	
	    $email=$_POST['email'];
	    $profile=$_FILES['image']['name'];
	   
	    if(!empty($profile)){
	        
	        $avatar=uniqid().$profile;
	        $update="UPDATE `users` SET `avatar`='$avatar' where email='$email'";
            $update = $conn->query($update);
            if($update==true){
            $path='images/userprofile/';

            $a = move_uploaded_file($_FILES['image']['tmp_name'],$path.$avatar);
            if($a)
            {
                
            }
            else
            {
                error_reporting(1);
            }
          //get user data
            $query_user = "select avatar from users where email='$email'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $base_url=base_url();
            $user['baseurl']=$base_url.'api/images/userprofile/';
            $status=1;
            $response=$user;
            $message="Profile Image Updated Successfully!!";
            
            }
            else{
           $status=0;
           $message="Something Went Wrong!!";
            }
	    }
		else{
            $status=0;
            $message="Profile Images is Empty!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}	
	
	
	//user Profile data  update api
    function updateprofile($conn)
	{  	$response=array();	
	    $email=$_POST['email'];
	    $mobile=$_POST['phone'];
	        $query_user_check = "select * from users where email='$email'"; 
            $query_user_check = $conn->query($query_user_check);
	         $check=$query_user_check->num_rows;
	        if($check!=0){
	        $update="update users set user_fname='".$_POST['userfname']."',user_lname='".$_POST['userlname']."',mobile='".$_POST['phone']."' where email='$email'";
            $update = $conn->query($update);
            if($update==true){
            //get user data
            $query_user = "select * from users where email='$email'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $base_url=base_url();
            $user['baseurl']=$base_url.'assets/images/userprofile/';
            $status=1;
            $response=$user;
            $message="Profile  Updated Successfully!!";
            
            }
            else{
           $status=0;
           $message="Something Went Wrong!! ";
            }
	    }
	     else{
	       $status=0;
           $message="Invalid Email!!";
	    }
	    
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}	
	//Dynamic Country list api
    function countrylist($conn)
	{	
	   
		//check Country exist or not
		$response=array();
	    $query = "select * from countries";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            //get Country List
            $Country = "select * from countries"; 
            $Country = $conn->query($Country);
              while ($row = $Country->fetch_assoc()){
              $response[] = $row;
             }         
            $status=1;
            $message="Country Data Loaded";

        }else{
            $status=0;
            $message="No Data Found";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
	//Dynamic state list api
    function statelist($conn)
	{	
	   
		//check Country exist or not
		
		$country_id=$_REQUEST['country_id'];
		$response=array();
	    $query = "select * from states where country_id='".$country_id."'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
          
              while ($row = $sql->fetch_assoc()){
              $response[] = $row;
             }         
            $status=1;
            $message="state Data Loaded";

        }else{
            $status=0;
            $message="No Data Found";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
//Dynamic city list api
    

    function citylist($conn)
	{	
	   
		//check Country exist or not
		
		$state_id=$_REQUEST['state_id'];
		$response=array();
	    $query = "select * from cities where state_id='".$state_id."'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
          
        while ($row = $sql->fetch_assoc()){
              $response[] = $row;
             }         
            $status=1;
            $message="city Data Loaded";

        }else{
            $status=0;
            $message="No Data Found";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}


     function city_list($conn)
    {   
       
        //check Country exist or not
        
        $city_name=$_REQUEST['city_name'];
        $response=array();
        // $query = "select * from cities where city_name Like '%$city_name%' and ";
        $query = "SELECT cities.* 
                    FROM cities 
                    LEFT JOIN states ON cities.state_id=states.id
                    LEFT JOIN countries ON states.country_id=countries.id
                    WHERE cities.city_name Like '%$city_name%' and  countries.id='191'";
        // $subcategory = "select * from `product` where p_status=1 AND `prod_title_ar` Like '%$product_name%' ";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
          
        while ($row = $sql->fetch_assoc()){
              $response[] = $row;
        }         
        $status=1;
        $message="city Data Loaded";

        }else{
            $status=0;
            $message="No Data Found";
            }
        
        $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
        echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }




 //user social login api
    function sociallogin($conn)
	{	
	    $response=array();
	    $username=$_POST['username'];
        $email = $_POST['email'];
        $login_by = $_POST['login_by'];
		//check login credentials exist or not
	    $query = "select * from users where email='$email'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            
            $update="UPDATE `users` SET `user_fname`='$username',`email`='$email',`login_by`='$login_by' where email='$email'";
            $update = $conn->query($update);
          //get user data
            $query_user = "select * from users where email='$email'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $status=1;
            $response=$user;
            $message="Login Successfully!!";

        }else{
            
            $insert="INSERT INTO `users`(`user_fname`,`email`,`login_by`) VALUES ('$username','$email','$login_by')";
            $insert = $conn->query($insert);
            //get user data
            $query_user = "select * from users where email='$email'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $status=1;
            $response=$user;
            $message="Login Successfully!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}



    //shipping address

     function shippingaddress($conn)
    {   
        $response=array();
        $user_id=$_POST['user_id'];
        $address = $_POST['address'];
        $username=$_POST['username'];
        $email = $_POST['email'];
        $phone=$_POST['phone'];
        $city = $_POST['city'];
        $zipcode=$_POST['zipcode'];
        $country = $_POST['country'];
        $whatsapp_no=$_POST['whatsapp_no'];
        
         $shipping_area = $_POST['shipping_area'];
         $shipping_city=$_POST['shipping_city'];
     
        //check login credentials exist or not
     
             $insertquery="INSERT INTO `shipping_address`(`address`,`user_id`,`username`,`email`,`phone`,`city`,`zipcode`,`country`,`whatsapp_no`,`shipping_area`,`shipping_city`) VALUES ('$address','$user_id','$username','$email','$phone','$city','$zipcode','$country','$whatsapp_no','$shipping_area','$shipping_city')";
            $insert = $conn->query($insertquery);
            //get user data
            $query_user = "select * from shipping_address where user_id='$user_id'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $status=1;
            $response=$user;
            $message="Shipping address Successfully!!";
            
        
         $response_array= array("status"=>$status,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }

   
     function editshippingaddress($conn)
    {   
     
        $response=array();
        $address = $_POST['address'];
        $username=$_POST['username'];
        $email = $_POST['email'];
        $phone=$_POST['phone'];
        $city = $_POST['city'];
        $zipcode=$_POST['zipcode'];
        $country = $_POST['country'];
        $address_id=$_POST['address_id'];
        $whatsapp_no=$_POST['whatsapp_no'];
        
        if(isset($_POST['shipping_area']) && isset($_POST['shipping_city']))
        {
            $shipping_area = $_POST['shipping_area'];
            $shipping_city=$_POST['shipping_city'];
        }
        else
        {
            $shipping_area = '';
            $shipping_city='';
        }
       
      
        //check login credentials exist or not
        $query = "select * from shipping_address where address_id='$address_id'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            
            $update="UPDATE `shipping_address` SET `address`='$address',`username`='$username',`email`='$email',`phone`='$phone',`city`='$city',`zipcode`='$zipcode',`country`='$country',`whatsapp_no`='$whatsapp_no',`shipping_area`='$shipping_area',`shipping_city`='$shipping_city' where address_id='$address_id'";
            $update = $conn->query($update);
          //get user data
            $query_user = "select * from shipping_address where address_id='$address_id'"; 
            $query_user = $conn->query($query_user);
            $user = $query_user->fetch_assoc();
            $status=1;
            $response=$user;
            $message="Shipping address Successfully!!";

        }
        else
        {
            $status=0;
            $message="Failed ";
        }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }
   

     function removeshippingaddress($conn)
    {   
        $response=array();
        $address = $_POST['address'];
        $username=$_POST['username'];
        $email = $_POST['email'];
        $phone=$_POST['phone'];
        $city = $_POST['city'];
        $zipcode=$_POST['zipcode'];
        $country = $_POST['country'];
        $address_id=$_POST['address_id'];
     
        //check login credentials exist or not
        $query = "select * from shipping_address where address_id='$address_id'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            
            $update="DELETE from `shipping_address` where address_id='$address_id'";
            $update = $conn->query($update);
          //get user data
          
            $status=1;
           
            $message="Shipping address Deleted!!";

        }
            $response_array= array("status"=>$status,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }
   

    function getshippingaddress($conn)
    {   
        $response=array();
        $user_id=$_POST['user_id'];
     
        //check login credentials exist or not
        $query = "select * from shipping_address where user_id='$user_id'";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
          
            $query_user = "select * from shipping_address where user_id='$user_id'"; 
            $query_user = $conn->query($query_user);
           while($user = $query_user->fetch_assoc()){
              $response[]=$user;
           } 
            $status=1;
          
            $message="Shipping address Successfully!!";

        }
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }
	
    //verify Email
    function verifyemail($conn)
	{
	    
	    $response=array();
	    $email=$_POST['email'];
		//check user email exist or not
	    $query = "select * from users where email='$email' ";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            $otp = rand(1000,9999);
            $update = "UPDATE users set otp='$otp' WHERE email = '$email'";
            $update = $conn->query($update);
            
            $subject='Ceramic-Api Home -Forgot Password, Verify OTP';
            $to=$email;
            $message='Your OTP is '.$otp;
            $mail= sentmail($subject,$to,$message);
            $status=1;
            $message="OTP Sent to your Email.";

        }else{
            //manage status if credentials not matches with database
            $status=0;
            $message="Invalid User!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
}

//verify otp
    function verifyotp($conn)
	{
	    
	    $response=array();
	    $email=$_POST['email'];
	    $otp=$_POST['otp'];
		//check user email exist or not
	    $query = "select * from users where email='$email' ";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            
        $query_otp = "select * from users where email='$email' and otp='$otp' ";
        $query_otp = $conn->query($query_otp);
        $count_otp= $query_otp->num_rows;
         if($count_otp > 0){
            $status=1;
            $message="OTP Verified.";
         }
         else{
            $status=0;
            $message="Invalid OTP.";
         }

        }else{
            //manage status if credentials not matches with database
            $status=0;
            $message="Invalid User!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
}

    function review_old($conn)
    {
            $response=array();
            $product_id=$_REQUEST['product_id'];
            $user_id=$_REQUEST['user_id'];
            $review=$_REQUEST['review'];
            $rating=$_REQUEST['rating'];
          
            $insert=mysqli_query($conn, "insert into review set product_id='".$product_id."',review='".$review."', rating='".$rating."', user_id='".$user_id."'");
           
             
            if($insert){
            
                  $sql=mysqli_query($conn,"SELECT AVG(rating) AS AverageRating FROM review WHERE product_id='$product_id'");
                  $rate=mysqli_fetch_assoc($sql);
                  $Rating= number_format($rate['AverageRating'],2); 
             $update=mysqli_query($conn, "Update product set rating='$rating' where prod_id='".$product_id."'");
              if($update){
                    $status=1;
                $message="Product Review Added";
              }    
          
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            
            $response_array= array("status"=>$status,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }


//review
function review($conn)
  {
        
        $response=array();
       
        $user_id=$_REQUEST['user_id'];
        $product_id=$_REQUEST['product_id'];
        $rating=$_REQUEST['rating'];
        $review=$_REQUEST['review'];
        $order_id=$_REQUEST['orderid'];

           $query="select * from review where product_id=$product_id and user_id=$user_id";
           $sql = $conn->query($query);
        $count= $sql->num_rows;
            
        if($count > 0){
              $status=0;
            $message="You already reviewed this product once.";
        }else{
             $query = "select * from order_product where orderid='$order_id' and status=2";
        
        $sql = $conn->query($query);
        $count= $sql->num_rows;
            
        if($count > 0)
        {
            $insert_data = "insert into review set product_id='".$product_id."', review='".$review."',rating='".$rating."' , user_id='".$user_id."',order_id='".$order_id."' ";
          $insert=mysqli_query($conn, $insert_data);
         
            $sql=mysqli_query($conn,"SELECT AVG(rating) AS AverageRating FROM review WHERE product_id='$product_id'");
            $rate=mysqli_fetch_assoc($sql);
            $Rating= number_format($rate['AverageRating'],2);


            $result=mysqli_query($conn,"SELECT review  FROM review WHERE product_id='$product_id'");
            $countRow=mysqli_num_rows($result);
           while($reiews=mysqli_fetch_assoc($result))
           {
              $response['review'][]=$reiews['review'];
           }
          $response['AverageRating']=$Rating;
          $status=1;
          $message="Review send successfully.";


        }
        else
        {
            $status=0;
            $message="Your order not delivered.";
        }

        }
       
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
  }
  //change passord
  function changePassword($conn)
  {
        
        $response=array();
       
        $email=$_POST['email'];
        $password=md5($_POST['new_password']);
        $old_password=md5($_POST['old_password']);

        $query = "select * from users where email='$email' and password='$old_password' ";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            $update = "UPDATE users set password='$password' WHERE email = '$email'";
            $update = $conn->query($update);
            $status=1;
            $message="Password Change successfully.!!";

        }
        else
        {
            //manage status if credentials not matches with database
            $status=0;
            $message="Old password is wrong";
        }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
  }
 //set password
    function setpassword($conn)
	{
	    
	    $response=array();
	    $email=$_POST['email'];
	    $password=md5($_POST['password']);
		//check user email exist or not
	    $query = "select * from users where email='$email' ";
        $sql = $conn->query($query);
        $count= $sql->num_rows;
        if($count > 0){
            $otp = rand(1000,9999);
            $update = "UPDATE users set password='$password' WHERE email = '$email'";
            $update = $conn->query($update);
            $status=1;
            $message="Password Change successfully.!!";

        }else{
            //manage status if credentials not matches with database
            $status=0;
            $message="Invalid User!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
}
//Sent Mail
function sentmail($subject,$to,$message)
{
    
 $send=mail($to,$subject, $message, "From:shrinkcom.software@gmail.com");

if($send===TRUE){
    
   return 1;
}else{
     return 0;
}
    
}
//get home page slider 
 function home($conn)
	{
		
	        $response=array();
	        $slider_arr=array();
			$todays_deal_arr=array();
	        $featured_arr=array();
	        $category_arr=array();
			$newArrival = array();
			$randomProduct = array();
	        $base_url=base_url();
	        $bannerArray = array();

            $where = '';$category_ids = '';$cat_where='';
            if(isset($_REQUEST['city']))
            {
            	if($_REQUEST['city'] == '')
            	{
                   $where = 'and city=0';
                   $category_ids='';
            	}
            	else
            	{
            		$city_id = $_REQUEST['city'];
	                $where = 'and city='.$_REQUEST['city'].'';
	                $cate_sql = "select prod_cate_id from product where city='$city_id' GROUP BY `prod_cate_id` ";
	                $categories = $conn->query($cate_sql);
	                while($cat_rows =  $categories->fetch_assoc())
	                {
	                   $category_ids = $category_ids.','.$cat_rows['prod_cate_id'];
	                }
            	}
               
            }

            $category_ids = ltrim($category_ids,',');
           if(!empty($category_ids))
           {
              $cat_where = 'and category_id IN ('.$category_ids.') ';
           }


            //get slider data
             $slider = "select * from deal";
            // $slider = "select * from prod_image GROUP BY `prod_id` ORDER BY `id` DESC LIMIT 4 ";
            $slider = $conn->query($slider);
            while($slider_row=  $slider->fetch_assoc())
            {
                // print_r($slider_row);
                $slider_row['base_url']=$base_url.'admin/upload/deal/';
                $slider_arr[]=$slider_row;
            }
            
            //get banner data
             $banner = "select image,b_id as deal_id from banner";
            // $slider = "select * from prod_image GROUP BY `prod_id` ORDER BY `id` DESC LIMIT 4 ";
            $banner = $conn->query($banner);
            while($banner_row=  $banner->fetch_assoc())
            {
               
                $banner_row['base_url']=$base_url.'admin/upload/banner/';
                $bannerArray[]=$banner_row;
                
                
            }
			
			// get today deals 
			//$today = "select * from product where deal_id = 1 order by prod_id limit 4";
			$today = "select * from product where deal_id = 1 AND p_status='1' $where order by prod_id";
          
            $todays = $conn->query($today);
            //$todays = $today->num_rows;
            
            while($product_row=  $todays->fetch_assoc())
            {   
                $prod_id=$product_row['prod_id'];
                $brand_id=$product_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $product_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
              }
                 $product_row['size']=$sizesarr;
                 
               $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
               if($brandarr)
               {
                $product_row['brand']=$brandarr;
               }else{
                $product_row['brand']='';
               }
                

               // $review= "select * from review left join users on review.user_id=users.id  where product_id=$prod_id";
               $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id ";
               $reviewq = $conn->query($review);
                $reviewarr=array();
              //  while($prod_review =  $reviewq->fetch_assoc()){
              //      $reviewarr[]= $prod_review;
              // }
                 $no_rows = $reviewq->num_rows;;
               $t_trating= 0;
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $t_trating=$t_trating+$prod_review['rating'];
                   
              }
                $product_row['user_rating']=$no_rows;
                $product_row['average_rating']=number_format($t_trating/$no_rows,2);
                $product_row['review']=$reviewarr; 
                $product_row['base_url']=$base_url.'seller/upload/product/';
                $todays_deal_arr[]=$product_row;
               
            }
			
			/* $today = "select * from  todaydeals where end_date >= '".date('d-m-Y')."'";
            // $slider = "select * from prod_image GROUP BY `prod_id` ORDER BY `id` DESC LIMIT 4 ";
            $todays = $conn->query($today);
            while($todays_row=  $todays->fetch_assoc())
            {
                
                $todays_row['base_url']=$base_url.'admin/upload/deal/';
                $todays_deal_arr[]=$todays_row;
                
                
            } */
			
            //get fetured products

            //$fproducts = "select * from brand order by brand_id desc limit 3";
			$fproducts = "select * from brand order by brand_id desc";
            $fproducts = $conn->query($fproducts);
            $rowsp = $fproducts->num_rows;
            while($fproducts_row=  $fproducts->fetch_assoc())
            {
                
                $fproducts_row['base_url']=$base_url.'admin/upload/brand/';
                $featured_arr[]=$fproducts_row;
            }
            
             //get category data
if($category_ids=='' && isset($_REQUEST['city']))
{
  $category = "select * from dir_categories where category_id IN(0) ";
}else
{
	$category = "select * from dir_categories where 1=1 $cat_where ";
}
            
            $category = $conn->query($category);
            $rows = $category->num_rows;
            while($cate_row=  $category->fetch_assoc())
            {
                 $cate_id=$cate_row['category_id'];
            $subcategory = "select * from dir_sub_categories where category_id=$cate_id ";
            $subcategory1 = $conn->query($subcategory);
           $rows = $subcategory1->num_rows;
                
                $cate_row['subcategory count']=$rows;
                $cate_row['base_url']=$base_url.'admin/upload/category/';
                
                $category_arr[]=$cate_row;
            }
			
			// get new arrival 
			
			//$product = "select * from product order by prod_id desc limit 4";
            
			
			$predate = date("Y-m-d", strtotime("-2 day",strtotime(date('Y-m-d'))));
			$product = "select * from product WHERE  p_status='1' and created_on >= '$predate' $where  order by prod_id desc"; 
          
            $product = $conn->query($product);
            $rows = $product->num_rows;
            
            while($product_row=  $product->fetch_assoc())
            {   
                $prod_id=$product_row['prod_id'];
                $brand_id=$product_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $product_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   
                   $sizesarr[]= $sizename;
                   
              }
                 $product_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $product_row['brand']=$brandarr;

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
              //  while($prod_review =  $reviewq->fetch_assoc()){
                   
              //      $reviewarr[]= $prod_review;
                   
                   
              // }
                 $no_rows = $reviewq->num_rows;;
               $t_trating= 0;
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $t_trating=$t_trating+$prod_review['rating'];
                   
              }
                $product_row['user_rating']=$no_rows;
                $product_row['average_rating']=number_format($t_trating/$no_rows,2);
                $product_row['review']=$reviewarr; 
                $product_row['base_url']=$base_url.'seller/upload/product/';
                $newArrival[]=$product_row;
               
            }
			
			// get random 
			
// 			$product = "select * from product order by rand() limit 15";
	          $product = "select * from `product` where `recomended_p`='1' AND p_status='1'  $where order by prod_id DESC";
          
            $product = $conn->query($product);
            $rows = $product->num_rows;
            
            while($product_row=  $product->fetch_assoc())
            {   
                $prod_id=$product_row['prod_id'];
                $brand_id=$product_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $product_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   
                   $sizesarr[]= $sizename;
                   
              }
                 $product_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $product_row['brand']=$brandarr;

               // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
               $reviewarr=array();
               
               $no_rows = $reviewq->num_rows;;
               $t_trating= 0;
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $t_trating=$t_trating+$prod_review['rating'];
                   
              }
                $product_row['user_rating']=$no_rows;
                $product_row['average_rating']=number_format($t_trating/$no_rows,2);
                $product_row['review']=$reviewarr; 
                $product_row['base_url']=$base_url.'seller/upload/product/';
                $randomProduct[]=$product_row;
               
            }
            
            $status=1;
            $message='Loading Data..';
            $response['sale']=$slider_arr;
			$response['todays_deal'] = $todays_deal_arr;
	        $response['featured_brands']=$featured_arr;
	        $response['category']=$category_arr;
			$response['new_arrival']=$newArrival;
			$response['random_product']=$randomProduct;
			$response['banner'] =$bannerArray;
            if(empty($randomProduct))
            {
                // $response=array();
                $status = 1;
                  $message='Loading Data..';
            $response['sale']=$slider_arr;
			$response['todays_deal'] = $todays_deal_arr;
	        $response['featured_brands']=$featured_arr;
	        $response['category']=$category_arr;
			$response['new_arrival']=$newArrival;
		
			$response['banner'] =$bannerArray;
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array,JSON_UNESCAPED_SLASHES);
	
            
	}
	
	
	//sales
	
	function sales($conn)
	{
	        $response=array();
	        $base_url=base_url();
            //get category data
            $sale = "select * from deal";
            $sell = $conn->query($sale);
           $rows = $sell->num_rows;
            if($rows>0){
            while($cate_row =  $sell->fetch_assoc())
            {
                $cate_row['base_url']=$base_url.'admin/upload/deal/';
                 $cate_row['background_color']='#111A22';
                $response[]=$cate_row;
                
                
            }
            
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
          //  print_r( json_encode($response, JSON_UNESCAPED_UNICODE));
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE );
	}
	
	
	//all the category of website
 function category($conn)
	{
	    
	        $response=array();
	        $base_url=base_url();
            //get category data

        $where = '';$category_ids = '';$cat_where='';
            if(isset($_REQUEST['city']))
            {
            	if($_REQUEST['city'] == '')
            	{
                   $where = 'and city=0';
                   $category_ids='';
            	}
            	else
            	{
            		$city_id = $_REQUEST['city'];
	                $where = 'and city='.$_REQUEST['city'].'';
	                $cate_sql = "select prod_cate_id from product where city='$city_id' GROUP BY `prod_cate_id` ";
	                $categories = $conn->query($cate_sql);
	                while($cat_rows =  $categories->fetch_assoc())
	                {
	                   $category_ids = $category_ids.','.$cat_rows['prod_cate_id'];
	                }
            	}
               
            }


       $category_ids = ltrim($category_ids,',');
       if(!empty($category_ids))
       {
          $cat_where = 'and category_id IN ('.$category_ids.') ';
        
       }


// if($category_ids=='' && isset($_REQUEST['city']))
// {
//   $category = "select * from dir_categories where category_id IN(0) ";
// }else
// {
// 	$category = "select * from dir_categories where 1=1 $cat_where ";
// 	 // $category = "select * from dir_categories where  ";
// }

$category = "select * from dir_categories";

           
            $category = $conn->query($category);
           $rows = $category->num_rows;
            if($rows>0){
            while($cate_row=  $category->fetch_assoc())
            {
             $cate_id=$cate_row['category_id'];
            $subcategory = "select * from dir_sub_categories where category_id=$cate_id ";
            $subcategory1 = $conn->query($subcategory);
           $rows = $subcategory1->num_rows;
                
                $cate_row['subcategory count']=$rows;
                $cate_row['base_url']=$base_url.'admin/upload/category/';
                $response[]=$cate_row;
                
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
           
          //  print_r( json_encode($response, JSON_UNESCAPED_UNICODE));
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE );
	}
	//all the subcategory of particular category
 function subcategory($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $cate_id=$_REQUEST['category_id'];
            //get category data
            $subcategory = "select sub_category_id,category_id,sub_category_name,ar_sub_category_name,sub_image as subcate_image from dir_sub_categories where category_id=$cate_id ";
            $subcategory = $conn->query($subcategory);
            $rows = $subcategory->num_rows;
            if($rows>0){
            while($subcate_row=  $subcategory->fetch_assoc())
            {
                
                $subcate_row['base_url']=$base_url.'admin/upload/category/';
                $response[]=$subcate_row;
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);  
            
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
            
	}
	
		//all the products of particular category and subcategory
 function products($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $cate_id=$_REQUEST['category_id'];
	        $subcate_id=$_REQUEST['subcategory_id'];
	        $city=$_REQUEST['city'];
            //get category data

       

       // $category_ids = ltrim($category_ids,',');
       // if(!empty($category_ids))
       // {
       //    $cat_where = 'and category_id IN ('.$category_ids.') ';,
        
       // }


            if(!empty($subcate_id)){
            $subcategory = "select *,cities.city_name from product join cities on product.city=cities.id where prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' AND city=$city ";
             }else{
            $subcategory = "select *,cities.city_name from product join cities on product.city=cities.id where prod_cate_id=$cate_id AND p_status='1' AND city=$city ";
           }


            $subcategory = $conn->query($subcategory);
            $rows = $subcategory->num_rows;
            if($rows>0){
            while($subcate_row=  $subcategory->fetch_assoc())
            {   
                $sid=$subcate_row['sid'];
                $prod_id=$subcate_row['prod_id'];
                $brand_id=$subcate_row['brand_id'];
                $image = "select * from prod_image where prod_id=$prod_id";
                $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
              $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                //   print_r($prod_size);
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
              }

                 $subcate_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                  $sql=mysqli_query($conn,"SELECT AVG(rating) AS AverageRating FROM review WHERE product_id='$prod_id'");
                  $rate=mysqli_fetch_assoc($sql);
                  $Rating= number_format($rate['AverageRating'],2); 

                $subcate_row['AverageRating']=$Rating; 
               

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
                   
              }
           
             // $sellers= "select seller_id,sname,semail,phone,city from seller where seller_id=$sid";
               $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
               $seller_res = $conn->query($sellers);
               
                $seller_array=array();
                $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }
              if (!empty($seller_array)) {
                  $subcate_row['seller']=$seller_array; 
              }
              else{
                 $subcate_row['seller']=array();
              }
               
                $subcate_row['review']=$reviewarr; 
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;
               
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
	}
			//SINGLE PRODUCT  
 function SingleProduct($conn)
	{
	 
	        $response=array();
	        $base_url=base_url();
	        $product_id=$_REQUEST['product_id'];
	        $sizeparam=$_REQUEST['size_id'];

             $where = '';$category_ids = '';$cat_where='';
            if(isset($_REQUEST['city']) && $_REQUEST['city'])
            {
                $city_id = $_REQUEST['city'];
                $where = 'and city='.$_REQUEST['city'].'';
                $cate_sql = "select prod_cate_id from product where city='$city_id'   GROUP BY `prod_cate_id` ";
                $categories = $conn->query($cate_sql);
                while($cat_rows =  $categories->fetch_assoc())
                {
                   $category_ids = $category_ids.','.$cat_rows['prod_cate_id'];
                }
            }
	       
            $product = "select *,cities.city_name from product join cities on product.city=cities.id where prod_id=$product_id AND p_status='1' $where  ";
            $product = $conn->query($product);
            $rows = $product->num_rows;
            if($rows>0){
            while($subcate_row=  $product->fetch_assoc())
            {
                $sid=$subcate_row['sid'];
                  $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
                 // $sellers= "select seller_id,sname,semail,phone,city from seller where seller_id=$sid";
               $seller_res = $conn->query($sellers);
                $seller_array=array();
                $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }
         
                $product_row['base_url']=$base_url.'seller/upload/product/';
               $prod_id=$product_id;
              if($sizeparam!=''){
                 
                   
                    // $querysize = "SELECT * from prod_size where size='$sizeparam' AND prod_id='$prod_id' "; 
                    $querysize = "SELECT * from prod_size where prod_id='$prod_id' "; 
                    $querysizeconn = $conn->query($querysize);
                    $product_size= $querysizeconn->num_rows;
                    if($product_size > 0){

                        //product data
                    $brand_id=$subcate_row['brand_id'];
                  $image = "select * from prod_image where prod_id=$prod_id ";
                   $images = $conn->query($image);
                  $imagearr=array();
                    while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
                 }
                  $subcate_row['images']=$imagearr;
            //   $size = "select * from prod_size where prod_id=$prod_id AND size='$sizeparam'";
              $size = "select * from prod_size where prod_id=$prod_id";
                $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                    //  $sizedata = "SELECT * from size join prod_size on size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                     $sizedata = "SELECT * from prod_size where prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                  }
                     $subcate_row['size']=$sizesarr;
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

              // $review= "select * from review left join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();

                $no_rows = $reviewq->num_rows;;
               $t_trating= 0;
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $t_trating=$t_trating+$prod_review['rating'];
                   
              }
                    // $subcate_row['seller']=$seller_array; 
                   if (!empty($seller_array)) {
                  $subcate_row['seller']=$seller_array; 
                
              }
              else{
                 $subcate_row['seller']=array();
              }
          
                  $subcate_row['review']=$reviewarr;
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;


                   $status=1;
                   $message="Loading Data";
               
                  }
            
        }else{ 
       
                $brand_id=$subcate_row['brand_id'];
                $image = "select * from prod_image where prod_id=$prod_id";
                $images = $conn->query($image);
                $imagearr=array();
                while($prod_image =  $images->fetch_assoc())
                {
                   
                   $imagearr[]= $prod_image;
                   
                 }
                     $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id ";
             $sizes = $conn->query($size);
            
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                    //  $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizedata = "SELECT * from prod_size where prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                }
                        $subcate_row['size']=$sizesarr;
                   $brand= "select * from brand where brand_id=$brand_id";
                  $brands = $conn->query($brand);
                  $brandarr=mysqli_fetch_assoc($brands);
                   $subcate_row['brand']=$brandarr;

               // $review= "select * from review where product_id=$prod_id";
                   // $review= "select review.*,users.user_fname from review left join users on review.user_id=users.id where product_id=$prod_id";
                     $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);

               $no_rows = $reviewq->num_rows;;
               $t_trating= 0;
               $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $t_trating=$t_trating+$prod_review['rating'];
                   
              } 


                    // $subcate_row['seller']=$seller_array; 
                   if (!empty($seller_array)) {
                  $subcate_row['seller']=$seller_array; 
                 
              }
              else{
                 $subcate_row['seller']=array();
              }
                   $subcate_row['average_rating']=number_format($t_trating/$no_rows,2);


                   $subcate_row['user_rating']=$no_rows;

                   $subcate_row['review']=$reviewarr;
                   $subcate_row['base_url']=$base_url.'seller/upload/product/';
                   $response[]=$subcate_row;
               
                 }
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
	}
	
	
	function size_stock($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $product_id=$_REQUEST['product_id'];
	       
            $product = "select * from prod_size join size on prod_size.size=size.size_id where prod_id=$product_id  ";
            $product = $conn->query($product);
            $rows = $product->num_rows;
            if($rows>0){
            while($subcate_row=  $product->fetch_assoc())
            {

                $response[]=$subcate_row;
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
	}
	

    function filterproducts($conn)
    {
             $response=array();
             $subcate_row='';
              $base_url=base_url();
             $cate_id=$_REQUEST['category_id'];
	         $subcate_id=$_REQUEST['subcategory_id'];
            //get category data
            
            $price_min=$_REQUEST['price_min'];
            $price_max=$_REQUEST['price_max'];
            $sizeparam=$_REQUEST['size'];
            $brand_id=$_REQUEST['brand_id'];
            $type=$_REQUEST['type'];
            
           
            //get product data with price
           if($price_min != ''){
              $condition="AND `sale_price` between '$price_min' AND '$price_max' and (endDate <= '".date('d-m-Y')."' or endDate = '0'  ) ";
           }

            if($brand_id != ''){
               $brand="AND brand_id ='$brand_id'";
           }
           
           if($type != '')
           {
               if($type=='hightolow'){
                  $filter="sale_price DESC"; 
               }elseif($type=='lowtohigh'){
                  $filter="sale_price ASC"; 
               }elseif($type=='recentproduct'){
                  $filter="prod_id DESC"; 
               }elseif($type=='mostpopular'){
                  $filter="rating DESC"; 
               }else{
                    $filter="prod_id DESC"; 
               }
             
               if(!empty($subcate_id))
               {
                 $query = "select * from product where prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' and status=0  ".$condition.$brand." order by ".$filter." limit 10";


                //  echo $query;die;
                }
              else
               {
                  $query = "select * from product where prod_cate_id=$cate_id AND p_status='1' and status=0 ".$condition.$brand." order by ".$filter." limit 10";
               }
           }
           else
           {
               if(!empty($subcate_id))
               {
                     $query = "select * from product where prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' and status=0 ".$condition.$brand." "; 

               }
              else
              {
               $query = "select * from product where prod_cate_id=$cate_id AND p_status='1' and status=0 ".$condition.$brand."";
              }
           }
          
         
           
            // $query = "SELECT * from product where status=0 ".$condition.$brand." "; 
	
            $queryconn = $conn->query($query);
           $product_found = $queryconn->num_rows;
          

             

			$product_id_array = array();
           
            if($product_found>0){
               
     
            while($subcate_row=  $queryconn->fetch_assoc())
            {    
               $prod_id=$subcate_row['prod_id'];
                 if($sizeparam!=''){
					
					array_push($product_id_array,$prod_id);
                   
                    $querysize = "SELECT * from prod_size where size='$sizeparam' AND prod_id='$prod_id' "; 
                    $querysizeconn = $conn->query($querysize);
                    $product_size= $querysizeconn->num_rows;
                    if($product_size > 0){

                        //product data
                    $brand_id=$subcate_row['brand_id'];
                  $image = "select * from prod_image where prod_id=$prod_id";
                   $images = $conn->query($image);
                  $imagearr=array();
                    while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
                 }
                  $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id AND size='$sizeparam'";
                $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                  $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                  }
                     $subcate_row['size']=$sizesarr;
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

              // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
               $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
              }
                  $subcate_row['review']=$reviewarr;
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;


                   $status=1;
                   $message="Loading Data";
               
                  }
            
        }else{
				array_push($product_id_array,$prod_id);
                $brand_id=$subcate_row['brand_id'];
                
               $image = "select * from prod_image where prod_id=$prod_id";
                $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
                     $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id AND size='$sizeparam'";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];
                 $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                }
                        $subcate_row['size']=$sizesarr;
                   $brand= "select * from brand where brand_id=$brand_id";
                  $brands = $conn->query($brand);
                  $brandarr=mysqli_fetch_assoc($brands);
                   $subcate_row['brand']=$brandarr;

                   $review= "select * from review where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
              } 
                 $subcate_row['review']=$reviewarr;
                   $subcate_row['base_url']=$base_url.'seller/upload/product/';
                   $response[]=$subcate_row;
               
                 }
            
          
             }
            }
			
			
				$id = implode(",",$product_id_array);
				$notin = '';
				if($id != ''){
						$notin = "prod_id NOT IN (".$id.") and";
				}
				if($price_min != ''){
				   $condition="AND offer_price between '$price_min' AND '$price_max' and endDate >= '".date('d-m-Y')."'";
				}
				
				   
				if($brand_id != ''){
				   $brand="AND brand_id ='$brand_id'";
				}
			   
			   if($type != ''){
				   if($type=='hightolow'){
					  $filter="offer_price DESC"; 
				   }elseif($type=='lowtohigh'){
					  $filter="offer_price ASC"; 
				   }elseif($type=='recentproduct'){
					  $filter="prod_id DESC"; 
				   }elseif($type=='mostpopular'){
					  $filter="rating DESC"; 
				   }else{
						$filter="prod_id DESC"; 
				   }
				 
				   if(!empty($subcate_id)){
			  $query = "select * from product where ".$notin." prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' and status=0 ".$condition.$brand." order by ".$filter." limit 10";
				 }else{
				$query = "select * from product where  ".$notin." prod_cate_id=$cate_id AND p_status='1' and status=0 ".$condition.$brand." order by ".$filter." limit 10";
			   }
			   }else{
				   if(!empty($subcate_id)){
				$query = "select * from product where  ".$notin." prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' and status=0 ".$condition.$brand." limit 10 "; 
				 }else{
				$query = "select * from product where ".$notin." prod_cate_id=$cate_id AND p_status='1' and status=0 ".$condition.$brand." limit 10";
			   }
			   }
			  
			 
			   
				// $query = "SELECT * from product where status=0 ".$condition.$brand." "; +
				
				$queryconn = $conn->query($query);
			   $product_found = $queryconn->num_rows;
			   
			    if($product_found>0){
               
     
            while($subcate_row=  $queryconn->fetch_assoc())
            {    
                       
            
               $prod_id=$subcate_row['prod_id'];
                 if($sizeparam!=''){
					
					
                   
                    $querysize = "SELECT * from prod_size where size='$sizeparam' AND prod_id='$prod_id' "; 
                    $querysizeconn = $conn->query($querysize);
                    $product_size= $querysizeconn->num_rows;
                    if($product_size > 0){

                        //product data
                    $brand_id=$subcate_row['brand_id'];
                  $image = "select * from prod_image where prod_id=$prod_id";
                   $images = $conn->query($image);
                  $imagearr=array();
                    while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
                 }
                  $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id AND size='$sizeparam'";
                $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                  $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                  }
                     $subcate_row['size']=$sizesarr;
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

              // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
              }
                  $subcate_row['review']=$reviewarr;
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;


                   $status=1;
                   $message="Loading Data";
               
                  }
            
        }else{
				array_push($product_id_array,$prod_id);
                $brand_id=$subcate_row['brand_id'];
                
               $image = "select * from prod_image where prod_id=$prod_id";
                $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
                     $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id AND size='$sizeparam'";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
                }
                        $subcate_row['size']=$sizesarr;
                   $brand= "select * from brand where brand_id=$brand_id";
                  $brands = $conn->query($brand);
                  $brandarr=mysqli_fetch_assoc($brands);
                   $subcate_row['brand']=$brandarr;

                   $review= "select * from review where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
              } 
                 $subcate_row['review']=$reviewarr;
                   $subcate_row['base_url']=$base_url.'seller/upload/product/';
                   $response[]=$subcate_row;
               
                 }
            
          
             }
            }
           
           

            if(count($response) == 0){
             $status=0;
             $message="No Data Found";
            }else{
              $status=1;
            $message="Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }


	//ADD TO CART
	function addtocart($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $product_id=$_REQUEST['product_id'];
	        $user_id=$_REQUEST['user_id'];
	        $qty=$_REQUEST['qty'];
	        $price=$_REQUEST['price'];
	        $totalprice=$price*$qty;
        	$check=mysqli_query($conn, "select * from add_to_cart where product_id='".$product_id."' and user_id='".$user_id."'");
            $num=mysqli_num_rows($check);
          if($num>0)
             {   
            $status=2;
            $message="Product Already exist at your cart";
           
            }
            else{
            $insert=mysqli_query($conn, "insert into add_to_cart set product_id='".$product_id."',qty='".$qty."', price='".$price."',totalprice='".$totalprice."' , user_id='".$user_id."'");
            if($insert){
	        $status=1;
            $message="Product Added";
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
	
	
	
		//UPDATE TO CART
	function updatetocart($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $cart_id=$_REQUEST['cart_id'];
	        $qty=$_REQUEST['qty'];
	        $price=$_REQUEST['price'];
	        $totalprice=$price*$qty;
        	$check=mysqli_query($conn, "select * from add_to_cart where id='".$product_id."'");
            $num=mysqli_num_rows($check);
          if($num>0)
             {   
            $status=2;
            $message="Invalid Cart Id";
           
            }
            else{
            $insert=mysqli_query($conn, "update add_to_cart set qty='".$qty."',totalprice='".$totalprice."' where id='".$cart_id."' ");
            if($insert){
	        $status=1;
            $message="Cart Updated";
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
		//GET CART DATA 
 function getusercart($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $user_id=$_REQUEST['user_id'];
            $product = "select * from add_to_cart left join product on product.prod_id=add_to_cart.product_id where  add_to_cart.user_id=$user_id  ";
            $product = $conn->query($product);
            $rows = $product->num_rows;
            if($rows > 0){
            while($product_row =  $product->fetch_object())
            {
                $cate_id=$product_row->prod_cate_id;
                $subcate_id=$product_row->prod_subcate_id;

                $category = "select category_name from dir_categories  where  category_id=$cate_id  ";
                $category = $conn->query($category);
                $categoryname=  $category->fetch_object()->category_name;
              
                //subcategory
                $subcategory = "select sub_category_name from dir_sub_categories  where  sub_category_id=$subcate_id  ";
                $subcategory = $conn->query($subcategory);
                $subcategoryname=  $subcategory->fetch_object()->sub_category_name; 
             
                $product_row->type=$categoryname.','.$subcategoryname;
              
                $product_row->base_url=$base_url.'seller/upload/product/';
               // $product_row['base_url']=$base_url.'admin/upload/product/';
             //  print_r($product_row);
                
                $response[]=$product_row;
            }
              
       
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            
             
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
	
		//book order
 function bookorder($conn)
	{
	  
	        $response=array();
	        $base_url=base_url();
	       
	       $user_id=$_REQUEST['user_id'];
           $trans_id=$_REQUEST['transaction_id'];
	       $_REQUEST['product_data'];
           $_REQUEST['delivery_status'];


	      $product_data=json_decode($_REQUEST['product_data']);
	     
     $char='123567890';
          $orderid='ORD'.substr(str_shuffle($char),0,10);
 
 $date=date('d-m-Y H:i');
 
 if($user_id != ''){
    foreach($product_data as $products){
    $seller_array[]=$products->seller_id;
    $seller_id=implode(',', $seller_array);
}

 $sql = "INSERT INTO `book_order`(`userfname`, `userlname`, `userphone`, `useremail`, `country`, `state`, `city`, `streetadd1`, `streetadd2`, `postalcode`, `payment_method`,`total`, `booked_id`, `user_id`,`date`, `payment_status`, `userwhatsapp_no`,`seller_id`,`shipping_area`,`shipping_city`,`delivery_status`,`transaction_id`) VALUES
                    ('".$_REQUEST['first_name']."','".$_REQUEST['last_name']."','".$_REQUEST['phone']."','".$_REQUEST['email']."','".$_REQUEST['country']."','".$_REQUEST['state']."','".$_REQUEST['city']."','".$_REQUEST['address']."','".$_REQUEST['shipping_address']."','".$_REQUEST['postal_code']."','".$_REQUEST['payment_method']."',
 '".$_REQUEST['total']."','".$orderid."','".$user_id."','".$date."','".$_REQUEST['payment_status']."','".$_REQUEST['whatsapp_no']."','".$seller_id."','".$_REQUEST['shipping_area']."','".$_REQUEST['shipping_city']."','".$_REQUEST['delivery_status']."','".$trans_id."')"; 

  $retval = mysqli_query($conn, $sql);

 
  if($retval)
  {
      $msg='Your order successfully placed.';
      $datess = date("Y-m-d H:i:s");
      mysqli_query($conn, "INSERT INTO `notification`( `user_id`,`message`,`created_at`) VALUES('".$user_id."','".$msg."','".$datess."') ");  

    $token = $_REQUEST['token'];
    //$token = 'fL398nlt444:APA91bHlrLm2iDWBICyUupW4cb5O4NVXJF2t5Aq9XfmSC4NTqmjvfw0dOj7SFR6bU09aapgNt5pxxPQ2hGOnD2scKBK84O3XScLig-0wQRB0I1sZX9itCfZEUC3ydoyXftesyLDPT1s6';
    $firebase = new Firebase(); 
    $msg=array('message'=>$_REQUEST['first_name'].', your order booked successfully..');
    $firebase->send($token,$msg);      
  }
     
        
foreach($product_data as $product){
    
$qty=$product->qty;
$price=$product->price;
$totalp=$qty*$price;

$admincm=($totalp*0.05)+1;
$sellerearn=$totalp-($totalp*0.05);



  $sql1="INSERT INTO `order_product`( `booking_id`,`product_id`,`seller_id`, `qty`, `price`, `total_price`,`sellerearn`,`admincom`,`payment_method`,`payment_status`) VALUES
('".$orderid."','".$product->product_id."','".$product->seller_id."','".$product->qty."','".$product->price."','".$totalp."','".$sellerearn."','".$admincm."','".$_REQUEST['payment_method']."','".$_REQUEST['payment_status']."')";
    


  $retval1 = mysqli_query($conn, $sql1);  
  
  mysqli_query($conn, "update product set quantity=quantity-$product->qty where prod_id=$product->product_id ");
  
  $updateqty = mysqli_query($conn,"select * from product where prod_id='".$product->product_id."' AND p_status='1'");
  if(mysqli_num_rows($updateqty)>0)
  {
      $row = mysqli_fetch_assoc($updateqty);
      $newqty = $row['new_quantity'];
      $a = $product->qty;
      $totalqty = $newqty+$a;
  }
   
 $updatesoldqty = mysqli_query($conn,"select * from prod_size where prod_id='".$product->product_id."' AND size='".$product->size_id."'");
 
  if(mysqli_num_rows($updatesoldqty)>0)
  {
      $soldrow = mysqli_fetch_assoc($updatesoldqty);
      $newsoldqty = $soldrow['sold_qty'];
      $asold = $product->qty;
      $totalsoldqty = $newsoldqty+$asold;
  }
   
//   $updateprodsize=mysqli_query($conn,"UPDATE prod_size SET sold_qty = '".$product->qty."' WHERE prod_id='".$product->product_id."' AND size='".$product->size_id."'");
//   $updateprod=mysqli_query($conn,"UPDATE product SET new_quantity = '".$product->qty."' WHERE prod_id='".$product->product_id."'");

      $updateprodsize=mysqli_query($conn,"UPDATE prod_size SET sold_qty = '".$totalsoldqty."' WHERE prod_id='".$product->product_id."' AND size='".$product->size_id."'");
     $updateprod=mysqli_query($conn,"UPDATE product SET new_quantity = '".$totalqty."' WHERE prod_id='".$product->product_id."'");






}    
	       
if($retval1){	       

   

  $insert=mysqli_query($conn, "insert into payment set transaction_id='".$trans_id."',amount='".$_REQUEST['total']."', booked_id='".$orderid."', user_id='".$user_id."'");
            
          $query_userorder = "select * from book_order where booked_id='$orderid'"; 
            $query_user_o = $conn->query($query_userorder);
            $userorder = $query_user_o->fetch_assoc();
            
            $query_prod = "select * from order_product join product on order_product.product_id = product.prod_id where booking_id='$orderid'"; 
            $query_prod_o = mysqli_query($conn,$query_prod);
           
          
        
 
            $shipping_add=$userorder['streetadd1'];
             $username=$userorder['userfname'];
             $userphone=$userorder['userphone'];
            $city=$userorder['city'];
            $postal=$userorder['postalcode'];
            
            $to=$_REQUEST['email'];
            $subject='Thanking you for Order on Ceramic-Api';
            $message ='
              <style>
{
  box-sizing: border-box;
}


.row:after {
  content: "";
  display: table;
  clear: both;
} 
.head_logo img{
    width:250px;
    height:80px
}
.text-center{
    text-align: center !important;
}
.image{
	text-align:center;
}
.image img{
   
    width:20px;
    height:20px
}
.table-responsive{
    width:100%;
    max-width:100% ;
    overflow-x: auto;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 70%;
  
  margin: auto;
}
table>tbody>tr .img_td{
	width: 250px !important;
}
table>tbody{
	border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}
th, td {
    text-align: left;
    padding: 8px;
 
    padding: 10px;
 
    vertical-align: top;
}

table>tfoot>tr>th{
   
    margin-bottom:5px;
}
@media(min-width:768px){
    .container{
        width:80%;
        margin:auto
    }
    .col-md-6 {
    float: left;
    width: 50%;
    padding: 15px;
    }
    .col-md-12 {
    float: left;
    width: 100%;
    padding: 15px;
    }
}
@media(max-width:767px){
    .container{
        width:90%;
        margin:auto
    }
}

</style>
            <h1 color="blue"> Welcome</h1><h2 color="blue">Dear '.$username.' </h2>
            <h4>Thank you for shopping at Ceramic-Api. This is a confirmation that we have received your order placed with the details below. 
            You can track your order status in our app anytime</h4>
            <h3>Order ID:'.$orderid.'</h3>';
        //  for($i=0;$i<mysqli_num_rows($query_prod_o);$i++){
        while( $userprod = mysqli_fetch_assoc($query_prod_o)){
            
         $tax=mysqli_query($conn,"select * from product_taxrate");
         $fetchtax = mysqli_fetch_assoc($tax);
            
           
      $message .='<div class="container">
           <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <th class="img_td">
                                    <div class="image">
                                        <img src="'.$base_url.'admin/'.$userprod['thumbnail_image'].'"style="height:100px;width:100px">
                                    </div>
                                </th>
                                <th>
                               
                                	<p>QTY : '.$userprod['qty'].'</p>
                                
                                	
                                </th>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>';
          }
           $message .='<p><strong>Total price : '.$userorder['total'].'<strong></p>
           <p>If you have any questions about your order, get answers online from Support of our APP.</p>
             <p>Thank you for being a part of the Ceramic-Api community!
             <p>Sincerely,</p>
              <p>The Ceramic-Api Team</p>';
    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "from:<shrinkcom.software@gmail.com>\r\n";
           
                    

            $mail=mail($to,$subject,$message,$headers);
          
	        $status=1;
            $message="Booked Successfully";
          
    // $notifcation='';
    // $sqlll = mysqli_query($conn, "SELECT * FROM notification where user_id=$user_id order by noti_id DESC ");
    //     $userArr = array();
    //     if(mysqli_num_rows($sql) > 0)
    //     {
    //         while($row = mysqli_fetch_assoc($sqlll))
    //         {
    //           $userArr[] = $row;
    //         }
    //         $notifcation = array("result" => 1, "userData" => $userArr, "message" => "Notification list");
            
    //     }

            $response[]=array('order_id'=>$orderid);




            }
            else{
            $status=0;
            $message="Something Went Wrong";
            }
 }else{
            $status=0;
            $message="Something Went Wrong!!User id should not be blank";
 }     
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}


// function bookorder_vinay($conn)
// 	{
	  
// 	        $response=array();
// 	        $base_url=base_url();
	       
// 	       $user_id=$_REQUEST['user_id'];
//           $trans_id=$_REQUEST['transaction_id'];
// 	       $_REQUEST['product_data'];
	      
// 	      $product_data=json_decode($_REQUEST['product_data']);

// 	       $char='123567890';
//           $orderid='ORD'.substr(str_shuffle($char),0,10);
 
//  $date=date('d-m-Y H:i');
 
//  $sql = "INSERT INTO `book_order`(`userfname`, `userlname`, `userphone`, `useremail`, `country`, `state`, `city`, `streetadd1`, `streetadd2`, `postalcode`, `payment_method`,`total`, `booked_id`, `user_id`,`date`, `payment_status`, `confirm_status`,`userwhatsapp_no`) 
//  VALUES ('".$_REQUEST['first_name']."','".$_REQUEST['last_name']."','".$_REQUEST['phone']."','".$_REQUEST['email']."','".$_REQUEST['country']."','".$_REQUEST['state']."',
//  '".$_REQUEST['city']."','".$_REQUEST['address']."','".$_REQUEST['address']."','".$_REQUEST['postal_code']."','".$_REQUEST['payment_method']."',
//  '".$_REQUEST['total']."','".$orderid."','".$user_id."','".$date."','1','1','".$_REQUEST['whatsapp_no']."')"; 
//   $retval = mysqli_query($conn, $sql);
     
// foreach($product_data as $product){
    
//   $sql1="INSERT INTO `order_product`( `booking_id`,`product_id`,`qty`, `price`, `total_price`) VALUES ('".$orderid."','".$product->product_id."','".$product->qty."','".$product->price."','".$product->totalprice."')";

//   $retval1 = mysqli_query($conn,$sql1); 
  
//   $updateqty = mysqli_query($conn,"select * from product where prod_id='".$product->product_id."'");
//   if(mysqli_num_row($updateqty)>0)
//   {
//       $row = mysqli_fetch_assoc($updateqty);
//       $newqty = $row['new_quantity'];
//       $a = $product->qty;
//       $totalqty = $newqty+$a;
//   }
   
//     $updatesoldqty = mysqli_query($conn,"select * from prod_size where prod_id='".$product->product_id."' AND size='".$product->size_id."'");
//   if(mysqli_num_row($updatesoldqty)>0)
//   {
//       $soldrow = mysqli_fetch_assoc($updatesoldqty);
//       $newsoldqty = $row['sold_qty'];
//       $asold = $product->qty;
//       $totalsoldqty = $newsoldqty+$asold;
//   }
   
// //   $updateprodsize=mysqli_query($conn,"UPDATE prod_size SET sold_qty = '".$product->qty."' WHERE prod_id='".$product->product_id."' AND size='".$product->size_id."'");
// //   $updateprod=mysqli_query($conn,"UPDATE product SET new_quantity = '".$product->qty."' WHERE prod_id='".$product->product_id."'");
// $updateprodsize=mysqli_query($conn,"UPDATE prod_size SET sold_qty = '".$totalsoldqty."' WHERE prod_id='".$product->product_id."' AND size='".$product->size_id."'");
//      $updateprod=mysqli_query($conn,"UPDATE product SET new_quantity = '".$totalqty."' WHERE prod_id='".$product->product_id."'");
// }    
	       
// if($retval){	       
//         // $cart=mysqli_query($conn, "DELETE FROM `add_to_cart`  where user_id='".$user_id."'");

//   $insert=mysqli_query($conn, "insert into payment set transaction_id='".$trans_id."',amount='".$_REQUEST['total']."', booked_id='".$orderid."', user_id='".$user_id."'");

// 	        $status=1;
//             $message="Booked Successfully";
//             $response[]=array('order_id'=>$orderid);
//             }
//             else{
//             $status=0;
//             $message="Something Went Wrong";
//             }
            
//             $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
//             echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
// 	}

		//UPDATE TO payment status
	function updatepaymentstatus($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        
	        $order_id=$_REQUEST['order_id'];
	        $transaction_id=$_REQUEST['transaction_id'];
	        
	        $status=1;
	        
        	$check=mysqli_query($conn, "select * from book_order where booked_id='".$order_id."' ");
            $num=mysqli_num_rows($check);
          if($num<=0)
             {   
            $status=2;
            $message="Invalid Order Id";
           
            }
            else{
            $insert=mysqli_query($conn, "update book_order set payment_status='".$status."' , transaction_id='".$transaction_id."'where booked_id='".$order_id."' ");
            if($insert){
	        $status=1;
            $message="Payment Status  Updated";
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
			//GET ORDER HISTORY DATA OF USER

//     function testtt()
//     {
//        // require_once 'dompdf/autoload.inc.php'; 
//         use Dompdf\Dompdf; 

//         $dompdf = new Dompdf();

//         $dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>'); 
 
// // (Optional) Setup the paper size and orientation 
// $dompdf->setPaper('A4', 'landscape'); 
 
// // Render the HTML as PDF 
// $dompdf->render(); 
 
// // Output the generated PDF to Browser 
// $dompdf->stream();


//     }

function orderinvoice($conn)
{
    $booked_id=$_REQUEST['booking_id'];
    
       $img = "select * from logo ";
        $img1 = $conn->query($img);
        $img1 = mysqli_fetch_assoc($img1);
        
      

     $product = "select * from order_product where order_product.booking_id='".$booked_id."'  ";
                $product = $conn->query($product);
                $rows = $product->num_rows;
                if($rows>0){
                $productarr=array();
                $html='';
              $total=0;
            while($product_row=  mysqli_fetch_assoc($product))
            {
            	
            //   $product_row->base_url=$base_url.'seller/upload/product/';
              // $product_row['base_url']=$base_url.'admin/upload/product/';  
                $prod_id=$product_row['product_id'];
                $product1 = "select * from product where prod_id='".$prod_id."'   ";
                $productdata = $conn->query($product1);
                $productdatarr=array();
            while ($subcate_row=  mysqli_fetch_assoc($productdata)) {
               # code...
                $total = $total + ($product_row['qty']*$product_row['price']);
                     $html .= '<tr>
                     
                        <td width="30%" align="left">'.$subcate_row['prod_title'].'</td>
                        <td width="30%" align="center">'.$product_row['qty'].' X '.$product_row['price'].' SAR </td>
                        <td width="40%" align="right">SAR '.$product_row['qty']*$product_row['price'].'</td>
                     </tr>';
                     
            }
                
            }
            
            
             $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ceramic-Api');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();            


$html .= '<tr style="background-color:#eee;">
        <td width="30%">Grand Total</td>
        <td width="30%"></td>
        <td width="40%" align="right">SAR '.$total.'</td>
     </tr>';

$message='<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
<style type="text/css">
    body {
    font-family: system-ui;
    font-size: 10px !important; 
    line-height: 25px;
   
}
table {
  font-family: arial, sans-serif;
  width: 100% !important;
    border-collapse: collapse;
}


h3 {
    font-size: 20px !important;
    text-decoration: underline !important;
}
span {
    font-size: 10px !important; 
    font-weight: 500;
}
.logo_img td {
    border-spacing: 15px;
    padding: 15px;
    margin: 15px;
}

</style>    
</head>
<body >

<table >
<thead>
  <tr class="logo_img">
  
       
      <td colspan="4" align="left"></td>
    <td colspan="4" align="center"><img src="https://shrinkcom.com/ceramic-api/admin/upload/'.$img1["image"].'" class="logo" width="150" height="100"> </td>
    <td colspan="4" align="right"></td>
  </tr>
  <tr>
  </thead>
    <td colspan="3"><h3 style="text-align:left">E-Receipt</h3></td>
    
  </tr>
  <tr style="background-color:#eee;">
    <td width="30%" align="left">Order ID</td>
    <td width="30%"></td>
    <td width="40%" align="right">  '.$booked_id.'</td>
  </tr>
  <tr>
  <td colspan="3"><b> Product Details</b></td>
  
  </tr>
 
  <tr style="background-color:#eee;">
  <td align="left"><b> Name</b></td>
  <td  align="center"><b> Quantity X Unit price </b></td>
  <td  align="right"><b>Total Price</b></td>
  </tr>
  
   '.$html.' 

</table>

</body>
</html>';


$pdf->WriteHTML($message);
$pdf->Output(__DIR__."/pdf/invoice_".$time.".pdf", 'F');
            $filename="invoice_".$time.".pdf";
           // $all_invoice[]=$invoice;

            // $orders_row['invoice']=$invoice;
            // $orders_row['invoice']='https://shrinkcom.com/ceramic-api/api/pdf/invoice_'.$time.'.pdf';
            $orders_row['invoice']='https://shrinkcom.com/ceramic-api/api/pdf/'.$filename;
            $response[]=$orders_row;
             $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    
}

 function orderhistory($conn)
	{

		 


$all_invoice = array();
           
	        $response=array();
	        $base_url=base_url();
	        $user_id=$_REQUEST['user_id'];
            //$orders = "select * from book_order where  user_id='".$user_id."'  and confirm_status=1  ";
            $orders = "select * from book_order where  user_id='".$user_id."'";
            $orders = $conn->query($orders);
            $rows = $orders->num_rows;

            
             
            if($rows>0){
            while($orders_row=   mysqli_fetch_assoc($orders))
            {
            	$time = rand(1000000,99999999);
            	 $html = '';
            	 $total = 0;
            	 $invoice = array();

                $booked_id=$orders_row['booked_id'];
                // $product = "select * from order_product where order_product.booking_id='".$booked_id."'  ";
                
           $product = "SELECT order_product.*,seller.shop_name,seller.city,seller.sname,seller.location, cities.city_name, cities.city_name from order_product 
                             join seller on  seller.seller_id = order_product.seller_id 
                              JOIN cities on seller.city=cities.id
                             where order_product.booking_id='".$booked_id."'  "; 
                $product = $conn->query($product);
                $productarr=array();
            while($product_row=  mysqli_fetch_assoc($product))
            {
            	
              $product_row->base_url=$base_url.'seller/upload/product/';
              // $product_row['base_url']=$base_url.'admin/upload/product/';  
                $prod_id=$product_row['product_id'];
                $product1 = "select * from product where prod_id='".$prod_id."'   ";
                $productdata = $conn->query($product1);
                $productdatarr=array();
            while ($subcate_row=  mysqli_fetch_assoc($productdata)) {
               # code...
                 $html .= '<tr>
                        <td width="30%">Product Detail</td>
                        <td width="70%">:'.$product_row['qty'].'X'.$subcate_row['prod_title'].'='.$product_row['price'].'</td>
                     </tr>';
                     $total = $total + ($product_row['qty']*$product_row['price']);
                $invoice['price'][] = $product_row['price'];
                $invoice['qty'][] = $product_row['qty'];
              
                $brand_id=$subcate_row['brand_id'];
                $image = "select * from prod_image where prod_id=$prod_id";
                $images = $conn->query($image);
                $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   $subcate_row['images']=$imagearr;
              }

               $size = "select * from prod_size where prod_id=$prod_id";
               $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   
                   $sizesarr[]= $sizename;
                   $subcate_row['size']=$sizesarr;
              }

                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                $productdatarr[]=$subcate_row;
                $product_row['products']=$productdatarr;
                
            
               }

              $productarr[]=$product_row;  
                
            }


  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $pdf->SetAutoPageBreak(true);
  $pdf->SetAuthor('Ceramic-Api');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage();            


$html .= '<tr>
        <td width="30%">Total</td>
        <td width="70%">:'.$total.'</td>
     </tr>';

$message='<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
<style type="text/css">
    body {
    font-family: system-ui;
    font-size: 10px !important; 
    line-height: 25px;
   
}
table {
  font-family: arial, sans-serif;
  width: 80% !important;
  border-top:none !important;
}


h3 {
    font-size: 20px !important;
    text-decoration: underline !important;
}
span {
    font-size: 10px !important; 
    font-weight: 500;
}
</style>    
</head>
<body >

<table >
  <tr style="border:none !important;">
    <th colspan="2" width="30%;margin-top:20px;">
      <img src="https://shrinkcom.com/ceramic-api/admin/upload/logo/image002.jpg" class="logo" width="100"></th>
  </tr>
  <tr>
    <td colspan="2"><h3 style="text-align:center">E-Receipt</h3></td>
    
  </tr>
  <tr>
    <td width="30%">Order ID</td>
    <td width="70%">:  '.$orders_row['booked_id'].'</td>
  </tr>
  
   '.$html.' 

</table>

</body>
</html>';


$pdf->WriteHTML($message);
$pdf->Output(__DIR__."/pdf/invoice_".$time.".pdf", 'F');
            $filename="invoice_".$time.".pdf";
           // $all_invoice[]=$invoice;

            // $orders_row['invoice']=$invoice;
            // $orders_row['invoice']='https://shrinkcom.com/ceramic-api/api/pdf/invoice_'.$time.'.pdf';
            $orders_row['invoice']='https://shrinkcom.com/ceramic-api/api/pdf/'.$filename;
           // $orders_row['files_name']=$time;
            $orders_row['ordered_products']=$productarr;
            $response[]=$orders_row;
            }    
           
           //print_r($response);
           //die;
            
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
		//ADD TO Wishlist
	function addtowishlist($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $product_id=$_REQUEST['product_id'];
	        $user_id=$_REQUEST['user_id'];
        	$check=mysqli_query($conn, "select * from wishlist where wish_product_id='".$product_id."' and wish_user_id='".$user_id."'");
            $num=mysqli_num_rows($check);
          if($num>0)
             {   
            $status=2;
            $message="Product Already exist at your Wishlist";
           
            }
            else{
            $insert=mysqli_query($conn, "insert into wishlist set wish_product_id='".$product_id."', 	wish_user_id='".$user_id."'");
            if($insert){
	        $status=1;
            $message="Product Added";
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
		//GET Wislist DATA 
 function getuserwishlist($conn)
	{
	        $response=array();
	        $base_url=base_url();
	        $user_id=$_REQUEST['user_id'];
	       
         $product = "select * from wishlist where  wishlist.wish_user_id=$user_id  ";
         // $product = "SELECT * from wishlist WHERE wish_user_id=$user_id  ";

         //$subcategory = "select *,cities.city_name from product join cities on product.city=cities.id where prod_cate_id=$cate_id and prod_subcate_id=$subcate_id AND p_status='1' $where ";

            $product = $conn->query($product);
             $rows = $product->num_rows;
            if($rows>0){
            while($product_row =  mysqli_fetch_assoc($product))
            {

              
                $prod_id=$product_row['wish_product_id'];
               //  $cate_id=$product_row->prod_cate_id;
               //  $subcate_id=$product_row->prod_subcate_id;

               //   $category = "select category_name from dir_categories  where  category_id=$cate_id  ";
               //  $category = $conn->query($category);
               //   $categoryname=  $category->fetch_object()->category_name; 
               //  //subcategory
               //  $subcategory = "select sub_category_name from dir_sub_categories  where  sub_category_id=$subcate_id  ";
               //  $subcategory = $conn->query($subcategory);
               //  $subcategoryname=  $subcategory->fetch_object()->sub_category_name; 
               //  $product_row->type=$categoryname.','.$subcategoryname;
               //  $product_row->base_url=$base_url.'admin/upload/product/';
               // // $product_row['base_url']=$base_url.'admin/upload/product/';
              

           $product1 = "select *,cities.city_name  from product join cities on product.city=cities.id where prod_id='".$prod_id."' AND p_status='1'";
            $productdata = $conn->query($product1);
           $productdatarr=array();
           while($subcate_row=  mysqli_fetch_assoc($productdata)) {
               # code...
            $sid=$subcate_row['sid'];
           // $sellers= "select seller_id,sname,semail,phone from seller where seller_id=$sid";
             $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
               $seller_res = $conn->query($sellers);
                $seller_array=array();
              //  while($seller =  $seller_res->fetch_assoc()){
                   
              //      $seller_array[]= $seller;
                   
                   
              // }
                $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }

              if(!empty($seller_array)){
               $subcate_row['seller']=$seller_array;
              }
              else{
               $subcate_row['seller']=array();
              }
                // $subcate_row['seller']=$seller_array; 
                $brand_id=$subcate_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                  
              }
                 $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
              }
            $subcate_row['size']=$sizesarr;
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
                $cities=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   $cities['city']= $prod_review['city'];
                   $cities['city_name']= $prod_review['city_name'];
                   
              }
              $subcate_row['cities']=$cities;
                  $subcate_row['review']=$reviewarr;
                $productdatarr[]=$subcate_row;
                $product_row['products']=$productdatarr;

              }
                $response[]=$product_row;
                
            }
         
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
	}
		//remove wishlist 
 function removeuserwishlist($conn)
	{
	      
	        $response=array();
	        $base_url=base_url();
	        $wish_id=$_REQUEST['wish_id'];  
	        $cart=mysqli_query($conn, "DELETE FROM `wishlist`  where wish_id='".$wish_id."'");
	        if($cart){
	            
	         $status=1;
            $message="Deleted";
            }
            else{
            $status=0;
            $message="Something went wrong";
            }
	     $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);    
	        
	}	



     
			//remove cart 
 function removeusercart($conn)
	{
	      
	        $response=array();
	        $base_url=base_url();
	        $cart_id=$_REQUEST['cart_id'];  
	        $cart=mysqli_query($conn, "DELETE FROM `add_to_cart` where  id='".$cart_id."'");
	        if($cart){
	            
	         $status=1;
            $message="Deleted";
            }
            else{
            $status=0;
            $message="Something went wrong";
            }
	     $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);    
	        
	}	




    function Get_review($conn)
        {

             $product_id=$_REQUEST['product_id'];
            $sql=mysqli_query($conn,"SELECT * FROM review where product_id='$product_id' ");
            $userArr=array();
                        if (mysqli_num_rows($sql)>0) 
                        {
                            while ($row=mysqli_fetch_assoc($sql)) 
                            {
                                $userArr[]=$row;
                            }
                                $arr=array("status"=>1,"response"=>$userArr,"message"=>"seller product seen");
                                
                        }
                        else
                        {
                            $arr=array("status"=>0,"response"=>array(),"message"=>" failed please try again");
                            
                        }
                        echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }


   //contact

          function contact($conn)
    {
            $response=array();
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $phone=$_REQUEST['phone'];
            $comments=$_REQUEST['comments'];
          
            $insert=mysqli_query($conn, "insert into contact_us set name='".$name."',email='".$email."', phone='".$phone."', message='".$comments."'");
            if($insert){
            $status=1;
            $message="Contact us successfully";
            $to="shrinkcom1.software@gmail.com";
            $subject='Contact Details';
            $message1='
            <h4>Name : '.$name.'</h4>
            <h4>Email : '.$email.'</h4>
            <h4>Phone : '.$phone.'</h4>
            <h4>Comments : '.$comments.'</h4>
            <p>Thank you for being a part of the Ceramic-Api community!
            <p>Sincerely,</p>
            <p>The Ceramic-Api Team</p>';
    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "from:<".$email.">\r\n";
            //$headers .= "CC:<shrinkcom.software@gmail.com>\r\n";

            $mail=mail($to,$subject,$message1,$headers);
           
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            
            $response_array= array("status"=>$status,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }

        //size

         function size($conn)
    {
            $response=array();
            $cate_id=$_REQUEST['category_id'];
            $subcate_id=$_REQUEST['subcategory_id'];
            //get category data
            if(!empty($subcate_id))
            {
              $product = "select * from assign_size where category_id='$cate_id' and subcategory_id='$subcate_id' ";
             }
             else
             {
               $product = "select * from assign_size where category_id='$cate_id' and subcategory_id=''"; 
             }
         
            $product = $conn->query($product);
            $rows = $product->num_rows;
            $product_row=  $product->fetch_assoc();
            $size_ids=$product_row['size_id'];
             $ids=explode(',', $size_ids);
            if($rows>0){
             foreach ($ids as $key => $id) {
              
                  $sqlFol4=mysqli_query($conn, "select * from  size where size_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);   
             
                $response[]=$ro4;
            }
            
          
            $status=1;
            $message="Success Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }

       function brand($conn)
    {
            $response=array();
              $cate_id=$_REQUEST['category_id'];
            $subcate_id=$_REQUEST['subcategory_id'];
            //get category data
           if(!empty($subcate_id)){
             $product = "select * from assign_brand where category_id='$cate_id' and subcategory_id='$subcate_id' ";
             }else{
             $product = "select * from assign_brand where category_id='$cate_id' and subcategory_id=''"; 
           }
        
            $product = $conn->query($product);
            $rows = $product->num_rows;
            $product_row=  $product->fetch_assoc();
            $brand_ids=$product_row['brand_id'];
             $ids=explode(',', $brand_ids);
            if($rows>0){
            foreach ($ids as $key => $id) {
              
                  $sqlFol4=mysqli_query($conn, "select * from  brand where brand_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);   
             
                $response[]=$ro4;
            }
            
          
            $status=1;
            $message="Success Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }


    function payment($conn)
    {
            $response=array();
            $trans_id=$_REQUEST['trans_id'];
            $user_id=$_REQUEST['user_id'];
            $amount=$_REQUEST['amount'];
            $booked_id=$_REQUEST['booked_id'];
           
            $insert=mysqli_query($conn, "insert into payment set transaction_id='".$trans_id."',amount='".$amount."', booked_id='".$booked_id."', user_id='".$user_id."'");
            if($insert){
            $status=1;
            $message="Payment Success ";
            }
            else{
            $status=0;
            $message="something went wrong";
            }
            
            $response_array= array("status"=>$status,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);
    }
	
	function productsOnoffer($conn){
		 $response=array();
	        $base_url=base_url();
	        $dealid=$_REQUEST['dealid'];
	        $city_id=$_REQUEST['city_id'];
            //get deals data
            
            // $subcategory = "select * from product where deal_id=$dealid AND city=$city_id AND p_status='1'";
          $subcategory = "SELECT product.*, cities.*  
                            from product 
                            join cities 
                            on  product.city = cities.id 
                            where deal_id=$dealid AND city=$city_id AND p_status='1'";
            $subcategory = $conn->query($subcategory);
            $rows = $subcategory->num_rows;
            if($rows>0){
            while($subcate_row=  $subcategory->fetch_assoc())
            {   
                $sid=$subcate_row['sid'];
                $prod_id=$subcate_row['prod_id'];
                $brand_id=$subcate_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   
                   $sizesarr[]= $sizename;
                   
              }
                 $subcate_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
     
              }
              // $sellers= "select seller_id,sname,semail,phone from seller where seller_id=$sid";
               $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
               $seller_res = $conn->query($sellers);
                $seller_array=array();
              //  while($seller =  $seller_res->fetch_assoc()){
                   
              //      $seller_array[]= $seller;
                   
                   
              // }

              //   $subcate_row['seller']=$seller_array;
                $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }

              if(!empty($seller_array)){
               $subcate_row['seller']=$seller_array;
              }
              else{
               $subcate_row['seller']=array();
              } 
                $subcate_row['review']=$reviewarr; 
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                
               
               
$review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id ";
$reviewq = $conn->query($review);
$reviewarr=array();
$no_rows = $reviewq->num_rows;;
$t_trating= 0;
while($prod_review =  $reviewq->fetch_assoc()){
$reviewarr[]= $prod_review;
$t_trating=$t_trating+$prod_review['rating'];
}
$subcate_row['average_rating']=number_format($t_trating/$no_rows,2);
// $response[]=$product_row;
     $response[]=$subcate_row;          
               
               
               
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
	}
	
	
	function productsOnBrand($conn){
		 $response=array();
	        $base_url=base_url();
	        $brandid=$_REQUEST['brandid'];
	        
            //get deals data
            
            $subcategory = "select * from product where brand_id=$brandid AND p_status='1'";
          
            $subcategory = $conn->query($subcategory);
            $rows = $subcategory->num_rows;
            if($rows>0){
            while($subcate_row=  $subcategory->fetch_assoc())
            {   
                $sid=$subcate_row['sid'];
                $prod_id=$subcate_row['prod_id'];
                $brand_id=$subcate_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
             $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   
                   $sizesarr[]= $sizename;
                   
              }
                 $subcate_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
                   
              }
               // $sellers= "select seller_id,sname,semail,phone from seller where seller_id=$sid";
               $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
               $seller_res = $conn->query($sellers);
              //   $seller_array=array();
              //  while($seller =  $seller_res->fetch_assoc()){
                   
              //      $seller_array[]= $seller;
                   
                   
              // }

              //   $subcate_row['seller']=$seller_array; 
                 $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }

              if(!empty($seller_array)){
               $subcate_row['seller']=$seller_array;
              }
              else{
               $subcate_row['seller']=array();
              }
                $subcate_row['review']=$reviewarr; 
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;
               
            }
            
          
	        $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
	}
	
	function update_token($conn)
{
    $random = $_POST['random_id'];
    $userid = $_POST['userid'];
    $token = $_POST['token'];
    $type = $_POST['type'];
  
    // $sql = mysqli_query($conn,"update `users` set `update_token`='$token' where `id`='$userid' ");
    if($type == 'guest'){
       
         $check = mysqli_query($conn,"select * from token where randomid = '$random'");
          
          $numrows = mysqli_num_rows($check);
         if($numrows > 0)
         {
             
             $sql = mysqli_query($conn,"update `token` set `update_token`='$token',userid = '$random',randomid = '$random'  where `randomid`='$random' ");
         }
         else
         {
           
        $sql = mysqli_query($conn,"insert into token (`update_token`,`userid`,`randomid`) values ('$token','$random','$random')");
         }
         
    }
    if($type == 'login'){
        
        $check = mysqli_query($conn,"select * from token where randomid = '$random'");
         $numrows = mysqli_num_rows($check);
         if($numrows > 0)
         {
            $sql = mysqli_query($conn,"update `token` set `update_token`='$token',userid = '$userid' where `randomid`='$random' ");
         }
         else
         {
        $sql = mysqli_query($conn,"insert into token (`update_token`,`userid`,`randomid`) values ('$token','$userid','$random')");
         }
         
        
    }
    if($type == 'logout'){
        
        
        $sql = mysqli_query($conn,"update `token` set `update_token`='$token',userid = '$random' where `randomid`='$random' and userid = '$userid'");
    }
    /* $check = mysqli_query($conn,"select * from token where userid='$userid'");
    $numrows = mysqli_num_rows($check);
    if($numrows > 0)
    {
        $sql = mysqli_query($conn,"update `token` set `update_token`='$token' where `userid`='$userid' ");
    }
    else
    {
        mysqli_query($conn,"insert into token (`update_token`,`userid`) values ('$token',$userid)");
    }*/
   /*  $arr = array("result" => 1,"message" => "susscessfully updated ");
            $json_str = json_encode($arr);
            echo $json_str;*/
    if($sql)
    {
        $arr = array("result" => 1,"message" => "successfully updated ");
            $json_str = json_encode($arr);
            echo $json_str;
    }
    else
    {
         $arr = array("result" => 0, "message" => "please try again!");
            $json_str = json_encode($arr);
            echo $json_str;
    }
    
}

function get_notification($conn)
{
    
        $user_id=$_POST['userid'];
        $sql = mysqli_query($conn, "SELECT * FROM notification where user_id=$user_id order by noti_id DESC ");
        $userArr = array();
        if(mysqli_num_rows($sql) > 0)
        {
            while($row = mysqli_fetch_assoc($sql))
            {
              $userArr[] = $row;
            }
            $arr = array("result" => 1, "userData" => $userArr, "message" => "Notification list");
            $json_str = json_encode($arr);
            echo $json_str;
        }
        else
        {
            $arr = array("result" => 0,  "message" => $sql);
            $json_str = json_encode($arr);
            echo $json_str;
        } 
}

function contactdetail($conn)
	{
	        $response=array();
            $sql = "select * from contact_detail ";
            $product = $conn->query($sql);
            $rows = $product->num_rows;
            if($rows>0){
            while($subcate_row=  $product->fetch_assoc())
            {
                $response[]=$subcate_row;
            }
	         $status=1;
            $message="Contact List Shown";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array,JSON_UNESCAPED_UNICODE);
	}
	
	function producttaxrate($conn)
	{
	        $response=array();
            $sql = "select * from product_taxrate ";
            $product = $conn->query($sql);
            $rows = $product->num_rows;
            if($rows>0){
            while($subcate_row=  $product->fetch_assoc())
            {
                $response[]=$subcate_row;
            }
	         $status=1;
            $message="Tax list Shown";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array,JSON_UNESCAPED_UNICODE);
	}


    function productsearch($conn)
    {
         $response=array();
            $base_url=base_url();
            $product_name=$_REQUEST['product_name'];
            $type = $_REQUEST['type'];


        $where = '';$category_ids = '';$cat_where='';
        if(isset($_REQUEST['city']) && $_REQUEST['city'])
        {
            $city_id = $_REQUEST['city'];
            $where = 'and city='.$_REQUEST['city'].'';
            $cate_sql = "select prod_cate_id from product where city='$city_id'  GROUP BY `prod_cate_id` ";
            $categories = $conn->query($cate_sql);
            while($cat_rows =  $categories->fetch_assoc())
            {
               $category_ids = $category_ids.','.$cat_rows['prod_cate_id'];
            }
        }
            

          if($type =='arabic')
          { 
            $subcategory = "select *,cities.city_name from `product` join cities on product.city=cities.id where p_status=1 AND `prod_title_ar` Like '%$product_name%' $where";
          }
          else
          {
               $subcategory = "select *,cities.city_name from product join cities on product.city=cities.id where p_status=1 AND prod_title Like '%$product_name%' $where";
          }


          
            $subcategory = $conn->query($subcategory);
            $rows = $subcategory->num_rows;
            if($rows>0){
            while($subcate_row=  $subcategory->fetch_assoc())
            {   
                $sid=$subcate_row['sid'];
                $prod_id=$subcate_row['prod_id'];
                $brand_id=$subcate_row['brand_id'];
            $image = "select * from prod_image where prod_id=$prod_id";
             $images = $conn->query($image);
               $imagearr=array();
               while($prod_image =  $images->fetch_assoc()){
                   
                   $imagearr[]= $prod_image;
                   
              }
               $subcate_row['images']=$imagearr;
               $size = "select * from prod_size where prod_id=$prod_id";
              $sizes = $conn->query($size);
               $sizesarr=array();
               while($prod_size =  $sizes->fetch_assoc()){
                //   print_r($prod_size);
                    $size_id=$prod_size['size'];

                   $sizedata = "SELECT * from size join prod_size on  size.size_id = prod_size.size where size_id='$size_id' AND prod_id='$prod_id'";
                   $sizesdata = $conn->query($sizedata);
                   $sizename = mysqli_fetch_assoc($sizesdata);
                   $qty=$sizename['quantity'];
                   $soldqty=$sizename['sold_qty'];
                    $total=$qty-$soldqty;
                   $sizename['quantity']=$total;
                   $sizesarr[]= $sizename;
                   
              }
                 $subcate_row['size']=$sizesarr;
                 
                $brand= "select * from brand where brand_id=$brand_id";
               $brands = $conn->query($brand);
               $brandarr=mysqli_fetch_assoc($brands);
                $subcate_row['brand']=$brandarr;

                // $review= "select * from review join users on review.user_id=users.id where product_id=$prod_id";
                  $review= "select review.*,users.*,cities.city_name from review left join users on review.user_id=users.id left join cities on cities.id=users.city where product_id=$prod_id";
               $reviewq = $conn->query($review);
                $reviewarr=array();
               while($prod_review =  $reviewq->fetch_assoc()){
                   
                   $reviewarr[]= $prod_review;
                   
                   
              }
               // $sellers= "select seller_id,sname,semail,phone from seller where seller_id=$sid";
               $sellers= "select seller.seller_id,seller.sname,seller.semail,seller.phone,seller.city,cities.city_name from seller join cities on seller.city=cities.id where seller_id=$sid";
               $seller_res = $conn->query($sellers);
                $seller_array=array();
              //  while($seller =  $seller_res->fetch_assoc()){
                   
              //      $seller_array[]= $seller;
                   
                   
              // }

              //   $subcate_row['seller']=$seller_array;
                $sellers_count = $seller_res->num_rows;
                if ($sellers_count>0) {
                  
               while($seller =  $seller_res->fetch_assoc()){
                   
                   $seller_array[]= $seller;
                   
                   
              }
              }

              if(!empty($seller_array)){
               $subcate_row['seller']=$seller_array;
              }
              else{
               $subcate_row['seller']=array();
              } 
                $subcate_row['review']=$reviewarr; 
                $subcate_row['base_url']=$base_url.'seller/upload/product/';
                $response[]=$subcate_row;
               
            }
            
          
            $status=1;
            $message="Loading Data";
            }
            else{
            $status=0;
            $message="No Data Found";
            }
            $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
            echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }
    
//     function logo($conn)
// 	{
// 	        $response=array();
//             $sql = "select * from logo ";
//             $product = $conn->query($sql);
//             $rows = $product->num_rows;
//             if($rows>0){
//             while($subcate_row=  $product->fetch_assoc())
//             {
//                 $response[]=$subcate_row;
//             }
// 	         $status=1;
//             $message="App Logo Shown";
//             }
//             else
//             {
//             $status=0;
//             $message="No Data Found";
//             }
//             $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
//             echo $json_success = json_encode($response_array,JSON_UNESCAPED_UNICODE);
// 	}


function test()
{
   
    $query = "select * from seller where 1=1";
    $sql = $conn->query($query); 
    $run = mysqli_query($conn , $insert);
}
    
 function selleregis($conn)
    {
       $response=array();
        $sname=$_POST['sname'];
        
        $semail=$_POST['semail'];
        $pass=md5($_POST['pass']);
        $spass=$_POST['pass'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $shopname=$_POST['shop_name'];
        
        

	$sellerdate=$_POST['seller_date'];
// 	$paypal=$_POST['paypal'];
	$dayadd=$_POST['day_add'];
	$location=$_POST['location'];
	$availability=$_POST['availability'];
    $bankname=$_POST['bank_name'];
    $accountnumber=$_POST['account_number'];
    $ifscswift=$_POST['ifsc_swift'];
    $image=uniqid().$_FILES['seller_img']['name'];

        
   
            
    //        print_r($shopname);die;

        //check email exist or not
        $query = "select * from seller where semail='$semail'";
        $sql = $conn->query($query);
        $count= $sql->num_rows; 
        if($count == 0){
            //upload img    
             move_uploaded_file($_FILES['seller_img']['tmp_name'],"../seller/upload/seller/".$image);
            //insert if valid email 
             $sdate = date('Y-m-d H:i:s');
             $insert="INSERT INTO `seller`(`sname`,`sdate`,`semail`,`pass`,`spass`,`phone`,`availability`,`date_add`,`city`,`shop_name`,`simg`,`location`,`bank_name`,`account_number`,`ifsc_swift`)
                                VALUES ('$sname','$sellerdate','$semail','$pass','$spass','$phone','$availability','$dayadd','$city' ,'$shopname', '$image','$location','$bankname','$accountnumber','$ifscswift')";
           

            $run = $conn->query($insert);
            // $run = $conn->query($insert);
            
            if($run)
            {

                 //$lastid = mysqli_insert_id($conn);
                // mysqli_query($conn,"insert into token (`update_token`,`userid`,`randomid`) values ('',$lastid,'$random')");
            //get user data
            
          /*  $query_user = "select * from seller where semail='$semail'"; 
            $query_user = $conn->query($conn ,$query_user);*/
            $sql = $conn->query($query);
            $user = $sql->fetch_assoc();

            $sname=$user['sname'];
            $to=$semail;
            $subject='Thanking you for register on Ceramic-Api';
            $message='<h1 color="blue"> Welcome</h1><h2 color="blue">Dear '.$sname.' </h2>
            <h4>You are almost there</h4>
             <p>Thank you for being a part of the Ceramic-Api community!
             <p>Sincerely,</p>
              <p>The Ceramic-Api Team</p>';
    
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "from:<shrinkcom.software@gmail.com>\r\n";
            

            $mail=mail($to,$subject,$message,$headers);
            
            $status=1;
            $response=$user;
            $message="Register Successfully , Thankyou for joining us!!";
            }
            else{
            $status=2;
            $message="Can't Register, Please Try again latter!!";
            }
        }else{
            
            $status=0;
            $message="Email Already Exist, Please try with another Email!!";
            }
        
         $response_array= array("status"=>$status,"response" => $response,"message" =>$message);       
         echo $json_success = json_encode($response_array, JSON_UNESCAPED_SLASHES);

    }
    
    function seller_detail($conn)
    { 
        $seller_id=$_REQUEST['seller_id'];
       
        $response=array();
        // $queryget = mysqli_query($conn, "select * from `seller` where `seller_id`='$seller_id'");
        $queryget=mysqli_query($conn, "select seller.*,cities.city_name from seller Left join  cities ON seller.city=cities.id  where `seller_id`='$seller_id'");
        $row = mysqli_fetch_assoc($queryget);
        
    if($row>0){
    $response_array= array("status"=>1,"response" => $row,"message" =>'Seller detail');       
    echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }else{
          $response_array= array("status"=>1,"response" => $row,"message" =>'No data found');       
    echo $json_success = json_encode($response_array, JSON_UNESCAPED_UNICODE);
    }
        
    }
    
?>