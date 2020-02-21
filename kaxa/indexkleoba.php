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
		    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css' />
		        <link rel="stylesheet" href="css/style.css">


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
<!-- 		<?php include("head.tpl"); ?>
 -->	</head>
	<body>
		<div class="line"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<a href="https://vss.ge/index.php" title="მთავარი გვერდი">
							<img src="images/logo2.png" class="logo">
						</a>
					</center>
				</div>
			</div>
			<main class="container flex flex-column items-center justify-center">
            <form class="flex justify-between">
                <div class="content flex flex-column justify-center items-center">
                    <div class="text flex flex-column justify-center items-center">
                        <h1>სისტემაში შესვლა</h1>

                </div>
	
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
						<aside class="flex flex-column justify-center items-center">
                    <h1>კეთილი იყოს თქვენი დაბრუნება!</h1>
                    <h2>ავტორიზაციით თქვენ ეთანხმებით კომპანიის წესდებას.</h2>
                </aside>
            </form>
        </main>

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
