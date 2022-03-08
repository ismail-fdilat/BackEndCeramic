<?php
date_default_timezone_set("Asia/Calcutta");

	function User_register($conn)
	{
		
		
		$user_fname=$_POST['user_fname'];
		$user_lname=$_POST['user_lname'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$zipcode=$_POST['zipcode'];
		$country=$_POST['country'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		
		$login_date=$date=date("Y-m-d H:i:s");
		

		$check=mysqli_query($conn,"select * from users where email='$email'");
		$sql_user=mysqli_fetch_assoc($check);
      	if(!empty($sql_user)) 
      	{
      
     	 $arr = array("status"=>2,"response" => $userArr,"message" =>"email Already exist!!");       
               $json_success = json_encode($arr, JSON_UNESCAPED_SLASHES);
               echo $json_success;
      
      	}
      	else
      	{     
     
     $test="INSERT INTO `users`(`user_fname`,`user_lname`,`email`,`password`,`mobile`,`address`,`city`,`zipcode`,`country`,`gender`,`dob`,`login_date`) VALUES ('$user_fname','$user_lname','$email','$password','$mobile','$address','$city','$zipcode','$country','$gender','$dob','$login_date')";
             $sql = mysqli_query($conn,$test);
              $last_id = mysqli_insert_id($conn);
           
            
              if($sql)
              {  
              
	            $user_sql = "select * from `users` where id = '$last_id'";
	            $user_res = mysqli_query($conn,$user_sql) or die(mysqli_error($conn));
	            
		            while($row = mysqli_fetch_assoc($user_res))
		            {
		              $userArr[] = $row;
		            }

		             $arr = array("status"=>1,"response" => $userArr,"message" =>"Registered successfully");       
		               $json_success = json_encode($arr, JSON_UNESCAPED_SLASHES);
		               echo $json_success;
	          }
               else 
               {
                 $error = array("status" => 0,"data" => array(), "message" => "please try again!");
                   $json_error = json_encode($error);
                   echo $json_error;
               } 
            }
	}


	function seller_register($conn)
	{
		
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$phone=$_POST['phone'];
		$location_store=$_POST['location_store'];
		$account_type=$_POST['account_type'];
		$document=$_POST['document'];
		$document_file=$_POST['document_file'];
		$document_id=$_POST['document_id'];
		$city=$_POST['city'];
		$street=$_POST['street'];
		$landline=$_POST['landline'];
		$store_name=$_POST['store_name'];
		$store_logo=$_POST['store_logo'];

		$check=mysqli_query($conn,"select * from seller where email='$email'");
		$sql_user=mysqli_fetch_assoc($check);
      	if(!empty($sql_user)) 
      	{
      
     	 $arr = array("status"=>2,"response" => $userArr,"message" =>"email Already exist!!");       
               $json_success = json_encode($arr, JSON_UNESCAPED_SLASHES);
               echo $json_success;
      
      	}
      	else
      	{     
     
        $test="INSERT INTO `seller`(`first_name`,`last_name`,`location_store`,`account_type`,`email`,`password`,`phone`,`document`,`document_file`,`document_id`,`city`,`street`,`landline`,`store_name`,`store_logo`) VALUES ('$first_name','$last_name','$location_store','account_type','$email','$password','$phone','$document','$document_file','$document_id','$city','$street','$landline','$store_name','$store_logo')";
             $sql = mysqli_query($conn,$test);
              $last_id = mysqli_insert_id($conn);
           
            
              if($sql)
              {  
              
	            $user_sql = "select * from `seller` where seller_id = '$last_id'";
	            $user_res = mysqli_query($conn,$user_sql) or die(mysqli_error($conn));
	            
		            while($row = mysqli_fetch_assoc($user_res))
		            {
		              $userArr[] = $row;
		            }

		             $arr = array("status"=>1,"response" => $userArr,"message" =>"Registered successfully");       
		               $json_success = json_encode($arr, JSON_UNESCAPED_SLASHES);
		               echo $json_success;
	          }
               else 
               {
                 $error = array("status" => 0,"data" => array(), "message" => "please try again!");
                   $json_error = json_encode($error);
                   echo $json_error;
               } 
            }
		
	}

	function user_login($conn)

	{	
		$email= $_POST['email'];
   		$password= md5($_POST['password']);
 
   if (isset($email))
   {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email= '$email'AND password= '$password'");
        $userArr = array();
        if (mysqli_num_rows($sql) > 0)
        {

            while($row = mysqli_fetch_assoc($sql))
            {
              $userArr[] = $row;
  
            }
            $arr = array("status" => 1, "response" => $userArr, "message" => "Login Succesfully");
            $json_str = json_encode($arr);
            echo $json_str;
        }
        else
        {
            $arr = array("status" => 0, "response" => array(), "message" => "please try again!");
            $json_str = json_encode($arr);
            echo $json_str;
        } 
   }

	}


	function seller_login($conn)
	{	

		$email= $_POST['email'];
   		$password= md5($_POST['password']);
 
   if (isset($email))
   {
        $sql = mysqli_query($conn, "SELECT * FROM seller WHERE email= '$email'and password= '$password'");
        $userArr = array();
        if (mysqli_num_rows($sql) > 0)
        {

            while($row = mysqli_fetch_assoc($sql))
            {
              $userArr[] = $row;
  
            }
            $arr = array("status" => 1, "response" => $userArr, "message" => "Login Succesfully");
            $json_str = json_encode($arr);
            echo $json_str;
        }
        else
        {
            $arr = array("status" => 0, "response" => array(), "message" => "please try again!");
            $json_str = json_encode($arr);
            echo $json_str;
        } 
   }

	}

	function User_Forgetpassword($conn)
	{
		if(!empty($_REQUEST['email']))  
		{
		  $email = $_REQUEST['email'];
		  $to = $email;
		  $subject = "forget password";
		  $otp = rand(1000,9999);
		  $comment = $otp;
			$result=mysqli_query($conn,"select * from users where email='$to'");
			$cont=mysqli_num_rows($result);
			if($cont>0)
			{
				$date=date("Y-m-d H:i:s");
				$query = "UPDATE users set otp='$otp', is_expired='0', create_at='$date' WHERE email = '$to'";
				$insert = mysqli_query($conn,$query);
	 
			//  mail($email, "$subject", $comment, "From: admin@gmail.com"); 
			 $data= array("response" => 1, "message" => "OTP sending !");

	  		}
	  		else
	  		{
	  			$data= array("response" => 0, "message" => "error please check your details !");
	  		}
	  		$json_str = json_encode($data);
            echo $json_str;
	  	}
	}

	function seller_Forgetpassword($conn)
	{
		if(!empty($_REQUEST['email']))  
		{
		  $email = $_REQUEST['email'];
		  $to = $email;
		  $subject = "forget password";
		  $otp = rand(1000,9999);
		  $comment = $otp;
		$result=mysqli_query($conn,"select * from seller where email='$to'");
			$cont=mysqli_num_rows($result);
			if($cont>0)
			{
				$date=date("Y-m-d H:i:s");
				$query = "UPDATE seller set otp='$otp', is_expired='0', create_at='$date' WHERE email = '$to'";
				$insert = mysqli_query($conn,$query);
	 
			//  mail($email, "$subject", $comment, "From: admin@gmail.com"); 
			 $data= array("status" => 1, "message" => "OTP sending !");

	  		}
	  		else
	  		{
	  			$data= array("status" => 0, "message" => "error please check your details !");
	  		}
	  		$json_str = json_encode($data);
            echo $json_str;
	  	}
			
	}

	function user_changepassword($conn)
	{
			$old_password = md5($_POST['old_password']);  
			$id=$_POST['id'];
			$userArr = array();
			$new_password=md5($_POST['new_password']);
			
			$query = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id' AND password='$old_password'");
			if(mysqli_num_rows($query) > 0)
			{
				$sql = mysqli_query($conn,"UPDATE users SET password= '$new_password' WHERE id = '$id'");
				
				if($sql)
				{
				$query = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id'");
					$result = mysqli_fetch_assoc($query);
					$userArr[] = $result;
				
					if($query)
					{
						$arr = array("status"=>1,"response" => $userArr,"message" => "Password has been changed");   
						$json_str = json_encode($arr);
						echo $json_str; 
					}
					else
					{
						$arr = array("status"=>0,"response" => $userArr,"message" => "Password has not been changed");   
						$json_str = json_encode($arr);
						echo $json_str; 
					}
				}
			}
			else
			{
					$arr = array("status"=>0,"message" => "user is not exist");   
		            $json_str = json_encode($arr);
		            echo $json_str; 
			}

	}


	function seller_changepassword($conn)
	{
			$old_password = md5($_POST['old_password']);  
			$seller_id=$_POST['seller_id'];
			$userArr = array();
			$new_password=md5($_POST['new_password']);
			
			$query = mysqli_query($conn,"SELECT * FROM seller WHERE seller_id = '$seller_id' AND password='$old_password'");
			if(mysqli_num_rows($query)>0)
			{
				$sql = mysqli_query($conn,"UPDATE seller SET password= '$new_password' WHERE seller_id = '$seller_id'");
				
				if($sql)
				{
				$query = mysqli_query($conn,"SELECT * FROM seller WHERE seller_id='$seller_id'");
					$result = mysqli_fetch_assoc($query);
					$userArr[] = $result;
				
					if($query)
					{
						$arr = array("status"=>1,"Data" => $userArr,"message" => "Password has been changed");   
						$json_str = json_encode($arr);
						echo $json_str; 
					}
					else
					{
						$arr = array("status"=>0,"Data" => $userArr,"message" => "Password has not been changed");   
						$json_str = json_encode($arr);
						echo $json_str; 
					}
				}
			}
			else
			{
					$arr = array("status"=>0,"message" => "user is not exist");   
		            $json_str = json_encode($arr);
		            echo $json_str; 
			}

	}


	function product($conn)
			    {

			  		$sql=mysqli_query($conn,"SELECT * FROM product");
			  		$userArr=array();
	          			if (mysqli_num_rows($sql)>0) 
	          			{
	          				while ($row=mysqli_fetch_assoc($sql)) 
	          				{
	          					$userArr[]=$row;
	          				}
	          					$arr=array("status"=>1,"data"=>$userArr,"message"=>"product seen");
	          					
	          			}
	          			else
	          			{
	          				$arr=array("status"=>0,"data"=>array(),"message"=>" failed please try again");
	          				
	          			}
	          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			    }


			    function show_product_id($conn)
			    {
			    	$prod_id=$_GET['prod_id'];

			  		$sql=mysqli_query($conn,"SELECT * FROM product WHERE prod_id='$prod_id'");
			  		$userArr=array();
	          			if (mysqli_num_rows($sql)>0) 
	          			{
	          				while ($row=mysqli_fetch_assoc($sql)) 
	          				{
	          					$userArr[]=$row;
	          				}
	          					$arr=array("status"=>1,"response"=>$userArr,"message"=>"product seen on the basis their id ");		
	          			}
	          			else
	          			{
	          				$arr=array("status"=>0,"response"=>array(),"message"=>" failed please try again");
	          				
	          			}
	          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			    }


			
		function getproduct_category($conn)
			    {
			    	
			    	$sql=mysqli_query($conn,"SELECT * FROM `dir_categories`");
					  		$userArr=array();
			          			if (mysqli_num_rows($sql)>0) 
			          			{
			          				while ($row=mysqli_fetch_assoc($sql)) 
			          				{
			          					$userArr[]=$row;
			          				}
			          					$arr=array("status"=>1,"response"=>$userArr,"message"=>"get product category seen");
			          					
			          			}
			          			else
			          			{
			          				$arr=array("status"=>0,"response"=>array(),"message"=>" failed please try again");
			          				
			          			}
			          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			    }	  


		 function product_subcategory_category($conn)
			    {
			    	$userArr=array();
			    	$category_id=$_GET['category_id'];

			    	$sql="SELECT * FROM `dir_sub_categories` WHERE category_id= '$category_id'";
			    	$qry=mysqli_query($conn,$sql);

			    	if (mysqli_num_rows($qry)>0) 
			    	{
			    		  while($row = mysqli_fetch_array($qry))
					    	{
					    		$userArr[]=$row;
					    	}	
			          			$userArr=array("status"=>1,"response"=>$userArr,"message"=>"product get by sub category on the basis of category id");
			          					
			        }
			          			else
			          			{
			          				$userArr=array("status"=>0,"message"=>" failed please try again");
			          				
			          			}
			          				echo json_encode($userArr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			    	}	

			function showproduct_category($conn)
			     {		    	
			    	$prod_cate_id =$_GET['prod_cate_id'];
			    	$userArr = array();

			    	$qry=mysqli_query($conn,"SELECT * FROM `product` WHERE prod_cate_id='$prod_cate_id'");
			    	if (mysqli_num_rows($qry)>0) 
			          	{
					          while($row = mysqli_fetch_array($qry))
					    	{

					    		$userArr[]=$row;
					    	}
			          					$userArr=array("status"=>1,"data"=>$userArr,"message"=>"product seen");
			          					
			          	}
			          			else
			          			{
			          				$userArr=array("status"=>0,"message"=>" failed please try again");
			          				
			          			}
			          				echo json_encode($userArr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			     }    	   

		

        function seller_showProfile($conn)
		{
			$seller_id =$_GET['seller_id'];
			$sql1=mysqli_query($conn,"SELECT email,password,first_name,last_name,city,phone,location_store,account_type,document,document_id,expiry_date,landline,store_name,store_logo FROM seller WHERE seller_id='$seller_id'");
			
			$userArr=array();

			if (mysqli_num_rows($sql1)>0)
			 {
				while($row=mysqli_fetch_assoc($sql1))
				{
					$userArr[]=$row;
				}
 				  $arr=array("status"=>1,"data"=>$userArr,"message"=>" profile seen");
			     
          	 }
     			else
          			{
	     				$arr=array("status"=>0,"data"=>array(),"message"=>" failed please try again");
         			}
         			echo json_encode($arr,JSON_UNESCAPED_SLASHES);
        }       

        function seller_addproduct($conn)
        {
        	$userArr=array();
        	$prod_title=$_POST['prod_title'];
        	$prod_short_desc=$_POST['prod_short_desc'];
        	$prod_price=$_POST['prod_price'];
        	$prod_desc=$_POST['prod_desc'];
        	$prod_cate_id=$_POST['prod_cate_id'];
        	$prod_subcate_id=$_POST['prod_subcate_id'];
        	$stock=$_POST['stock'];
        	$brand_id=$_POST['brand_id'];
        	$prod_subsubcate_id=$_POST['prod_subsubcate_id'];
        	$group=$_POST['group'];
        	$color=$_POST['color'];
        	$condition=$_POST['condition'];
        	$quantity=$_POST['quantity'];
        	$new_quantity=$_POST['new_quantity'];
        	$sku=$_POST['sku'];
        	$offer_note=$_POST['offer_note'];
        	$shipping_free=$_POST['shipping_free'];
        	$seller_id=$_POST['seller_id'];
        	$live_on_site=$_POST['live_on_site'];
        	$created_on=date("Y-m-d H:i:s");

        	$path='img/';
        	$prod_image=$path.time('his').basename($_FILES['image']['name']);
        			move_uploaded_file($_FILES['image']['tmp_name'], $prod_image);

        	$path2='img/';
        	$prod_image2=$path2.time('his').basename($_FILES['image2']['name']);
        			move_uploaded_file($_FILES['image2']['tmp_name'], $prod_image2);	

        	$path3='img/';
        	$prod_image3=$path3.time('his').basename($_FILES['image3']['name']);
        			move_uploaded_file($_FILES['image3']['tmp_name'], $prod_image3);			

			$sql2="INSERT INTO `product` (`prod_id`,`prod_title`,`prod_short_desc`,`prod_price`,`prod_desc`,`prod_cate_id`,`prod_subcate_id`,`stock`,`brand_id`,`prod_subsubcate_id`,`group`,`color`,`condition`,`quantity`,`new_quantity`,`sku`,`offer_note`,`shipping_free`,`sid`,`live_on_site`,`created_on`,`prod_image`,`prod_image2`,`prod_image3`) VALUES ('$prod_id','$prod_title','$prod_short_desc','$prod_price','$prod_desc','$prod_cate_id','$prod_subcate_id','$stock','$brand_id','$prod_subsubcate_id','$group','$color','$condition','$quantity','$new_quantity','$sku','$offer_note','$shipping_free','$seller_id','$live_on_site','$created_on','$prod_image','$prod_image2','$prod_image3')";
			
			$qry = mysqli_query($conn,$sql2);
			if ($qry) 
			{
				$arr=array("status"=>1,"data"=>$userArr,"message"=>" product added successfully");
			}	
			else 
			{
				$arr=array("status"=>0,"data"=>array(),"message"=>" failed please try again");
			}					
				echo json_encode($arr,JSON_UNESCAPED_SLASHES);
        }	

        function seller_showproduct($conn)
        {
        	$seller_id=$_GET['seller_id'];
        	$sql=mysqli_query($conn,"SELECT * FROM product WHERE sid='$seller_id' ");
			$userArr=array();
	          			if (mysqli_num_rows($sql)>0) 
	          			{
	          				while ($row=mysqli_fetch_assoc($sql)) 
	          				{
	          					$userArr[]=$row;
	          				}
	          					$arr=array("status"=>1,"data"=>$userArr,"message"=>"seller product seen");		
	          			}
	          			else
	          			{
	          				$arr=array("status"=>0,"data"=>array(),"message"=>" failed please try again");
	          				
	          			}
	          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        function seller_review($conn)
        {
        	$sql=mysqli_query($conn,"SELECT * FROM review ");
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

        function user_wishlist($conn)
                {
                	$userArr = array();
                	$user_id = $_POST['user_id'];
                	$prod_id = $_POST['prod_id'];
                	$created_on = date("Y-m-d H:i:s");

                	$sql="INSERT INTO `wishlist`(`wish_product_id`,`wish_user_id`,`wish_date`) VALUES ('$prod_id','$user_id','$created_on')";
                	$qry=mysqli_query($conn,$sql);
                	if ($qry) 
                	{
                		$arr=array("status"=>1,"response"=>$userArr,"message"=>"wishlist added successfully");
                	}
                	else
                	{
                		$arr=array("status"=>0,"response"=>$userArr,"message"=>"error in added wishlist,please try again");
                	}
                	echo json_encode($arr,JSON_UNESCAPED_SLASHES);
                }

       /* function order_list($conn)
			{	$userArr = array();
				$user_id=$_POST['user_id'];
				$sql="SELECT * FROM orders WHERE user_id='$user_id'";
				$qry = mysqli_query($conn,$sql);
				if (mysqli_num_rows($qry)>0) 
	          			{
	          				while ($row=mysqli_fetch_assoc($qry)) 
	          				{
	          					$userArr[]=$row;
	          				}
	          					$arr=array("status"=>1,"response"=>$userArr,"message"=>"order list seen");	
	          			}
	          			else
	          			{
	          				$arr=array("status"=>0,"response"=>array(),"message"=>" failed please try again");
	          				
	          			}
	          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			} 

			function delete($conn)
			{		
				$cate_id=$_GET['cate_id'];
				$sql="DELETE* FROM category WHERE cate_id='$cate_id'";
				$qry=mysqli_query($conn,$sql);
				$userArr = array();
				if($qry)
	          			{
	          					$arr=array("status"=>1,"response"=>$userArr,"message"=>"order DATA delete");	
	          			}
	          			else
	          			{
	          				$arr=array("status"=>0,"response"=>array(),"message"=>" failed please try again");
	          				
	          			}
	          			echo json_encode($arr,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
			} */

?>