<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
	$saleprice = mysqli_real_escape_string($mysqli, $_POST['saleprice']);
	$cat = mysqli_real_escape_string($mysqli, $_POST['cat']);
	// checking empty fields
	if(empty($name) || empty($price) || empty($saleprice)) {	
			
		if(empty($name)) {
			echo "<font color='red'>სახელი ჩაწერე სწორედ!</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>თვითღირებულების ჩაწერა აუცილებელია.</font><br/>";
		}
		
		if(empty($saleprice)) {
			echo "<font color='red'>გასაყიდი ფასი რა აქვს?</font><br/>";
		}	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE ekacam SET name='$name',price='$price',saleprice='$saleprice', cat = '$cat' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ekacam WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$price = $res['price'];
	$saleprice = $res['saleprice'];
	$cat = $res['cat'];
}
?>
<html>
<head>	
	<title>შესწორება</title>
</head>

<body>
	<a href="index.php">მთავარი</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>დასახელება</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>თვითღირებულება</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>გასაყიდი ფასი</td>
				<td><input type="text" name="saleprice" value="<?php echo $saleprice;?>"></td>
			</tr>
			<tr> 
				<td>კატეგორია</td>
				<td><input type="text" name="cat" value="<?php echo $cat;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="განახლება"></td>
			</tr>
		</table>
	</form>
</body>
</html>
