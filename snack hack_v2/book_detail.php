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
// Return current date from the remote server
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

?>


<?php 

if(isset($_POST['submit'])){
	$date = $_POST['date'];
	$event = $_POST['event'];
	$people = $_POST['people'];
	$sq = mysqli_query($conn,"SELECT bookdate FROM `chef_book` WHERE bookdate='$date'");
	$count = mysqli_num_rows($sq);
	if($count == 0){
		$as = mysqli_query($conn,"INSERT INTO `chef_book`(`user_id`, `chef_id`, `event`, `peoples`, `bookdate`,`status`) VALUES ('$uid','$id','$event','$people','$date','NO')");
		echo "<script type='text/javascript'> alert('You have successfully Book a chef');</script>";
	}
    else{
		echo "<script type='text/javascript'> alert('Sorry this Booking date is already Reserved');</script>";
	}
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
	<div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-lg" src="../employee/docs/image/<?php echo $qq['image']; ?>" width="220px" height="230px"><span class="font-weight-bold"><?php echo $name; ?></span><span class="text-black-50"><?php echo $email; ?></span><span><?php echo $role; ?></span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1>ChefBooking</h1>
						
                    </div>
                    <form method="post" onsubmit="return validate();">
                    <div class="row mt-2">
                        <div class="col-md-6">
                        <label class="fs-4">Chef Name</label>
                        <div><input type="text" class="form-control" name="name"value="<?php echo $qq['name']; ?>" minlength="2" maxlength="50" readonly></div>
                        </div>
                        <div class="col-md-6">
                        <label class="fs-4">Customer Name</label>
                        <div><input type="text" class="form-control" name="gender" value="<?php echo $ro['name']; ?>" readonly></div>
                        </div>
                         </div>
                    <div class="row mt-3">
					<div class="col-md-6">
                        <label class="fs-4">Expert In</label>
                        <div><input type="text" class="form-control" name="address" value="<?php echo $qq['Expert']; ?>" readonly></div>
                    </div>
					<div class="col-md-6">
                        <label class="fs-4">Phone Number</label>
                        <div><input type="text" class="form-control" name="phno" value="<?php echo $qq['phno']; ?>" readonly></div>
                    </div>
                   
                   
                    </div>
                    <div class="row mt-3">
					<div class="col-md-6">
                        <label class="fs-4">Booking Date</label>
                        <div><input type="date" class="form-control" name="date" id="date" onclick="return cl();" ></div>
                    </div>
					<div class="col-md-6">
                        <label class="fs-4">Event Type</label>
                        <div><select class="form-control" id="sel" name="event"  onclick="return cl();">

						<option value="select">SELECT EVENT</option>
						<?php 
						$ss1 = mysqli_query($conn,"SELECT ev_id,eventname,price FROM `tbl_event`");
						while ($r = mysqli_fetch_array($ss1)){
							$id=$r['ev_id'];
							$nam=$r['eventname']; 
							// $price = $r['price'];
							?>
                           <option value="<?php echo $id;?>"><?php echo $nam; ?></option>
						<?php }

                     $ss4 = mysqli_query($conn,"SELECT price FROM `tbl_event` where ev_id = '$id'");
					 $rt = mysqli_fetch_array($ss4);
					 $price=$rt['price'];
						?>
                    
						</select></div>
                    </div>
                    </div>
					<div class="row mt-3">
					<div class="col-md-6">
                        <label class="fs-4">No of Peoples</label>
                        <div><input type="number" class="form-control" name="people" id="people"  max="100" onclick="return cl();" ></div>
                    </div>
					
					<div class="col-md-6" >
                        <label class="fs-4">Amount Calculated</label>
                        <div ><input type="text" class="form-control" id="amount" name ="result"></div>
                    </div>
                    </div>
					<div><span id="table" style="color:red"></span></div>
                    				<div class="mt-5 text-center"><input type="submit" name="submit" class="btn btn-primary profile-button" value="Book" ></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<br><br>
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
var b = document.getElementById('people').value.trim();
var c = document.getElementById('sel').value;
if(a==""){

document.getElementById("table").innerHTML="**please select the date**";
return false;
}
else if(c =="select"){
	document.getElementById("table").innerHTML="**please select the event type**";
return false;
}
else if(b<10){
	document.getElementById("table").innerHTML="**please enter the value greater than 10**";
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
<script>
//  $( "#amount" ).load( "ajax/response.html #div-with-new-content" ); 
 
$(document).ready(function () {
        $(function () {
            $("#people").on("blur", function () {
                updateTotalNetVehicle();
            });

        });
    });

     var updateTotalNetVehicle = function () {
                var input1 = parseInt($('#people').val()) || 0;
                var number1 = <?php echo $price; ?>;
                var sum = input1 * number1;
                $('#amount').val('$' + sum.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
            }; </script>
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
