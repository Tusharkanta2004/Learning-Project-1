<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShop</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>
    <div class="container-fulid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
                <img src="../images/adminreg.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form_outline mb-4">
                        <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-lable"><b>Username</b></label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required= "required" name="admin_username">
                    </div>

                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-lable"><b>Email</b></label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required= "required" name="admin_email">
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-lable"><b>Password</b></label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Password" autocomplete="off" required= "required" name="admin_password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-lable"><b>Confirm Password</b></label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm Password" required= "required" name="conf_admin_password">
                    </div>

                    <!-- user register button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already hava an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>