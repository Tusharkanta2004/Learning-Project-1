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
    <title>HomeShop-Cart Details</title>

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

.cart_img{
  width: 80px;
  height: 80px;
  object-fit: contain;
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
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>

          </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
  cart();
?>

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


<!-- fourth child-table of cart -->
<div class="container">
  <div class="row">
    <form action="" method="post">
    <table class="table table-bordered text-center">
      
        <!-- php code to display dynamic data -->
        <?php

$get_ip_add = getIPAddress();
$total_price = 0;
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
$result = mysqli_query($con, $cart_query);


$result_count=mysqli_num_rows($result);
if($result_count>0)
{
  echo "<thead>
  <tr>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Remove</th>
    <th colspan='2'>Oprations</th>
  </tr>
</thead>
<tbody>";
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $result_product = mysqli_query($con, $select_product);

    // Check if the product query was successful
    if (!$result_product) {
        die("Error in product query: " . mysqli_error($con));
    }

    while ($row_product_price = mysqli_fetch_array($result_product)) {
        $product_price = $row_product_price['product_price'];
        $product_price = isset($row_product_price['product_price']) ? $row_product_price['product_price'] : '';
        $product_title = isset($row_product_price['product_title']) ? $row_product_price['product_title'] : '';
        $product_image1 = isset($row_product_price['product_image1']) ? $row_product_price['product_image1'] : '';
        $total_price += $product_price;
        ?>
        <tr>
            <td><?php echo $product_title; ?></td>
            <td><img src="./images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qty"  class="form-input w-50"></td>
            <?php
              $get_ip_add = getIPAddress();
              if(isset($_POST['update_cart']))
              {
                $quantities = $_POST['qty'];
                $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                $result_product_quantity = mysqli_query($con, $update_cart);
                $total_price= $total_price*$quantities;

              }
             
            ?>
            <td><?php echo $product_price; ?></td>
            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
            
            <td>
                <!-- <button class="bg-info px-3 border-0 py-2 mx-3">Update</button> -->
                <input type="submit" value="Update Cart" class="bg-info px-3 border-0 py-2 mx-3" name="update_cart"></input>
                <!-- <button class="bg-info px-3 border-0 py-2 mx-3">Remove</button> -->
                <input type="submit" value="Remove Cart" class="bg-info px-3 border-0 py-2 mx-3" name="remove_cart"></input>
            </td>
        </tr>
<?php
    }}}

else{
  echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
}
?>

      </tbody>
    </table>
      
    <!-- subtotal -->
    <div class="d-flexc mb-5">
      <?php 
        $get_ip_add = getIPAddress();
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0)
        {
          echo "<h4 class='px-3'>SubTotal:- <strong class='text-danger'>$total_price/-</strong></h4>
          <input type='submit' value='Continue Shopping' class='bg-info px-3 border-0 py-2 mx-3' name='continue_shopping'></input>
          <button class='bg-secondary p-3 border-0 py-2 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
        }
        else{
          echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 border-0 py-2 mx-3' name='continue_shopping'></input>";
        }
        if(isset($_POST['continue_shopping']))
        {
          echo "<script>window.open('index.php','_self')</script>";
        }
      ?>
      
    </div>
  </div>
</div>
</form>  
<!-- function to remove item -->

<?php
function remove_cart_item()
{
  global $con;
  if(isset($_POST['remove_cart']))
  {
    foreach($_POST['removeitem'] as $remove_id)
    {
      echo $remove_id;
      $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
      $run_delete= mysqli_query($con, $delete_query);
      
      if($run_delete)
      {
        echo "<script>window.open('cart.php','_self')</script>";
      } 
    }
  }
}
echo $remove_item = remove_cart_item();
?>


<!-- last child -->
<!-- include footer -->
<?php include ("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>