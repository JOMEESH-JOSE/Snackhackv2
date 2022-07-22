<?php
include 'db.php';
include 'Login_header.php';
error_reporting(0);
session_start();
$uid = $_SESSION['UserID'];
$ss = mysqli_query($conn,"SELECT * FROM `user_registration_tb` where `login-id`=$uid");
while ($row = mysqli_fetch_array($ss)){
	$name = $row['name'];
	$email = $row['email'];
}
?>
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Contact</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="maps-container wow fadeInUp">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.3009756761126!2d76.82253842971336!3d9.528355382085826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b063626ed32c771%3A0xff305e1affdbb4b4!2sAmal%20Jyothi%20College%20of%20Engineering!5e1!3m2!1sen!2sin!4v1642394443899!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Feedback Form</h2>
						<p>Let us know what Your Taste</p>
					</div>
				</div>
			</div>
			<center>
			<div class="row">
				<div class="col-lg-12">
					<form method="post" name="myform">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<input type="hidden" class="form-control" id="name" name="name" value="<?php echo $name; ?>"  placeholder="Your Name" readonly onclick="return alrt();">
									<p style="color:red" name="name"></p>
								</div>                                 
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="hidden"  id="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Your Email" readonly onclick="return alrt();">
									<p style="color:red" name="email"></p>
								</div> 
							</div>
							
							<div class="col-md-9">
								<div class="form-group"> 
									<textarea class="form-control" name ="message" id="msge" placeholder="Your Message" rows="4" required></textarea>
									<p style="color:red" name="message"></p>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="msg" id="submit" type="submit">Send Message</button>
									 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
			</center>
		</div>
	</div>
	<!-- End Contact -->
	
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
							snachhack@gmail.com
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
	<footer class="footer-area bg-f">
	
		
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
	<script src="js/jquery.mapify.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'Live Dinner Restaurant'
				}
			]
		});	
	</script>
	  <script>
                      function alrt() {
                        alert("This feild can't be edited");
                      }
                    </script>
</body>

</html>
<?php 

if(isset($_POST['msg'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$ms = $_POST['message'];
	$qw = "INSERT INTO `review_tb`(`Lg_id`,`name`, `email`, `message`,`sts`) VALUES ('$uid','$name', '$email', '$ms','NO')";
	$qwe=mysqli_query($conn,$qw);
	echo "<script>alert('Thankyou for your Feedback');</script>";
	echo "<script>location=index.php</script>";
}

?>
