<?php 
include 'db.php';
$aa_id=$_GET['a_id'];
$ss=$_GET['ss'];
$em=$_GET['em'];
if($ss == 1){
    $ap = "UPDATE `login_tb` SET status='Approved' WHERE Lg_id = '$aa_id'";
    mysqli_query($conn,$ap);
    header("location:appverification.php?em=$em");
    // echo "<script>alert('successfully approved user');</script>";
}
else{
    $ap2 = "UPDATE `login_tb` SET status='Rejected' WHERE Lg_id = '$aa_id'";
    mysqli_query($conn,$ap2);
    // echo "<script>alert('successfully reject user');</script>";
    header("location:Regverification.php?em=$em");
}

// header("location:verification.php");
?>