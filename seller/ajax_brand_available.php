<?php require_once("config.php");

//$fetchsubcat=mysqli_query($conn,"select * from assign_brand where category_id = '".$_POST['cate_id']."' AND  subcategory_id != '' ");
if(isset($_POST['brand'])){
	$fetchsubcat=mysqli_query($conn,"select * from assign_brand where category_id = '".$_POST['cate_id']."'");
	$rowSize= mysqli_fetch_assoc($fetchsubcat);
	//$brand_ids=$rowSize['brand_id'];
	if($rowSize['brand_id'] != ''){
	echo true;
	}
	else{
	echo false;
	}
}

if(isset($_POST['brand1'])){
	$fetchsubcat=mysqli_query($conn,"select * from assign_brand where  category_id = '".$_POST['cat']."' AND  subcategory_id = '".$_POST['cate_id']."'");
	$rowSize= mysqli_fetch_assoc($fetchsubcat);
	//$brand_ids=$rowSize['brand_id'];
	if($rowSize['brand_id'] != ''){
	echo true;
	}
	else{
	echo false;
	}
}

if(isset($_POST['size'])){
	$fetchsubcat=mysqli_query($conn,"select * from assign_size where category_id = '".$_POST['cate_id']."'");

	$rowSize= mysqli_fetch_assoc($fetchsubcat);
	//$size_ids=$rowSize['size_id'];

	if($rowSize['size_id'] != ''){
	echo true;
	}
	else{
	echo false;
	}
}

if(isset($_POST['size1'])){
	$fetchsubcat=mysqli_query($conn,"select * from assign_size where category_id= '".$_POST['cat']."' AND subcategory_id = '".$_POST['cate_id']."'");

	$rowSize= mysqli_fetch_assoc($fetchsubcat);
	//$size_ids=$rowSize['size_id'];

	if($rowSize['size_id'] != ''){
	echo true;
	}
	else{
	echo false;
	}
}


?>

