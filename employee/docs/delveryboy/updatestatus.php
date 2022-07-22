<?php
$db = mysqli_connect('localhost','root','','snackhack');

@$id = $_POST['oid'];
$rid = $_POST['lg_id'];
$db_data=array();
$sql = mysqli_query($db,"UPDATE `tbl_payment` SET `delivery_status`='delivered' WHERE payment_id='$id'");
$ss = mysqli_query($db,"UPDATE `registration_tb1` SET `status`='NOTASSIGNED' WHERE Lg_id='$rid'");
if($sql){
    $db_data='Success';
echo json_encode($db_data);
}else{
    $db_data='error';  
    echo json_encode($db_data);
}
 ?>