<?php
include 'db.php';
$id = $_GET['id'];
$up = mysqli_query($conn,"UPDATE `tbl_ipaddress` SET `status`='2' WHERE ip_id='$id'");
header("location:Blockuser.php")
?>