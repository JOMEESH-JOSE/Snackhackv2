<?php
include 'db.php';
// echo "whha";
$qu = intval($_GET['q']);
// echo $qu;
if (isset($_GET['upid']) && isset($_GET['q'])) {

    $id = intval($_GET['upid']);
    $qu = intval($_GET['q']);
    echo $id;
    echo $qu;

    $up = mysqli_query($conn, "SELECT cartid,price FROM `cart` WHERE cartid='$id' ");
    $row = mysqli_fetch_array($up);
    $p = $row['price'];
    $p1 = $p * $qu;
    $up = mysqli_query($conn, "UPDATE `cart` SET `quantity`='$qu',`totalprice`='$p1' WHERE cartid='$id'");
    header("location:cart3.php");
}
?>