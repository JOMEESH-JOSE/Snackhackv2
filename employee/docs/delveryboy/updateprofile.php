<?php

$db = mysqli_connect('localhost','root','','snackhack');

$rid = $_POST['lg_id'];
$status = $_POST['sts'];

if($status==1){
$password = $_POST['pswd'];
$sql = mysqli_query($db,"UPDATE `login_tb` SET `password`='$password' WHERE Lg_id='$rid'");
//$sql = mysqli_query($db,"UPDATE `login_tbl` SET `password`='$password' WHERE `role_id`='$rid'");
if($sql){
       echo json_encode('Success');
}else{
       echo json_encode('Can\'t change');
}
}elseif ($status==2) {

    @$name = $_POST['urname'];
    @$address = $_POST['uraddress'];
    @$email = $_POST['uremail'];
    @$phno = $_POST['urphno'];
    @$pin = $_POST['urpin'];
    //@$username = $_POST['uruname'];
   
    $db_data=array();
    $sql1=mysqli_query($db,"UPDATE `registration_tb1` SET `name`='$name',`address`='$address',`pin`='$pin',`email`='$email',`phno`='$phno' WHERE  Lg_id='$rid'");
    if($sql1){
        echo json_encode('Success');
 }else{
        echo json_encode('error');
 }
    
}else{
        echo json_encode('error');
}
