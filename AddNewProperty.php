<?php


include 'includes/Security_inc.php';


           if(isset($_GET['error'])){
    echo '<script>alert("please fill all the information");</script>';
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
        <form class="myForm" method="POST" action="add.php" enctype="multipart/form-data">
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
                <button  type="reset" name = "Reset" class="button">Reset</button>
            </fieldset>
        </form>
          
          
     </main>
     
  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>

</html>