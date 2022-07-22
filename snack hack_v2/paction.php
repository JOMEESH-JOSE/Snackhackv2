<?php

$tb = $_POST['tb'];
$car22 = mysqli_query($conn,"SELECT * FROM `cart` where table_id='$tb'");
while($row1 = mysqli_fetch_array($car22)){

$fd_id1 = intval($row1['foodid']);
$foodquantity1=$row1['quantity'];
$foodprice1=$row1['totalprice'];
$payment1 = $row1['payment'];
$ptabl1=mysqli_query($conn,"INSERT INTO `tbl_payment`(`id`, `P_Amount`, `P_status`) VALUES ('$tb','$foodprice1','PAID')");
$id1=mysqli_insert_id($conn);
$order1="INSERT INTO `order_tb`(`food_id`,`table_id`,`foodquantity`,`status`,`Payment_id`) VALUES ('$fd_id1','$tb','$foodquantity1',0,'$id1')";
$or11=mysqli_query($conn,$order1);
$del1=mysqli_query($conn,"DELETE  FROM `cart` WHERE table_id='$tb'");
$up= mysqli_query($conn, "UPDATE `tbl_ipaddress` SET `status`='0' WHERE Table_no='$tb'");

	
}

$sql = mysqli_query($conn,"UPDATE `tbl_payment` SET `P_status`='PAID' WHERE id='$tb'");
    //header('location:pay.php?id= $foodprice');
	echo "<script>location='index.php?t_id=".$tb."'</script>";

 ?>