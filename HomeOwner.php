<?php
include 'includes/Security_inc.php';
    if ($_SESSION['role']!='home owner'){
            header("Location: HomeSeeker.php");
    }


        include 'includes/db_connect.php';
        
       session_start();
       
      
    if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }
        
       
        
        $sql =  "SELECT * FROM homeowner WHERE id = $id";
          $result = mysqli_query($databaseCon, $sql); 
          $row = mysqli_fetch_assoc($result);
        
           
        $sql1 =  "SELECT p.name,p.location,hs.first_name,hs.last_name,a.status,hs.id AS HSid ,p.id ,r.id AS rid
FROM homeseeker hs,property p,rentalapplication r,applicationstatus a
WHERE r.property_id = p.id AND r.home_seeker_id = hs.id AND r.application_status_id = a.id AND p.homeowner_id = $id";
        $result1 = mysqli_query($databaseCon, $sql1);  
        
        $sql2 =  "SELECT p.name,pc.category ,p.rent_cost,p.rooms, p.location ,p.id AS pid 
FROM Property p, propertycategory pc
WHERE homeowner_id= $id AND p.property_category_id= pc.id AND p.id NOT IN(SELECT p.id 
                                                                     FROM Property p ,rentalapplication r
                                                                     WHERE p.id = r.property_id AND r.application_status_id = 333333)";
        $result2 = mysqli_query($databaseCon, $sql2);  

        $sql3 =  "SELECT p.homeowner_id AS HOid
FROM homeowner ho, Property p
WHERE ho.id = p.homeowner_id AND p.id= $id";
        $result3 = mysqli_query($databaseCon, $sql3); 
        
        $sql4 =  "SELECT p.name,pc.category ,p.rent_cost,p.rooms, p.location
FROM Property p, propertycategory pc
WHERE homeowner_id= $id AND p.property_category_id= pc.id";
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
            <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
        </script>
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
     <div>
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
        <thead>
        <tr>
            <th>Property Name</th>
            <th>Location</th>
            <th>Applicant’s Name</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody id="Ftable">

            </tbody>
            </table>
            

  
                <div class='Add_button'><button><a href='AddNewProperty.php'>Add New Proproty</a></button></div>



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
        
 <tbody id="Stable">

            </tbody>
    </table>


     </div>
    <!-- copyright -->
<br>
        <div class="copyright" style="margin-block-start: 133px;">
            <p>&#169; YOUR HOME 2023.com</p>
        </div>
<script>
    $(document).ready(function (){
        populate_Ftable();
        populate_Stable();
        });
        function populate_Ftable(){
            console.log("F");
            $.ajax({
                url:'Ftbale.php',
                type:'POST',
                success:function(data){
                    $("#Ftable").html(data);
                }
            });
        }
          function populate_Stable(){
            console.log("S");
            $.ajax({
                url:'Stable.php',
                type:'POST',
                success:function(data){
                    $("#Stable").html(data);
                }
            });
        }
    
          // Function
      function deletedata(id){
          $.ajax({
            // Action
            url: 'Delete.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                  //$(#'delete'+id).hide('slow');
                  populate_Ftable();
                  populate_Stable();
                alert("Data Deleted Successfully");
                //window.location.reload();
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
      }
      
      function Acceptdata(id,propID){
          $.ajax({
            // Action
            url: 'updateStatus.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              propID: propID,
              action: "accept"
            },
            success:function(response){
              if(response == 1){
                  populate_Ftable();
                  populate_Stable();
                alert("Data Accepted Successfully");
                //window.location.reload();
              }
              else if(response == 0){
                alert("Data Cannot Be Accepted");
              }
            }
          });
      }
      
      function Declindata(id,propID){
          $.ajax({
            // Action
            url: 'updateStatus.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              propID: propID,
              action: "declin"
            },
            success:function(response){
              if(response == 1){
                  populate_Ftable();
                  populate_Stable();
                alert("Data Declined Successfully");
                //window.location.reload();
              }
              else if(response == 0){
                alert("Data Cannot Be Declined");
              }
            }
          });
      }
      
      
      
</script>
</body>
<?php
mysqli_close($connection); 
?>
</html>