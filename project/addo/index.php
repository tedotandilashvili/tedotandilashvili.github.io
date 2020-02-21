<!DOCTYPE html>
<html>
	<head>
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
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://shoparea.ge/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		
		<script src="geo.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	</head>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
			 		<center>
						<a target="_blank" href="http://vss.ge">
							<img src="http://gissoni.ge/project/addp/logo.png" width="280" height="125" title="მთავარი გვერდი" alt="მთავარი გვერდი" />
						</a>
						<h4>ახალი აბონენტის რეგისტრაცია</h4>
					</center>  
				</div>
				<div class="col-sm-2">

				</div>
				<div class="col-sm-8">
					<?php
						// include "server.php";

                $servername = "213.131.53.246";
	$username = "root";
	$password = "zipo*8";
	$dbname = "kadrebi";
	

	$db = new mysqli($servername, $username, $password, $dbname);
						if(isset($_POST["register"])){
							$oname = $_POST["name"];
							$zip = $_POST["zip"];
							$sganakveti = $_POST["sganakveti"];
							$insert = "INSERT INTO obieqti (name, misamarti, samushao) VALUES ('$oname','$zip','$sganakveti')";
					
							$insertt = mysqli_query($db,$insert);

							if($insertt){
								echo "<script>alert('წარმატება');</script>";
								header("location: ../");
							}else{
								echo "<script>alert('შეცდომა');</script>";
							}
						}else{}
					?>
				 	<form method="POST" action="">
				 		<div class="col-sm-6">
					 		<div class="input-group">
					 			<label>ორგანიზაციის სახელი<font color="red">*</font></label>
					 			<input type="text" name="name" class="form-control" autocomplete="off" required />
					 		</div>
					 		<div class="input-group">
						 		<label>იურ. მისამართი<font color="red"></font></label>
						 		<input type="text" name="zip" class="form-control" autocomplete="off" required />
						 	</div>
						 	<div class="input-group">
						 		<label>სამუშაო განაკვეთი<font color="red"></font></label>
						 		<input type="text" value="_____________________________________" name="sganakveti" class="form-control" autocomplete="off" required/>
						 	</div>
						 	 </div>
						</div>
						<div class="col-sm-6">
							<div class="input-group"><br />
								<center>
						 		<input id="button" name="register" type="submit" value="დამატება" class="form-control btn btn-danger" style="width: 100%;"/>
						 	</center>
						 </div>
					 	</div>
					</form>
				</div>
				<div class="col-sm-2">

				</div>
			</div>
		</div>
	</body>
</html>