<?php
include 'db.php';
$id = $_GET['id'];
$sql = mysqli_query($conn,"DELETE FROM `reservation` WHERE rid='$id'");
header("Location:reservationdetails.php");

?>