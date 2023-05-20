<?php
session_start();

// Destroying All Sessions
session_destroy();
// Redirecting To Login Page
header("Location: login.php");

?>