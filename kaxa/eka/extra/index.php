<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM eka ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM ekadamatebiti ORDER BY cat ASC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>მთავარი გვერდი</title>
</head>

<body>
<a href="add.html">ახლის დამატება</a><br/><br/>
<a href="http://securitas.ge/kaxa/eka/">უკან დაბრუნება</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>დასახელება</td>
		<td>თვითღირებულება</td>
		<td>გასაყიდი ფასი</td>
		<td>რედაქტირება</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['price']."</td>";
		echo "<td>".$res['saleprice']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">განახლება</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('ნამდვილად გინდა წაშლა თუ ხელი დაგეჭირა??')\">წაშლა</a></td>";		
	}
	?>
	</table>
</body>
</html>
