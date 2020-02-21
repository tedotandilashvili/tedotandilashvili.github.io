<?php
	define('DB_DRIVER', 'mysqli');
	define('DB_HOSTNAME', '109.172.220.7');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'a213546b');
	define('DB_DATABASE', 'victoria');
	$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8");

	$oname = $_GET['oname'];
	$select = $conn->query("SELECT * FROM monitoring WHERE oname='$oname' ORDER BY id DESC LIMIT 1");
	if(mysqli_num_rows($select)>0){
		while($row = $select->fetch_object()){
			echo $row->oname . "#" . $row->address . "#" . $row->graph;
		}
	}else{
		echo "მონაცემი ვერ მოიძებნა";
	}
?>