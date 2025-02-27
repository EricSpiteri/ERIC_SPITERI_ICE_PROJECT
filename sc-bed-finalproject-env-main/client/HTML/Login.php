<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

<!--Header-->
<header>

<div class="topBanner">
        <div class="title">
        <h1 style="margin-left: 50px; padding-top: 10px;">Login</h1>
        </div>
</div>

</header>

<main>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="HTML/register_Product.php">Register your Appliance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="HTML/Registrations.php">Your Registrations</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"></a></li>
            <li><a class="dropdown-item" href="./Contact.php">Contact Us</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./FAQ.php">Frequently Asked Questions</a></li>
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

    <br>
    <br>

    <!--Login Box-->
    <div class="loginBox">
    <div class="container">
        
        <form id="login-form">
            <h1>Login</h1>
            <br>
            
            <input type="text" class="form-control" id="email" name="email"  placeholder="Email Address" required>
            <br>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

            <input type="checkbox" id="rememberMe?" name="rememberMe?" checked>
            <label for="rememberMe?" id="">Remember Me?</label>

            <br>
            <br>
            <a href="./Register.html">Don't have an account? Create one</a>
            
            <br>
            <br>

            
            <input type="submit" id="login" value="login">

        
        </form>
        </div>
    </div>

    </main>

    <br>
    <br>
    <br>

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


<script src= "../Bootstrap/js/bootstrap.bundle.min.js"></script>
<script src= "../Javascript/Login.JS"></script>
    
</body>
</html>