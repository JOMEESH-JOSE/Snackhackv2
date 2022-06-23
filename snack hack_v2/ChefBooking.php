<?php
include 'Login_header.php';
include 'db.php';
?>
<div class="menu-box">
		<div class="container text-center">
			<div class="row">
				<!-- <div class="col-lg-12">
					<h1 style="margin-top: 100px;">Order </h1>
				</div> -->
			</div>
		</div>
	</div>
    <!-- Start Gallery -->
	<center>
	<div class="gallery-box">
	<div class="container">
        <div class="col-9">
            
			
					<div class="main">
						
						<h1 class="display-4">Book Chef</h1>
                        <p>Book the Chef you need.</p>
						            <br>  <br>  <br>
<!-- text -->


<div class="col-12">
					<div class="tab-content" id="v-pills-tabContent">
                        <div class="row">
                    <?php  
                            $result = mysqli_query($conn,"SELECT * FROM `chef_reg_tb` join login_tb on login_tb.Lg_id = chef_reg_tb.Lg_id where status = 'Approved'");
                                while ($raw = mysqli_fetch_array($result)){
									$id = $raw['Lg_id'];
									 ?>
								
								<div class="col-lg-4 col-md-6 special-grid 1">
								<!-- <form method="post" action="cart_manage1.php"> -->
								<form method="post">
									<div class="gallery-single fix">
										<img src="../employee/docs/image/<?php echo $raw['image']; ?>" class="img-fluid" alt="Image" height="80px">
										<div class="why-text">
											<h4>Name : <?php echo $raw['name']; ?></h4>
											<h4>Experience :<?php echo $raw['experience']; ?></h4>	
                                            <h4>Expert in :<i><?php echo $raw['Expert']; ?></i><p><br>
											<Button  style="margin-top:-2px;width:75px;" class="btn-warning"><a href="book_detail.php?pid=<?php echo "$id"; ?>"> Book</a></Button>
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
		
	</div>
	</div></center>
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
