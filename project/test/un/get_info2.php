<?php 
	include("config_simple.php");
	$sid = $_GET['sid'];
	$select = $conn->query("SELECT * FROM i WHERE sid='$sid' ORDER BY id DESC LIMIT 1");
	if(mysqli_num_rows($select)>0){
		while($row = $select->fetch_object()){
			echo $row->id . "#" . $row->name . "#" . $row->date_created;
		}
	}else{
		echo "*";
	}
?>