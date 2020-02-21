 <?php 
 $start_time = microtime(true);
 session_start();
 include('db.php');
  ?>
 <!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="/path/to/alk-sanet.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://shoparea.ge/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

</head>
<?php include("top.php"); ?>
</table>
<hr class="style5">
<div class="container">   
<div class="jumbotron">    
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>სახელი, გვარი</th>
        <th>ტელეფონის ნომერი</th>
        <th>პირადი ნომერი</th>
        <th>მისამართი</th>
        <th>მეტი</th>
        <th>უფრო მეტი</th>
      </tr>
    </thead>
    <tbody>
      <?php 
               
                  // $select = $conn->query("SELECT DISTINCT piradinomeri, name, phone, address FROM cocxali ORDER BY piradinomeri DESC");

$select = $conn->query("SELECT DISTINCT piradinomeri FROM cocxali ORDER BY piradinomeri DESC");
    while($row = $select->fetch_object()){
      $pn = $row->piradinomeri;
      $select_details = $conn->query("SELECT * FROM cocxali WHERE piradinomeri='$pn'")->fetch_object();

                

                // while($row = $select->fetch_object()){
              ?>

      <tr>
        <td><?php echo $row->name; ?> <img src="geo.gif" style="width: 20px;"></td>
        <td><?php echo $row->phone; ?></td>
        <td><?php echo $row->piradinomeri; ?></td>
        <td><?php echo $row->address; ?></td>
        <td><a href="#"><button type="button" class="btn btn-danger">ისტორია</button></a></td>
        <td><a href="#"><button type="button" class="btn btn-danger">პირადი საქმე</button></a></td>
      </tr>
    <?php
                }
              ?>
    </tbody>
  </table>
</div>
</div>

</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
        ]
    } );
} );
</script>
</html>
