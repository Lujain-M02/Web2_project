<?php

	$databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());
?>
