<?php
$db=mysqli_connect('localhost','root','','pro');

$ss = "SELECT name,item FROM `tbl_order` WHERE status='NO'";
$sql1=mysqli_query($db,$ss);
$db_data=array();
if($sql1){
    while($row = mysqli_fetch_array($sql1)){
        $db_data[]=$row;
    }
    echo json_encode($db_data);
}
?>