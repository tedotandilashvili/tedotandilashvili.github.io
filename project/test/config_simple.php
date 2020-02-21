<?php 
	define('DB_DRIVER', 'mysqli');
	define('DB_HOSTNAME', '86.40.171.89');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'a213546b');
	define('DB_DATABASE', 'checkinfo');
	$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8");
?>