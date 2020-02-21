<?php
  session_start();
   require "conn.php";
   error_reporting(0);  
   $id = $_SESSION["id"];
   // $sele = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");
   // $sele = mysqli_fetch_assoc($sele);
   if($_SESSION["ID"] == ""){
    header("Location: index.php");
   }else{
  }
  if(isset($_POST["damateba"])){
    $oper = $_POST["oper"];
    $sazn = $_POST["sazn"];
    $dasaxeleba = $_POST["dasaxeleba"];
    $misamarti = $_POST["misamarti"];
    $shenishvna = $_POST["shenishvna"];
    $gilabre = $_POST["gilabre"];
    $grafiki = $_POST["grafiki"];

    $insert = "INSERT INTO obieqtebi (op, sadzaxisi, dasaxeleba, misamarti, shenishvna, gilaki, grafiki)
VALUES ('$oper', '$sazn', '$dasaxeleba','$misamarti','$shenishvna','$gilabre','$grafiki')";
var_dump($insert);
  $insert = mysqli_query($connection, $insert);
  if($insert){
      ?>
        <script type="text/javascript">alert("წარმატება");</script>
      <?php
        header("Location: home.php");
  }else{
    ?>
        <script type="text/javascript">alert("მოხდა შეცდომა");</script>
    <?php
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin: 50px;">

  <div class="container fluid">
  <a href="home.php">    <button type="submit" class="btn btn-primary">უკან</button></a><br><br>
    <form method="POST" action="">
  <div class="form-group">
    <label for="email">ოპერ:</label>
    <input name="oper" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email">საძ N:</label>
    <input name="sazn" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email">დასახელება:</label>
    <input name="dasaxeleba" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email">მისამართი:</label>
    <input name="misamarti" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email">შენიშვნა:</label>
    <input name="shenishvna" class="form-control" id="email">
  </div>
    <div class="form-group">
    <label for="email">ღილაკი/ბრელოკი:</label>
    <select name="gilabre">
  <option value="არ აქვს">არ აქვს</option>
  <option value="ღილაკი">ღილაკი</option>
  <option value="ბრელოკი">ბრელოკი</option>
</select>
  </div>
    <div class="form-group">
    <label for="email">გრაფიკი:</label>
    <select name="grafiki">
  <option value="დილიდან საღამომდე  
">დილიდან საღამომდე 
</option>
  <option value="საღამოდან დილამდე">საღამოდან დილამდე</option>
  <option value="24 საათი">24 საათი</option>
  <option value="ქსელური">ქსელური</option>
</select>
  </div>

  <button name="damateba" type="submit" class="btn btn-success">დამატება</button>
</form>
  </div>
</body>
</html>