
<?php
 session_start();
 include 'includes/db_connect.php';
 
        $id=$_SESSION['id'];

    
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $request = $_POST["reguest"];
        $query = "SELECT p.id,p.location,p.rooms, p.name, p.rent_cost, pc.category FROM Property p, propertycategory pc WHERE p.property_category_id = pc.id AND p.id NOT IN( SELECT r.property_id FROM rentalapplication r WHERE r.home_seeker_id = $id) AND pc.category = '$request'";
        $count = mysqli_connect($databaseCon,$query);
        $myObj = array();
        while ($row = mysqli_fetch_assoc($count)) {
            $myObj[] = $row;
        }
        header('Content-Type: text/plain');
        print_r(json_encode($myObj));
    }
    mysqli_close($databaseCon);
  ?>


