<?php
$db=mysqli_connect('localhost','root','','snackhack');
//$rid = $_POST['uo'];
$sql1 = mysqli_query($db,"SELECT * FROM `order_tb` JOIN food_tb on food_tb.fd_id = order_tb.food_id where Payment_id='$rid'");
// $sql1=mysqli_query($db,$ss);
$db_data=array();
if($sql1){
    while($row = mysqli_fetch_array($sql1)){
        $db_data[]=$row;
    }
    echo json_encode($db_data);
    // $db_data='error';  
}
?>
?>