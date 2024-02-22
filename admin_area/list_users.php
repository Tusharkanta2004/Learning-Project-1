<h3 class="text-center text-success">All User</h3>
<table class="table table-bordered mt-5">
    <thead">
    <tr class="table-info">
        <th>Sl No</th>
        <th>Username</th>
        <th>User email</th>
        <th>User Image</th>
        <th>User address</th>
        <th>User Mobile</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
    $get_user = "SELECT * FROM `user_table`";
    $result = mysqli_query($con, $get_user);
    $row_count = mysqli_num_rows($result);
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id = $row_data['user_id'];
        $username = $row_data['username'];
        $user_email = $row_data['user_email'];
        $user_image = $row_data['user_image'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
        
        $number++;
        echo "<tr class='table-info text-center'>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_image'/></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='index.php?delete_users=$user_id'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        // <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
    }
?>
    </tbody>
</table>

