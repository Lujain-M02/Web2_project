<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'includes/db_connect.php';
       


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


   if($btn == "decline"){
     $sql2 =  "UPDATE rentalapplication
                    SET application_status_id=222222 
                    WHERE id =$rentalID";
          $result2 = mysqli_query($databaseCon, $sql2); 
           
   }
      
          
          foreach ($row2 as $h=>$k){
                echo $h.":".$k."<br>";
          }
    if($btn == "accept"){ 
        $sql3 =  "UPDATE rentalapplication
                    SET application_status_id=333333 
                    WHERE id =$rentalID";
          $result3 = mysqli_query($databaseCon, $sql3); 
          
          
       
          $sql4 =  "UPDATE rentalapplication 
                    SET application_status_id=222222 
                    WHERE property_id = $propID AND id <> $rentalID";
          $result4 = mysqli_query($databaseCon, $sql4); 
       
    }
    
    header("Location: HomeOwner.php");     
          
          
          
}

  mysqli_close($databaseCon); 

 
?>