<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "shrinkcomrupali";
$password = "rupali@123";
$database = "ceremic_db_api";
$conn = mysqli_connect($servername, $username, $password,$database);
mysqli_query($conn,"SET NAMES utf8;");

mysqli_query($conn,"SET CHARACTER_SET utf8;");
if(!$conn)
{
	echo "not-connected";
	die("Connection failed: " . mysqli_connect_error());
}
else
{
	//echo "connected";

}
?>
