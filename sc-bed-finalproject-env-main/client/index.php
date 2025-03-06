<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--Links to two stylesheets, one of them bootstrap -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    
</head>
<body>
  
    
     <!--Top Banner-->
    <header>
<div class="topBanner">
        <div class="title">
        <h1 style="margin-left: 50px; padding-top: 10px;">Welcome to Kahuna</h1>
        </div>

        <div class="loginButton">
        <a href="./HTML/login.php">
        <img src="./Images/Icons/ProfileIcon.png" alt="LoginButton">
        </a>
        </div>
    </div>


    
    <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.html">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./HTML/register_Product.php">Register Your Appliance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_Products.php">Your Registrations</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"></a></li>
            <li><a class="dropdown-item" href="./HTML/view_Products.php">View Your Products</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./HTML/contact.php">Contact Us</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
    </header>

    <br>
    <br>

<main>
    <!-- Carousel with images plus introduction -->
    <div style="background-color: #373737; margin-top: 10px;" class="container-fluid">
      <div class="row">
      <div class="col-8">
    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 600px; object-fit: cover;" src="Images/Appliances/30 Electric Convection Oven Self-Clean Bertazzoni.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style="height: 600px; object-fit: cover;" src="Images/Appliances/25 Litre Microwave Oven with Grill and Convection YC-PC254AE.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style="height: 600px; object-fit: cover;" src="Images/Appliances/Vacuum Cleaner.webp" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>


</div>

<!--Introduction Information-->

<div style="color: white; font-size: x-large; text-align: center; margin-top: 10px; " class="col-4">
    <h2>Welcome to Kahuna!</h2>
    <br>
    <br>
    
    <article>
    <p>Kahuna Appliances
        Your trusted source for high-quality home appliances.
        Explore our wide range of products designed to make life easier, smarter, and more efficient.
        
</p>
    </article>


    <div class="container-fluid">
    
    <div class="quadImages">
    <div class="row">

      <div class="col-6">

      <div class="row">
      <img src="Images/Appliances/Contemporary 2 Slice Toaster.jpg" alt="Toaster">
      </div>

      <br>


      <div class="row">
      <img src="Images/Appliances/lamp.jpg" alt="Lamp">
      </div>

      </div>
      

      <div class="col-6">

      <div class="row">
      <img src="Images/Appliances/kettle.jpg" alt="Kettle">
      </div>
      <br>
      <div class="row">
      <img src="Images/Appliances/Airfryer.png" alt="AirFryer">
      </div>
      
      </div>

      
  </div>
  <br>
  <br>

  </div>
  </div>
  </div>
  </div>
  </div>
  

  
<!--Footer-->
  <footer>



  </div>

  <hr>

  <div class="container-fluid">
  <div class="row">

    <div class="col-6">
        <p2>        Contact Us: <br>
            Phone: 1-800-123-4567<br>
            Email: support@kahunaappliances.com</p2>
    </div>

    <div class="col-6">
        <div class>
            <p>87,<br> Triq Herbert Damarco,<br> Santa Lucija,<br> Malta</p>
           </div>
            


          
           

    </div>
  </div>
  </div>

    <hr>

   <br>

  </footer>



  



    
    <script src= "Bootstrap/js/bootstrap.bundle.min.js"></script>
    




</body>
</html>