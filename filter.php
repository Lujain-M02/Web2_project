<?php
 session_start();
 include 'includes/db_connect.php';

 
   if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["reguest"])){
      $request = $_POST["reguest"];
      $query = "SELECT p.id,p.location,p.rooms, p.name, p.rent_cost, pc.category FROM Property p, propertycategory pc WHERE p.property_category_id = pc.id AND p.id NOT IN( SELECT r.property_id FROM rentalapplication r WHERE r.home_seeker_id = $id) AND pc.category = '$request'";
      $count = mysqli_query($databaseCon,$query);

      
      $myObj = array();
   while($row4 = mysqli_fetch_assoc($count)){ 
                $myObj[] = $row4;

        } 
        print_r(json_encode($myObj));
        header('Content-Type: text/plain');

    }  }  
       mysqli_close($databaseCon);
  

  ?>


