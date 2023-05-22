<!DOCTYPE html>
<?php
include 'includes/db_connect.php';
include 'includes/Security_inc.php';


if(isset($_GET['id'])){
$Pid=$_GET['id'];
}else {
    echo 'Error happened in the get';
    exit();
}
$sql="SELECT * FROM `property` WHERE id='$Pid'";
$result= mysqli_query($databaseCon, $sql);
$rows= mysqli_num_rows($result);

if($rows > 0){
    $row=mysqli_fetch_assoc($result);
    $sql2 = "SELECT c.*
        FROM propertycategory c
        JOIN property p ON c.id = p.property_category_id
        ORDER BY (c.id = '" . $row['property_category_id'] . "') DESC;";

    $result2= mysqli_query($databaseCon, $sql2);
}
else{
    echo 'Error happened ';
    exit();
}
#error messages 
if(isset($_GET['delete'])){
    echo '<script>alert("The image has been deleted");</script>';
}

if(isset($_GET['error'])){
    echo '<script>alert("please fill all the information");</script>';
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
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
            <h2><?php echo $row['name'];?></h2>
        </div>

        <br>
        <div id="PI">
          <form class="myForm1" enctype="multipart/form-data" method="POST" action="includes/edit_inc.php?Pid=<?php echo $Pid;?>">
            <fieldset>
                <legend>Property Information</legend>
                <ul>
                    <li>
                        <label>Property Name:
                        <input type="text" name="Pname" id="pname" value="<?php echo $row['name'];?>"></label>
                    </li>
                    <li>
                        <label>Category:</label>
                        <select id="Category" name="Pcate">
                            <?php
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo '<option value="' . $row2['id'] . '">' . $row2['category'] . '</option>';
                                }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label>Number of Rooms:
                        <input type="text" name="room" id="NOR" value="<?php echo $row['rooms'];?>"></label>
                    </li>
                    <li>
                        <label>Rent:
                        <input type="text" name="price" id="rent" value="<?php echo $row['rent_cost'];?>"></label>
                    </li>
                    <li>
                        <label>Location:
                        <input type="text" name="Location" id="location" value="<?php echo $row['location'];?>"></label>
                    </li>
                    <li>
                        <label>number of tenants:
                        <input type="text" id="MT" name="tenants" value="<?php echo $row['max_tenants'];?>"></label>
                    </li>
                    <li>
                        <label>Description:<br>
                        <textarea id="Des" name="Pdes" rows="6" cols="30" ><?php echo $row['description'];?></textarea></label>
                    </li>
                    <li>
                        <label>Upload Image:
                            <input type="file" name="images[]" accept="image/*" multiple></label>
                    </li>
                </ul>
                <input type="submit" value="save" class="button" style="margin: 1%"/>
            </fieldset>
        </form>
        </div>
        <br>
        <?php
            // Retrieve images from the database
            $retrieve_query = "SELECT * FROM `propertyimage` WHERE property_id='$Pid'";
            $result= mysqli_query($databaseCon, $retrieve_query);
            //$rows= mysqli_num_rows($result);

            if (mysqli_num_rows($result) > 0) {
                // Display the retrieved images
                echo '<div id="img">';
                while ($row = $result->fetch_assoc()) {
                    echo '<button id ="'.$row["id"].'" class="Delete"><a href="includes/edit_inc.php?imgID='.$row["id"].'&Pid='.$Pid.'"> Delete</a></button>';
                    echo '<img src="upload/' . $row["path"] . '" alt="Image" value="'.$row["id"].'">';
                    echo '<br><br>';
                }
                echo '</div>';
            } else {
                echo '<p><center style="margin: 20px;">this property does not have images </center></p>';
            }
            ?>

 

   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>
  <?php
  mysqli_close($connection); 
  ?>
</html>