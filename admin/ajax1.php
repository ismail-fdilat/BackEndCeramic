          
<?php 
require_once("config.php");

$fetchsubcat=mysqli_query($conn,"select * from product where sid= '".$_POST['seller_id']."'");
$row=mysqli_num_rows($fetchsubcat);

if($row > 0){
?>

           
                <option value="">Select Product</option>
<?php
while($row21=mysqli_fetch_assoc($fetchsubcat))
                    {
?>
                <option value="<?php echo $row21['prod_id'];?>"><?php echo $row21['prod_title'];?></option>

<?php } ?>                        
            

            <?php 
            } ?>