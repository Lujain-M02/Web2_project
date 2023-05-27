<?php
       session_start();
       
      
    if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }

include 'includes/db_connect.php';

        $sql1 =  "SELECT p.name,p.location,hs.first_name,hs.last_name,a.status,hs.id AS HSid ,p.id ,r.id AS rid
FROM homeseeker hs,property p,rentalapplication r,applicationstatus a
WHERE r.property_id = p.id AND r.home_seeker_id = hs.id AND r.application_status_id = a.id AND p.homeowner_id = $id";
        $result1 = mysqli_query($databaseCon, $sql1);
        
        $table='';
        while($row1 = mysqli_fetch_assoc($result1)){
         
            $propertyId = $row1['id'];
            $applicantInfo= $row1['HSid']; 
            $rentalappID = $row1['rid'];
            $DECptn = "decline";
            $ACCptn = "accept";
            
                $table.= "<tr>";
                $table.= "<td><a href='PropertyDetails.php?id=$propertyId'>".$row1['name']."</a></td>";
                $table.= "<td>".$row1['location']."</td>";
                
                $table.= "<td><a href='applicantInfo.php?id=$applicantInfo'>".$row1['first_name']." ".$row1['last_name']."</a></td>";
                
                $table.= "<td>".$row1['status']."</td>";
                
                if($row1['status']=="under consideration"){
                    $table.= "<td><button type = 'submit' name = 'btn1'><a href='updateStatus.php?id=$rentalappID&pid=$propertyId&hsid=$applicantInfo&name=$ACCptn'>Accept</a></button></td> " ;
                    $table.= "<td><button type = 'submit' name = 'btn2'><a href='updateStatus.php?id=$rentalappID&pid=$propertyId&hsid=$applicantInfo&name=$DECptn'>Declin</a></button></td> " ;
                }
                $table.= "</tr>";
                
  
            }
            echo $table;
            ?>
                

