<?php
$db=mysqli_connect('localhost','root','','snackhack');
$rid = $_POST['lg_id'];
$ss = "SELECT * FROM `tbl_payment` JOIN order_tb on order_tb.Payment_id = tbl_payment.payment_id join user_registration_tb on `user_registration_tb`.`login-id` = tbl_payment.Lg_id join district on district.id= user_registration_tb.District join city on city.id=user_registration_tb.city join food_tb on food_tb.fd_id=order_tb.food_id where `tbl_payment`.delivery_status = 'ship' AND  `tbl_payment`.deliveryboy='$rid'";
$sql1=mysqli_query($db,$ss);
$db_data=array();
if($sql1){
    while($row = mysqli_fetch_array($sql1)){
        $db_data[]=$row;
    }
    echo json_encode($db_data);
}
?>