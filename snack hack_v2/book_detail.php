<?php
include 'Login_header.php';
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
$id = $_GET['pid'];
$ss = mysqli_query($conn,"SELECT * FROM `chef_reg_tb` where Lg_id ='$id'");
$QW = mysqli_query($conn,"SELECT * FROM `user_registration_tb` where `login-id`='$uid'");
$ro = mysqli_fetch_assoc($QW);
$qq = mysqli_fetch_assoc($ss);

?>
<?php 

if(isset($_POST['submit'])){
	$date = $_POST['bdate'];
    $as = mysqli_query($conn,"INSERT INTO `chef_book`(`user_id`, `chef_id`, `bookdate`,`status`) VALUES ('$uid','$id','$date','NO')");
	echo "<script type='text/javascript'> alert('You have successfully Book a chef');</script>";
	// header("Location:ChefBooking.php");
}
?>
<br><br><br><br>
<br>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>SnackHack</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/bookstyle.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
                            <center>
                            <img src="../employee/docs/image/<?php echo $qq['image']; ?>" style="width: 285px;height: 285px;">
                            </center>
								
								<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p> --> 
							</div>
						</div>
						<form method="post" onsubmit="return validate();">
							
						<h2>Chef Booking</h2>
									<div class="form-group">
										<span class="form-label">Customer name</span>
										<input class="form-control" type="text" value="<?php echo $ro['name']; ?>" readonly>
									</div>
								
                                    <div class="form-group">
										<span class="form-label">Chef name</span>
										<input class="form-control" type="text" value="<?php echo $qq['name']; ?>" readonly>
									</div>
									<div class="form-group">
										<span class="form-label">Expert In</span>
										<input class="form-control" type="Text" value="<?php echo $qq['Expert']; ?>"readonly>
									</div>
									<div class="form-group">
										<span class="form-label">Phone Number</span>
										<input class="form-control" type="Text"value="<?php echo $qq['phno']; ?>"readonly>
										
									</div>
							<div class="form-group">
								<span class="form-label">Booking Date</span>
								<input type="date" id="date" name="bdate" class="form-control" onclick="return cl();">
								<span id="table" style="color:red"></span>
							</div>

							<div class="form-btn">
								<input type="submit" name="submit" class="submit-btn" value="Make Booking">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<script>
	function validate(){

var a = document.getElementById('date').value.trim();


if(a == ""){

document.getElementById("table").innerHTML="**please select the date**";
return false;
}
else{
	return true;
}
	}
	function cl(){

document.getElementById("table").innerHTML=" ";
}

</script>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#date').attr('min', minDate);
});
</script>
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