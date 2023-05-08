<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include 'includes/Security_inc.php';
include 'includes/db_connect.php';
	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['age']) && isset($_POST['telnumber'])&& isset($_POST['numOfF'])&& isset($_POST['income'])&& isset($_POST['job'])&& isset($_POST['email'])&& isset($_POST['password'])){
		$fname = mysqli_real_escape_string($databaseCon, $_POST['fname']);
		$lname = mysqli_real_escape_string($databaseCon, $_POST['lname']);
		$age = mysqli_real_escape_string($databaseCon, $_POST['age']);
		$telnumber = mysqli_real_escape_string($databaseCon, $_POST['telnumber']);
		$numOfF = mysqli_real_escape_string($databaseCon, $_POST['numOfF']);
		$income = mysqli_real_escape_string($databaseCon, $_POST['income']);
		$job = mysqli_real_escape_string($databaseCon, $_POST['job']);
		$email = mysqli_real_escape_string($databaseCon, $_POST['email']);
                $password= mysqli_real_escape_string($databaseCon, $_POST['password']);
                
                
		$sql="SELECT * FROM `$TABLE_NAME` WHERE email_address='$email'";
		$result = mysqli_query($databaseCon, $sql);
                
		
		while($rows = mysqli_fetch_array($result)){
			if( $email == $rows['email']){
				$msg = '<h4 style="color:red;">This email entered exists</h4>';
				break; 
			}
        }}
		if (empty($msg)) {
			$query = "INSERT INTO `student` (username, password, email, name) VALUES('$username', '".md5($password)."', '$email', '$fullname');";
			$result = mysqli_query($databaseCon, $query) or die(mysqli_error($databaseCon));
			
			if ($result) {
				$query = "SELECT * FROM `student` WHERE username='$username' and password='".md5($password)."'";
				$result = mysqli_query($databaseCon, $query) or die(mysqli_error($databaseCon));
				$rows = mysqli_num_rows($result);
				
				if ($rows == 1){
					$row = mysqli_fetch_assoc($result);
					$id = $row['id'];
					$username = $row['username'];
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
					$_SESSION['role']="student";
					header("Location: student.php");
				}
				else{
					$msg = '<h4 style="color:red;">Error in signup.</h4>';
				}
			} else {
				$msg = '<h4 style="color:red;">Error in signup.</h4>';
			}
		}
	}
	else{
		$msg = '<h4 style="color:red;">required data is missing!</h4>';
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styles\style.css">
    <link rel="stylesheet" href="Styles\head.css">
    <link rel="icon" href="image/Logo.png">
</head>
<body>
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
        
      </ul>
     
    </div>
</header>
   <div class="signup container">
    <div class="signup-container">
        <h1>SIGN UP</h1>
        <h3>It's Free and take only a minute!</h3>
        <form name ="signupF"  method="post" action="signup.php">
            <p>first name:</p><input type="text" name="fname" placeholder=" first name" class="box"/>
            <p>last name:</p><input type="text" name="lname" placeholder=" last name" class="box"/>
            <p>age:</p><input type="text" name="age"placeholder=" age" class="box"/>
            <p>phone number:</p>
            <input type="tel" name="telnumber" placeholder="phone number" class="box" > 
            <p>number of the family members:</p><input type="text" name="numOfF" class="box"/>
            <p>income:</p><input type="text"name="income" placeholder="income" class="box"/>
            <p>job:</p><input type="text"name="job" placeholder="job" class="box"/>
            <p>email address:</p><input type="email"name="email" placeholder="youremail@example.com" class="box"/>
            <p>password:</p><input type="password"name="password" placeholder="your password" class="box"/>

                <div class="btn" >
                   <a href="login.php" ><input  type="button" value="SIGN UP"  /></a>
                </div>       

            </form>
    </div>
    <div class="signup-image">
        <img src="image/99.png" alt="" >
        <br>  <span>You have an Account already?</span><a href="login.php" >Log in now</a>
    </div>
   </div>
   <!-- copyright  -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div> 
</body>
</html>