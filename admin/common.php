<?php 

 include('config.php');
 
 
 if(isset($_POST['status']))
 {

    $status=$_POST['status']; 
    $order_id=$_POST['order_id']; 
    $seller_id=$_POST['sellerr_id'];
    $booking_id=$_POST['booking_id'];
  
    if($status==2){
         $query = "Update order_product Set status = $status , payment_status='1' Where orderid = '$order_id' ";  
        $result = mysqli_query($conn,$query);      
        if($result){ 
                                    $sql="select * from order_product where booking_id='$booking_id' ";
                                    $result1 = mysqli_query($conn,$sql);
                                    $check=array();
                                        while($checkstatus=mysqli_fetch_assoc($result1))
                                        {
                                              $check[]= $checkstatus['status']; 
                                        }
                                      
                                      if((in_array('0',$check)==false) && (in_array('1',$check)==false) )
                                      {
                                         $sql1="update book_order set status='1' , payment_status='1' where booked_id='$booking_id'";
                                         $update_order=mysqli_query($conn,$sql1);
                                      }
            
                    echo 1; 
                    }else{
                        echo 0;
                         }
                    }else{
                       $query = "Update order_product Set status = $status Where orderid = '$order_id' "; 
                        $result = mysqli_query($conn,$query);      
                        if($result){
                                    
                                     $sql="select * from order_product where booking_id='$booking_id' ";
                                      $result1 = mysqli_query($conn,$sql);
                                      $check=array();
                                      while($checkstatus=mysqli_fetch_assoc($result1)){
                                         $check[]= $checkstatus['status']; 
                                      }
                                      
                                      if((in_array('0',$check)==false) && (in_array('1',$check)==false) ){
                                         $sql1="update book_order set status='1' , payment_status='1' where booked_id='$booking_id'";
                                         $update_order=mysqli_query($conn,$sql1);
                                      }
                                    
                            echo 1; 
                        }else{
                            echo 0;
                        }
                    }
 }

 if(isset($_POST['seller_id']))
 { 
    $sid=$_POST['seller_id']; 
    
    $query = "DELETE FROM seller WHERE seller_id = $sid";
    $result = mysqli_query($conn,$query);      
    if($result){
        echo 1;
    }else{
        echo 0;
    }
 }



?>