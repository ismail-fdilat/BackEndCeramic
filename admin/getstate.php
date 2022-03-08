<?php
include 'config.php';

if(!empty($_POST['country_id']))
$country_id = $_POST['country_id'];

$sql = "SELECT * FROM tbl_states where country_id = $country_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
	while($row = $result->fetch_assoc())
{
?>
<option value="<?php echo $row['id']; ?>"> <?php echo$row['name']; ?> </option> 
<?php	
}

?>