<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//include 'includes/db_connect.php';

$databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());

  
if(isset($_POST["action"])){

  if($_POST["action"] == "accept"){
    Accept();
  } else if($_POST["action"] == "declin"){
      Declin();
  }else{
      echo 'eror action';    
  }

}

function Accept(){
  global $databaseCon;
  
  $rentalID = $_POST['id'];
  $propID = $_POST['propID'];



        $sql3 =  "UPDATE rentalapplication
                    SET application_status_id=333333 
                    WHERE id =$rentalID";
          $result3 = mysqli_query($databaseCon, $sql3); 
          
          
       
          $sql4 =  "UPDATE rentalapplication 
                    SET application_status_id=222222 
                    WHERE property_id = $propID AND id <> $rentalID";
          $result4 = mysqli_query($databaseCon, $sql4);
          
 
  $rows = mysqli_affected_rows($databaseCon);
  

  if(!$result4){
    echo 0;
    exit;
  }
  echo 1;
}


function Declin(){
  global $databaseCon;
  
  $rentalID = $_POST['id'];
  $propID = $_POST['propID'];



         $sql2 =  "UPDATE rentalapplication
                    SET application_status_id=222222 
                    WHERE id =$rentalID";
          $result2 = mysqli_query($databaseCon, $sql2); 
          
 
  $rows = mysqli_affected_rows($databaseCon);
  

  if($rows==0){
    echo 0;
    exit;
  }
  echo 1;
}




/*$databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());




  
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "accept"){
    accept();
  } else if($_POST["action"] == "decline"){
     decline();
  }
  //header("Location: HomeOwner.php");
}

function decline(){
  global $databaseCon;

  $rentalID = $_GET['id'];
  $propID = $_GET['propID'];
  $btn = $_GET['action'];



   if($btn == "decline"){
     $sql2 =  "UPDATE rentalapplication
                    SET application_status_id=222222 
                    WHERE id =$rentalID";
          $result2 = mysqli_query($databaseCon, $sql2); 
          
          if($result2){
              echo "Status updated successfully";
          }else{
              echo "Error: Missing parameters";
          }
   }

 if($rows==0){
    echo 0;
    exit;
  }

  
  echo 1;
}

  function accept(){
  global $databaseCon;

  $rentalID = $_GET['id'];
  $propID = $_GET['propID'];
  $btn = $_GET['action'];



  if($btn == "accept"){ 
        $sql3 =  "UPDATE rentalapplication
                    SET application_status_id=333333 
                    WHERE id =$rentalID";
          $result3 = mysqli_query($databaseCon, $sql3); 
          
          
       
          $sql4 =  "UPDATE rentalapplication 
                    SET application_status_id=222222 
                    WHERE property_id = $propID AND id <> $rentalID";
          $result4 = mysqli_query($databaseCon, $sql4); 
          
        

          if($result4){
              echo "Status updated successfully";
          }else{
              echo "Error: Missing parameters";
          }
    }
     if($rows==0){
    echo 0;
    exit;
  }

  
  echo 1;

}



  mysqli_close($databaseCon); */

 
?>