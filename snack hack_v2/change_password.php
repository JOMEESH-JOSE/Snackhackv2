<?php
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Snack Hack</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="js/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login10" >
			<div class="wrap-login100" >
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logi.gif" alt="IMG">
				</div>
            
				<form class="login100-form validate-form"  method="post">
					<span class="login100-form-title">
						Change password?
					</span>
					
					<div class="wrap-input100">
						<input class="input100" type="password"  name="oldpass" placeholder="Oldpassword" autocomplete ="off" required>
						<span class="focus-input100"></span>
						<!-- <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="password"  name="newpass" placeholder="Newpassword" autocomplete ="off" required>
						<span class="focus-input100"></span>
						<!-- <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="SEND" name="Login">
						
					</div>
                   
				

					</div>
				</form>
                
			</div>
            
		</div>
	</div>

	
<?php 

if(isset($_POST['Login'])){

    $old = $_POST['oldpass'];
    $new = $_POST['newpass'];
   $check= mysqli_query($conn,"SELECT * FROM `login_tb` WHERE password='$old' AND Lg_id='$uid'");
   $rr = mysqli_num_rows($check);
   if($rr == 1){
    $insert = mysqli_query($conn,"UPDATE `login_tb` SET `password`='$new' WHERE Lg_id='$uid'");
    echo "<script>alert('password updated')</script>";
    echo "<script>location='index2.php'</script>";
   }
   else{
    echo "<script>alert('password not updated You are Provided a Incorrect OldPassword')</script>";
   }
}

?>
	
<!--===============================================================================================-->	
	<script src="js/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/bootstrap/js/popper.js"></script>
	<script src="js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>