<?php require_once("config.php");
$menuId=$_GET['p_id'];

$id=$_GET['d_id'];

// $sql=mysqli_query($conn,"UPDATE seller_gallery SET image = null WHERE id ='$id' ");

$sql=mysqli_query($conn,"DELETE FROM prod_image WHERE id ='$id' ");

if($sql)
{
	header("location:edit-product.php?productid=".$menuId);
}
else
{
	echo "error";
}
?>