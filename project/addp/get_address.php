<?php
	include "config.php";
	$object_name = $_GET['object'];
	$select = $conn->query("SELECT * FROM obieqti WHERE id='$object_name' ORDER BY id DESC LIMIT 1");
	while($row = $select->fetch_object()){
		echo $row->misamarti . "#" . $row->samushao . "#" . $row->name;
	}
?>