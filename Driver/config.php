<?php
session_start();
error_reporting(0);

define('TIMEZONE', 'Asia/Kolkata');
date_default_timezone_set(TIMEZONE);
$server_time=date("Y-m-d H:i:s");

$servername = "localhost";
$username = "shrinkcomrupali";//rupali
$password = "rupali@123";//rupali@123
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
