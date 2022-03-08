<?php 
include('config.php');
if(isset($_POST['id']) && isset($_POST['tax'])){
    
    $tax=$_POST['tax'];
    $id=$_POST['id'];
    
    $update = mysqli_query($conn,"update product_taxrate set tax=$tax where tax_id=$id");
    if($update)
    {
        echo 1; 
    }
}


?>