<?php
session_start();

// Destroying All Sessions
if ($_SESSION['role']=="home seeker"){
	if(session_destroy()){
		// Redirecting To Login Page
		header("Location: login.php");
	}
}else{
	if ($_SESSION['role']=="home owner"){
		if(session_destroy()){
			// Redirecting To Login Page
			header("Location: login.php");
		}	
	}
}
?>