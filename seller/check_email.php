<?php include "config.php";

if(isset($_POST['email'])){
$email=$_POST['email'];
$query = "SELECT * FROM seller WHERE semail = '$email'"; 
$result = mysqli_query($conn, $query); 
if ($result) { 
		$row = mysqli_num_rows($result); 
}
if ($row>0) {
          $response['message']='this email is already in use';
          $response['status']=1;
            }else {
            $response['message']='this email is available';
            $response['status']=0;
            }
    echo json_encode($response);
}

if(isset($_POST['phone'])){
  $phone=$_POST['phone'];
$query = "SELECT * FROM seller WHERE phone = '$phone'"; 
$result = mysqli_query($conn, $query); 
if ($result) { 
		$row = mysqli_num_rows($result); 
}
if ($row>0) {
          $response['message']='this phone number is already in use';
          $response['status']=1;
            }else {
            $response['message']='this phone number is available';
            $response['status']=0;
            }
    echo json_encode($response);
}

if(isset($_POST['name'])){
    $name=$_POST['name'];
    $query = "SELECT * FROM seller WHERE sname = '$name'"; 
$result = mysqli_query($conn, $query); 
if ($result) { 
		$row = mysqli_num_rows($result); 
}
if ($row>0) {
          $response['message']='this seller-name is already in use';
          $response['status']=1;
            }else {
            $response['message']='this seller-name is available';
            $response['status']=0;
            }
    echo json_encode($response);
}
?>

