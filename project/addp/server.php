<?php
    $oname = "";
    $mail = "";
    $errors = array();

	$servername = "213.131.53.246";
	$username = "root";
	$password = "zipo*8";
	$dbname = "kadrebi";
	

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	} 
	$db->set_charset("utf8");


    if(isset($_POST['kadrebi'])){
		if(mysqli_real_escape_string($db, $_POST['verification_status'])==0){
			array_push($errors, "დასწრების კოდი არასწორია");
		}
		
      	$piradinomeri = mysqli_real_escape_string($db, $_POST['piradinomeri']);
      	$name = mysqli_real_escape_string($db, $_POST['name']);
      	$address = mysqli_real_escape_string($db, $_POST['address']);
      	$phone = mysqli_real_escape_string($db, $_POST['phone']);
      	$object = mysqli_real_escape_string($db, $_POST['object']);
      	$graph = mysqli_real_escape_string($db, $_POST['graph']);
      	$date = date('Y-m-d H:i:s');
	  




      	if(empty($piradinomeri)) {
         	array_push($errors, "საჭიროა პირადი ნომრის მითითება");
      	}	 	  
	  
	    if (empty($name)) {
	       array_push($errors, "საჭიროა სახელისა და გვარის მითითება");
	    }
	    if (empty($phone)) {
	       array_push($errors, "საჭიროა ტელეფონის ნომრის მითითება");
	    }
	    if (empty($address)) {
	       array_push($errors, "საჭიროა იურიდიული მისამართის მითითება");
	    }
	    if (empty($object)) {
	       array_push($errors, "საჭიროა ობიექტის მითითება");
	    }
	    if (empty($graph)) {
	       array_push($errors, "საჭიროა სამუშაო გრაფიკის მითითება");
	    }

		if (count($errors) == 0) {		
		
	
			$sql = "INSERT INTO kadrebi (piradinomeri, name, phone, address, object, graph, dateposted) VALUES ('$piradinomeri', '$name', '$phone', '$address', '$object', '$graph', '$date')";

				
		
			if ($db->query($sql) === TRUE) {
				echo "<div align='center'>მადლობას გიხდით, მცველი დარეგისტრირებულია</div>";


				
		
					
			header('Location: /after_register.php');
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
		}
		$db->close();
    }

  }
  
  
  	function sendPass(){

	}
?>