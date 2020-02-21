<?php
	 session_start();
	 require "conn.php";
	 error_reporting(0);
	//var_dump($_SESSION["id"]);
	 $id = $_SESSION["ID"];
	 $sele = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");
	 $sele = mysqli_fetch_assoc($sele);
	 if($_SESSION["ID"] == ""){
		header("Location: index.php");
	 }else{
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../kaxa/eka/js/jquery_bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin: 30px;">
	<a href="logout.php?id=<?php echo $id ?>"><button class="btn btn-danger"> გამოსვლა </button></a>
	<a href="add.php"><button class="btn btn-primary"> დამატება </button></a><br><br>
	<?php
		$sel = "SELECT * FROM obieqtebi ORDER BY sadzaxisi ASC";
		$sel = mysqli_query($connection, $sel);
	?>
	<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">
  	<p class="text-center">შპს "ვიქტორია სექიურითი"-ს ობიექტების კოდირება</p>
  </h4>
  <hr>
 <div class="list-group">
  <a href="#" class="list-group-item">სტაციონალური (ცოცხალი) ძალით დაცული ობიექტებისთვის</a>
  <a href="#" class="list-group-item">№ 17 - ოპერატიულის უფროსი 597155173</a>
  <a href="#" class="list-group-item">№ 10- ოპერატიული ჯგუფი 597155175</a>
  <a href="#" class="list-group-item">№ 11- ოპერატიული ჯგუფი 597155181</a>
  <a href="#" class="list-group-item">№ 12-ოპერატიული ჯგუფი 597155183 </a>
  <a href="#" class="list-group-item">№ 22- ოპერატიული ჯგუფი 597155176</a>
  <a href="#" class="list-group-item">№ 800- ოპერატიული ჯგუფი 597155186</a>
  <a href="#" class="list-group-item">№ 900- ოპერატიული ჯგუფი 597155172   577972000</a>
  <a href="#" class="list-group-item">№ 5-ოპერატიული დიმა  555222283</a>
  <a href="#" class="list-group-item">№ 7- მონიტორინგი2  598083989</a>
  <a href="#" class="list-group-item">N9- მონიტორინგი 1 599 515301</a>
  <a href="#" class="list-group-item">ნიკა პაიჭაძე 574-172-789</a>
  <a href="#" class="list-group-item">ნიკა ჩადუნელი 571-80-55-66</a>
  <a href="#" class="list-group-item">მერაბ კუპრეიშვილი (კადრების უფროსი)  597-155-188</a>
  <a href="#" class="list-group-item">ბაზის ტელეფონი: 224-42-77 591207207</a>
  <a href="#" class="list-group-item">რადიო სადგურის ოპერატორი 592 021 021 </a>
  <a href="#" class="list-group-item" style="color: red"> ტექნიკური მხარდაჭერა: 557008328 თედო </a>
</div>
</div>
<br><br>

<br>
		<table class="table" id="myTable">
  <thead class="thead-light">
    <tr>
      <th scope="col">ოპერ</th>
      <th scope="col">საძ N</th>
      <th scope="col">დასახელება</th>
      <th scope="col">მისამართი</th>
      <th scope="col">შენიშვნა</th>
      <th scope="col">ღილაკი/ბრელოკი</th>
      <th scope="col">გრაფიკი</th>
      <?php if($sele["permission"] == "root"){ ?>
      <th scope="col">რედაქტირება</th>
      <th scope="col">წაშლა</th>
  <?php }else{
	?>
	      <th scope="col">ნახვა</th>
<?php
} ?>

    </tr>
  </thead>
  <tbody id="myTable">
  	<?php while($row = mysqli_fetch_assoc($sel)){ ?>
    <tr>
      <th scope="row"><?php echo $row["op"]; ?></th>
      <td><?php echo $row["sadzaxisi"]; ?></td>
      <td><?php echo $row["dasaxeleba"]; ?></td>
      <td><?php echo $row["misamarti"]; ?></td>
      <td><?php echo $row["shenishvna"]; ?></td>
      <td><?php echo $row["gilaki"]; ?></td>
            <td><?php echo $row["grafiki"]; ?></td>
                  <?php if($sele["permission"] == "root"){ ?>
	<td><a href="edit.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">დააჭირე</button></a></td>
	<td><a href="delete.php?id=<?php echo $row['id'];?>"><button class="btn btn-danger">წაშლა</button></a></td>
	   <?php }else{
	?>
		<td><a href="edit.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">დააჭირე</button></a></td>
<?php
} ?>
</tr>
<?php } ?> 
  </tbody>
</table>

</body>
<script type="text/javascript">
	$(document).ready( function () {
      $('#myTable').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
} );
</script>
<footer>Software made by Tedo Tandilashvili</footer>
</html>