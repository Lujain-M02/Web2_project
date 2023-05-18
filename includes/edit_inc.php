<?php

    include 'db_connect.php'; //connection 
    
    if(isset($_GET['Pid'])){
    $id=$_GET['Pid'];
    }else {
        echo 'Error happened in the get method';
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        
        if ( is_uploaded_file($_FILES['images']['tmp_name'][0])) {
        // Get the uploaded images
        $images = $_FILES['images'];

        // Loop through each image
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $image_name = $images['name'][$key];
            $image_tmp = $images['tmp_name'][$key];

                // Move the image to a directory
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($image_name);

                if (move_uploaded_file($image_tmp, $target_file)) {
                    // Insert image path into the database
                    $sql = "INSERT INTO `propertyimage`(`property_id`, `path`) VALUES ('$id','$image_name')";
                    $databaseCon->query($sql);
                }
            }
        }

        if (!empty($_POST['Pname']) && !empty($_POST['room']) && !empty($_POST['price']) && !empty($_POST['Location']) && !empty($_POST['tenants']) && !empty($_POST['Pdes'])) {

        // Retrieve the submitted form data
        $Pname = $_POST['Pname'];
        $room = $_POST['room'];
        $price = $_POST['price'];
        $Location = $_POST['Location'];
        $tenants = $_POST['tenants'];
        $Pdes = $_POST['Pdes'];
        

        // Escape special characters in the form inputs
        $Pname = mysqli_real_escape_string($databaseCon, $Pname);
        $room = mysqli_real_escape_string($databaseCon, $room);
        $price = mysqli_real_escape_string($databaseCon, $price);
        $Location = mysqli_real_escape_string($databaseCon, $Location);
        $tenants = mysqli_real_escape_string($databaseCon, $tenants);
        $Pdes = mysqli_real_escape_string($databaseCon, $Pdes);
        
        // Construct the SQL query to update the values in the "property" table
        $query = "UPDATE `property` SET
                    name = '$Pname',
                    rooms = '$room',
                    rent_cost = '$price',
                    location = '$Location',
                    max_tenants = '$tenants',
                    description = '$Pdes'
                  WHERE id = '$id'";

        // Execute the query
        $result = mysqli_query($databaseCon, $query);

        // Check if the update was successful
        if ($result) {
          echo "Update successful!";
          header("Location: ../PropertyDetails.php?id=".$id);
        } else {
          echo "Update failed. Error: " . mysqli_error($databaseCon);
        }

        // Close the database connection
        //mysqli_close($connection);

               
        
               
    } else {
        header("Location: ../EditProperty.php?id=".$Pid."&error=error");
    }
        }
    
    if(isset($_GET['imgID'])){
        $Pid=$_GET['Pid'];
        $img=$_GET['imgID'];
        
                $query = "DELETE FROM `propertyimage` WHERE id='$img';";

        // Execute the query
        $result = mysqli_query($databaseCon, $query);

        // Check if the update was successful
        if ($result) {
          //echo "Update successful!";
          header("Location: ../EditProperty.php?id=".$Pid."&delete=yes");
        } else {
          echo "we can not delete the image try again " . mysqli_error($databaseCon);
        }
        
        
    
    }
           
           
           
           
           
           
           
       
    
?>
