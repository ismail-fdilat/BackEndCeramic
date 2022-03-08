<?php require_once("config.php");

$fetchsubcat=mysqli_query($conn,"select * from  dir_sub_categories where category_id= '".$_POST['cate_id']."'");
$row=mysqli_num_rows($fetchsubcat);

if($row > 0){
?>
<option value="">Select Sub Category</option>
               <?php while($fetchcat= mysqli_fetch_array($fetchsubcat))
					  {
						  ?>

  <option value="<?php echo $fetchcat['sub_category_id']?>"><?php echo $fetchcat['sub_category_name']?></option>
  <?php
}
}else{
	echo 0;
}
?>
