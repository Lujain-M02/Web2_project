<?php
//include 'includes/Security_inc.php';
    //if ($_SESSION['role']!='home owner'){
    //        header("Location: HomeSeeker.php");
    //}


        include 'includes/db_connect.php';
        include 'includes/login_inc.php';
       session_start();
        
        $id = $_SESSION['id'];
        
        $sql =  "SELECT * FROM homeowner WHERE id = $id";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
        
           
        $sql1 =  "SELECT p.name,p.location,hs.first_name,hs.last_name,a.status,hs.id AS HSid ,p.id ,r.id AS rid
FROM homeseeker hs,property p,rentalapplication r,applicationstatus a
WHERE r.property_id = p.id AND r.home_seeker_id = hs.id AND r.application_status_id = a.id AND p.homeowner_id = $id";
        $result1 = mysqli_query($databaseCon, $sql1);  
        
        $sql2 =  "SELECT  p.location,p.rooms, p.name, p.rent_cost, pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.homeowner_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result2 = mysqli_query($databaseCon, $sql2);  

        $sql3 =  "SELECT pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.homeowner_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result3 = mysqli_query($databaseCon, $sql3); 
        
        $sql4 =  "SELECT pc.category FROM Property p, propertycategory pc, rentalapplication r WHERE r.homeowner_id !=$id AND p.id = r.property_id AND p.property_category_id = pc.id";
        $result4 = mysqli_query($databaseCon, $sql4);


       

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
        <li><a href="signout.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="100" height="80"></a></li>
        
      </ul>
     
    </div>
  </header>

    <div class="WelcomeHO"> 
        <!--<a href="index.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="120" height="80"> </a>-->      
        <h1>Welcome <div class="HO_name"><?php echo $row["name"]." !"; ?></div></h1>

        <table class="Info">
                <tr>
                    <th>Name:</th>
                    <td><?php echo $row['name']?></td>
                    <th>Phone:</th>
                    <td><?php echo $row['phone_number']?></td>
                    <th>Email:</th>
                    <td><?php echo $row['email_address']?></td>
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

        <?php 
        while($row1 = mysqli_fetch_assoc($result1))
            {
            foreach ($row1 as $a=>$b){
                echo $a.":".$b."<br>";
            }
            $propertyId = $row1['id'];
            $applicantInfo= $row1['HSid']; //الاي دي لازم أغيره
            $rentalappID = $row1['rid'];
            echo '$row1["rid"]'.$row1['rid'];
                echo "<tr>";
                echo "<td><a href='PropertyDetails.php?id=$propertyId'>".$row1['name']."</a></td>";
                echo "<td>".$row1['location']."</td>";
                //الاي دي لازم أغيره
                
                echo "<td><a href='applicantInfo.php?id=$applicantInfo'>".$row1['first_name']." ".$row1['last_name']."</a></td>";
                //echo "<td>".$row1['first_name']." ".$row1['last_name']."</td>";
                echo "<td>".$row1['status']."</td>";
                
                echo "<form method='GET' action='updateStatus.php?id=$rentalappID'><td><a href='updateStatus.php?id=$rentalappID'>Accept</a>"
                        . "<a href='applicantInfo.php?id=$rentalappID'>Decline</a></td></form>";
                echo '<td><div><button name="Accept">Accept</button><button name="Decline">Decline</button></div></td>';
                
  
            }
            
        
   
        ?>
    </table>
<button name="Accept">Accept</button>
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
                       echo '<td><div><form action="Delete.php" method="GET"><button name = >DELETE</button></form></div></td>';
                       echo '</tr>'; 
         }}
        }}
 
        ?>
    </table>


    <!-- copyright -->
<br>
        <div class="copyright">
            <p>&#169; YOUR HOME 2023.com</p>
        </div>

</body>
</html>