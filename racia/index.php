<?php
	session_start();
	require "conn.php";
	error_reporting(0);
	if($_SESSION["ID"] == ""){
	}else{
		header("Location: home.php");
	}
	if(isset($_POST["gilaki"])){
		$username = mysqli_real_escape_string($connection,$_POST["username"]);
		$password = mysqli_real_escape_string($connection,$_POST["password"]);
		$password = md5($password);

		$select = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
		var_dump($select);
		
		$select_done = mysqli_query($connection,$select);

		if(mysqli_num_rows($select_done) > 0){
			$row = mysqli_fetch_assoc($select_done);
			$_SESSION["ID"] = $row["id"];
//			echo $_SESSION["ID"];			
			header("Location: home.php");
		}else{
			echo "<script>alert('მოხდა შეცდომა!')</script>";
		}
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>ავტორიზაცია</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
  <center><img src="logo.png"></center>
  <br>
  <br>
	<div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-2 col-xs-3"></div>
    <div class="col-md-4 col-sm-8 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
          		<form autocomplete="off" method="POST" action="">
          			 <label>მომხმარებელი: </label>
            <div class="icon-holder">
              <input type="text" class="form-control" name="username" />
              <i class="fa fa-user icon" aria-hidden="true"></i>
            </div>
          </div>
          <div class="form-group">
            <label>პაროლი: </label>
            <div class="icon-holder">
              <input type="password" class="form-control" name="password" />
              <i class="fa fa-lock icon" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <button class="btn btn-danger btn-block" name="gilaki">ავტორიზაცია </button>
        </div>
          		</form>
      	  </div>
    	</div>
    </div>
    <div class="col-md-4 col-sm-2 col-xs-3"></div>
  </div>
</div>
</body>
<style type="text/css">
	body {
  margin-top: 50px;
  background-color: #f9f9f9;
  font-family: 'Roboto Condensed', sans-serif;
}

input,
button {
  outline: none !important;
}

input,
button,
.panel {
  border-radius: 2px !important;
}

input:focus {
  box-shadow: none !important;
}

.btn-primary,
.btn-primary:focus {
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15);
  background-color: #60b044;
  background-image: -webkit-linear-gradient(#8add6d, #60b044);
  background-image: linear-gradient(#8add6d, #60b044);
  border-color: #5ca941;
  font-size:12pt;

}

.btn-primary:hover {
  color: #fff;
  background-color: #569e3d;
  background-image: -webkit-linear-gradient(#79d858, #569e3d);
  background-image: linear-gradient(#79d858, #569e3d);
  border-color: #4a993e;
}

.btn-primary:active,
.btn-primary:visited {
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.15);
  background-color: #569e3d !important;
  background-image: none;
  border-color: #418737 !important;
  ;
}


/* input icon */

.icon-holder {
  position: relative;
}

.icon {
  font-size: 14pt;
  position: absolute;
  top: -15px;
  left: 8px;
  opacity: 0.0;
}

.icon-holder input,
.icon-holder .icon {
    top: 8px;
  left:-8px;

  transition: all 0.2s ease-in-out;
}

.icon-holder > input:focus {
  padding-left: 28px
}

.icon-holder input:focus + .icon {
  left:8px;
  opacity: 0.7;
}
label {
  font-weight:normal !important;
}
</style>
</html>