<?php
	include "config.php";
	$pnom = $_GET['pnom'];
	$data = '';
	$select = $conn->query("SELECT * FROM cocxali WHERE piradinomeri LIKE '$pnom%'");
	while($row = $select->fetch_object()){
		$data .= $row->piradinomeri. "*";
	}
	echo $data;
?>