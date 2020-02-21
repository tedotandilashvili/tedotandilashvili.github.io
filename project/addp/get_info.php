<?php
	include "config.php";
	$sid = $_GET['sid'];
	$select = $conn->query("SELECT * FROM cocxali WHERE piradinomeri='$sid'");
	while($row = $select->fetch_object()){
		echo $row->piradinomeri . "#" . $row->name . "#" . $row->address . "#" . $row->phone;
	}
?>