<?php
	  include('../../config.php');
	  	$ekafire = mysqli_query($conn, "SELECT * FROM ekafire");
	  	while($ekafire = mysqli_fetch_assoc($ekafire)){
			echo "st";
	}
?>