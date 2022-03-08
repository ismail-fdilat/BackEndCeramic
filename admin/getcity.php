<?php
include 'config.php';

if(!empty($_POST['state_id']))
$state_id = $_POST['state_id'];
echo $_POST['state_id'];
$sql = "SELECT * FROM `tbl_cities` WHERE state_id = $state_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc())
{
?>
<option value="<?php echo$row['id']; ?>"> <?php echo$row['name']; ?> </option> 
<?php	
}
?>