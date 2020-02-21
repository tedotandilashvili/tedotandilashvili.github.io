<style type="text/css">
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</style>

<?php
	// include('config.php');
	$sel = mysqli_query($conn,"SELECT * FROM mailtemp");
	// var_dump(mysqli_num_rows($sel));
	?>
	<table style="width:100%">
  <tr>
    <th>დასახელება</th>
    <th>ერთეული</th> 
    <th>ღირებულება</th>
    <th>ჯამი</th>
  </tr>
	<?php
	while($row = mysqli_fetch_assoc($sel)){
		?>
		<tr>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["quantity"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
			<td><?php echo $row["sum"]; ?></td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
?>