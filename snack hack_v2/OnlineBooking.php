
<?php
	
	include 'Login_header.php';
    include 'db.php';
    $sql = mysqli_query($conn,"SELECT * FROM category_tb"); 
	$sid = $_GET['pid'];
    session_start();
	// $td=$_SESSION['tb_id'];
    $uid = $_SESSION['UserID'];
    echo "$uid";
    
	if(isset($_POST['cart'])){
		$foodid = intval($_POST['foodid']);
		$quantity = intval($_POST['quantity']);
		// $tb=$_SESSION['tb_id'];
		$food = "SELECT * from food_tb where fd_id=$foodid";
		$foods = mysqli_query($conn,$food);
		$row = mysqli_fetch_assoc($foods);
		$totalprice=0;
		$price=$row['food_price'];
		if($quantity<=$row['quantity']){ 
		   $totalprice=$quantity*$price;
           $sql2 = "INSERT INTO cart(foodid,Lg_id,table_id,quantity,price,totalprice) VALUES($foodid,$uid,'tb',$quantity,$price,$totalprice)";
		   mysqli_query($conn,$sql2);

		   $sql3="UPDATE food_tb SET quantity=quantity-$quantity where fd_id=$foodid";
		   mysqli_query($conn,$sql3);

		   echo"<script>alert('Added to Cart')</script>";
		
		                               }
		else{echo"<script>alert('Out of Stock')</script>";
			}


                              }



	?>
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2 style="margin-top: 100px;">Food Menu <?php echo $sid; ?></h2>
					
						<p>Food is great because food is good.</p>
						
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php while ($row = mysqli_fetch_array($sql)){ ?>
						<a class="nav-link" id="v-pills-<?php echo $row['category_id']; ?>-tab" href="OnlineBooking.php?pid=<?php echo $row['category_id']; ?>" role="tab" aria-controls="v-pills-<?php echo $row['category_id']; ?>" aria-selected="true"><?php echo $row['category']; ?></a>
                        <?php } ?>
					</div>
				</div>
                <div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
                        <div class="row">
                    <?php  
                            $result = mysqli_query($conn,"SELECT * FROM food_tb where category_id='$sid'");
                                while ($raw = mysqli_fetch_array($result)){ ?>
								
								<div class="col-lg-4 col-md-6 special-grid 1">
								<!-- <form method="post" action="cart_manage1.php"> -->
								<form method="post" action="OnlineBooking.php?pid=<?php echo $sid; ?>">
									<div class="gallery-single fix">
										<img src="../employee/docs/image/<?php echo $raw['food_img']; ?>" class="img-fluid" alt="Image" height="80px">
										<div class="why-text">
											<h4><?php echo $raw['food name']; ?></h4>
											<p><?php echo $raw['description']; ?></p>
											<h5><?php echo $raw['food_price']; ?></h5>
											<?php if($raw['quantity'] == 0) { ?>
												<p style="color:red"> Food Outofstock</p>

										<?php } else { ?>	

											<input type="hidden" name="foodid" value="<?php echo $raw['fd_id']; ?>">
											
											<input type="number" name="quantity" min="1"style="width:60px;" required>
											<input type="submit" style="margin-top:-2px" class="btn-warning"  name="cart" value="add to cart">
											<!-- <input type="hidden" name="foodname" value="<?php echo $raw['food name']; ?>">
											<input type="hidden" name="price" value="<?php echo $raw['food_price']; ?>"> -->
											<?php }?>
											
										</div>
									</div>
									</form>
								</div>
								
									<?php } ?>						
							</div>	
						</div>
                    </div>
                </div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">JOMEESH JOSE</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							9846577426
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							snachhack02@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							KANJIRAPPALLY, KOTTAYAM
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	
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
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

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