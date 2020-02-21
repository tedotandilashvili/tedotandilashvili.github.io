<?php
  session_start();
  include 'config.php';
//   var_dump($_SESSION['pnomeri']);
//   echo session_id();
//   foreach (getallheaders() as $name => $value) {
//     echo "$name: $value" . "<br>";
// }
?>

<script src="https://code.jquery.com/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<div class="row">
    <div class="col-md-2 col-md-offset-5" style="margin-top: 40vh;">
      <a href="xel2.php"><button class="btn btn-danger" data-toggle="modal" data-target="#myModal">მცველის კონკრეტული ხელშეკრულება</button></a><br><br>
      <a href="xel1.php"><button class="btn btn-danger" data-toggle="modal" data-target="#myModal2">მცველის შრომითი ხელშეკრულება</button></a>
    </div>
</div>

<style type="text/css">
  body {
    overflow: hidden;
  }
</style>