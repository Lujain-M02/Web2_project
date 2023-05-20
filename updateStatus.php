<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'includes/db_connect.php';
        include 'includes/login_inc.php';
echo'hi'.$_GET['name'];        
echo 'hi'.$_GET['id'];

if (isset($_GET['id'])&&isset($_GET['pid'])&&isset($_GET['hsid'])&&isset($_GET['name']) ) {
  $rentalID = $_GET['id'];
  $propID = $_GET['pid'];
  $hsID = $_GET['hsid'];
  $btn = $_GET['name'];

    echo "rentalapplication ID: " . $rentalID;
  
  if (isset($_GET['Decline'])) {
  echo'Button 1 was clicked';
} elseif (isset($_GET['button2'])) {
  echo'Button 2 was clicked';
}

  /*$sql =  "SELECT * FROM rentalapplication WHERE id = $rentalID";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
          
          foreach ($row as $a=>$b){
                echo $a.":".$b."<br>";
          }*/
   if($btn == "decline"){
     $sql2 =  "UPDATE rentalapplication
                    SET application_status_id=222222 
                    WHERE id =$rentalID";
          $result2 = mysqli_query($databaseCon, $sql2); 
          $row2 = mysqli_fetch_assoc($result2);  
   }
          //ضابط ويشتغل كود لل Decline
          /*$sql2 =  "UPDATE rentalapplication
                    SET application_status_id=222222 
                    WHERE id =$rentalID";
          $result2 = mysqli_query($databaseCon, $sql2); 
          $row2 = mysqli_fetch_assoc($result2);*/
          
          foreach ($row2 as $h=>$k){
                echo $h.":".$k."<br>";
          }
    if($btn == "accept"){ 
        $sql3 =  "UPDATE rentalapplication
                    SET application_status_id=333333 
                    WHERE id =$rentalID";
          $result3 = mysqli_query($databaseCon, $sql3); 
          $row3 = mysqli_fetch_assoc($result3);
          
          $sql4 =  "UPDATE rentalapplication r
                    SET application_status_id=222222 
                    WHERE r.property_id= $propID AND home_seeker_id!=$hsID";
          $result4 = mysqli_query($databaseCon, $sql4); 
          $row4 = mysqli_fetch_assoc($result4);
        
    }
    
    header("Location: index.php");     
          
          
          
}


 
