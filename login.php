<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
   <div class="login container">
    <div class="login-container">
        <h1>LOG IN</h1>
        <p>GOOD to see you again!</p>
        <form name ="login" method="POST" action="includes/login_inc.php"  >
            
                 <p>Enter your email address:</p><input type="email"name="email" placeholder="youremail@example.com" class="box" required/>
                 <p>Enter your password:</p><input type="password"name="password" placeholder="your password" class="box" required/>
                 <p>ROLE:</p>
                 <select name="droplist" id="droplist" class="box">
                     <option value="1" selected="select">home seeker</option>
                     <option value="2">homeowner</option>
                     </select>
                <div class="btn" >
                 <input  type="submit" value="LOG IN"  />
                </div>         
            </form>
            <br>
            <span>You don't have an Account?</span><a href="signUp.php" >Sign Up now</a>
                    <?php              
            if(isset($_GET['error']))
                echo '<h3 style="color:red; text-align:center;">*Incorrect email or password</h3>';
        ?>
    </div>
    <div class="login-image">
        <img src="image/3.png" alt="" >
    </div>
   </div> 
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>
</body>
</html>