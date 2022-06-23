
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
		<div class="container-login10">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logi.gif" alt="IMG">
				</div>
            
				<form class="login100-form validate-form" name="myform" method="post" action="verifymail2.php">
					<span class="login100-form-title">
						Forgot password?
					</span>
					
					<div class="wrap-input100">
						<input class="input100" type="text"  name="email" placeholder="Email" autocomplete ="off" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="SEND" name="Login">
						
					</div>
                    <div class="text-center p-t-12">
						<span class="txt1">
							Back to
						</span>
						<a class="txt2" href="Login.php">
							 Login?
						</a>
					</div>
				

					</div>
				</form>
                
			</div>
            
		</div>
	</div>

	

	
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