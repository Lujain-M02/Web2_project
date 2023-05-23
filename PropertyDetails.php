<?php
  session_start();
    if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $userid=$_SESSION['id'];
}
    
   $databaseCon = mysqli_connect("localhost", "root", "root", "yourhome");
	if(!$databaseCon)
		die ("connection failed: ". mysqli_connect_errno());
        else{

 $id = $_GET['id'];
 if(!$id)
     echo 'erorr id';


$sql = "SELECT * FROM property WHERE id = $id";
$result = mysqli_query($databaseCon, $sql);
$row1 = mysqli_fetch_assoc($result);
if(!$row1){
    echo 'error in retreving row';}
 
$sql = "SELECT * FROM propertycategory WHERE id = {$row1['property_category_id']}";
$result = mysqli_query($databaseCon, $sql);
$category = mysqli_fetch_assoc($result);



$sql = "SELECT * FROM propertyimage WHERE property_id = $id";
$result = mysqli_query($databaseCon, $sql);
$images = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM homeowner WHERE id = {$row1['homeowner_id']}";
$result = mysqli_query($databaseCon, $sql);
$owner = mysqli_fetch_assoc($result);

if(isset($_SESSION['id']) && $_SESSION['id'] == $owner['id']){
    $isOwner = true;
}else{
    $isOwner = false;
}
        

}
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
            <h2><?php echo $row1['name']; ?></h2>
        </div>
       
        <div id="DP">
            <ul>
            <li class="a">Category: <p><?php echo $category['category']; ?></p></li>
            
            <li class="a">Number of Rooms: <p><?php echo $row1['rooms']; ?> Rooms</p></li> 

            <li class="a">Rent: <p><?php echo $row1['rent_cost']; ?></p></li> 

            <li class="a">Location: <p><?php echo $row1['location']; ?></p></li>  

            <li class="a">Max number of tenants: <p><?php echo $row1['max_tenants'];?></p></li>

            <li class="a">Description :  <p><?php echo $row1['description']; ?></p></li>
            <?php 
           if(!$isOwner){
                     
              echo ' <li class="a"> contact owner:<p>' .$owner['name'].' , 0' .$owner['phone_number'].' , ' .$owner['email_address'].' </p></li>';
              } ?>
             <br>
        <div id="ApplyDdit" style="margin: 0;   ">
            
            <?php 
           
                if($isOwner){
                    echo "<li class=\"a\"><a  href='EditProperty.php?id=".$row1['id']."'><button class='button'>Edit</button></a></li>";
                }else{
                    $sql = "SELECT * FROM `rentalapplication` WHERE property_id = $id AND home_seeker_id = $userid";
                    $result = mysqli_query($databaseCon, $sql);  
                    
                   if(!$row = mysqli_fetch_assoc($result)){
                    echo "<li class=\"a\"><a  href='includes/apply.php?id=".$row1['id']."'><button class='button'>Apply</button></a></li>";   
                   }
                    
                }
            ?>
        </div>
             <br>
        </ul>
        </div>
         <?php foreach($images as $image){ ?>
            <div id="imgg">
                <img src="upload/<?php echo $image['path']; ?>" />
            </div>
        <?php } ?>
        <br>
           

    </main>
    <!-- copyright -->
    <div class="copyright">
        <p>&#169; YOUR HOME 2023.com</p>
      </div>
</body>
<?php
  mysqli_close($databaseCon); 
  ?>
</html>