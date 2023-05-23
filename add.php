<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'includes/db_connect.php';
include 'includes/Security_inc.php';



if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }

  
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        
        if (!empty($_POST['PrName']) && !empty($_POST['numOfRooms']) && !empty($_POST['rent']) && !empty($_POST['location']) && !empty($_POST['numOfTen']) && !empty($_POST['desc'])) {

        // Retrieve the submitted form data
        $PrName = strval($_POST['PrName']);
        //catogry
        $numOfRooms = $_POST['numOfRooms'];
        $rent = $_POST['rent'];
        $location = $_POST['location'];
        $numOfTen = $_POST['numOfTen'];
        $desc = $_POST['desc'];
        $Pcata=$_POST['Pcate'];
        $HOid = $_POST['idho'];
 
        
        echo '$id'.$id;
       
        echo '$Pcata'.$Pcata;
        echo '$PrName'.$PrName;
        echo '$numOfRooms'.$numOfRooms;
        echo '$rent'.$rent;
        echo '$location'.$location;
        echo '$numOfTen'.$numOfTen;
        echo '$desc'.$desc;

        
        $PrName = mysqli_real_escape_string($databaseCon, $PrName);
        $numOfRooms = mysqli_real_escape_string($databaseCon, $numOfRooms);
        $rent = mysqli_real_escape_string($databaseCon, $rent);
        $location = mysqli_real_escape_string($databaseCon, $location);
        $numOfTen = mysqli_real_escape_string($databaseCon, $numOfTen);
        $desc = mysqli_real_escape_string($databaseCon, $desc);
        

        $query = "INSERT INTO `property`(`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES (Null,'$id','$Pcata','$PrName','$numOfRooms','$rent','$location','$numOfTen','$desc')";
        
        $result = mysqli_query($databaseCon, $query);
        $last_id = mysqli_insert_id($databaseCon);

        if ( is_uploaded_file($_FILES['images']['tmp_name'][0])) {
        
        $images = $_FILES['images'];

        
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $image_name = $images['name'][$key];
            $image_tmp = $images['tmp_name'][$key];

                
                $target_dir = "upload/";
                $target_file = $target_dir . basename($image_name);


                if (move_uploaded_file($image_tmp, $target_file)) {
                    
                    $sql = "INSERT INTO `propertyimage`(`property_id`, `path`) VALUES ('$last_id','$image_name')";
                    $databaseCon->query($sql);
                }
            }
        }
        
        if ($result) {
          echo '<script>alert("Added successful!");</script>';
          header("Location:PropertyDetails.php?id='$last_id'");
        } else {
          echo "Add failed. Error: " . mysqli_error($databaseCon);
        }
        
     
        
               
    } else{
            header("Location: AddNewProperty.php?error=error");     

    }
        }
    
   
           
           
          


mysqli_close($connection); ?>