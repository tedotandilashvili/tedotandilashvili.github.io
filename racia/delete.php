<?php
	session_start();
	require "conn.php";
	error_reporting(0);
	$id = $_GET["id"];
	$washla = mysqli_query($connection, "DELETE FROM obieqtebi WHERE id = '$id'");
	if($washla){
		?>
		<script type="text/javascript">alert("წარმატება");window.location.href = "http://securitas.ge/racia/home.php";</script>
		<?php
	}else{
		?>
		<script type="text/javascript">alert("მოხდა შეცდომა");window.location.href = "http://securitas.ge/racia/home.php";</script>
		<?php
	}
?>