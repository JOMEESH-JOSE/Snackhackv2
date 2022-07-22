<?php 
include 'db.php';
$or_id=$_GET['or_id'];
$sts=$_GET['sts'];
if ($sts == 0) {
    mysqli_query($conn,"UPDATE `tbl_payment` SET P_status='DELIVERED' WHERE payment_id ='$or_id'");
   //status 1 indicate unblock
   
} 
echo "<script>alert('successfully checked');</script>";
header('location: kitch_dash.php');
?>