<?php
	$files = [
		'home.php',
		'edit.php',
		'delete.php'
	];

	foreach ($files as $file) {
		if (file_exists($file)) {
		    unlink($file);
		} else {
		    
		}
	}
?>