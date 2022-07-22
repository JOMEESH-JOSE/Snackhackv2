<?php 

$db=mysqli_connect('localhost','root','','snackhack');

@$lid = $_POST['lg_id'];
// @$password=$_POST['pswd'];
$db_data=array();
$sql = "SELECT * FROM `registration_tb1` join login_tb on registration_tb1.Lg_id = login_tb.Lg_id where login_tb.Lg_id='$lid'";
//$sql = "SELECT * FROM `pro_login` where username='ani' AND password='ani12'";
$result = mysqli_query($db,$sql);
$count=mysqli_num_rows($result);

if($count == 1){

while($row = mysqli_fetch_assoc($result)){
    $db_data['Lg_id']=$row['Lg_id'];
    $db_data['name']=$row['name'];
    $db_data['email']=$row['email'];
    $db_data['address']=$row['address'];
    $db_data['phone']=$row['phno'];
    $db_data['pin']=$row['pin'];
    $db_data['username']=$row['username'];
    $db_data['password']=$row['password'];
    $db_data['simage']=$row['image'];

    // $db_data[]=$row['Lg_id'];
 $db_data[]=array_push($db_data,'Sucess');
}
   echo json_encode($db_data);
}
else {
    $db_data='error';  
    echo json_encode($db_data);
}
?>