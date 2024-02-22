<h3 class="text-center text-success">All Payment</h3>
<table class="table table-bordered mt-5">
    <thead">
    <tr class="table-info text-center">
        <th>Sl No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <!-- <th>Payment Mode</th> -->
        <th>Order Date</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
    $get_payment = "SELECT * FROM `user_payment`";
    $result = mysqli_query($con, $get_payment);
    $row_count = mysqli_num_rows($result);
    if($row_count == 0){
        echo "<h4 class='bg-danger text-center mt-5>No Payment Yet</h4>";
    }else 
    {
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $payment_id = $row_data['payment_id'];
        $order_id = $row_data['order_id'];
        $invoice_number = $row_data['invoice_number'];
        $amount = $row_data['amount'];
        // $payment_mode = $row_data['payment_mode'];
        $date = $row_data['date'];
        
        $number++;
        echo "<tr class='table-info text-center'>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$date</td>
        
        <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        // <td>$payment_mode</td>
        // <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
    }
}
?>
    </tbody>
</table>

