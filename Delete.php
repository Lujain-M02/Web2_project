<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include 'includes/db_connect.php';



if (isset($_GET['pid'])&&isset($_GET['name'])) {
  $propID = $_GET['pid'];
  $propName = $_GET['name'];
  //echo $propName;
  
  $sql1 =  "DELETE FROM propertyimage WHERE property_id = $propID";
  $result1 = mysqli_query($databaseCon, $sql1); 
  $row1 = mysqli_fetch_assoc($result1);
  
   $sql2 =  "DELETE FROM rentalapplication WHERE property_id = $propID";
  $result2 = mysqli_query($databaseCon, $sql2); 
  $row2 = mysqli_fetch_assoc($result2);
  
   $sql3 =  "DELETE FROM property WHERE id = $propID";
  $result3 = mysqli_query($databaseCon, $sql3); 
  $row3 = mysqli_fetch_assoc($result3);
          
    
          //1//DELETE FROM propertyimage WHERE property_id = 1
          //2//DELETE FROM rentalapplication WHERE property_id = 1
          //3//DELETE FROM property WHERE id = 1
  
  
 header("Location: HomeOwner.php");
}
