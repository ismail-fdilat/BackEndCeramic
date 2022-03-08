<?php 
require_once("config.php");

$fetchsubcat=mysqli_query($conn,"select * from product where prod_id= '".$_POST['prod_id']."'");
$row=mysqli_num_rows($fetchsubcat);

if($row > 0){
?>

                  <thead>
                      <tr>
					              <td style="width:80px;"><strong>SR No.</strong></td>
                        <td><strong>Seller Name</strong></td>
                        <td><strong>City</strong></td>
                        <td><strong>Product Title</strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Product Short Description</strong></td>
                        <td><strong>Product Description</strong></td>
												<td><strong>Product Category</strong></td>
												<td><strong>Product Sub Category</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong >Sale Price</strong></td>
											</tr>
											</thead>
											<tbody>
										<?php
										$j=1;
										while($row21=mysqli_fetch_assoc($fetchsubcat))
										{

                    $sqlcat=mysqli_query($conn,"select * from dir_categories where category_id='".$row21['prod_cate_id']."'");
                    $sqlcategory=mysqli_fetch_assoc($sqlcat);

                    $sqlsubcat=mysqli_query($conn,"select * from dir_sub_categories where sub_category_id='".$row21['prod_subcate_id']."'");
                    $sqlsubcategory=mysqli_fetch_assoc($sqlsubcat);

                    $sqlseller=mysqli_query($conn, "select * from seller where seller_id='".$row21['sid']."'");
                    $queryseller=mysqli_fetch_assoc($sqlseller);
  
                    ?>  
                    <tr>
                      <td><?php echo $j;?></td>
                      <td><?php echo $queryseller['sname'];?></td>
                      <td><?php echo $queryseller['city'];?></td>
                      <td><?php echo $row21['prod_title'];?></td>
                      <td><?php echo $row21['prod_price'];?></td>
                      <td><?php echo $row21['prod_short_desc'];?></td>
                      <td><?php echo $row21['prod_desc'];?></td>
                      <td><?php echo $sqlcategory['category_name'];?></td>
                      <td><?php echo $sqlsubcategory['sub_category_name'];?></td>
                      <td><?php echo $row21['quantity'];?></td>
                      <td><?php echo $row21['sale_price'];?></td>
                    </tr>  
                    <?php
                      $j++;
                    }  
                    ?>  
                    </tbody>
                    <tfoot>
                     <tr>
					    <td style="width:80px;"><strong>SR No.</strong></td>
                        <td><strong>Seller Name</strong></td>
                        <td><strong>City</strong></td>
                        <td><strong>Product Title</strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Product Short Description</strong></td>
                        <td><strong>Product Description</strong></td>
                        <td><strong>Product Category</strong></td>
                        <td><strong>Product Sub Category</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Sale Price</strong></td>
                      </tr>
                    </tfoot>
              
<?php 
}else{
	echo 0;                    
}
?>
