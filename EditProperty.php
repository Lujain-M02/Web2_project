<!DOCTYPE html>
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
          <a href="index.html" class="logo"> <img src="image/Logo.png" alt=""> Your Home</a>
          <!-- Menu Icon -->
          <input type="checkbox" name="" id="menu">
          <label for="menu" <i class='bx bx-menu' id="menu-icon" ></i>></label>
          <!-- Nav List -->
          <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html">About Us</a></li>
            <li><a href="login.html"><img class="logOut" src="image/logOut.png" alt="Log out" width="80" height="80"></a></li>
            
          </ul>
         
        </div>
      </header>
      <br>

      <main>

        <div id="name">
            <h2>Sweet Home</h2>
        </div>

        <br>
        <div id="PI">
          <form class="myForm1" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Property Information</legend>
                <ul>
                    <li>
                        <label>Property Name:
                        <input type="text" id="pname" value="Sweet home"></label>
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
                        <input type="text" id="NOR" value="6 Rooms"></label>
                    </li>
                    <li>
                        <label>Rent:
                        <input type="text" id="rent" value="5000/month"></label>
                    </li>
                    <li>
                        <label>Location:
                        <input type="text" id="location" value="Riyadh, Almalqa District"></label>
                    </li>
                    <li>
                        <label>Max number of tenants:
                        <input type="text" id="MT" value="5"></label>
                    </li>
                    <li>
                        <label>Description:<br>
                        <textarea id="Des" rows="6" cols="30">The apartment is distinguished by its legendary views of the main street,it consists of a master room, 2 bedroom, 3 bathrooms, 2 living rooms, and a kitchen.</textarea></label>
                    </li>
                </ul>
            </fieldset>
        </form>
        </div>
        <br>

        <div id="img">
          <button class="button">Upload images</button>
          <br><br><br><br>
          <button class="Delete">Delete</button>
            <img src="image/fet1.png">
            <br><br>
            <button class="Delete">Delete</button>
            <img src="image/fet2.png">
            <br><br>
            <button class="Delete">Delete</button>
            <img src="image/fet3.png">
        </div>
        <br>
      </main>
      
      <div id="Save">
      <button  class="button" onclick="window.location.href='PropertyDetails.html';">Save</button>
     </div>
     <br>
     <br>
  
   <!-- copyright -->
   <div class="copyright">
    <p>&#169; YOUR HOME 2023.com</p>
  </div>

</body>
</html>