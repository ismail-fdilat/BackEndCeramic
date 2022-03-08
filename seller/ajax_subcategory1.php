<?php require_once("config.php");

$fetchsubcat=mysqli_query($conn,"select * from assign_brand where  category_id = '".$_POST['cat']."' AND  subcategory_id = '".$_POST['cate_id']."'");
$rowSize= mysqli_fetch_assoc($fetchsubcat);
$brand_ids=$rowSize['brand_id'];
if(mysqli_num_rows($fetchsubcat) > 0){
	 $ids=explode(',', $brand_ids);
}

 //print_r($ids);


?>
<option value="">Select Brand</option>
               <?php 
					  foreach ($ids as $key => $id) {
					  	 $sqlFol4=mysqli_query($conn, "select * from  brand where brand_id ='$id'");
                             $ro4= mysqli_fetch_assoc($sqlFol4);
					  if(mysqli_num_rows($sqlFol4) > 0){
						  ?>

  <option value="<?php echo $ro4['brand_id']?>"><?php echo $ro4['brand_title']?></option>
  <?php }
}
?>
