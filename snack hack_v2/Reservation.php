<?php
include 'Login_header.php';
include 'db.php';
error_reporting(0);
session_start();
$uid = $_SESSION['UserID'];
$ss = mysqli_query($conn,"SELECT * FROM `user_registration_tb` where `login-id`=$uid");
$row = mysqli_fetch_assoc($ss);
	$name = $row['name'];
	$phno = $row['phno'];

?>
<!-- <div class="menu-box">
		<div class="container text-center">
			<div class="row">
				<!-- <div class="col-lg-12">
					<h1 style="margin-top: 100px;">Order </h1>
				</div> -->
			<!-- </div>
		</div>
	</div> --> -->

    <!-- Start Gallery -->
	<center>
	<!-- <div class="gallery-box"> -->
	<div class="container">
        <div class="col-12">
					<div class="main">
						
<!-- text -->

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="css/ss.css">

	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-">
					<div class="wrap d-md-flex">
						<div class="img">
							
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpBFtjK6sBtSNXjrlTm7J4xAASE0TwuFtfDA&usqp=CAU" width="280px">
							
						</div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Table Reservation</h3>
							  <span id="table" style="color:red"></span>
			      		</div>
								
			      	</div>
							<form class="signin-form" method="post" onsubmit="return validate();">
			      		<div class="form-group mb-3">
			      			<input type="text" class="form-control" value="<?php echo $name ?>" readonly  onclick="return alrt();">
			      		</div>
						 
		            <div class="form-group mb-3">
		              <input type="text"  class="form-control" value="<?php echo $phno ?>"  readonly onclick="return alrt();">
		            </div>
					<div class="form-group mb-3">
		              <select class="form-control" id="tt" name="tb_type" onclick="return cl();">
					  <option value="select">Select Type</option>
					  <?php 
					 $ss = "SELECT `p_id`,`p_type` FROM `tbl_persontype`"; 
					 $ww = mysqli_query($conn,$ss);
					 while($zx = mysqli_fetch_assoc($ww)){

					 
					  ?>
                       <option value="<?php echo $zx['p_id']; ?>"><?php echo $zx['p_type']; ?> </option>
					  <?php } ?>
					  </select>
					 
		            </div>
					<div class="form-group mb-3">
		              <select class="form-control" id="tt2" name="tb_no" onclick="return cl();">
					  <option value="select">Select Table</option>
					  </select>
					 
		            </div>
					<div class="form-group mb-3">
		              <input type="date" id="date" name="date" class="form-control" onclick="return cl();" >
		            </div>
					
					<div class="form-group mb-3">
					<select class="form-control" id="tt1" name="time" onclick="return cl();">
					  <option value="select">Select Time</option>
                       <option value="7:00_AM">7:00 AM</option>
					   <option value="8:00_AM">8:00 AM</option>
					   <option value="9:00_AM">9:00 AM</option>
					   <option value="10:00_AM">10:00 AM</option>
					   <option value="11:00_AM">11:00 AM</option>
					   <option value="12:00_PM">12:00 PM</option>
					   <option value="1:00_PM">1:00 PM</option>
					   <option value="2:00_PM">2:00 PM</option>
					   <option value="3:00_PM">3:00 PM</option>
					   <option value="4:00_PM">4:00 PM</option>
					   <option value="5:00_PM">5:00 PM</option>
					   <option value="6:00_PM">6:00 PM</option>
					   <option value="7:00_PM">7:00 PM</option>
					  </select>
		            </div>
		            <div class="form-group">
		            	<input type="submit" name="Book" class="form-control btn btn-primary rounded submit px-3" value="Book">
		            </div>
		          </form>
		         
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
<script>
  function validate(){

	var a = document.getElementById('tt').value;
	var b = document.getElementById('date').value;
	var c = document.getElementById('tt1').value;
	var d = document.getElementById('tt2').value;
if(a == "select"){

	document.getElementById("table").innerHTML="**please select the Type**";
	return false;
}
if(d == "select"){

document.getElementById("table").innerHTML="**please select the Table**";
return false;
}
if(b ==""){
document.getElementById("table").innerHTML="**please select the date**";
return false;
}
if(c == "select"){
document.getElementById("table").innerHTML="**please select the Time**";
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
function alrt() {
     document.getElementById("table").innerHTML="**this feild cannot be changed**";
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
    $(document).ready(function() {
      $('#tt').on('change', function() {
        var re_id = this.value;
        $.ajax({
          url: "reservationaction.php",
          type: "POST",
          data: {
            d_id: re_id //d_id is the foreignkey of city table
          },
          cache: false,
          success: function(result) {
            $("#tt2").html(result);

          }
        });
      });

    });
  </script>
	<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>


                                    </div>	
				
        </div>
		
	</div>
	<!-- </div> -->
</center>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
<style>
.img{

	margin-top: 150px;
}

	</style>
</body>

</html>
<?php 
if(isset($_POST['Book'])){
$tb_type = $_POST['tb_type'];
	$tb_no = $_POST['tb_no'];
	$date = $_POST['date'];
	$time = $_POST['time'];
    
	$ch = mysqli_query($conn,"SELECT * FROM `reservation` WHERE Table_no = '$tb_no' AND b_date = '$date' AND b_time='$time'");

	$count = mysqli_num_rows($ch);
	if($count == 0){

		$hh = mysqli_query($conn,"INSERT INTO `reservation`(`Lg_id`,`type`, `Table_no`, `b_date`, `b_time`) VALUES ('$uid','$tb_type','$tb_no', '$date', '$time')");
		echo "<script type='text/javascript'> alert('You have successfully reserved a table');</script>";
		header("Location:Reservation.php");

	}
	else{
		echo "<script type='text/javascript'> alert('Please schedule another appointment since the table is already booked for the same date and hour');</script>";
		header("Location:Reservation.php");
	}

	

}

?>