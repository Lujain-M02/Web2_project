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
      <a href="index.html" class="logo"> <img src="image/Logo.png" alt=""> Your Home</a>
      <!-- Menu Icon -->
      <input type="checkbox" name="" id="menu">
      <label for="menu" <i class='bx bx-menu' id="menu-icon" ></i>></label>
      <!-- Nav List -->
      <ul class="navbar">
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html">About Us</a></li>
        
      </ul>
     
    </div>
</header>
   <div class="signup container">
    <div class="signup-container">
        <h1>SIGN UP</h1>
        <h3>It's Free and take only a minute!</h3>
        <form name ="signupF"  >
            <p>first name:</p><input type="text" name="fname" placeholder=" first name" class="box"/>
            <p>last name:</p><input type="text" name="lname" placeholder=" last name" class="box"/>
            <p>age:</p><input type="text" name="age"placeholder=" age" class="box"/>
            <p>phone number:</p>
            <input type="tel" name="tel-number" placeholder="phone number" class="box" > 
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
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div> 
</body>
</html>