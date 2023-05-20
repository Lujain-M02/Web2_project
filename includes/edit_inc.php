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
        
        $images = $_FILES['images'];

        
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $image_name = $images['name'][$key];
            $image_tmp = $images['tmp_name'][$key];

                
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($image_name);

                if (move_uploaded_file($image_tmp, $target_file)) {
                    
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
        $Pcata=$_POST['Pcate'];
        

        
        $Pname = mysqli_real_escape_string($databaseCon, $Pname);
        $room = mysqli_real_escape_string($databaseCon, $room);
        $price = mysqli_real_escape_string($databaseCon, $price);
        $Location = mysqli_real_escape_string($databaseCon, $Location);
        $tenants = mysqli_real_escape_string($databaseCon, $tenants);
        $Pdes = mysqli_real_escape_string($databaseCon, $Pdes);
        
        
        $query = "UPDATE `property` SET
                    name = '$Pname',
                    rooms = '$room',
                    rent_cost = '$price',
                    location = '$Location',
                    max_tenants = '$tenants',
                    description = '$Pdes',
                    property_category_id='$Pcata'
                  WHERE id = '$id'";

        
        $result = mysqli_query($databaseCon, $query);

        
        if ($result) {
          echo "Update successful!";
          header("Location: ../PropertyDetails.php?id=".$id);
        } else {
          echo "Update failed. Error: " . mysqli_error($databaseCon);
        }

               
        
               
    } else {
        header("Location: ../EditProperty.php?id=".$Pid."&error=error");
    }
        }
    
    if(isset($_GET['imgID'])){
        $Pid=$_GET['Pid'];
        $img=$_GET['imgID'];
        
                $query = "DELETE FROM `propertyimage` WHERE id='$img';";

        
        $result = mysqli_query($databaseCon, $query);

        
        if ($result) {
        
          header("Location: ../EditProperty.php?id=".$Pid."&delete=yes");
        } else {
          echo "we can not delete the image try again " . mysqli_error($databaseCon);
        }
        
        
    
    }
           
           
         mysqli_close($connection);  
           
           
           
           
       
    
?>
