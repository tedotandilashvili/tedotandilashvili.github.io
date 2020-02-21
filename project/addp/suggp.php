<?php
$servername = "213.131.53.246";
$username = "root";
$password = "zipo*8";
$dbname = "kadrebi";

$db = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["pnom"])){
	$select = "SELECT * FROM cocxali WHERE piradinomeri LIKE '%".$_POST["pnom"]."%' ORDER BY ID";
	$select = mysqli_query($db,$select);
	while($arr = mysqli_fetch_assoc($select)){
		?>
		<li onClick="selectCountry('<?php echo $arr["piradinomeri"]?>')"><?php echo $arr["piradinomeri"] ?></li>
		<?php
	}
}
?>