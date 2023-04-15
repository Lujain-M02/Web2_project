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
          <a href="index.html" class="logo"> <img src="image/Logo.png" alt=""> Your Home</a>
          <!-- Menu Icon -->
          <input type="checkbox" name="" id="menu">
          <label for="menu" <i class='bx bx-menu' id="menu-icon" ></i>></label>
          <!-- Nav List -->
          <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html">About Us</a></li>
            <li><a href="login.php"><img class="logOut" src="image/logOut.png" alt="Log out" width="80" height="80"></a></li>
            
          </ul>
         
        </div>
      </header>

 
      <main>
        <form class="myForm" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Property Details</legend>
                <ul>
                    <li>
                        <label>Property Name:
                        <input type="text" id="pname"></label>
                    </li>
                    <li>
                        <label>Category:</label>
                        <select id="Category">
                            <option>Apartment</option>
                            <option>villa</option>
                        </select>
                    </li>
                    <li>
                        <label>Number of Rooms:
                        <input type="text" id="NOR"></label>
                    </li>
                    <li>
                        <label>Rent:
                        <input type="text" id="rent"></label>
                    </li>
                    <li>
                        <label>Location:
                        <input type="text" id="location"></label>
                    </li>
                    <li>
                        <label>Max number of tenants:
                        <input type="text" id="MT"></label>
                    </li>
                    <li>
                        <label>Description:<br>
                        <textarea id="Des" rows="6" cols="30"></textarea></label>
                    </li>
                    <li>
                        <label>Upload Pictures:
                        <input type="file" id="myFile" accept="image/png, image/jpeg"></label>
                    </li>
                </ul>
                <button class="button">Submit</button>
                <button  class="button">Reset</button>
            </fieldset>
        </form>
     </main>
     
  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>
</html>