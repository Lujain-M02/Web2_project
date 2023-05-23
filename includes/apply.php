<?php
 session_start();
    if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $seekerid=$_SESSION['id'];
}
    
   $databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());
        else{
        $pid = $_GET['id'];}
$query="INSERT INTO `rentalapplication` (property_id,home_seeker_id,application_status_id) VALUES($pid,$seekerid,111111)";
$result = mysqli_query($databaseCon, $query) or die(mysqli_error($databaseCon));
 header("Location:../HomeSeeker.php");

 mysqli_close($databaseCon); 
 ?>