<?php
include 'db.php';
$su_id=$_GET['sid'];
$sts=$_GET['sts'];

if ($sts == 1) {
    mysqli_query($conn,"UPDATE `login_tb` SET status = 'Approved' WHERE Lg_id ='$su_id'");//status 1 indicate unblock
    echo "<script>alert('successfully unblocked');</script>";
} else {
mysqli_query($conn,"UPDATE `login_tb` SET status = 'Blocked' WHERE Lg_id ='$su_id'");//status 2 indicate block
echo "<script>alert('successfully blocked');</script>";
}

        header('location: view.php?lg='.$su_id.'');
?>