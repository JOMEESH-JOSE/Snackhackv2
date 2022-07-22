<?php
include 'db.php';
$id = $_GET['id'];
$id = mysqli_query($conn,"UPDATE `reservation` SET `advance`='100',`P_status`='Paid' WHERE rid='$id'");
header("Location:Reservation.php");

?>