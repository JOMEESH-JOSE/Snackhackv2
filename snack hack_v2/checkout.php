<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
  width: 100%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 10px 15px 10px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  width: 700px;
}
.container1{ 
  background-color: #f2f2f2;
  padding: 5px 10px 15px 10px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
  float:left;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?php 
include 'db.php';
session_start();
// $tb = $_SESSION['tb_id'];
$uid = $_SESSION['UserID'];
$sql = mysqli_query($conn,"SELECT u.name,u.email,u.address,c.c_name,d.d_name,u.pin,u.`login-id` FROM `user_registration_tb` u , city c,district d WHERE u.city=c.id AND u.District =d.id AND u.`login-id`='$uid'");
$result=mysqli_fetch_assoc($sql);
$name = $result['name'];
$email = $result['email'];
$address = $result['address'];
$city = $result['c_name'];
$district = $result['d_name'];
$pin= $result['pin'];
$cart = mysqli_query($conn,"SELECT foodid FROM `cart` where Lg_id='$uid'");
$count2=mysqli_num_rows($cart);
?>

<div class="row">
  <center>
  <div class="col-50">
    <div class="container">
      <form method="post" name="myform" onclick="return checkout();">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" value="<?php echo $name; ?>" readonly>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" value="<?php echo $address; ?>" readonly>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>" readonly>
            <label for="city"><i class="fa fa-map-marker" aria-hidden="true"></i> LandMark</label>
            <input type="text" id="land" name="land" placeholder="enter your land_mark" required>
            <div class="row">
              <div class="col-50">
                <label for="state">District</label>
                <input type="text" id="district" name="district" value="<?php echo $district; ?>" readonly >
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" value="<?php echo $pin; ?>" readonly>
              </div>
            </div>
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><center><span id="checkout" style="color:red"></span></center>
       <input type="submit" value="Continue to checkout" name ="checkout" class="btn">
      </form>
    </div>
  </div>
  </center>
  <div class="col-25">
    <div class="container1">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $count2; ?></b></span></h4>
     <?php 
     $sql3 = mysqli_query($conn,"SELECT SUM(totalprice) as sum FROM `cart` where Lg_id='$uid'");
     $total = mysqli_fetch_assoc($sql3);
     $amt = $total['sum']; 
     $sql2=mysqli_query($conn,"SELECT c.totalprice,d.`food name` FROM `cart` c,food_tb d where c.foodid=d.fd_id AND c.Lg_id='$uid'");
     while ($row = mysqli_fetch_array($sql2)){
     ?>
      <p><?php echo $row['food name']; ?><span class="price">Rs.<?php echo $row['totalprice']; ?></span></p>
      <?php }?>
      <hr>
      <p>Total <span class="price" style="color:black"><b>Rs.<?php echo $amt; ?></b></span></p>
    </div>
  </div>
</div>
<script type="text/javascript">
// function checkout(){
// var a = document.myform.land.value.trim();

// if(a ==""){
//   alert("please");
//   document.getElementById('checkout').innerHTML = "**Please enter the valid LandMark**";
//   return false;
// }
// else{
//   return true;
// }

// } 
// function cl(){
//   document.getElementById('checkout').innerHTML ="";
// } 
function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
      function isAlfa(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
                return false;
            }
            return true;
        }
</script>
</body>
</html>
<?php

if(isset($_POST['checkout'])){
  $lanmark = $_POST['land'];
  
	$ptabl1 = mysqli_query($conn, "INSERT INTO `tbl_payment`(`id`,`Lg_id`,`P_Amount`,`P_status`,`Landmark`,`deliveryboy`,`delivery_status`) VALUES ('0','$uid','$amt','PAID','$lanmark',0,'start')");
	$id1 = mysqli_insert_id($conn);

	$car2 = mysqli_query($conn,"SELECT * FROM `cart` where Lg_id='$uid'");
	while($row = mysqli_fetch_array($car2)){

    $fd_id = intval($row['foodid']);
    $foodquantity=$row['quantity'];
    $price=$row['price'];
    $foodprice=$row['totalprice'];

  //$order = mysqli_query($conn,"INSERT INTO `tbl_onlineorder`(`O_id`,`food_id`, `quantity`, `unit_price`, `total_price`,, ) VALUES ('$id1','$fd_id','$foodquantity','$price','$foodprice','$lanmark','0')");
  $order1 = "INSERT INTO `order_tb`(`food_id`,`foodquantity`,`Payment_id`,`price`,`totalprice`) VALUES ('$fd_id','$foodquantity','$id1','$price','$foodprice')";
  $rr = mysqli_query($conn,$order1);
  $del1 = mysqli_query($conn, "DELETE  FROM `cart` WHERE Lg_id='$uid'");
  }
  echo "<script>alert('You are Redirected to Payment Page');</script>";
  echo "<script>location='razopay.php?id=".$id1."'</script>";

}


?>