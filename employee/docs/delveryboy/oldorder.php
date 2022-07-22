<?php
$db=mysqli_connect('localhost','root','','snackhack');
$rid = $_POST['lg_id'];
$ss = "SELECT tbl_payment.payment_id,tbl_payment.P_Amount,tbl_payment.P_status,user_registration_tb.name,user_registration_tb.address,district.d_name,city.c_name,user_registration_tb.pin,tbl_payment.landmark FROM `tbl_payment` join user_registration_tb on `user_registration_tb`.`login-id` = tbl_payment.Lg_id join district on district.id= user_registration_tb.District join city on city.id=user_registration_tb.city  where `tbl_payment`.delivery_status = 'delivered' AND `tbl_payment`.deliveryboy='$rid'";
$sql1=mysqli_query($db,$ss);
$db_data=array();
if($sql1){
    while($row = mysqli_fetch_array($sql1)){
        $db_data[]=$row;
    }
    echo json_encode($db_data);
}
?>