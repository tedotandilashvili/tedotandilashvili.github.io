<?php 
	session_start();
	include('config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Victoria Security
		</title>
		<script type="text/javascript" src="geokbd.js"></script>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>		
	</head>
	<body>
		<div class="container">
			<?php include("top.tpl"); ?>
			<div class="row" style="margin-top: 15px;">					
				<div class="col-sm-12">
					<div class="jumbotron" style="padding:30px;">
						<table class="table" id="myTable">
							<thead>
							<tr>
								<td style="color: red">
									რეგიონი
								</td>
								<td style="color: red">
									დასახელება
								</td>
								<td style="color: red">
									მისამართი
								</td>
								<td style="color: red">
									შტატი და სამუშაო გრაფიკი
								</td>
								<td style="color: red">
									დარღვევა
								</td>
								<td style="color: red">
									სახელი და გვარი
								</td>
								<td style="color: red">
									თარიღი
								</td>
								<td style="color: red">
									მენეჯერი
								</td>
								<td style="color: red">
									კონტროლი
								</td>
								<td style="color: red;">
									სურათი
								</td>
							</tr>
						</thead>
						<tbody>
							<?php 
								if($logged_permission=='root'){
									$select = $conn->query("SELECT * FROM monitoring ORDER BY id DESC");
								}else{
									$select = $conn->query("SELECT * FROM monitoring WHERE region='$logged_region_id' ORDER BY id DESC");
								}

								while($row = $select->fetch_object()){
							?>
							<tr >
								<td>
									<?php
										$select_region = $conn->query("SELECT * FROM regions WHERE id=$row->region");
										echo $select_region->fetch_object()->name;
									?>
								</td>
								<td>
									<?php echo $row->oname; ?>
								</td>
								<td>
									<?php echo $row->address; ?>
								</td>
								<td>
									<?php echo $row->graph; ?>
								</td>
								<td>
									<?php echo $row->fault; ?>
								</td>
								<td>
									<?php echo $row->name; ?>
								</td>
								<td>
									<?php echo $row->date; ?>
								</td>
								<td>
									<?php echo $row->manager; ?>
								</td>
								<td>
									<?php echo $row->control; ?>
								</td>
								<td>
									<a href="http://gissoni.ge/monitoring/img/<?php echo $row->image; ?>">სურათი</a>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
		</div>

</body>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>