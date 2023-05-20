<?php

    include 'db_connect.php'; //connection 
    session_start();

    
    if ($_SERVER['REQUEST_METHOD']=="POST"){
           if (isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['droplist'])){
               
               $email= mysqli_real_escape_string($databaseCon,$_POST['email']);
               $pass=mysqli_real_escape_string($databaseCon,$_POST['password']);
               if($_POST['droplist']==1){
                   $TABLE_NAME="homeseeker";
               }
               else{
                   $TABLE_NAME="homeowner";
               }
               
               $sql="SELECT * FROM `$TABLE_NAME` WHERE email_address='$email'";
               $result= mysqli_query($databaseCon, $sql);
               $rows= mysqli_num_rows($result);

               if($rows > 0){
                   $row=mysqli_fetch_assoc($result);
                   if(password_verify($pass, $row['password'])){
                       $id=$row['id'];
                        $_SESSION['id']=$id;                        
                        if($_POST['droplist']==1){
                            $_SESSION['role']="home seeker";
                            header("Location: ../HomeSeeker.php");
                        }
                        else{
                            $_SESSION['role']="home owner";
                            header("Location: ../HomeOwner.php");
                        }
                   }
                   else{
                      header("Location: ../login.php?error=error");
                   }
                   
               }else{
                   header("Location: ../login.php?error=error");
               }
               
           }   
       }
       
       mysqli_close($connection); 
    
?>