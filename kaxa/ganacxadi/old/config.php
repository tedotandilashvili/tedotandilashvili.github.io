<?php
	define('DB_DRIVER', 'mysqli');
	define('DB_HOSTNAME', '109.172.220.7');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'a213546b');
	define('DB_DATABASE', 'kaxa');
	$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8");
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_SESSION["user_id"])){
		$user_id = $_SESSION["user_id"];
		$select_user_info = $conn->query("SELECT * FROM users WHERE id=$user_id");
		if(mysqli_num_rows($select_user_info)>0){
			while($row_user_info = $select_user_info->fetch_object()){
				$logged_id = $row_user_info->id;
				$logged_name = $row_user_info->name;				
				$logged_permission = $row_user_info->permission;
				$logged_region_id = $row_user_info->region_id;
			}
		}
	}
	$current_date = date("Y-m-d h:m:s A");
	$headers = 'From: info@vss.ge' . "\r\n" . 'Reply-To: info@vss.ge' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
   
?>