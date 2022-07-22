<?php 

$db=mysqli_connect('localhost','root','','snackhack');

@$username = $_POST['urname'];
@$password=$_POST['pswd'];
$db_data=array();
$sql = "SELECT * FROM `login_tb` where username='$username' AND password='$password' and status ='Approved'";
//$sql = "SELECT * FROM `pro_login` where username='ani' AND password='ani12'";
$result = mysqli_query($db,$sql);
$count=mysqli_num_rows($result);

if($count == 1){

while($row = mysqli_fetch_assoc($result)){
    $db_data['Lg_id']=$row['Lg_id'];
    $db_data['status']=$row['status'];

    // $db_data[]=$row['Lg_id'];
    echo json_encode($db_data);
}

}
else {
    $db_data='error';  
    echo json_encode($db_data);
}
?>