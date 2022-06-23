<?php
include 'db.php';
$food_id=$_GET['p_id'];
mysqli_query($conn,"DELETE FROM `food_tb` WHERE fd_id='$food_id'");
header("location:viewproduct.php");
?>