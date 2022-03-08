<?php include"config.php";

if(isset($_POST['city_name']))
{
    $city_name=$_POST['city_name'];
    $sql=mysqli_query($conn,"select * from cities where city_name=%$city_name%");
     $arr = array();
         while($rowS= mysqli_fetch_assoc($sql)) 
                							{
      $arr[] = $rowS['city_name'];
    }
  echo json_encode($arr);
}


?>