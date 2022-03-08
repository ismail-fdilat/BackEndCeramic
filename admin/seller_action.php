<?php
include('header.php');

$id = $_GET['sellerid'];

if($_GET['status'] ==1) 
{
	echo $sql = "UPDATE seller SET status=0 WHERE seller_id='$id'";
	$qry= mysqli_query($conn,$sql);

	if($qry){

		echo '<script language="javascript">';
		echo 'alert("Seller Deactived Successfully")';
		echo '</script>';

		echo "<script>setTimeout(\"location.href = 'view-seller.php';\",00);</script>";

	}

}
if($_GET['status'] ==0)
{
	echo $sql= "UPDATE seller SET status=1 WHERE seller_id ='$id'";
	$qry= mysqli_query($conn,$sql);

	if($qry){
	    
	    $to = $_GET['email'];
// 		$to = "ajay.shrinkcom@gmail.com";
        $subject = "Approved from admin";
        $txt = "You are approved from admin.";
        $headers = "From: info@ceramic.com";
        $mail=mail($to,$subject,$txt,$headers);

		echo '<script language="javascript">';
		echo 'alert("Seller active or approved from admin successfully")';
		echo '</script>';

		echo "<script>setTimeout(\"location.href = 'view-seller.php';\",00);</script>";
		
		

	}	
	
}


?>