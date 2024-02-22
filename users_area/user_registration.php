<?php 
    include('../includes/connect.php');
    include('../functions/common_function.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="     crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center bg-info">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-lable"><b>Username</b></label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required= "required" name="user_username">
                    </div>

                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-lable"><b>Email</b></label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required= "required" name="user_email">
                    </div>

                     <!-- Image field -->
                     <div class="form-outline mb-4">
                        <label for="user_image" class="form-lable"><b>User Image</b></label>
                        <input type="file" id="user_image" class="form-control" required= "required" name="user_image">
                    </div>
                    
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable"><b>Password</b></label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required= "required" name="user_password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-lable"><b>Confirm Password</b></label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" required= "required" name="conf_user_password">
                    </div>

                    <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-lable"><b>Address</b></label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required= "required" name="user_address">
                    </div>

                    <!-- Contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-lable"><b>Contact Number</b></label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Number" autocomplete="off" required= "required" name="user_contact">
                    </div>

                    <!-- user register button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already hava an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register']))
{
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    // select Query
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo "<script>alert('Username or Email is already exist')</script>";
    }
    else if($user_password!=$conf_user_password)
    {
        echo "<script>alert('Password do not match')</script>";
    }
    else
    {
        // insert Query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password', '$user_image','$user_ip','$user_address','$user_contact') ";
        $sql_execute = mysqli_query($con,$insert_query);
        echo "<script>alert('Register Successfully')</script>";
    }

    //selecting cart items
    $select_cart_items= "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con,$select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if($rows_count>0)
    {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo "<script>window.open('../index.php',_self')</script>";
    }

}

?>