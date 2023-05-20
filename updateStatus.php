<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'includes/db_connect.php';
        include 'includes/login_inc.php';
        
echo 'hi'.$_GET['id'];

if (isset($_GET['id'])) {
  $rentalID = $_GET['id'];

  echo "rentalapplication ID: " . $rentalID;
  
  $sql =  "SELECT * FROM rentalapplication WHERE id = 1";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
          
          foreach ($row as $a=>$b){
                echo $a.":".$b."<br>";
          }
  
}
 
