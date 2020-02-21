<?php 
	session_start();
	include('config.php');
	if($logged_permission!='root'){
		header("Location:output.php");
	}
?>
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
		<title>
			Victoria Security
		</title>
		<script type="text/javascript" src="geokbd.js"></script>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>
	</head>
	<body>
		<div class="line"></div>
		<div class="container">
			<?php include("top.tpl"); ?>
			<div class="row" style="margin-top: 15px;">
				<div class="col-sm-10">
					<div class="jumbotron" style="padding:25px;">
						<fieldset>
							<center>
								<legend>
								შეხვედრების ცხრილი
							</legend>
						</center>
							<form name="add_p" action="" method="POST" enctype="multipart/form-data">
								<div class="input-group">
									<span class="input-group-addon">დეპარტამენტი:</span>
									<select name="departamenti" class="form-control" style="height:35px;">
										<option value="0">აირჩიეთ</option>
										<?php 
											$select_regions = $conn->query("SELECT * FROM regions ORDER BY id ASC");
											while($row_regions = $select_regions->fetch_object()){
										?>
										<option value="<?php echo $row_regions->id; ?>"><?php echo $row_regions->name; ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon">სახელი, გვარი</span>
									<input type="text" name="saxeli" class="form-control"  maxlength="500" id="saxeli">
								</div>
								<div class="input-group">
									<span class="input-group-addon">განსახილველი საკითხები</span>
									<input type="text" name="sakitxi" class="form-control" maxlength="500" id="sakitxi" >
								</div>
								<div class="input-group">
									<span class="input-group-addon">თქვენთვის სასურველი დრო</span>
									<input type="text" name="sasurvelidro" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>">
								</div>
								<br />
								
								
								<div class="input-group">
									
									<input type="submit" name="submit" class="form-control btn-danger" value="დამატება">
								</div>
							</form>
							<?php 
								if(isset($_POST['submit']) && $_POST['submit']=="დამატება"){
									$departamenti = $_POST['departamenti'];
									$saxeli = $_POST['saxeli'];
									$sakitxi = $_POST['sakitxi'];
									$sasurvelidro = $_POST['sasurvelidro'];
								 	

									$save = "INSERT INTO `george` (`departamenti`, `saxeli`, `sakitxi`, `sasurvelidro`) VALUES ('$departamenti', '$saxeli', '$sakitxi', '$sasurvelidro')";
									
									$save = $conn->query($save);
									
									if($save){
										echo "<script>alert('წარმატება');</script>";
									}else{
										echo "<script>alert('შეცდომა');</script>";
									}
								}
							?>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript">GeoKBD.map();</script>
</body>
</html>