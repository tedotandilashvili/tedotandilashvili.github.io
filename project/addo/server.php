<?php
    $oname = "";
    $mail = "";
    $errors = array();

	$servername = "86.40.171.89";
	$username = "root";
	$password = "a213546b";
	$dbname = "checkinfo";
	

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	} 
	$db->set_charset("utf8");


    if(isset($_POST['register'])){
		if(mysqli_real_escape_string($db, $_POST['verification_status'])==0){
			array_push($errors, "დასწრების კოდი არასწორია");
		}
		
      	$oname = mysqli_real_escape_string($db, $_POST['ostatus']);
      	$ostatus = mysqli_real_escape_string($db, $_POST['oname']);
      	$code = mysqli_real_escape_string($db, $_POST['code']);
      	$addl = mysqli_real_escape_string($db, $_POST['addl']);
      	$addp = mysqli_real_escape_string($db, $_POST['addp']);
      	$zip = mysqli_real_escape_string($db, $_POST['zip']);
      	$head = mysqli_real_escape_string($db, $_POST['head']);
	  	$headnumber = mysqli_real_escape_string($db, $_POST['headnumber']);
	  	$headid = mysqli_real_escape_string($db, $_POST['headid']);
	  	$headmail = mysqli_real_escape_string($db, $_POST['headmail']);
      	$contact1 = mysqli_real_escape_string($db, $_POST['contact1']);
	  	$contactnumber = mysqli_real_escape_string($db, $_POST['contactnumber']);
	  	$contactid = mysqli_real_escape_string($db, $_POST['contactid']);
	  	$contactmail = mysqli_real_escape_string($db, $_POST['contactmail']);
      	$phone = mysqli_real_escape_string($db, $_POST['phone']);
      	$mail = mysqli_real_escape_string($db, $_POST['mail']);
      	$bank = mysqli_real_escape_string($db, $_POST['bank']);
      	$bankcode = mysqli_real_escape_string($db, $_POST['bankcode']);
	  




      	if(empty($ostatus)) {
         	array_push($errors, "საჭიროა ორგანიზაციის სახელის მითითება");
      	}
	  	if($_REQUEST['ostatus'] == "შპს") {
			$AccountType = "შპს";
		}else{
			$AccountType = "ინდ.მეწარმე";
		}
	 	  
	  
	    if (empty($oname)) {
	       array_push($errors, "საჭიროა მეწარმე პირის სტატუსის მითითება");
	    }
	    if (empty($code)) {
	       array_push($errors, "საჭიროა საიდენთიფიკაციო კოდის მითითება");
	    }
	    if (empty($addl)) {
	       array_push($errors, "საჭიროა იურიდიული მისამართის მითითება");
	    }
	    if (empty($addp)) {
	       array_push($errors, "საჭიროა ფაქტიური მისამართის მითითება");
	    }
	    if (empty($zip)) {
	       array_push($errors, "საჭიროა საფოსტო კოდის მითითება");
	    }
	    if (empty($head)) {
	       array_push($errors, "საჭიროა კომპანიის დირექტორის მითითება");
	    }
		if (empty($contact1)) {
	       array_push($errors, "საჭიროა საკონტაქტო პირის მითითება");
	    }
	    if (empty($phone)) {
	       array_push($errors, "საჭიროა ორგანიზაციის ტელეფონის მითითება");
	    }
	    if (empty($mail)) {
	        array_push($errors, "საჭიროა ორგანიზაციის ელ.ფოსტის მითითება");
	    }
	    if (empty($bank)) {
	       array_push($errors, "საჭიროა ორგანიზაციის ანგარიშის ნომრის მითითება");
	    }
	    if (empty($bankcode)) {
	       array_push($errors, "საჭიროა ორგანიზაციის მომსახურე ბანკის კოდის მითითება");
	    }

		if (count($errors) == 0) {		
		
	
			$sql = "INSERT INTO register (oname, password, ostatus, code, addl, addp, zip, head, headnumber, headid, headmail, contact1, contactnumber, contactid, contactmail, phone, mail, bank, bankcode, category) VALUES ('$oname', '$hashpass', '$ostatus', '$code', '$addl', '$addp', '$zip', '$head', '$headnumber', '$headid', '$headmail', '$contact1', '$contactnumber', '$contactid', '$contactmail', '$phone', '$mail', '$bank', '$bankcode', '$category')";

				$to = 'law@checkinfo.ge';
				$to2 = 'finance@checkinfo.ge';
				$subject = "Checkinfo-ზე დარეგისტრირდა ახალი აბონენტი!";


				$ostatus = $_POST["ostatus"];
				$oname = $_POST["oname"];
				$code = $_POST["code"];
				$zip = $_POST["zip"];
				$phone = $_POST["phone"];
				$mail = $_POST["mail"];
				$addl = $_POST["addl"];
				$addp = $_POST["addp"];
				$bank = $_POST["bank"];

				$head = $_POST["head"];
				$headnumber = $_POST["headnumber"];
				$headid = $_POST["headid"];
				$headmail = $_POST["headmail"];

				$contact1 = $_POST["contact1"];
				$contactnumber = $_POST["contactnumber"];
				$contactid = $_POST["contactid"];
				$contactmail = $_POST["contactmail"];


				$htmlContent = '
				<html>
				<head>
				<title>ინფორმაცია</title>
				</head>
				<body>
				<h1></h1>
				<ul>
				<li>ორგანიზაციის სამართლებრივი ფორმა: '.$ostatus.'</li>
				<li>ორგანიზაციის სახელი:'.$oname.'</li>
				<li>საიდენტიფიკაციო კოდი: '.$code.'</li>
				<li>საფოსტო ინდექსი (იურ. მისამართი): '.$zip.'</li>
				<li>ორგანიზაციის ტელეფონი: '.$phone.'</li>
				<li>ორგანიზაციის ელ.ფოსტა: '.$mail.'</li>
				<li>იურიდიული მისამართი: '.$addl.'</li>
				<li>ფაქტიური მისამართი: '.$addp.'</li>
				<li>მომსახურე ბანკის კოდი: '.$bank.'</li>
				<li>საბანკო ანგარიშის ნომერი: '.$bankcode.'</li>
				</ul>  
				<h1>ორგანიზაციის ხელმძღვანელი</h1><br>
				<ul>
				<li>სახელი გვარი: '.$head.'</li>
				<li>მობულური: '.$headnumber.'</li>
				<li>პირადი ნომერი: '.$headid.'</li>
				<li>ელ-ფოსტა: '.$headmail.'</li>
				</ul></br>
				<h1>საკონტაქტო პირი</h1><br>
				<ul>
				<li>სახელი გვარი: '.$contact1.'</li>
				<li>მობულური: '.$contactnumber.'</li>
				<li>პირადი ნომერი: '.$contactid.'</li>
				<li>ელ-ფოსტა: '.$contactmail.'</li>
				</ul></br>
				</body>
				</html>';

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// Send email
				mail($to,$subject,$htmlContent, $headers);
				mail($to2,$subject,$htmlContent, $headers);
		
			if ($db->query($sql) === TRUE) {
				echo "<div align='center'>მადლობას გიხდით შპს ჩეკინფოს ბაზაში რეგისტრაციისთვის</div>";


				$phone = '557008328';
				$data = urlencode("daregistrirda axali momxmarebeli");
				$sms_status = file_get_contents("http://smsoffice.ge/api/v2/send/?key=bb42f6a9dda44d96b1087650826a099e&destination=995".$phone."&sender=CHECKINFO&content=" . $data);




				$query_create_session = mysqli_query($db, "SELECT * FROM register WHERE `contactmail`='$contactmail' ORDER BY ID DESC LIMIT 1");
				$fetch_session = mysqli_fetch_array($query_create_session);
				$user_id = $fetch_session['ID'];
				$_SESSION['USER_ID'] = $user_id;
				$my_user_id = $_SESSION['USER_ID'];
				
				$cookie_name = "u";
				$cookie_value = "$my_user_id";
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		
					
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