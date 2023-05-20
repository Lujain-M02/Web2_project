<?php
//include 'includes/Security_inc.php';
include 'includes/Security_inc.php';
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
        <form class="myForm" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Property Details</legend>
                <ul>
                    <li>
                        <label>Property Name:
                        <input type="text" name="PrName"id="pname"></label>
                    </li>
                    <li>
                        <label>Category:</label>
                        <select id="Category">
                            <option>Apartment</option>
                            <option>villa</option>
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
                        <label>Upload Pictures:
                        <input type="file" name="pic" id="myFile" accept="image/png, image/jpeg"></label>
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
</html>