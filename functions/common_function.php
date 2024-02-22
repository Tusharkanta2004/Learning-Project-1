<?php
// include('./includes/connect.php');
//getting product
function getproducts()
{
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
            $select_query = "SELECT * from `products` ORDER BY rand() LIMIT 0,6";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) 
            {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_quantity = $row['product_quantity'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price</p>
                                <p class='card-text'>Quantity: $product_quantity</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                            </div>
                        </div>
                    </div>";
                }
            } 
        }
    }


// getting all products
function get_all_products()
{
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
            $select_query = "SELECT * from `products` ORDER BY rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) 
            {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_quantity = $row['product_quantity'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price</p>
                                <p class='card-text'>Quantity: $product_quantity</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                            </div>
                        </div>
                    </div>";
                }
            } 
        }
}

// getting unique categories
function get_unique_categories()
{
    global $con;

    // condition to check isset or not
    if(isset($_GET['category']))
    {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id = ?";
        
        // Use prepared statement
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, 'i', $category_id);
        mysqli_stmt_execute($stmt);
        
        $result_query = mysqli_stmt_get_result($stmt);
        $num_of_rows = mysqli_num_rows($result_query);
        
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No Stock For This Category</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) 
        {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_quantity = $row['product_quantity'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price</p>
                            <p class='card-text'>Quantity: $product_quantity</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>                        </div>
                    </div>
                </div>";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } 
}


function get_unique_brands()
{
    global $con;

    // condition to check isset or not
    if(isset($_GET['brand']))
    {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id = ?";
        
        // Use prepared statement
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, 'i', $brand_id);
        mysqli_stmt_execute($stmt);
        
        $result_query = mysqli_stmt_get_result($stmt);
        $num_of_rows = mysqli_num_rows($result_query);  
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No Stock For This Brands</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) 
        {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_quantity = $row['product_quantity'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price</p>
                            <p class='card-text'>Quantity: $product_quantity</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } 
}



//Displaying brands in sidenav
function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
              $result_brands = mysqli_query($con, $select_brands);
              while ($row_data = mysqli_fetch_assoc($result_brands)) 
              {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];
                echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-primary'>$brand_title</a>
                      </li>";
              }
}

//Displaying categories in sidenav
function getcategories()
{
    global $con;
    $select_categories = "SELECT * FROM `categories`";
            $result_categories = mysqli_query($con, $select_categories);
            while ($row_data = mysqli_fetch_assoc($result_categories)) 
            {
              $category_title = $row_data['category_title'];
              $category_id = $row_data['category_id'];
              echo "<li class='nav-item'>
                      <a href='index.php?category=$category_id' class='nav-link text-primary'>$category_title</a>
                    </li>";
            }
}


//searching products function

function search_product()
{
    global $con;
            if(isset($_GET['search_data_product']))
            {
                $search_data_value = $_GET['search_data'];
            $search_query = "SELECT * FROM `products` WHERE product_keyword LIKE '%$search_data_value%' ";
            $result_query = mysqli_query($con, $search_query);
            $num_of_rows = mysqli_num_rows($result_query);  
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No Result Match For This Category</h2>";
        }
            while ($row = mysqli_fetch_assoc($result_query)) 
            {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_quantity = $row['product_quantity'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price</p>
                                <p class='card-text'>Quantity: $product_quantity</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                }
            } 
        }


// view details function
function view_details()
{
    global $con;

    // condition to check isset or not
    if(isset($_GET['product_id']))
    {
        if(!isset($_GET['category']))
        {
            if(!isset($_GET['brand']))
            {
                $product_id = $_GET['product_id'];
                $select_query = "SELECT * from `products` WHERE product_id = $product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) 
                {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $product_quantity = $row['product_quantity'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo "<div class='col-md-4 mb-2'>
                            <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price</p>
                                    <p class='card-text'>Quantity: $product_quantity</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>                            
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <!-- related images -->
                            <div class='row'>
                                <div class='clo-md-12'>
                                    <h4 class='text-center text-danger md-5'>Related Products</h4>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>                    
                                </div>
                            </div>
                        </div>";
                }
            } 
        }
    }
}


// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add' AND product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);

        if($result_query) {
            $num_of_rows = mysqli_num_rows($result_query);  
            if($num_of_rows > 0) {
                echo "<script>alert('This Item Is Already Present Inside Cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
                $result_insert = mysqli_query($con, $insert_query);

                if($result_insert) {
                    echo "<script>alert('Item Is Added To Cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                } else {
                    // Handle the query error for the insert query.
                    echo "Error in the insert query: " . mysqli_error($con);
                }
            }
        } else {
            // Handle the query error for the select query.
            echo "Error in the select query: " . mysqli_error($con);
        }
    }
}


//function to get cart item number
function cart_item()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    else 
    {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);

    // Check if the query was successful
    if (!$result) {
        die("Error in cart query: " . mysqli_error($con));
    }

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
            $total_price += $product_price;
        }
    }
    echo $total_price;
}


// get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) { // Corrected the typo in 'delete_account'
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id='$user_id' AND order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders'><h4 class='text-center'>Order Details</h4></a></p>";
                    }
                    else
                    {
                        echo "<h3 class='text-center text-success my-5'>You have Zero pending orders</h3>
                        <p class='text-center'><a href='../index.php'><h4 class='text-center'>Explore Products</h4></a></p>";
                    }
                }
            }
        }
    }
}


?>