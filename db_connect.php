<?php

	$databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	
	if(!$databaseCon)
		die (mysqli_connect_errno());
?>
