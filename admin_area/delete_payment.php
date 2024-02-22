<?php

if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];
    // echo $delete_payment;


    $delete_query="DELETE FROM `user_payment` WHERE payment_id=$delete_payment";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Payment is been deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?list_orders.php','_self')</script>";
    }


}
?>
