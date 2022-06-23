<?php 
include 'db.php';
$aa_id=$_GET['a_id'];
$ss=$_GET['ss'];
if($ss == 1){
    $ap = "UPDATE `chef_book` SET status='YES' WHERE ch_id = '$aa_id'";
    mysqli_query($conn,$ap);
    // echo "<script>alert('successfully approved user');</script>";
}
else{
    $ap2 = "UPDATE `chef_book` SET status='REJECT' WHERE ch_id = '$aa_id'";
    mysqli_query($conn,$ap2);
    // echo "<script>alert('successfully reject user');</script>";
}


header("Location:chef_viewnotification.php");
?>