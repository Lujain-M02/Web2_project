<?php
//include 'includes/Security_inc.php';
    //if ($_SESSION['role']!='home owner'){
    //        header("Location: HomeSeeker.php");
    //}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles\HOstyle.css">
    <link rel="stylesheet" href="Styles\head.css">
    <link rel="icon" href="image/Logo.png">
    <title>Home Owner</title>
</head>


<body class="HO_body">
     <!-- Navbar -->
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
        <li><a href="login.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="100" height="80"></a></li>
        
      </ul>
     
    </div>
  </header>

    <div class="WelcomeHO"> 
        <!--<a href="index.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="120" height="80"> </a>-->      
        <h1>Welcome <div class="HO_name">Abdullah</div></h1>

        <table class="Info">
                <tr>
                    <th>Name:</th>
                    <td>Abdullah Othman</td>
                    <th>Phone:</th>
                    <td>0501111111</td>
                    <th>Email:</th>
                    <td>Abdullah@gmail.com</td>
                </tr>
        </table> 
    </div> 


<!-- ---------------------------------------first table -------------------------------------------------->
    <table class="FirstHO_table">
        <caption> <h2 class="Caption_table"> Rental Applications </h2></caption>
        <tr>
            <th>Property Name</th>
            <th>Location</th>
            <th>Applicant’s Name</th>
            <th>Status</th>
        </tr>

        <tr>
            <td rowspan="2"><a href="PropertyDetails.php">Olaya Plaza</a></td>
            <td rowspan="2">Riyadh, olaya dist</td>
            <td ><a href="applicantInfo.php">Sara Ahmed</a></td>
            <td>Under consideration</td>
            <td><div class="Status_Button"> <button>Accept</button> <button>Decline</button></div></td>
        </tr>
        <tr>
            <td><a href="applicantInfo.php">Ali Mohammed</a></td>
            <td>Under consideration</td>
            <td><div class="Status_Button"> <button>Accept</button> <button>Decline</button></div></td> 
        </tr>
        <tr>
            <td ><a href="PropertyDetails.php">Al Nakhel Home</a></td>
            <td >Riyadh, Al-Nakhel dist</td>
            <td ><a href="applicantInfo.php">Sara Ahmed</a></td>
            <td>Accepted</td>
            <td></td>
        </tr>
    </table>

    <div class="Add_button"><button><a href="AddNewProperty.php" >Add Proproty</a></button></div>

<!-- ---------------------------------------second table -------------------------------------------------->
    <table class="SecondHO_table">
        <caption> <h2 class="Caption_table"> Listed Property </h2></caption>
        <tr>
            <th>Property Name</th>
            <th>Category</th>
            <th>Rent</th>
            <th>Rooms</th>
            <th>Location</th>
        </tr>

        <tr>
            <td><a href="PropertyDetails.php">Home Plaza</a></td>
            <td >Apartment</td>
            <td >2500/month</td>
            <td>4</td>
            <td>Riyadh, Al-Narjes District</td>
            <td><div>  <button>Delete</button></div></td> 
        </tr>
        <tr>
            <td><a href="PropertyDetails.php">Holiday Villa</a></td>
            <td >Villa</td>
            <td>7000/month</td> 
            <td>6</td>
            <td>Riyadh, Al-Aqeeq District</td>
            <td><div>  <button>Delete</button></div></td> 
        </tr>
        <tr>
            <td ><a href="PropertyDetails.php">Rawabi Square</a></td>
            <td >Apartment</td>
            <td >1000/month</td>
            <td>4</td>
            <td>Riyadh, Al-Rawabi Dist</td>
            <td><div>  <button>Delete</button></div></td> 
        </tr>
    </table>


    <!-- copyright -->
<br>
        <div class="copyright">
            <p>&#169; YOUR HOME 2023.com</p>
        </div>

</body>
</html>