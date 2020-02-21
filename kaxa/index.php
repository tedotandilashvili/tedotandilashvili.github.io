<?php
	include('config.php');
	session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		header('Location: home.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: lightgreen;
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
</style>
		<script> 
			function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
        </script>
		<title>
			Victoria Security
		</title>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>
	</head>
	<body>
		<div class="line"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<a href="https://vss.ge/index.php" title="მთავარი გვერდი">
							<img src="images/logo.png" class="logo" width="150px;">
						</a>
					</center>
				</div>
			</div>
			<div class="row" style="margin-top: 35px;">
				<div class="col-sm-12">
					<fieldset>
						<legend>
							ავტორიზაცია
						</legend>
	
						<form name="login" action="" method="POST">
							<div class="input-group">
								<span class="input-group-addon">მომხმარებელი</span>
								<input type="text" name="username" class="form-control" placeholder="მომხმარებელი"/>
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon">პაროლი</span>
								<input type="password" name="password" class="form-control">
							</div>
							<br />
							<input type="submit" name="submit" class="form-control" value="შესვლა">
						</form>
						<?php 
							if(isset($_POST['submit']) && $_POST['submit']=="შესვლა"){
								$username = $_POST['username'];
								$password = MD5($_POST['password']);
								$select_users = $conn->query("SELECT * FROM users where username='$username' AND password='$password'");
								if(mysqli_num_rows($select_users)>0){
									while($row_users = $select_users->fetch_object()){
                                        $_SESSION['user_id'] = $row_users->id;
                                        if($row_users->permission=="root"){
                                            header('Location: home.php');
                                        }else{
                                            header('Location: output.php');
                                        }										
                                    }							
								}else{
									echo "მოხდა შეცდომა, შეამოწმეთ მომხმარებელი და პაროლი";
								}
							}
						?>
					</fieldset>
				</div>
			</div>
			<div class="row" style="margin-top: 35px;">
				<div class="col-sm-12">
					<div>
						<center>
							საავტორო უფლებები დაცულია &copy; VSS.ge
							  
						</center>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
