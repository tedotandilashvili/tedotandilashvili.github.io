<html>
<head>
	<title>პროდუქტის დამატება</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
	$saleprice = mysqli_real_escape_string($mysqli, $_POST['saleprice']);
		
	// checking empty fields
	if(empty($name) || empty($price) || empty($saleprice)) {
				
		if(empty($name)) {
			echo "<font color='red'>სახელის ველი ცარიელია</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>თვითღირებულება არ წერია</font><br/>";
		}
		
		if(empty($saleprice)) {
			echo "<font color='red'>გასაყიდი ღირებულების დაწერა დაგავიწყდა</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>უკან დაბრუნება</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO `ekaw` (`name`,`price`,`saleprice`) VALUES('$name','$price','$saleprice')");
		
		//display success message
		echo "<font color='green'>შენ წარმატებით შეინახე ახალი ინფორმაცია.";
		echo "<br/><a href='index.php'>პროდუქციის დათვალიერება</a>";
	}
}
?>

</body>
</html>
