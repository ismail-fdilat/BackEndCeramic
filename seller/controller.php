<?php include"config.php";

if($_POST['con']=="checsellerkpass")
{
    $opass=md5($_POST['opass']);
   $id=$_POST['admin_id'];
   
   $sql="select * from seller where seller_id=$id and pass='$opass'";

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
    
        $query1 = "SELECT * FROM seller WHERE seller_id ='$id' and pass='$oldpass'"; 
      
            $result1 = mysqli_query($conn, $query1); 
            $row=mysqli_fetch_row($result1);
         
            if($row){
                if($row[8]==$newpass)
                { 
                    $response['message']='old pass cant be use as new pass';
                    $response['status']=0;
                }else{
                    
                    $query="update seller set pass='$newpass' where seller_id=$id";

                    $result=mysqli_query($conn,$query);
                     $response['message']='Password changed';
                    $response['status']=1;
                    }
                
                  }

            echo json_encode($response);        
            
}


?>