<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());




  
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "delete"){
    delete();
  } else {
      echo 'eror action';    
  }
  //header("Location: HomeOwner.php");
}

function delete(){
  global $databaseCon;

  $id = $_POST["id"];
  $sql1 =  "DELETE FROM propertyimage WHERE property_id = '$id'";
  $result1 = mysqli_query($databaseCon, $sql1); 
  $sql2 =  "DELETE FROM rentalapplication WHERE property_id = '$id'";
  $result2 = mysqli_query($databaseCon, $sql2); 
  $sql3 =  "DELETE FROM property WHERE id = '$id'";
  $result3 = mysqli_query($databaseCon, $sql3); 
  $rows = mysqli_affected_rows($databaseCon);
  

  // Data with female gender
  if($rows==0){
    echo 0;
    exit;
  }

  
  echo 1;
  
    /*

  
  echo '$propName';
   $sql2 =  "DELETE FROM rentalapplication WHERE property_id = '$propID'";
  $result2 = mysqli_query($databaseCon, $sql2); 
  
   $sql3 =  "DELETE FROM property WHERE id = '$propID'";
  $result3 = mysqli_query($databaseCon, $sql3); 
   
  echo 1;
    
 // $id = $_POST["id"];

  //$rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_data WHERE id = $id"));

  // Data with female gender
  //if($rows["gender"] == "Female"){
    //echo 0;
    //exit;
  //}

  //mysqli_query($conn, "DELETE FROM tb_data WHERE id = $id");
  //

  /*echo '$propName';
  
  
*/
  
 //header("Location: HomeOwner.php");
}
 // mysqli_close($databaseCon); 

?>