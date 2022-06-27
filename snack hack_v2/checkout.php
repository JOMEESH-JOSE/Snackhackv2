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
  padding: 5px 20px 15px 20px;
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
  <div class="col-75">
    <div class="container">
      <form method="post" onsubmit="return checkout();" action="pay.php">
      
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
            <input type="text" id="land" name="land" value="" placeholder="enter your land_mark" onclick="return cl();">
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
       <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  </center>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $count2; ?></b></span></h4>
     <?php 
     $sql3 = mysqli_query($conn,"SELECT SUM(totalprice) as sum FROM `cart` where Lg_id='$uid'");
     $total = mysqli_fetch_assoc($sql3);
     $sql2=mysqli_query($conn,"SELECT c.totalprice,d.`food name` FROM `cart` c,food_tb d where c.foodid=d.fd_id AND c.Lg_id='$uid'");
     while ($row = mysqli_fetch_array($sql2)){
     ?>
      <p><?php echo $row['food name']; ?><span class="price">$<?php echo $row['totalprice']; ?></span></p>
      <?php }?>
      <!-- <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p> -->
      <hr>
      <p>Total <span class="price" style="color:black"><b>$<?php echo $total['sum']; ?></b></span></p>
    </div>
  </div>
</div>
<script type="text/javascript">
function checkout(){
var a = document.getElementById('land').value.trim();
var b = document.getElementById('cname').value.trim();
var c = document.getElementById('ccnum').value.trim();
var d= document.getElementById('expmonth').value.trim();
var e = document.getElementById('expyear').value.trim();
var f = document.getElementById('cvv').value.trim();

if(a == ""){
  document.getElementById('checkout').innerHTML = "**Please enter the valid LandMark**";
  return false;
}
else if(b == ""){
  document.getElementById('checkout').innerHTML ="**Please enter the valid CardName**";
  return false;
}
else if(c == ""){
  document.getElementById('checkout').innerHTML ="**Please enter the valid CardNumber**";
  return false;
}
else if(d == ""){
  document.getElementById('checkout').innerHTML ="**Please enter the valid Expiry Month**";
  return false;
  
}
else if(e == ""){
  document.getElementById('checkout').innerHTML ="**Please enter the valid Expiry Year**";
  return false;

}
else if(f == ""){
  document.getElementById('checkout').innerHTML ="**Please enter the valid CVV Number**";
  return false;

}
else{
  return true;
}

} 
function cl(){
  document.getElementById('checkout').innerHTML ="";
} 
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
