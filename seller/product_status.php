<?php

include('header.php');

 $id = $_POST['id'];

if($_POST['status'] ==1) 
{
	echo $sql = "UPDATE product SET p_status=0 WHERE prod_id='$id'";

	$qry= mysqli_query($conn,$sql);

}
if($_POST['status'] ==0)
{
	echo $sql= "UPDATE product SET p_status=1 WHERE prod_id ='$id'";
	$qry= mysqli_query($conn,$sql);	
	
}


?>