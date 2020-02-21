<?php
    $oname = "";
    $mail = "";
    $errors = array();

	$servername = "109.172.220.7";
	$username = "root";
	$password = "a213546b";
	$dbname = "kaxa";
	

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	} 
	$db->set_charset("utf8");


    if(isset($_POST['register'])){
		if(mysqli_real_escape_string($db, $_POST['verification_status'])==0){
			array_push($errors, "დასწრების კოდი არასწორია");
		}
		
      	$name = mysqli_real_escape_string($db, $_POST['name']);
      	$code = mysqli_real_escape_string($db, $_POST['code']);
      	$addl = mysqli_real_escape_string($db, $_POST['addl']);
      	$addp = mysqli_real_escape_string($db, $_POST['addp']);
      	$phone = mysqli_real_escape_string($db, $_POST['phone']);
      	$mail = mysqli_real_escape_string($db, $_POST['mail']);
	  

 {		
		
	
			$sql = "INSERT INTO momxmarebeli (name, code, addl, addp, phone, mail, contact, cmobile) VALUES ('$name','$code', '$addl', '$addp', '$zip', '$phone', '$mail', '$contact', '$cmobile')";

				$to = 'e.gabrielashvili@vss.ge';
				$to2 = 'a.gelashvili@vss.ge';
				$subject = "დარეგისტრირდა ახალი აბონენტი!";


				$name = $_POST["name"];
				$code = $_POST["code"];
				$phone = $_POST["phone"];
				$mail = $_POST["mail"];
				$addl = $_POST["addl"];
				$addp = $_POST["addp"];
				$contact = $_POST["contact"];
				$cmobile = $_POST["cmobile"];




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