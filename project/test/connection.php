<?php
define('DB_DRIVER', 'mysqli');
	define('DB_HOSTNAME', '109.172.220.7');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'a213546b');
	define('DB_DATABASE', 'monitoring');
	$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$conn->set_charset("utf8");
?>