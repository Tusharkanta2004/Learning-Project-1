<!-- connect files -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShop</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link css file -->
    <link rel="stylesheet" href="style.css">

    <style>
      /* Add this CSS to your stylesheet */
#categoriesDropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content li {
  padding: 8px;
  text-align: left;
}


#brandsDropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-menu li {
  padding: 8px;
  text-align: left;
}
    </style>

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <img src="./images/logo.jpg" alt="" class="logo">
    
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>

            <?php
              if(isset($_SESSION['username']))
              {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/profile.php'>My Account</a>
              </li>";
              }
              else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
              </li>";
              }
            ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
            </li>
          </ul>


      <!-- d-flex for coming navbar in a horizontal line-->
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" value = "Search" class="btn btn-outline-light" name ="search_data_product">
      </form>
    </div>
  </div>
</nav>


<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
      if(!isset($_SESSION['username']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>WELCOME GUEST</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>WELCOME ".$_SESSION['username']."</a>
    </li>";
      }
    ?>
    <?php
      if(!isset($_SESSION['username']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li>";
      }
    ?>
  </ul>
</nav>


<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>


<!-- fourth child -->
<div class="row">
  <div class="col-md-10">
    <!-- product -->
      <div class="row">
        <!-- fatching products -->
        <?php
          search_product();
          get_unique_categories();
          get_unique_brands();
        ?>
      </div>
  </div>

<div class="col md-2 bg-secondary p-0">

    <!-- Category to be display -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-primary" id="categoriesDropdown">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        <ul class="dropdown-content">
          <?php
            getcategories();

          ?>
        </ul>
      </li>
    </ul>
  <hr>
      <!-- Brands to display -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-primary dropdown" id="brandsDropdown">
          <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
          <ul class="dropdown-menu">
            <?php
              getbrands();
            ?>
          </ul>
        </li>
      </ul>

  </div> 
</div>

<!-- last child -->
<!-- include footer -->
<?php include ("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>