<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include 'includes/db_connect.php';



if (isset($_GET['pid'])) {
  $propID = $_GET['pid'];

  echo '$propName';
  
  $sql1 =  "DELETE FROM propertyimage WHERE property_id = '$propID'";
  $result1 = mysqli_query($databaseCon, $sql1); 
  
  echo '$propName';
   $sql2 =  "DELETE FROM rentalapplication WHERE property_id = '$propID'";
  $result2 = mysqli_query($databaseCon, $sql2); 
  
   $sql3 =  "DELETE FROM property WHERE id = '$propID'";
  $result3 = mysqli_query($databaseCon, $sql3); 

  
 header("Location: HomeOwner.php");
}
  mysqli_close($databaseCon); 

?>