<?php
	include('../../config.php');
	
	$sel_ekas = mysqli_query($conn, "SELECT * FROM eka");
	$sel_ekaw = mysqli_query($conn, "SELECT * FROM ekaw");
	$ekafire = mysqli_query($conn, "SELECT * FROM ekafire");
	$sel_ekacam = mysqli_query($conn, "SELECT * FROM ekaw");
	$sel_ekadashveba = mysqli_query($conn, "SELECT * FROM ekadashveba");
	
	$ekas_array = array();
	while($eka = mysqli_fetch_assoc($sel_ekas)){
		array_push($ekas_array, $eka["name"]);
	}

	$ekaw_array = array();
	while($ekaw = mysqli_fetch_assoc($sel_ekaw)){
		array_push($ekaw_array, $ekaw["name"]);
	}

	$ekafire_array = array();
	while($ekafire = mysqli_fetch_assoc($ekafire)){
		array_push($ekafire_array, $ekafire["name"]);
	}

	$ekacam_array = array();
	while($ekacam = mysqli_fetch_assoc($sel_ekacam)){
		array_push($ekacam_array, $ekacam["name"]);
	}

	$ekadashveba_array = array();
	while($ekadashveba = mysqli_fetch_assoc($sel_ekadashveba)){
		array_push($ekadashveba_array, $ekadashveba["name"]);
	}

	// print_r($ekaw_array);
	// print_r($ekaw_array);
	// echo "string";
	$first = array_merge($ekas_array, $ekaw_array);
	$second = array_merge($ekafire_array, $ekacam_array);
	$third = array_merge($first, $second);
	$last_array = array_merge($third, $ekadashveba_array);
	// echo implode(', <br>', $last_array);
	// print_r($third);
	echo json_encode($last_array, JSON_UNESCAPED_UNICODE);
	// echo json_encode($last_array);
	// return "test";
?>