 <?php $start_time = microtime(true); ?>
 <!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="/path/to/alk-sanet.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
<body>
  <center>
  <tr style="padding-left: 20%;">
        <td><a href="damateba"><button type="button" class="btn btn-danger">ახლის დამატება</button></a></td>
        <td><a href="naxva"><button type="button" class="btn btn-danger">ნახვა</button></a></td>

  </tr>
</center>
</body>