<?php include"config.php";

if(isset($_POST['user_id'] ,$_POST['user_status']))
{
    $status=$_POST['user_status'];
    $id=$_POST['user_id'];
    $sql="update users set status=$status where id=$id";
    $result=mysqli_query($conn, $sql);
    if($result){echo 1;}else{echo 0;}
}

if($_POST['con']=="checkpass")
{ 
   $opass=md5($_POST['opass']);
   $id=$_POST['admin_id'];
   
   $sql="select * from tbl_admin where id=$id and password='$opass'";

   $query=mysqli_query($conn,$sql);
   $result=mysqli_fetch_row($query);
   if($result){
   $response['message']='Correct Password';
          $response['status']=1;
            }else {
            $response['message']='Wrong password';
            $response['status']=0;
            }
    echo json_encode($response);     
  
}

if($_POST['con']=="updatepass")
{ 
    $oldpass=md5($_POST['opass']);
    $newpass=md5($_POST['npass']);
    $id=$_POST['id'];
        $query1 = "SELECT * FROM tbl_admin WHERE id ='$id' and password='$oldpass'"; 
      
            $result1 = mysqli_query($conn, $query1); 
            $row=mysqli_fetch_row($result1);
          
            if($row){
                if($row[6]==$newpass)
                { 
                    $response['message']='old pass cant be use as new pass';
                    $response['status']=0;
                }else{
                    
                    $query="update tbl_admin set password='$newpass' where id=$id";

                    $result=mysqli_query($conn,$query);
                     $response['message']='Password changed';
                    $response['status']=1;
                    }
                
                  }

            echo json_encode($response);        
            
}

if($_POST['con']=="check_user_email")
{
    $email1=$_POST['check_email'];
    $email=$string = preg_replace('/\s+/', '', $email1);
    $query1="select * from `users` where `email`='$email'";
    $result1 = mysqli_query($conn, $query1); 
    if(mysqli_num_rows($result1)>0)
    {
        $response['message']='Email Already Exist , Please Use Another Email.';
        $response['status']=0;
    }else{
        
        $response['message']='Email Available';
        $response['status']=1;
    } 
        
    echo json_encode($response);       
}



?>