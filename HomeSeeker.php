
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
   
   <?php

        include 'includes/db_connect.php';
        session_start();
        
          $id = $_SESSION['id'];
   
   
     
          $sql =  "SELECT * FROM homeseeker WHERE id =$id";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
        
           
        $sql1 =  "SELECT  p.id, p.name, p.rent_cost, pc.category, aps.status FROM RentalApplication r,Property p, applicationstatus aps, propertycategory pc WHERE r.home_seeker_id =$id AND r.property_id = p.id AND r.application_status_id = aps.id
 AND p.property_category_id = pc.id";
        $result1 = mysqli_query($databaseCon, $sql1);  
        
        $sql2 =  "SELECT  p.location,p.rooms, p.name, p.rent_cost, pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.home_seeker_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result2 = mysqli_query($databaseCon, $sql2);  

        $sql3 =  "SELECT pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.home_seeker_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result3 = mysqli_query($databaseCon, $sql3); 
        
        $sql4 =  "SELECT pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.home_seeker_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result4 = mysqli_query($databaseCon, $sql4);
?>
         
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

    
       <?php 
        while($row1 = mysqli_fetch_assoc($result1))
            {
            $propertyId = $row1['id'];
                echo "<tr>";
                echo "<td><a href='PropertyDetails.php?id=$propertyId'>".$row1['name']."</a></td>";
                echo "<td>".$row1['category']."</td>";
                echo "<td>".$row1['rent_cost']."</td>";
                echo "<td>".$row1['status']."</td>";
                echo "</tr>";
            }
        ?>

</table>
<!--------------------------------------------HS 2 table---------------------------------------------------> 

<table class="HS_table_2">
    <caption>
      <h2 class="Caption_table">Homes for rent 
        <!----------------------Search By---------------------->
        <div class="SearchBy">
        <form method="POST">
          <label>Search By: </label>
          <select name="Search">
            <?php
             $category = null;
             $value = 0;
             while($row3 = mysqli_fetch_assoc($result3))
             {
                 if($category == $row3["category"])
                     continue;
                 
                 $category = $row3["category"];
                 $value = $value++;
                 echo '<option value ='.$value.'>'.$row3["category"].'</option>';
             }
            ?>
           </select>
          <input type="submit" value="Submit">
        </form>
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

       <?php 
        while($row2 = mysqli_fetch_assoc($result2))
            {
                echo '<tr>';
                echo '<td><a href="PropertyDetails.php">'.$row2["name"].'</a></td>';
                echo '<td>'.$row2["category"].'</td>';
                echo '<td>'.$row2["rent_cost"].'</td>';
                echo '<td>'.$row2["rooms"].'</td>';
                echo '<td>'.$row2["location"].'</td>';
                echo '<td><div><button>Apply</button></div></td>';
                echo '</tr>';
            }
            
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          //  $select = $_POST["Sreach"];
        while($row4 = mysqli_fetch_assoc($result4)){   
        if(isset($select)){
            $eql = strcmp($_POST["Sreach"], $row4["category"]);
                    if($eql == 0){
                       echo '<tr>';
                       echo '<td><a href="PropertyDetails.php">'.$row4["name"].'</a></td>';
                       echo '<td>'.$row4["category"].'</td>';
                       echo '<td>'.$row4["rent_cost"].'</td>';
                       echo '<td>'.$row4["rooms"].'</td>';
                       echo '<td>'.$row4["location"].'</td>';
                       echo '<td><div><button>Apply</button></div></td>';
                       echo '</tr>'; 
         }}
        }}
 
        ?>
</table>
</div>
<br>


  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>

</html>