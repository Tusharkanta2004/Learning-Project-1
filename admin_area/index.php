<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Deshboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            padding-left: 15px;
            width: 125px;
            object-fit: contain;
        }
        .logo{
            padding: 0;
            width:10%; 
            height:15%;
        }
        .product_image{
            width: 75px;
            object-fit:contain;
        }
    </style>

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class = "logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-2">
                    <a href="#"><img src="../images/admin_image.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center p-1"><i>Tusharkanta Behera<i></p>
                </div>
                <div class="button text-center align-center">
                    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-primary my-1 p-1">Insert Products</a></button>
                    <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-primary my-1 p-1">View Products</a></button>
                    <button class="my-3"><a href="index.php?insert_categories" class="nav-link text-light bg-primary my-1 p-1">Insert Categories</a></button>
                    <button class="my-3"><a href="index.php?view_categories" class="nav-link text-light bg-primary my-1 p-1">View Categories</a></button>
                    <button class="my-3"><a href="index.php?insert_brands" class="nav-link text-light bg-primary my-1 p-1">Insert Brand</a></button>
                    <button class="my-3"><a href="index.php?view_brands" class="nav-link text-light bg-primary my-1 p-1">View Brand</a></button>
                    <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-primary my-1 p-1">All Order</a></button>
                    <button class="my-3"><a href="index.php?list_payment" class="nav-link text-light bg-primary my-1 p-1">All Payment</a></button>
                    <button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-primary my-1 p-1">List Users</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-primary my-1 p-1">Logout</a></button>
                </div>
            </div>
        </div>
            <!-- fourth child -->    
            <div class="container my-3">
            <?php
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_product'])){
                include('edit_product.php');
            }

            if(isset($_GET['insert_categories'])){
                include('insert_categories.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }

            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }

            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
            
            if(isset($_GET['list_payment'])){
                include('list_payment.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }

            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }
            

            ?>
        </div>
    </div>
    
    <!-- include footer -->
<?php include ("../includes/footer.php") ?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>