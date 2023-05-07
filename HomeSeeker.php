<?php

        include 'includes/db_connect.php';
        include 'includes/login_inc.php';
       // session_start();
        
        $id = $_SESSION['id'];
        $sql =  "SELECT * FROM homeseeker WHERE id = $id";
         
        $result = mysqli_query($connection, $sql);
            
        $row = mysqli_fetch_assoc($result);
       
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Home Seeker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Styles\HSstyle.css">
  <link rel="stylesheet" href="Styles\head.css">
  <script src="HSjs.js"></script>
  <link rel="icon" href="image/Logo.png">
 
</head>
<!-- fetoon22 -->
<body class="HS_body">
  
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
        <li><a href="login.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="80" height="80"></a></li>
        
      </ul>
     
    </div>
  </header>
         

<div class="main">
<div class="HS_Welcome">      
  <h1>Welcome <div class="HS_name"><?php echo $row['first_name']?></div></h1>

  <table class="Info">
          <tr>
              <th>First Name:</th>
              <td><?php echo $row['first_name']?></td>
              <th>Last Name:</th>
              <td><?php echo $row['last_name']?></td>
              <th>Number Of Family Members:</th>
              <td><?php echo $row['family_members']?></td>
              <th>Phone:</th>
              <td><?php echo $row['phone_number']?></td>
              <th>Email:</th>
              <td><?php echo $row['email_address']?></td>
          </tr>
  </table> 
</div> 

 <!--------------------------------------------HS 1 table---------------------------------------------------> 
<table class="HS_table_1">
    <caption><h2 class="Caption_table">Requested Homes</h2></caption>
    <thead>
        <th>Property Name</th>
        <th>Category</th>
        <th>Rent</th>
        <th>Status</th>
    </thead>

    <tr>
        <td><a href="PropertyDetails.php">Olaya plaza</a></td>
        <td>Apartmnt</td>
        <td>1000/month</td>
        <td>Under considration</td>
    </tr>

    <tr>
        <td><a href="PropertyDetails.php">Al Nakheel home</a></td>
        <td>villa</td>
        <td>4000/month</td>
        <td>Accepted</td>
    </tr>
</table>
<!--------------------------------------------HS 2 table---------------------------------------------------> 

<table class="HS_table_2">
    <caption>
      <h2 class="Caption_table">Homes for rent 
        <!----------------------Search By---------------------->
        <div class="SearchBy">
          <label>Search By: </label>
           <select name="Search" id="Search">
             <option value="Search">Search</option>
             <option value="apartment">apartment</option>
             <option value="villa">villa</option>
           </select>
        </div>
      </h2>
    </caption>

    <thead>
        <th>Property name</th>
        <th>Category</th>
        <th>Rent</th>
        <th>Rooms</th>
        <th>Location</th>
    </thead>

    <tr>
        <td><a href="PropertyDetails.php">Sweet home</a></td>
        <td>Apartmnt</td>
        <td>1500/month</td>
        <td>3</td>
        <td>Riyadh, Al-yasamin Distict</td>
        <td><div><button>Apply</button></div></td>
    </tr>

    <tr>
        <td><a href="PropertyDetails.php">Confy home</a></td>
        <td>villa</td>
        <td>5000/month</td>
        <td>6</td>
        <td>Riyadh, Almalqa Distict</td>
        <td><div><button>Apply</button></div></td>
    </tr>
</table>
</div>
<br>


  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>

</html>
