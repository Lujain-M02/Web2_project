   <?php
        include 'includes/Security_inc.php';
    if ($_SESSION['role']!='home seeker'){
            header("Location: HomeOwner.php");
        }
        
        include 'includes/db_connect.php';
        session_start();
        
          $id = $_SESSION['id'];
   
   
     
          $sql =  "SELECT * FROM homeseeker WHERE id =$id";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
        
            
        
        $sql2 =  "SELECT p.id, p.location,p.rooms, p.name, p.rent_cost, pc.category FROM Property p, propertycategory pc WHERE p.property_category_id = pc.id AND p.id NOT IN( SELECT r.property_id FROM rentalapplication r WHERE r.home_seeker_id = $id)";
        $result2 = mysqli_query($databaseCon, $sql2);  
        
        
        if(isset($_GET["id"])){
        $homeID = $row['id'];
   
        $sql5 =  "SELECT  id FROM applicationstatus aps WHERE status ='under consideration'";
        $result5 = mysqli_query($databaseCon, $sql5);
        $row5 = mysqli_fetch_assoc($result5);
        $apsId = $row5['id'];
 
        $proName = $_GET['id'];
        $sql6 =  "SELECT  id FROM propertycategory WHERE category ='$proName'";
        $result6 = mysqli_query($databaseCon, $sql6);
        $row6 = mysqli_fetch_assoc($result6);
        $proId = $row6['id'];
 
        $sql9 =  "SELECT  id FROM property WHERE property_category_id =$proId";
        $result9 = mysqli_query($databaseCon, $sql9);
        $row9 = mysqli_fetch_assoc($result9);
        $pro = $row9['id'];
 
        $sql7 = "INSERT INTO rentalapplication (property_id, home_seeker_id, application_status_id) values($pro,$homeID,$apsId)";
        $result7 = mysqli_query($databaseCon, $sql7);
       }
        
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
        <li><a href="signout.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="80" height="80"></a></li>
        
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

    
       <?php 
   
            $sql1 =  "SELECT DISTINCT p.id, p.name, p.rent_cost, pc.category, aps.status FROM RentalApplication r,Property p, applicationstatus aps, propertycategory pc WHERE r.home_seeker_id =$id AND r.property_id = p.id AND r.application_status_id = aps.id
 AND p.property_category_id = pc.id";
        $result1 = mysqli_query($databaseCon, $sql1); 
             while($row1 = mysqli_fetch_assoc($result1)){
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
          <label>Search By: </label>
          <select name="Search" id="Search">
          <option disabled="" selected="">Filter by</option>
            <?php
             $sql3 =  "SELECT pc.id, pc.category FROM Property p, propertycategory pc WHERE p.property_category_id = pc.id AND p.id NOT IN( SELECT r.property_id FROM rentalapplication r WHERE r.home_seeker_id = $id)";
             $result3 = mysqli_query($databaseCon, $sql3);
             $category = null;
             while($row3 = mysqli_fetch_assoc($result3))
             {
                 if($category == $row3["category"])
                     continue;
                 
                 $category = $row3["category"];
            
                 echo '<option value ='.$row3["category"].'>'.$row3["category"].'</option>';
            }
            ?>
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
    <tbody id="container">
       <?php   
        if(isset($_GET["id"])){
        $proName = $_GET['id'];
        $sql6 =  "SELECT  id FROM propertycategory WHERE category ='$proName'";
        $result6 = mysqli_query($databaseCon, $sql6);
        $row6 = mysqli_fetch_assoc($result6);
        $proId = $row6['id'];

        $sql9 =  "SELECT  name FROM property WHERE property_category_id =$proId";
        $result9 = mysqli_query($databaseCon, $sql9);
        $row9 = mysqli_fetch_assoc($result9);
        $pro = $row9['name'];
        
        while($row2 = mysqli_fetch_assoc($result2))
            {
            if($row2["name"] != $pro){
                $propertyId = $row2['id'];
                echo '<tr>';
                echo "<td><a href='PropertyDetails.php?id=$propertyId'>".$row2['name']."</a></td>";
                echo '<td>'.$row2["category"].'</td>';
                echo '<td>'.$row2["rent_cost"].'</td>';
                echo '<td>'.$row2["rooms"].'</td>';
                echo '<td>'.$row2["location"].'</td>';
                echo "<td><div><a href='HomeSeeker.php?id=".$row2["category"]."'class='apply'>Apply</a></div></td>";
                echo '</tr>';
        }}
        }
        else{
             while($row2 = mysqli_fetch_assoc($result2))
            {
                $propertyId = $row2['id'];
                echo '<tr>';
                echo "<td><a href='PropertyDetails.php?id=$propertyId'>".$row2['name']."</a></td>";
                echo '<td>'.$row2["category"].'</td>';
                echo '<td>'.$row2["rent_cost"].'</td>';
                echo '<td>'.$row2["rooms"].'</td>';
                echo '<td>'.$row2["location"].'</td>';
                echo "<td><div><a href='includes/apply.php?id=".$row2["id"]."'class='apply'>Apply</a></div></td>";
                echo '</tr>';
           }
        }
        ?>

    </tbody>
 
</table>
<br>


  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>
   <script>
    $(document).ready(function(){
    $("#Search").on('change',function(){
        var value = $(this).val();
        
      $.ajax({
          url: 'filter.php',
          type: 'POST',
          data: {reguest: value},
            
          success:function(data){
              var obj = JSON.parse(data);
              $("#container").html("");
              for(i=0; i<obj.length; i++){
              var propertyId = obj[i].id;
              var res = $("<tr>");
              res.append("<td><a href='PropertyDetails.php?id="+ propertyId +"'>" +obj[i].name+"</a></td>");
              res.append("<td>" +obj[i].category+"</td>");
              res.append("<td>" +obj[i].rent_cost+"</td>");
              res.append("<td>" +obj[i].rooms+"</td>");
              res.append("<td>" +obj[i].location+"</td>");
              res.append("<td><div><a href='includes/apply.php?id="+ propertyId +"'class='apply'>Apply</a></div></td></tr>");
              $("#container").append(res);
          }
          }
        
          
      });
      });
    });
    </script>
</body>
<?php
mysqli_close($connection); 
?>
</html>