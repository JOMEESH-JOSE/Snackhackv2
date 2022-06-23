<?php
include 'db.php';
$su_id=$_GET['sid'];
$sts=$_GET['sts'];
$em = $_GET['eml'];
if ($sts == 1) {
    mysqli_query($conn,"UPDATE `login_tb` SET status = 'Approved' WHERE Lg_id ='$su_id'");//status 1 indicate unblock
    echo "<script>alert('successfully unblocked');</script>";
    header("location: cuveriunblo.php?eml=$em");
} else {
mysqli_query($conn,"UPDATE `login_tb` SET status = 'Blocked' WHERE Lg_id ='$su_id'");//status 2 indicate block
echo "<script>alert('successfully blocked');</script>";
header("location: cuveriblo.php?eml=$em");
}

        // header('location: view_customer.php');
?>