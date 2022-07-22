<?php
include 'header.php';
include 'db.php';
// $amt = $_GET['am'];
$amt=0;
session_start();
$count = mysqli_query($conn, "SELECT * FROM `cart` where table_id='$tb'");
	while ($r1 = mysqli_fetch_array($count)) {
		$amt = $amt+$r1['totalprice'];

	}
$tb = $_SESSION['tb_id'];
if (isset($_POST['online'])) {

	$ptabl1 = mysqli_query($conn, "INSERT INTO `tbl_payment`(`id`,`Lg_id`,`P_Amount`,`P_status`) VALUES ('$tb','0','$amt','PAID')");
	$id1 = mysqli_insert_id($conn);
     
	$car22 = mysqli_query($conn, "SELECT * FROM `cart` where table_id='$tb'");
	while ($row1 = mysqli_fetch_array($car22)) {

		$fd_id1 = intval($row1['foodid']);
		echo$fd_id1;
		//echo'<script>alert("a")</scipt>';  
		$foodquantity1 = $row1['quantity'];
		$price = $row1['price'];
		$totalprice = $row1['totalprice'];
		

		$order1 = "INSERT INTO `order_tb`(`food_id`,`foodquantity`,`Payment_id`,`price`,`totalprice`) VALUES ('$fd_id1','$foodquantity1','$id1','$price','$totalprice')";
        
		// $order1 = "INSERT INTO `order_tb`(`food_id`,`foodquantity`,`price`,'totalprice',`Payment_id`) VALUES ('$fd_id1','$foodquantity1','$price','$totalprice','$id1')";
		$or11 = mysqli_query($conn, $order1);
		$del1 = mysqli_query($conn, "DELETE  FROM `cart` WHERE table_id='$tb'");
		$up = mysqli_query($conn, "UPDATE `tbl_ipaddress` SET `status`='0' WHERE Table_no='$tb'");

	}


	//$sql = mysqli_query($conn,"UPDATE `tbl_payment` SET `P_status`='PAID' WHERE id='$tb'");
	header("location:razo.php?amt=$amt&&tb=$tb&oid=$id1");

	//echo "<script>location='razo.php?amt=".$amt."&tb=".$tb."'</script>";
	//echo "<script>window.location.href='index.php'</script>";
}
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
<div class="gallery-box">
	<div class="container">
		<h1 class="display-4">PAYMENT</h1>
		<br> <br> <br>
		<div class="col-9">

			<center>

				<div class="col-md-9" style="border-radius: 5px;">
					<div class="bg-primary">
						<div class="text-center">

							<div class="card-body">
								<form method="post">

									<h2 class="card-text"><b>Online Payment</b></h2>
									<br>
									<table align="center">

										<tr>
											<td>
												<h4>ONLINE PAYMENT :</h4>
											</td>
											<td><input type="submit" class="btn btn-warning" value="PAY" name="online"></td>
										</tr>

										<tr>
											<td>
												<h4>OFFLINE PAYMENT :</h4>
											</td>
											<td><input type="submit" class="btn btn-warning" value="PAY" name="offline"></td>
										</tr>

									</table>

								</form>
							</div>
						</div>
					</div>
				</div>


		</div>



		</center>

	</div>

</div>
</div>
<script type="text/javascript">
	function pay() {
		alert("Thank you for ordering food,visit again.....")
	}

	function valida() {
		alert("Thank you for ordering food,You can now pay for your order at Receptionist.")
	}
</script>
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
<?php
if (isset($_POST['offline'])) {
	// $foodid=intval($_POST['food_id']);

	$ptabl2 = mysqli_query($conn, "INSERT INTO `tbl_payment`(`id`, `P_Amount`, `P_status`) VALUES ('$tb','$amt','NOTPAID')");
	$id2 = mysqli_insert_id($conn);
     
	$car22 = mysqli_query($conn, "SELECT * FROM `cart` where table_id='$tb'");
	while ($row1 = mysqli_fetch_array($car22)) {

		$fd_id1 = intval($row1['foodid']);
		$foodquantity1 = $row1['quantity'];
		$price = $row1['price'];
		$totalprice = $row1['totalprice'];
		

		$order1 = "INSERT INTO `order_tb`(`food_id`,`foodquantity`,`Payment_id`,`price`,`totalprice`) VALUES ('$fd_id1','$foodquantity1','$id2','$price','$totalprice')";
        
		// $order1 = "INSERT INTO `order_tb`(`food_id`,`foodquantity`,`price`,'totalprice',`Payment_id`) VALUES ('$fd_id1','$foodquantity1','$price','$totalprice','$id1')";
		$or11 = mysqli_query($conn, $order1);
		$del1 = mysqli_query($conn, "DELETE  FROM `cart` WHERE table_id='$tb'");
		$up = mysqli_query($conn, "UPDATE `tbl_ipaddress` SET `status`='0' WHERE Table_no='$tb'");

	
	}
	echo "<script>alert('Thank you for ordering food,You can now pay for your order at Receptionist.');</script>";
	echo "<script>alert('Your food item will be Served in few minutes.');</script>";
	echo "<script>window.location='Thank.php'</script>";
}
?>