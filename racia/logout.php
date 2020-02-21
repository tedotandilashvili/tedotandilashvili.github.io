<?php
		// სესიას ვიწყებთ
	session_start();
	// სესიას ვანადგურებთ
	session_destroy();
	// გადამისამართებას ვახდენთ
	header("Location: index.php");
?>