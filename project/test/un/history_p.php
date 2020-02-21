<?php 
	session_start();
	include('config.php');
	if($user_id==""){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Checkinfo.ge
		</title>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>
	</head>
	<body>
		<div class="line"></div>
		<div class="container">
			<?php include("top.tpl"); ?>
			<div class="row" style="margin-top: 15px;">
				<div class="col-sm-12">
					<div class="jumbotron" style="padding:25px;">
						<h4 class="pull-left" style="padding-right: 15px;">
							<?php 
								$u_id = $_GET['id'];
								$ssid = 0;
								$select_p = $conn->query("SELECT * FROM p WHERE id=$u_id");
								while($row_p = $select_p->fetch_object()){
									echo $row_p->name . " " . $row_p->lastname . "-ს ისტორია";
									$ssid = $row_p->sid;
								}
							?>
						</h4>
						<table class="table">
							<tr>
								<td>
									<b>ID</b>
								</td>
								<td>
									<b>ავტორი</b>
								</td>
								<td>
									<b>თარიღი</b>
								</td>
								<td>
									<b>სტატუსი</b>
								</td>
								<td>
									<b>ქმედება</b>
								</td>
							</tr>					
							<?php 
								
								$select_legal = $conn->query("SELECT * FROM legal WHERE user_id=$u_id ORDER BY id DESC");
								if(mysqli_num_rows($select_legal)>0){
									while($row_legal = $select_legal->fetch_object()){
							?>
							<tr>
								<td>
									<?php echo $row_legal->id; ?>
									<?php 
										if($row_legal->author_id==$logged_id){
									?>
									<span style="width:8px; height:8px; border-radius:3px; background:green;"><i class="fa fa-check-circle-o" aria-hidden="true" style="color:#fff; padding:3px;"></i></span>
									<?php
										}
									?>
								</td>
								<td>
									<?php
										$author_id = $row_legal->author_id;
										$select_author = $conn->query("SELECT * FROM users WHERE id=$author_id");
										while($row_author = $select_author->fetch_object()){
											echo $row_author->name . " " . $row_author->lastname . "<br> ტელეფონი: " . $row_author->phone . " ს/კ " . $row_author->code;
										}
									?>
								</td>
								<td>
									<?php echo $row_legal->date_created; ?>
								</td>
								<td>
									<?php 
										$status_id = $row_legal->status_id;
										$select_status = $conn->query("SELECT * FROM statuses WHERE id=$status_id");
										echo $select_status->fetch_object()->name;
									?>
								</td>
								<td>
									<?php 
										if($row_legal->author_id==$logged_id){
									?>
									<a href="delete_i.php?id=<?php echo $row_legal->id; ?>" class="btn btn-danger">
										წაშლა
									</a>
									
									<?php } ?>
								</td>
							</tr>		
							<?php
									}
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>