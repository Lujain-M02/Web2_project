<?php
include 'includes/Security_inc.php';

session_start();

include 'db_connect.php';


$id = $_GET['id'];
//اول شي بجيب المعلومات بايدي اللي دخل 

$sql = "SELECT * FROM property WHERE id = $id";
$result = mysqli_query($databaseCon, $sql);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="Styles\Fstyle.css">
    <link rel="stylesheet" href="Styles\head.css">
    <link rel="icon" href="image/Logo.png">
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
      <br>

    <main>
        
        <div id="name">
            <h2>Sweet Home</h2>
        </div>
        <br>
        <div id="ApplyDdit">
            <button class="button">Apply</button>
            <button class="button" onclick="window.location.href='EditProperty.php';">Edit</button>
        </div>
        <div id="DP">
            <ul>
            <li class="a">Category: <p>Apartment</p></li>
            

            <li class="a">Number of Rooms: <p> 6 Rooms</p></li> 

            <li class="a">Rent: <p>5000/month</p></li> 

            <li class="a">Location: <p>Riyadh, Almalqa District</p></li>  

            <li class="a">Max number of tenants: <p>5</p></li>

            <li class="a">Descrtption:  <p>The apartment is distinguished by its legendary views of the main street,it consists of a master room, 2 bedroom, 3 bathrooms, and 3 livng rooms.</p></li>
        </ul>
        </div>
        <div id="imgg">
            <img src="image/fet1.png">
        </div>
        <br>
           

    </main>
    <!-- copyright -->
    <div class="copyright">
        <p>&#169; YOUR HOME 2023.com</p>
      </div>
</body>
</html>