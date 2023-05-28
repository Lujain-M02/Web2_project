<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
       session_start();
       
      
    if (!isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
    } else {
        $id=$_SESSION['id'];
    }

include 'includes/db_connect.php';


        $sql2 =  "SELECT p.name,pc.category ,p.rent_cost,p.rooms, p.location ,p.id AS pid 
FROM Property p, propertycategory pc
WHERE homeowner_id= $id AND p.property_category_id= pc.id AND p.id NOT IN(SELECT p.id 
                                                                     FROM Property p ,rentalapplication r
                                                                     WHERE p.id = r.property_id AND r.application_status_id = 333333)";
        $result2 = mysqli_query($databaseCon, $sql2);  
        $table='';
                 while($row2 = mysqli_fetch_assoc($result2))
            {
                $propertyId = $row2['pid'];
                $table.= '<tr>';
                $table.= "<td><a href='PropertyDetails.php?id=$propertyId'>".$row2['name']."</a></td>";
                $table.= '<td>'.$row2["category"].'</td>';
                $table.= '<td>'.$row2["rent_cost"].'</td>';
                $table.= '<td>'.$row2["rooms"].'</td>';
                $table.= '<td>'.$row2["location"].'</td>';
                 $prName = $row2["name"];
                $table.= "<td><button type = 'button' name = 'btn3' onclick = \"deletedata( $propertyId )\">Delete</button></td> " ;
                $table.= '</tr>';
            }
            echo $table;