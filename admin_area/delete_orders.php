<?php

if(isset($_GET['delete_orders'])){
    $delete_orders=$_GET['delete_orders'];
    // echo $delete_orders;


    $delete_query="DELETE FROM `user_orders` WHERE order_id=$delete_orders";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Order is been deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?list_orders.php','_self')</script>";
    }


}
?>
