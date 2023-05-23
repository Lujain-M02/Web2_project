<?php

include 'includes/db_connect.php';
include 'includes/Security_inc.php';



if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }
    
//include 'includes/Security_inc.php';
/*include 'includes/Security_inc.php';
include 'includes/db_connect.php';

if(isset($_GET['id'])){
$Pid=$_GET['id'];
}else {
    echo 'Error happened in the get';
    exit();
}

include 'includes/db_connect.php';
include 'includes/login_inc.php';
session_start();

if(isset($_POST["Submit"])){
$Property_Name = $_POST["PrName"];
//catogry
$Number_of_Rooms= $_POST["numOfRooms"];
$Rent = $_POST["rent"];
$Location = $_POST["location"];
$Max_number_of_tenants = $_POST["numOfTen"];
$Description = $_POST["desc"];
$Upload_Pictures = $_POST["pic"];/////لازم أرجع أتأكد منها


    
}*/
/*include 'includes/db_connect.php';
include 'includes/Security_inc.php';



if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }

if(isset($_POST["Submit"])){
$Property_Name = $_POST["PrName"];
//catogry
$Number_of_Rooms= $_POST["numOfRooms"];
$Rent = $_POST["rent"];
$Location = $_POST["location"];
$Max_number_of_tenants = $_POST["numOfTen"];
$Description = $_POST["desc"];


echo $Property_Name;
echo $Number_of_Rooms;
echo $Location;
echo $Max_number_of_tenants;
echo $Description;*/

         
          
          


  
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
        
        
        /*$query = "INSERT INTO `property`"
                . "(`id`, `homeowner_id`, " 
                . "`property_category_id`, "
                . "`name`, `rooms`, `rent_cost`, "
                . "`location`, `max_tenants`, "
                . "`description`) VALUES "
                . "('$id','$HOid','$Pcata',"
                . "'$PrName','$numOfRooms',"
                . "'$rent','$location','$numOfTen','$desc')";*/
        
        $query = "INSERT INTO `property`(`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES (Null,'$id','$Pcata','$PrName','$numOfRooms','$rent','$location','$numOfTen','$desc')";
        

        
        $result = mysqli_query($databaseCon, $query);

        if ( is_uploaded_file($_FILES['images']['tmp_name'][0])) {
        
        $images = $_FILES['images'];

        
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $image_name = $images['name'][$key];
            $image_tmp = $images['tmp_name'][$key];

                
                $target_dir = "upload/";
                $target_file = $target_dir . basename($image_name);

                if (move_uploaded_file($image_tmp, $target_file)) {
                    
                    $sql = "INSERT INTO `propertyimage`(`property_id`, `path`) VALUES ('26','$image_name')";
                    $databaseCon->query($sql);
                }
            }
        }
        
        if ($result) {
          echo "Added successful!";
          header("Location:PropertyDetails.php?id=26");
        } else {
          echo "Add failed. Error: " . mysqli_error($databaseCon);
        }
        
        
        

        

               
        
               
    } 
        }
    
   
           
           
          
           
           
           
           
       
    




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
    <link rel="stylesheet" href="Styles\head.css">
    <link rel="stylesheet" href="Styles\Fstyle.css">
    <link rel="icon" href="image/Logo.png">
    <style>main{padding: 33px;}
    body .copyright{margin-top: 15%;}</style>
</head>
<body>
    
    <header>
        <div class="nav container">
          <!-- Logo -->
          <a href="index.php" class="logo"> <img src="image/Logo.png" alt=""> Your Home</a>
          <!-- Menu Icon -->
          <input type="checkbox" name="" id="menu">
          <label for="menu" <i class='bx bx-menu' id="menu-icon" ></i>></label>
          <!-- Nav List -->
          <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">About Us</a></li>
            <li><a href="login.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="80" height="80"></a></li>
            
          </ul>
         
        </div>
      </header>

 
      <main>
        <form class="myForm" method="POST" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>Property Details</legend>
                <ul>
                    <li>
                        <label>Property Name:
                        <input type="text" name="PrName"id="pname"></label>
                    </li>
                    <li>
                        <label>Category:</label>
                        <select id="Category" name="Pcate">
                            <option value ="11111">Apartment</option>
                            <option value ="22222">villa</option>
                            <option value ="33333">Delux</option>
                        </select>
                    </li>
                    <li>
                        <label>Number of Rooms:
                        <input type="text" name="numOfRooms"id="NOR"></label>
                    </li>
                    <li>
                        <label>Rent:
                        <input type="text" name="rent" id="rent"></label>
                    </li>
                    <li>
                        <label>Location:
                        <input type="text" name="location" id="location"></label>
                    </li>
                    <li>
                        <label>Max number of tenants:
                        <input type="text" name="numOfTen" id="MT"></label>
                    </li>
                    <li>
                        <label>Description:<br>
                        <textarea name="desc" id="Des" rows="6" cols="30"></textarea></label>
                    </li>
                    <li>
                        <label>Upload Image:
                            <input type="file" name="images[]" accept="image/*" multiple>
                        </label>
                    </li>
                </ul>
                <button name = "Submit" class="button">Submit</button>
                <button  name = "Reset" class="button">Reset</button>
            </fieldset>
        </form>
          
          
     </main>
     
  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>
<?php
mysqli_close($connection); 
?>
</html>