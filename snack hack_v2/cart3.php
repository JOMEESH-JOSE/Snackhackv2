<?php

error_reporting(0);
include 'Login_header.php';
include 'db.php';
session_start();
// $tb = $_SESSION['tb_id'];
$uid = $_SESSION['UserID'];
if (isset($_GET['cid'])) {

	$cartid = $_GET['cid'];


	$sql3 = mysqli_query($conn, "SELECT * from cart where cartid= $cartid");
	$row3 = mysqli_fetch_array($sql3);

	$quan = $row3['quantity'];
	$foodid = $row3['foodid'];

	$sqll = "UPDATE food_tb SET quantity=quantity+$quan where fd_id= $foodid";
	mysqli_query($conn, $sqll);
	$sqlls = "DELETE FROM cart where cartid='$cartid'";
	mysqli_query($conn, $sqlls);
	echo "<script>alert('Item Removed');</script>";
	echo "<script>window.location='cart3.php';</script>";
}

if (isset($_POST['order'])) {


	echo "<script>window.location='checkout.php'</script>";
	// 	// echo"<script>window.location='payment.php?t_id= ".$tb."'</script>";
}

?>

<script>
	function remove() {
		if (confirm("Do you want to remove this item")) {
			return true;
		} else {
			return false;
		}
	}
</script>
<?php

?>
<!-- Start All Pages -->
<div class="menu-box">
	<div class="container text-center">
		<div class="row">
			<!-- <div class="col-lg-12">
					<h1 style="margin-top: 100px;">Order </h1>
				</div> -->
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Gallery -->
<center>
	<div class="gallery-box">
		<div class="container">
			<div class="col-9">


				<div class="main">

					<h1 class="display-4">Order Table</h1>
					<br> <br> <br>
					<table class="table table-bordered">
						<thead class="text-center">
							<tr>
								<th>Food name</th>
								<th>Food image</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody class="text-center">
							<?php
							// echo$uid;
							$sql2 = "SELECT cart.*,food_tb.`food name`,food_tb.food_img,food_tb.fd_id FROM `cart` join food_tb on food_tb.fd_id = cart.foodid where Lg_id =$uid"; //table id 
							$amount = 0;
							$cartitemid = 0;
							$query2 = mysqli_query($conn, $sql2);

							if (mysqli_num_rows($query2) > 0) {
								while ($cart = mysqli_fetch_array($query2)) {
									$amount = $amount + $cart['totalprice'];
									$cartitemid =  $cart['foodid'];

									// $sql3 = "SELECT * from food_tb where fd_id=$cartitemid ";
									// $query3 = mysqli_query($conn,$sql3);


									$foodid = $cart['fd_id'];
									if ($cartitemid == $foodid) {
							?>
										<tr>


											<td><?php echo $cart['food name'] ?></td>
											<td><img src="images/<?php echo $cart['food_img'] ?>" alt="img" width="80" height="40"></td>
											<td><input type="number" name="quanti" value="<?php echo $cart['quantity'] ?>" style="width:50px" min="1" maxlength="2" pattern="/d+" id="<?php echo $cart['cartid'] ?>1"></td>
											<script>
												function quanchange(value, cartid) {

													window.location.href = "upt.php?upid=" + cartid + "&q=" + value;

												}
											</script>
											<td><?php echo $cart['totalprice'] ?></td>
											<td>


												<input type="hidden" name="cartid" value="<?php echo $cart['cartid'] ?>" id="<?php echo $cart['cartid'] ?>2">

												<input type="hidden" name="quantity" value="<?php echo $cart['quantity'] ?>">
												<input type="hidden" name="food_id" value="<?php echo $cart['foodid'] ?>">
												<button onclick="quanchange(document.getElementById('<?php echo $cart['cartid'] ?>1').value,document.getElementById('<?php echo $cart['cartid'] ?>2').value)" class="btn-warning" style="border-radius:12px">update</button>
												<a href="cart3.php?cid=<?php echo $cart['cartid'] ?>" style="border-radius:12px" class="btn-warning" onclick="return remove()">Remove</a>
												<input type="hidden" name="foodname" value="$food['food name']">
											</td>

										</tr>


								<?php
									}
								}
							} else {
								?>
								<tr> no products</tr>
							<?php }
							?>
							<tr>


							</tr>

						</tbody>

					</table>
					<!-- </div> -->
					<div class="col-md-4">
						<div class="bg-primary">
							<div class="text-center">
								<div class="card-body">
									<form method="post">
										<h3 class="card-title">TOTAL</h3>

										<h4 class="card-text" id="total"><?php echo $amount; ?></h4> <!-- amount to total-->
										<a href="#" class="card-link"><button type="submit" class="btn-warning" onclick="alert('Once You Click the Order Their is no Replacement Avilable');" name="order" value="<?php $tb ?>">ORDER</button></a>
									</form>
								</div>
							</div>
						</div>
					</div>


				</div>


			</div>

		</div>
	</div>
</center>
<!-- //<script>
	// 	function add(){
    //  var quantity = document.getElementById('quantity').value
	// var total = document.getElementById('total').innerHTML;
	 
	//   var v = quantity * 100;
	//  total = total + v;
	// document.getElementById("total").innerHTML = total;
	// 	}
	// </script> -->

<!-- End Gallery -->

<!-- Start Contact info -->



<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Snack Hack</a> </p>
			</div>
		</div>
	</div>
</div>

</footer>
<!-- End Footer -->



<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>
</body>

</html>