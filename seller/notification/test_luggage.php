<?php
require_once 'Firebase.php';
$firebase = new Firebase(); 

	
		$token='AAAAOo6-CuM:APA91bGQt67Gb5toJfCABtvqrs_rHSi460fUVcZSPzQWhsoRM6ns7kPyqUwxkuaOaPjKCyfOghqgLIJcQ2SSYE0ODtD06tkaKepFR2ZVpggFTum-f9cY5GRSxxhtXhB4Iyj3fx5Sr40n';
		$test1='[{"data":"this is test notification."}]';
		$data = json_decode($test1);
		echo $firebase->send($token,$data);
		?>