<?php

include"config.php";

// driver sign up //

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $phone=$_POST['contact'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $city=$_POST['city_id'];
    $company=$_POST['company'];
    $dob=$_POST['dob'];
    
           $allowed = array('gif', 'png', 'jpg','jpeg');
$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) 
{
     $_SESSION['d_msg']="please upload valid image file";
       header('location:index.php');
    
}else{
    
    $image=rand().$_FILES['file']['name'];
    
    
    
  $sqlusers=mysqli_query($conn,"select * from driver where email='$email'");
$userscount1=mysqli_num_rows($sqlusers);

$sqlusers1=mysqli_query($conn,"select * from driver where phone='$phone'");
$userscount2=mysqli_num_rows($sqlusers1);

if($userscount1>0)
{
                $_SESSION['d_msg']="Entered email is already in use.";
                 header('Location:sign_up.php');
	
}
elseif($userscount2>0)
{
                $_SESSION['d_msg']="Entered phone number is already in use.";
                 header('Location:sign_up.php');
		
}
else{

    move_uploaded_file($_FILES['file']['tmp_name'],"images/".$image);
    
    $insertdriver = "INSERT INTO `driver`(`name`,`surname`,`phone`,`email`,`password`,`image`,`city`,`company_name`,`dob`) 
                     VALUES ('".$name."','".$surname."','".$phone."','".$email."','".$password."','".$image."','".$city."','".$company."','".$dob."')";

     $insert = mysqli_query($conn,$insertdriver);
     if($insert){
                    $_SESSION['d_msg']="Driver added successfuly";
                    header('Location:index.php');
                
		}else{
		            $_SESSION['d_msg']="Something went wrong";
                    header('Location:index.php');
               
		}
}
}
}

// check if phone no. exist //

if(isset($_POST['check_phone']))
{
     $phone=$_POST['check_phone'];
$query = "SELECT * FROM driver WHERE phone = '$phone'"; 
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

// check if email already exist //

if(isset($_POST['check_email']))
{
    $email=$_POST['check_email'];
$query = "SELECT * FROM driver WHERE email = '$email'"; 
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

//  Driver login //

if(isset($_POST['login'])){
    
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    
    $query = "SELECT * FROM driver WHERE email = '$email' and password='$pass'";  
    $result = mysqli_query($conn, $query); 
    $row   = mysqli_fetch_assoc($result);
  
    if($row){ 
        //print_r($row); die;
        
        $city_id=$row['city'];
    //   echo $city_id; die;
        $query1 = "SELECT cities.*, driver.* from driver left join cities on cities.id=driver.city WHERE driver.city=$city_id and driver.driver_id=".$row['driver_id'];  
      
        $result1 = mysqli_query($conn, $query1); 
        $row1   = mysqli_fetch_assoc($result1);
    //   print_r($row1); die;
         $_SESSION['driver_username']=$row['name']." ".$row['surname'];
        $_SESSION['driver_id']=$row['driver_id'];
        
        $data=array(
                    'name'=>$row['name'],
                    'surname'=>$row['surname'],
                    'city'=>$row1['city_name'],
                    'dob'=>$row['dob'],
                    'image'=>$row['image'],
                    'company'=>$row['company_name'],
                    'phone'=>$row['phone'],
                    'email'=>$row['email'],
                    'city_id'=>$row['city']
                    );
                    
        $_SESSION['data']= $data;
 
        header('Location:profile.php');
        
            }else{
           
                   $_SESSION['d_msg']="Login Credentials Not Matched.";
                    header('Location:index.php');
                }
    
}

// driver update data //

if(isset($_POST['update'])){
   // print_r($_POST); die;
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $city=$_POST['city_id'];
    $driver_id=$_POST['driver_id'];
    $company=$_POST['company'];
    
// if password update request comes//
    
    if((!empty($_POST['opass']) && !empty($_POST['npass'])))
    {
        $oldpass=md5($_POST['opass']);
        $newpass=md5($_POST['npass']);
        $query1 = "SELECT * FROM driver WHERE driver_id ='$driver_id' and password='$oldpass'"; 
            $result1 = mysqli_query($conn, $query1); 
            if($result1)
            { 
                $row1 = mysqli_fetch_row($result1); 
          if($row1[5]==$newpass){
              $_SESSION['d_msg']="old password cant be new password";
                header('location:profile.php');
          }else{
               
              $query="update driver set password='$newpass' where driver_id='$driver_id' ";
                $update = mysqli_query($conn,$query); 
          }
            		
             }
    }
    
// if profile picture/document update request comes //
    
    if(!empty($_FILES['file']['tmp_name'])){
        
        $allowed = array('gif', 'png', 'jpg','jpeg');
        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
             $_SESSION['d_msg']="please upload valid image file";
               header('location:profile.php');
        }else{
        $image=rand().$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"images/".$image);
        $sql="update driver set image='$image' where driver_id='$driver_id'";
        $update = mysqli_query($conn,$sql); 
    }
        
    }
    
    
    $query="update driver set name='$name', company_name='$company', surname='$surname',phone='$phone', dob='$dob',city='$city' where driver_id='$driver_id' ";
   
    $update = mysqli_query($conn,$query); 
    
    if($update){
       $_SESSION['d_msg']="Profile Updated Successfuly";
       header('location:profile.php');
    }else{$_SESSION['d_msg']="Something Went Wrong";
       header('location:profile.php');}
    
}

// drivre update ends //

// check on front end userid aur pass is matching or not // 

if(isset($_POST['check_pass']))
{
     $pass=md5($_POST['check_pass']);
     $driver_id=$_POST['driver_id'];
     
$query = "SELECT * FROM driver WHERE driver_id ='$driver_id' and password='$pass'"; 
$result = mysqli_query($conn, $query); 
if ($result) { 
		$row = mysqli_num_rows($result); 
}
if ($row>0) {
          $response['message']='Correct Password';
          $response['status']=1;
            }else {
            $response['message']='Wrong Password';
            $response['status']=0;
            }
    echo json_encode($response);
    
}



?>