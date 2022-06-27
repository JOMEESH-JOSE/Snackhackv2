<?php
$db=mysqli_connect('localhost','root','','snackhack');

@$name = $_POST['urname'];
@$address = $_POST['uraddress'];
@$email = $_POST['uremail'];
@$phno = $_POST['urphno'];
@$username = $_POST['uruname'];
@$password = $_POST['pswd'];
$db_data=array();
$sql=mysqli_query($db,"INSERT INTO `login_tb`(`username`, `password`,`role`, `status`) VALUES ('$username','$password','DeliveryBoy','Approved')");
$id=mysqli_insert_id($db);
$sql1=mysqli_query($db,"INSERT INTO `registraion_tb`(`Lg_id`, `name`, `address`, `email`, `phno`) VALUES ('$id','$name','$address','$email','$phno')");

if($sql1){
    $db_data='Success';
echo json_encode($db_data);
}else{
    $db_data='error';  
    echo json_encode($db_data);
}

?>