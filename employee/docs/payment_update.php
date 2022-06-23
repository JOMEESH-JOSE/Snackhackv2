<?php 
include 'db.php';
$aa_id=$_GET['a_id'];

    $ap = "UPDATE `order_tb` SET `Payment_status`='PAID' WHERE order_id='$aa_id'";
    mysqli_query($conn,$ap);
    header("location:reception_payment_action.php");
    echo "<script>alert('successfully Paid the customer bill');</script>";
?>