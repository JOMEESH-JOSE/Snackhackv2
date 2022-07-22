<?php

include 'db.php';
// error_reporting(0);
$sql = mysqli_query($conn, "SELECT table_id FROM `order_tb` group by table_id");
while ($row = mysqli_fetch_array($sql)) {
    $tid = $row["table_id"];
    $sq = mysqli_query($conn, "SELECT * FROM `order_tb`  where table_id=$tid and status='0'");
    while ($row2 = mysqli_fetch_array($sq)) {
        echo $row2["food"];
    }
    echo "accept", $tid; ?><br><?php
                            } ?>